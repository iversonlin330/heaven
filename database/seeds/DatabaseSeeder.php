<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
		DB::table('configs')->insert([
			'id' => 1,
            'server' => json_encode([
				'name'=>'',
				'ip'=>'',
				'port'=>'',
				'account'=>'',
				'password'=>'',
			]),
			'limit' => json_encode(['env'=>'test',
				'cvs1'=> '',
				'cvs2'=> '',
				'atm1'=> '',
				'atm2'=> '',
				'credit1'=> '',
				'credit2'=> '',
			]),
			'casher' => json_encode([
				'env'=>'test',
				'cvs'=>1,
				'atm'=>1,
				'credit'=>1,
				'shop_no'=>'',
				'key'=>'',
				'iv'=>'',
			]),
			'frontend' => json_encode([
				'email'=>'',
				'email_show'=>1,
				'qq'=>'',
				'qq_show'=>1,
				'skype'=>'',
				'skype_show'=>1,
				'dc'=>'',
				'dc_show'=>1,
				'line'=>'',
				'line_show'=>1,
				'wechat'=>'',
				'wechat_show'=>1,
				'link'=>'',
				'link_show'=>1,
				'name'=>'',
				'name_show'=>1,
				'background'=>'',
				'background_show'=>1,
				'logo'=>'',
				'logo_show'=>1,
				'text_background'=>'',
				'text_background_show'=>1,
			]),
        ]);
		
		DB::table('users')->insert([
			'account' => 'admin',
			'role' => 99,
			'password' => 'admin',
		]);
    }
}
