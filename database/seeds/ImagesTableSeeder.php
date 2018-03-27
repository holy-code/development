<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
        	"id"=>1,
        	"path"=>"photos/default.png",
        	"disk"=>"users",
        	"key"=>"default",
        ]);
    }
}
