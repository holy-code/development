<?php

use Illuminate\Database\Seeder;
use App\Menu;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('menus')->insert([
            "name"=>"Usuarios",
            "description"=>"Usuarios de tu sitio",
            "route"=>"/users",
            "icon"=>"fa fa-users",
            "permissions_name"=>"view_users",
            "position"=>1
        ]);
        DB::table('menus')->insert([
            "name"=>"Configuracion",
            "description"=>"Configuracion de tu sitio",
            "icon"=>"fa fa-cogs",
            "permissions_name"=>"configuration",
            "position"=>10
        ]);
        $conf=Menu::where('name','Configuracion')->first();
        DB::table('menus')->insert([
            "name"=>"Roles",
            "description"=>"Roles de tu sitio",
            "route"=>"/roles",
            "icon"=>"fa fa-hand-paper-o",
            "parent"=>$conf->id,
            "permissions_name"=>"configuration"
        ]);

        
    }
}
