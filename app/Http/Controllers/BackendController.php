<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ratio;
use App\Config;
use App\User;
use App\Order;

class BackendController extends Controller
{
    //
	public function index(){
		$orders = Order::all();
		return view('backends.index',compact('orders'));
	}
	
	public function postindex(Request $request){
		return view('backends.index');
	}
	
	public function getRatio()
    {
        //
		$ratios = Ratio::orderBy('start')->get();
		return view('backends.ratio',compact('ratios'));
    }
	
	public function postRatio(Request $request)
    {
        //
		//dd($request->all());
		$data = $request->all();
		Ratio::truncate();
		foreach($data['start'] as $index=>$val){ 
			Ratio::create([
				'start' => $data['start'][$index],
				'end' => $data['end'][$index],
				'ratio' => $data['ratio'][$index],
			]);
		}
		return back();
    }
	
	public function getServer()
    {
		$server = Config::find(1)->server;
		return view('backends.server',compact('server'));
    }
	
	public function postServer(Request $request)
    {
		$data = $request->all();
		if(array_key_exists('casher',$data)){
			if(!array_key_exists('cvs',$data['casher'])){
				$data['casher']['cvs'] = 0;
			}
			if(!array_key_exists('atm',$data['casher'])){
				$data['casher']['atm'] = 0;
			}
			if(!array_key_exists('cvs',$data['casher'])){
				$data['casher']['credit'] = 0;
			}
		}elseif(array_key_exists('frontend',$data)){
			foreach(['email','qq','skype','dc','line','wechat','link','name','background','logo','text_background'] as $cloumn){
				if(!array_key_exists($cloumn.'_show',$data['frontend'])){
					$data['frontend'][$cloumn.'_show'] = 0;
				}
			}
		}
		
		Config::find(1)->update($data);
		return back();
    }
	
	public function getCasher()
    {
        //
		$casher = Config::find(1)->casher;
		return view('backends.casher',compact('casher'));
    }
	
	public function postCasher(Request $request)
    {
        //
		//dd($request->all());
		$data = $request->all();
		Ratio::truncate();
		foreach($data['start'] as $index=>$val){ 
			Ratio::create([
				'start' => $data['start'][$index],
				'end' => $data['end'][$index],
				'ratio' => $data['ratio'][$index],
			]);
		}
		return back();
    }
	
	public function getLimit()
    {
        //
		$limit = Config::find(1)->limit;
		return view('backends.limit',compact('limit'));
    }
	
	public function postLimit(Request $request)
    {
        //
		//dd($request->all());
		$data = $request->all();
		Ratio::truncate();
		foreach($data['start'] as $index=>$val){ 
			Ratio::create([
				'start' => $data['start'][$index],
				'end' => $data['end'][$index],
				'ratio' => $data['ratio'][$index],
			]);
		}
		return back();
    }
	
	public function getFrontend()
    {
        //
		$frontend = Config::find(1)->frontend;
		return view('backends.frontend',compact('frontend'));
    }
	
	public function postFrontend(Request $request)
    {
        //
		//dd($request->all());
		$data = $request->all();
		Ratio::truncate();
		foreach($data['start'] as $index=>$val){ 
			Ratio::create([
				'start' => $data['start'][$index],
				'end' => $data['end'][$index],
				'ratio' => $data['ratio'][$index],
			]);
		}
		return back();
    }
	
	public function getAdmin()
    {
        //
		$admin = User::where('role',99)->first();
		
		return view('backends.admin',compact('admin'));
    }
	
	public function postAdmin(Request $request)
    {
		$data = $request->all();
		User::where('role',99)->update($data);
		return back();
    }
	
	public function getUser()
    {
        //
		$users = User::where('role',50)->get();
		
		return view('backends.user',compact('users'));
    }
	
	public function postUser(Request $request)
    {
		$data = $request->all();
		User::where('role',50)->delete();
		foreach($data['account'] as $index=>$val){ 
			User::create([
				'account' => $data['account'][$index],
				'password' => $data['password'][$index],
				'expired_date' => $data['expired_date'][$index],
				'role' => 50,
			]);
		}
		return back();
    }
	
	public function getItem(Request $request)
    {
        //
		$data = $request->all();
		$server = Config::find(1)->server;
		$database = '';
		$databases = [];
		$table= '';
		$tables = [];
		$column= '';
		$columns = [];
		if(array_key_exists('database',$data)){
			$database = $data['database'];
		}
		
		config(['database.connections.game' => [
			'driver' => 'mysql',
			'host' => $server['ip'],
			'database' => $database,
			'username' => $server['account'],
			'password' => $server['password'],
			'port' => $server['port'],
		]]);
		$databases = \DB::connection('game')->select('show databases;');
		$databases = array_map('current',$databases);
		
		if(array_key_exists('database',$data)){
			$tables = \DB::connection('game')->select('show tables;');
			$tables = array_map('current',$tables);
			//dd($tables);
		}
		
		if(array_key_exists('table',$data)){
			if($data['table']){
				$table = $data['table'];
				$columns = \DB::connection('game')->select("SHOW FULL COLUMNS FROM ". $table);
				$columns = array_map('current',$columns);
				//dd($columns);
			}
		}
		
		return view('backends.item',compact('database','databases','table','tables','column','columns'));
    }
	
	public function postItem(Request $request)
    {
		$data = $request->all();
		$server = Config::find(1)->server;
		config(['database.connections.game' => [
			'driver' => 'mysql',
			'host' => $server['ip'],
			'database' => $data['_database'],
			'username' => $server['account'],
			'password' => $server['password'],
			'port' => $server['port'],
		]]);
		\DB::connection('game')->select("ALTER TABLE ".$data['_table']." ALTER COLUMN ".$data['column']." SET DEFAULT ".$data['default_val'].";");
		
		return back();
    }
	
}
