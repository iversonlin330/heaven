<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ratio;
use App\Config;
use App\User;

class BackendController extends Controller
{
    //
	public function index(){
		return view('backends.index');
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
	
	public function getItem()
    {
        //
		$users = User::where('role',50)->get();
		
		return view('backends.item',compact('users'));
    }
	
	public function postItem(Request $request)
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
	
}
