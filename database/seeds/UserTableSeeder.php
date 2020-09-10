<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
        	'name'=>'Thanh Tuan',
        	'email'=>'thanhtuan123@gmail.com',
            'phone'=>'09090909',
        	'address'=>'Quang Nam',
        	'role'=>1,
        	'password'=>Hash::make('thanhtuan123'),
        	
        ],[
            'name'=>'Cô Đơn',
            'email'=>'codon123@gmail.com',
            'phone'=>'09090909',
            'address'=>'Đà Nẵng',
            'role'=>0,
            'password'=>Hash::make('codon123'),
        ]
        ]);
    }
}
