<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ratio;
use App\Config;
use App\User;
use App\Order;

class FrontendController extends Controller
{
    //
	public function index(){
		$config = Config::find(1);
		$ratios = Ratio::all()->sortBy('start');
		//dd($config->limit);
		return view('frontends.index',compact('config','ratios'));
	}
	
	public function postindex(Request $request){
		$data = $request->all();
		/*
		dd($request->all());
		$server = Config::find(1)->server;
		config(['database.connections.game' => [
			'driver' => 'mysql',
			'host' => $server['ip'],
			'database' => 'testbata',
			'username' => $server['account'],
			'password' => $server['password'],
			'port' => $server['port'],
		]]);
		\DB::connection('game')->select('');
		*/
		
		$MerchantTradeNo = "heaven".time() ;
		Order::create([
			"no" => $MerchantTradeNo,
			"type" => $data['type'],
			"account" => $data['account'],
			"money" => $data['value'],
			"is_pay" => 0
		]);
		include('ECPay.Payment.Integration.php');
		try {
			//$url = "https://shoplong.wynn-paradise.com/";
			//$url = "http://localhost:6002/heaven/";
			$obj = new \ECPay_AllInOne();
	   
			//服務參數
			$obj->ServiceURL  = "https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5";  //服務位置
			$obj->HashKey     = '5294y06JbISpM5x9' ;                                          //測試用Hashkey，請自行帶入ECPay提供的HashKey
			$obj->HashIV      = 'v77hoKGq4kWxNNIS' ;                                          //測試用HashIV，請自行帶入ECPay提供的HashIV
			$obj->MerchantID  = '2000132';                                                    //測試用MerchantID，請自行帶入ECPay提供的MerchantID
			$obj->EncryptType = '1';                                                          //CheckMacValue加密類型，請固定填入1，使用SHA256加密
			//基本參數(請依系統規劃自行調整)
			//$MerchantTradeNo = "heaven".time() ;
			$obj->Send['ReturnURL']         = "http://www.ecpay.com.tw/receive.php" ;     //付款完成通知回傳的網址
			$obj->Send['MerchantTradeNo']   = $MerchantTradeNo;                           //訂單編號
			$obj->Send['MerchantTradeDate'] = date('Y/m/d H:i:s');                        //交易時間
			$obj->Send['TotalAmount']       = $data['value'];                                       //交易金額
			$obj->Send['TradeDesc']         = "good to drink" ;                           //交易描述
			if($data['type'] == 'CVS'){
				$obj->Send['ChoosePayment']     = \ECPay_PaymentMethod::CVS;
				$obj->Send['ClientRedirectURL'] = url('frontend/cvs');
			}elseif($data['type'] == 'ATM'){
				$obj->Send['ChoosePayment']     = \ECPay_PaymentMethod::ATM;
				$obj->Send['ClientRedirectURL'] = url('frontend/cvs');
			}elseif($data['type'] == 'Credit'){
				$obj->Send['ChoosePayment']     = \ECPay_PaymentMethod::Credit;
				$obj->Send['OrderResultURL'] = url('frontend/result');
			}
			//$obj->Send['ClientBackURL'] = $url."UC1-PF2_front_index.html";
			//$obj->Send['ClientRedirectURL'] = $url."result2.php";
			//$obj->Send['PaymentInfoURL'] = $url."result2.php";
			$obj->Send['CustomField1'] = $data['money'];
			$obj->Send['CustomField2'] = $data['account'];
			//訂單的商品資料
			array_push($obj->Send['Items'], array('Name' => "天堂幣", 'Price' => (int)$data['value'],
					   'Currency' => "元", 'Quantity' => (int) "1", 'URL' => "dedwed"));
			# 電子發票參數
			/*
			$obj->Send['InvoiceMark'] = ECPay_InvoiceState::Yes;
			$obj->SendExtend['RelateNumber'] = "Test".time();
			$obj->SendExtend['CustomerEmail'] = 'test@ecpay.com.tw';
			$obj->SendExtend['CustomerPhone'] = '0911222333';
			$obj->SendExtend['TaxType'] = ECPay_TaxType::Dutiable;
			$obj->SendExtend['CustomerAddr'] = '台北市南港區三重路19-2號5樓D棟';
			$obj->SendExtend['InvoiceItems'] = array();
			// 將商品加入電子發票商品列表陣列
			foreach ($obj->Send['Items'] as $info)
			{
				array_push($obj->SendExtend['InvoiceItems'],array('Name' => $info['Name'],'Count' =>
					$info['Quantity'],'Word' => '個','Price' => $info['Price'],'TaxType' => ECPay_TaxType::Dutiable));
			}
			$obj->SendExtend['InvoiceRemark'] = '測試發票備註';
			$obj->SendExtend['DelayDay'] = '0';
			$obj->SendExtend['InvType'] = ECPay_InvType::General;
			*/
			//產生訂單(auto submit至ECPay)
			$obj->CheckOut();
		  
		
		} catch (Exception $e) {
			echo $e->getMessage();
		}
		//dd($request->all());
		//return view('backends.index');
	}
	
	public function getResult(Request $request)
    {
        //
		//dd($request->all());
		
		return view('frontends.result');
    }
	
	public function postResult(Request $request)
    {
        //
		//dd($request->all());
		$data = $request->all();
		if($data['RtnCode'] == 1){
			Order::where('no',$data['MerchantTradeNo'])->update(['is_pay' => 1]);
		}
		return view('frontends.result',compact('data'));
    }
	
	public function postCvs(Request $request)
    {
        //file_put_contents( ‘/tmp/ECPay_’.uniqid(”, true) .’.txt’, print_r( $_POST, true ) );
		//
		//dd($request->all());
		$data = $request->all();
		dd($data);
		if($data['RtnCode'] == 1){
			Order::where('no',$data['MerchantTradeNo'])->update(['is_pay' => 1]);
		}
		return view('frontends.result',compact('data'));
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
