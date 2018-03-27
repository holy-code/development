<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use App\User;
use App\Conekta_card;
use App\Conekta_order;

class ConektaController extends Controller
{
    //Pruebas
    private $private_key="key_1MyBsonzn2LQam8mZNX74Q";
    //Produccion
    // private $private_key="";

    public function __construct() {
        // parent::__construct();
        \Conekta\Conekta::setApiKey($this->private_key);
        \Conekta\Conekta::setLocale('es');
    }

    private function create_customer($user_id)
    {
        $user=User::find($user_id);
        try{
            $customer = \Conekta\Customer::create(
                array(
                    'name'  => $user->name,
                    'email' => $user->email,
                    'phone' => "+521".$user->celphone
                )
            );
            $user->conekta_token=$customer->id;
            $user->save();
        }catch (\Conekta\ProccessingError $error){
            return response()->json(json_decode($error->errorStack));
        } catch (\Conekta\ParameterValidationError $error){
            return response()->json(json_decode($error->errorStack));
        } catch (\Conekta\Handler $error){
            return response()->json(json_decode($error->errorStack));
        }

        return $customer;
    }

    private function update_customer($user_id,$customer_token){
        $user = User::find($user_id);
        try{
            $customer = \Conekta\Customer::find($customer_token);
            $customer->update(
                array(
                    'name'  => "Mario Perez",
                    'email' => 'usuario@example.com',
                )
            );
        }
        catch (\Conekta\ProccessingError $error){
            return response()->json(json_decode($error->errorStack));
        } catch (\Conekta\ParameterValidationError $error){
            return response()->json(json_decode($error->errorStack));
        } catch (\Conekta\Handler $error){
            return response()->json(json_decode($error->errorStack));
        }

        return $customer;
    }

    public function add_credit_card(Request $request){
        $user=JWTAuth::authenticate();
        //Verifica si el usuario ya tiene token de cliente
        if(is_null($user->conekta_token)){
            //Llama a la funcion de crear al cliente
            
            $customer = $this->create_customer($user->id);
            if(!isset($customer->id)){
                //Regresa un error al crear al cliente
                return response()->json($customer,500);
            }
        }else{
            //Actualiza la informacion del cliente
            $customer = $this->update_customer($user->id,$user->conekta_token);
            if(!isset($customer->id)){
                //Regresa un error al actualizar al cliente
                return response()->json($customer,500);
            }
        }
        
        try{
            $customer = \Conekta\Customer::find($user->conekta_token);
            $card_conekta = $customer->createPaymentSource(array(
                'token_id' => $request->token,
                'type'     => 'card'
            ));
            $card = new Conekta_card(array(
                "token"=>$card_conekta->id,
                "name"=>$card_conekta->name,
                "type"=>$card_conekta->type,
                "last4"=>$card_conekta->last4,
                "brand"=>$card_conekta->brand,
                "parent_id"=>$card_conekta->parent_id,
                "created_at"=>$card_conekta->created_at
            ));

            $card->save();
            
        }
        catch (\Conekta\ProccessingError $error){
            return response()->json(json_decode($error->errorStack),500);
        } catch (\Conekta\ParameterValidationError $error){
            return response()->json(json_decode($error->errorStack),500);
        } catch (\Conekta\Handler $error){
            return response()->json(json_decode($error->errorStack),500);
        }

        return response()->json(["msg"=>"Tarjeta con terminacion ".$card->last4." añadida correctamente."],200);        
    }

    public function delete_credit_card($token)
    {
        $user=JWTAuth::authenticate();
        try{
            $customer = \Conekta\Customer::find($user->conekta_token);
            foreach ($customer->payment_sources as $key => $value) {
                if($value['key'] == $token){
                    $customer->payment_sources[$key]->delete();
                }
            }

            Conekta_card::where("token",$token)->delete();
        }
        catch (\Conekta\ProccessingError $error){
            return response()->json(json_decode($error->errorStack),500);
        } catch (\Conekta\ParameterValidationError $error){
            return response()->json(json_decode($error->errorStack),500);
        } catch (\Conekta\Handler $error){
            return response()->json(json_decode($error->errorStack),500);
        }

        return response()->json(["msg"=>"Tarjeta con terminacion ".$card->last4." eliminada correctamente."],200);
    }

    public function create_order(Request $request)
    {
        $user=JWTAuth::authenticate();
        $card=Conekta_card::find($request->card);
        try{
            $order_conekta = \Conekta\Order::create(array(
                'currency' => 'MXN',
                'customer_info' => array(
                  'customer_id' => $user->conekta_token
                ),
                'line_items' => $request->cart,
                'charges' => array(
                  array(
                    'payment_method' => array(
                        "payment_source_id" => $card->token,
                        "type" => "card"
                    )
                  )
                )
              ));

            $order = new Conekta_order(array(
                'token'=>$order_conekta->id,
                'amount'=>$order_conekta->amount,
                'payment_status'=>$order_conekta->payment_status,
                'parent_id'=>$order_conekta->parent_id,
                'created_at'=>$order_conekta->created_at
            ));

            $order->save();
        }
        catch (\Conekta\ProccessingError $error){
            return response()->json(json_decode($error->errorStack),500);
        } catch (\Conekta\ParameterValidationError $error){
            return response()->json(json_decode($error->errorStack),500);
        } catch (\Conekta\Handler $error){
            return response()->json(json_decode($error->errorStack),500);
        }

        if ($order->payment_status=="paid") {
            return response()->json(["msg"=>"Tu orden fue acreditada con el numero de referencia: ".$order->id.".",'order'=>$order],200);
        }
        else{
            return response()->json(["msg"=>"Tu orden no pudo ser acreditada, revisa el estatus de tu orden.",'order'=>$order],202);
        }
    }

    public function refund_order(Request $request,$token)
    {
        $user=JWTAuth::authenticate();
        $order=Conekta_order::find($token);
        
        try{
            $order_conekta = \Conekta\Order::find($order->token);
            $order_conekta->refund(array(
                'reason' => $request->reason,
                'amount' => $request->amount
            ));

            $order->amount=$order->amount-$order_conekta->amount_refunded;
            $order->payment_status=$order_conekta->payment_status;

            $order->save();
        }
        catch (\Conekta\ProccessingError $error){
            return response()->json(json_decode($error->errorStack),500);
        } catch (\Conekta\ParameterValidationError $error){
            return response()->json(json_decode($error->errorStack),500);
        } catch (\Conekta\Handler $error){
            return response()->json(json_decode($error->errorStack),500);
        }

        return response()->json(["msg"=>"El rembolso a sido procesado correctamente.",'order'=>$order],200);
    }


}
