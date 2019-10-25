<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    //use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = 'backend/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
    }
	
	public function postLogin(Request $request){
		
		$data = $request->all();
		$user = User::where('account',$data['account'])
			->where('password',$data['password'])
			->first();
		if(!$user){
			return back()->withErrors(['msg' => '帳號密碼錯誤']);
		}else{
			if($user->role < 99){
				if($user->expired_date < date('Y-m-d')){
					return back()->withErrors(['msg' => '合約已到期']);
				}
			}
			Auth::login($user);
			return redirect('backend/index');
		}
	}
	
	public function getLogout(){
		Auth::logout();
		return redirect('/login');
	}
}
