<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/fontawesome/css/all.css">
    <title>PF2前台首頁</title>
</head>

<body>
    <header class="mb-40">
        <div class="container-fluid p-0">
            <div class="col-xs-12">
                <nav class="navbar navbar-light bg-lihgt">
                    @if($config->frontend['logo_show'])
					<div>
                        <img src="{{ $config->frontend['logo'] }}" alt="" style="width:100%">
                    </div>
					@endif
					@if($config->frontend['link_show'])
					<button class="btn_back_homepage" style="margin-left: auto;" onclick="location.href='{{ $config->frontend['link'] }}'">官網</button>
                    @endif
					<button class="btn_back_homepage" onclick="location.href='{{ url('login') }}'">登入</button>
                </nav>
            </div>
        </div>
    </header>
    <div class="section_sponsor_des">
        <div class="container">
            <div class="col-xs-12">
                <p class="front_title">贊助說明</p>
                <div class="box_style_gray">
                    <div class="row" style="padding:0 160px; position: relative;">
                        @foreach($ratios as $ratio)
							<div class="col-md-6">
								<p>{{ $ratio->start }}-{{ $ratio->end }} = {{ $ratio->ratio }}</p>
							</div>
						@endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="section_payment_flow_firm">
        <div class="container">
            <div class="col-xs-12">
                <p class="front_title">代收金流廠商</p>
                <div class="box_style_gray" style="opacity: 1; background-color: rgba(36, 36, 36, 0.6)">
                    <div class="payment_firm_icon text-center">
                        <!--img src="/img/711ibon.png" alt=""-->
                        <img src="/img/convenience_store.png" alt="">
                        <img src="/img/atm.png" alt="">
                        <img src="/img/creditcard.png" alt="">
                    </div>
    
                </div>
            </div>
        </div>
    </div>
	<form action="{{ url('frontend/index') }}" method="post">
    <div class="section_payment_type">
        <div class="container">
            <div class="col-xs-12">
                <p class="front_title">選擇您要贊助的付款方式<br><span></span></p>
                <div class="box_style_gray">
                    <div class="form-group">
                        <div><label for="section_payment_type" style="font-size: 14px;">*贊助前請至官網詳贊助說明</label></div>
                        @if($config->casher['cvs'] == 1)
						<div class="payment_choose">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type" id="Radio1" value="CVS" required>
                                <label class="form-check-label" for="Radio1">超商代碼<em class="hint">*單次最高贊助金額為 NT$ <span>{{ $config->limit['cvs2'] }}</span></em></label>
                            </div>
                        </div>
						@endif
						@if($config->casher['atm'] == 1)
                        <div class="payment_choose">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type" id="Radio2" value="ATM" required>
                                <label class="form-check-label" for="Radio3">ATM轉帳<em class="hint">*單次最高贊助金額為 NT$ <span>{{ $config->limit['atm2'] }}</span></em></label>
                            </div>
                        </div>
						@endif
						@if($config->casher['credit'] == 1)
                        <div class="payment_choose">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="type" id="Radio3" value="Credit" required>
                                <label class="form-check-label" for="Radio4">信用卡付款<em class="hint">*單次最高贊助金額為 NT$ <span>{{ $config->limit['credit2'] }}</span></em></label>
                            </div>
                        </div>
						@endif
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="section_game_related">
        <div class="container">
            <div class="col-xs-12">
                <p class="front_title">遊戲相關資料</p>
                <div class="box_style_gray mx-auto">
                    <div class="form-group row ">
                        <label for="sponsorMoney" class="col-sm-2 col-form-label">贊助金額</label>
                        <div class="col-sm-9 p-0 flex_center">
                            <input type="text" name="value" class="form-control" id="sponsorMoney" placeholder="輸入金額" required>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label for="sponsorCurrency" class="col-sm-2 col-form-label">贊助幣</label>
                        <div class="col-sm-9 p-0 ">
                            <div style="padding:0.375rem 0.75rem; height:30px;">
                                <p><span id="sponsorCurrency">0</span> 元</p>
								<input id="Currency" type="text" class="form-control" id="money" name="money" value="0" hidden>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label for="account" class="col-sm-2 col-form-label">遊戲帳號</label>
                        <div class="col-sm-9 p-0 flex_center">
                            <input type="text" class="form-control" id="account" name="account" required>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <label for="password" class="col-sm-2 col-form-label">遊戲密碼</label>
                        <div class="col-sm-9 p-0 flex_center">
                            <input type="password" class="form-control" id="password"name="password" required>
                        </div>
                    </div>
					@if($errors->any())
					<div class="form-group row ">
						<div class="col-sm-6 p-0 flex_center">
							<p class="blod">帳號密碼有誤</p>
						</div>
					</div>
					@endif
                </div>
            </div>
        </div>
    </div>
    <div class="section_client_ip">
        <div class="container">
            <div class="row flex_center">
                <div class="col-xs-10">
                    <p class="black_text">客戶相關資料－紀錄IP：127.0.0.1</p>
                </div>
            </div>
            <div class="text-center mb-40">
                <div class="btn-group">
                    <button class="btn btn_pink" type="submit">下一步</button>
                </div>
            </div>
        </div>
    </div>
	</form>
    <div class="container-fluid p-0">
        <div class="col-xs-12" style="background-color: #484F5A;">
            <div class="footer mx-auto">
				@if($config->frontend['email_show'])
                <div class="admin_mail">
                    <p><i class="fas fa-bookmark mr-1"></i>管理員信箱</p>
                    <p>{{ $config->frontend['email'] }}</p>
                </div>
				@endif
				@if($config->frontend['qq_show'])
                <div class="qq_account">
                    <p><i class="fas fa-bookmark mr-1"></i>客服qq號</p>
                    <p>{{ $config->frontend['qq'] }}</p>
                </div>
				@endif
				@if($config->frontend['skype_show'])
                <div class="skype_account">
                    <p><i class="fas fa-bookmark mr-1"></i>Skype位置</p>
                    <p>{{ $config->frontend['skype'] }}</p>
                </div>
				@endif
				@if($config->frontend['dc_show'])
                <div class="dc_account">
                    <p><i class="fas fa-bookmark mr-1"></i>DC語音房號</p>
                    <p>{{ $config->frontend['dc'] }}</p>
                </div>
				@endif
				@if($config->frontend['line_show'])
                <div class="line_account">
                    <p><i class="fas fa-bookmark mr-1"></i>LINE客服</p>
                    <p>{{ $config->frontend['line'] }}</p>
                </div>
				@endif
				@if($config->frontend['wechat_show'])
                <div class="wechat_account">
                    <p><i class="fas fa-bookmark mr-1"></i>微信</p>
                    <p>{{ $config->frontend['wechat'] }}</p>
                </div>
				@endif
				@if($config->frontend['link_show'])
                <div class="official_website_link">
                    <p><i class="fas fa-bookmark mr-1"></i>官網連結</p>
                    <p>{{ $config->frontend['link'] }}</p>
                </div>
				@endif
				@if($config->frontend['name_show'])
                <div class="official_website">
                    <p><i class="fas fa-bookmark mr-1"></i>官網名稱</p>
                    <p>{{ $config->frontend['name'] }}</p>
                </div>
				@endif
                <div class="clearfix">
                </div>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript" src="/js/bootstrap.js"></script>
<script type="text/javascript" src="/js/jquery.js"></script>
<script>
{{$config->frontend['background']}}
	@if($config->frontend['background_show'])
		$("body").css('background-image',"url('{{  $config->frontend['background']  }}')")
	@endif
	@if($config->frontend['text_background_show'])
		$(".box_style_gray").css('background-image',"url('{{ $config->frontend['text_background'] }}')")
	@endif
	var ratio = {!! json_encode($ratios->toArray()) !!}
	$("#sponsorMoney").change(function(){
		var money = parseInt($(this).val());
		$("#sponsorCurrency").text(money);
		$("#Currency").val(money);
		for(x in ratio){
			var start = parseInt(ratio[x]['start']);
			var end = parseInt(ratio[x]['end']);
			var ratio_val = ratio[x]['ratio'].split(":");
			if(money >= start && money <= end){
				//console.log(ratio);
				var result = money*parseFloat(ratio_val[1])/parseFloat(ratio_val[0]);
				$("#sponsorCurrency").text(result);
				$("#Currency").val(result);
			}
		}
		
	})
</script>
</html>