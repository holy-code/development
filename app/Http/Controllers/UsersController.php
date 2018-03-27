<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Modelo de usuario
use App\User;

//Modelo de imagenes
// use App\Image;

//Validador de peticiones
use App\Http\Requests\UserFormRequest;
//Manejo de archivos
use Illuminate\Support\Facades\Storage;
//Has para contraseñas
use Illuminate\Support\Facades\Hash;
//Servicios de imagenes
use Images;

class UsersController extends Controller
{
    private $disk='images_users';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        $data=[];
        foreach ($users as $key => $value) {
            $value->image=Images::getImg($value->image_id);
            
            $value['types']=$value->getRoleNames();                
            
            array_push($data, $value);
        }
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
        
        $user=new User(array(
            'email'=>$request->email,
            'name'=>$request->name,
            'password'=>Hash::make($request->password),
            'phone'=>$request->phone,
            'celphone'=>$request->celphone,
            'access'=>$request->access,
        ));

        
        
        if($request->image){
            $image_id=Images::save($request->image,"users");
            $user->image_id=$image_id;
        }

        $user->save();
        $user->syncRoles($request->roles);
        $user->save();

        $user->img;

        return response()->json($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::find($id);
        $user->imageUrl=Images::getUrl($user->image_id);
        $user->getRoleNames();
        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserFormRequest $request, $id)
    {
        // var_dump($request->all());
        // die();
        $user=User::find($id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->celphone=$request->celphone;
        $user->access=$request->access;

        if(isset($request->password)){
            $user->password=Hash::make($request->password);
        }

        $user->syncRoles($request->roles);

        if(isset($request->image)){
            if ($user->image_id!=1) {
                //Borramos la imagen anterior
                Images::delete($user->image_id);
            }
            
            //Subimos la nueva imagen
            $image_id=Images::save($request->image);
            $user->image_id=$image_id;
        }

        $user->save();

        $user->img;

        return response()->json($user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($this->_deleteUser($id)){
            return response()->json(['msg'=>'Usuario con ID '.$id.' eliminado.']);
        }
        else{
            return response()->json(['msg'=>'Ocurrio un error al eliminar.'],500);
        }
    }

    public function destroyMultiple(Request $request)
    {
        foreach ($request->ids as $key => $value) {
            $status=$this->_deleteUser($value);
            if(!$status)
                break;
        }

        if ($status) {
            return response()->json(['msg'=>'Usuarios eliminados.']);
        }
        else{
            return response()->json(['msg'=>'Ocurrio un error al eliminar.'],500);
        }
    }

    private function _deleteUser($user_id)
    {
        $user=User::find($user_id);
        $user->img;
        if($user->img->key!="default"){
            Images::delete($user->img->id);
        }
        if ($user->delete()) {
            return true;
        }
        else{
            return false;
        }
    }

}
