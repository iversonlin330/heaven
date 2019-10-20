<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <title>PF5繳費成功</title>
</head>
<body>
    <header class="mb-40">
        <div class="container-fluid p-0">
            <div class="col-xs-12">
                <nav class="navbar navbar-light bg-lihgt">
                    <div></div>
                    <button class="btn_back_homepage" onclick="location.href=">回官網</button>
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
                        <p>贊助金額：<span id="sponsorMoney"><?php echo $_POST['TradeAmt']; ?></span> 元</p>
                        <p>贊助幣：<span id="sponsorCurrency"><?php echo $_POST['CustomField1']; ?></span> 元</p>
                        <p>遊戲帳號：<span id="account"><?php echo $_POST['CustomField2']; ?></span></p>
                    </div>
                    <div class="payment_info text-center">
                        <i style="font-size: 48px; color: Dodgerblue; margin-bottom: 10px;" class="fas fa-check-circle"></i><p class="mb-0">您已付款成功</p>
                    </div>
                </div>
                <div class="text-center mb-40">
                    <div class="btn-group">
                        <button class="btn btn_pink" onclick="location.href='index2.html'">返回首頁</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>

</html>