<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/fontawesome/css/all.css">
    <title>PF5繳費資訊</title>
</head>

<body>
    <header class="mb-40">
        <div class="container-fluid p-0">
            <div class="col-xs-12">
                <nav class="navbar navbar-light bg-lihgt">
                    
                </nav>
            </div>
        </div>
    </header>
    <div class="section_payment_info">
        <div class="container">
            <div class="col-xs-12">
                <p class="front_title">繳費資訊</p>
                <div class="box_style_gray">
                    <div class="game_related">
                        <p>贊助金額：<span id="sponsorMoney">{{ $data['TradeAmt'] }}</span> 元</p>
                        <p>贊助幣：<span id="sponsorCurrency">{{ $data['CustomField1'] }}</span> 元</p>
                        <p>遊戲帳號：<span id="account">{{ $data['CustomField2'] }}</span></p>
                    </div>
                    <div class="payment_info">
                        <p>商店代號：<span id="">{{ $data['MerchantID'] }}</span></p>
                        <p>交易代號：<span id="">{{ $data['MerchantTradeNo'] }}</span></p>
                        <p>贊助單號：<span id="">{{ $data['TradeNo'] }}</span></p>
                        <p>繳費金額：<span id="sponsorMoney">{{ $data['TradeAmt'] }}</span> 元</p>
                        <p>繳費代碼：<span id="">{{ $data['PaymentNo'] }}</span></p>
                        <p>繳費期限：<span id="">{{ $data['ExpireDate'] }}</span></p>
                        <hr class="dashed_line_lightgray" style="width:100%;border-style: dashed;">
                        <p>*請於繳費期限內，持繳費代碼到全省便利商店進行繳費。別忘囉，操作完必須於櫃檯繳費後才算完成付款動作喔！</p>
                        <p>*如未正常發送請聯絡客服人員！（所有儲值資料包含IP皆已儲存）</p>
                    </div>
                </div>
                <div class="text-center mb-40">
                    <div class="btn-group">
                        <button class="btn btn_pink" onclick="location.href='{{ url('frontend/index') }}'">返回首頁</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>

</html>