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
				'name'=>'test',
				'ip'=>'202.39.243.218',
				'port'=>'5125',
				'database'=>'testbata',
				'account'=>'dome',
				'password'=>'D%ig1222QS89@u_s',
			]),
			'limit' => json_encode([
				'cvs1'=> '0',
				'cvs2'=> '6000',
				'atm1'=> '0',
				'atm2'=> '6000',
				'credit1'=> '0',
				'credit2'=> '10000',
			]),
			'casher' => json_encode([
				'env'=>'test',
				'cvs'=>1,
				'atm'=>1,
				'credit'=>1,
				'shop_no'=>'2000132',
				'key'=>'5294y06JbISpM5x9',
				'iv'=>'v77hoKGq4kWxNNIS',
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
