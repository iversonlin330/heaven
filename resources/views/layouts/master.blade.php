<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	@section('style')
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/fontawesome/css/all.css">
	<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.5.0/css/bootstrap4-toggle.min.css"
        rel="stylesheet">
	@show
    <title>PF1後台首頁</title>
</head>
<body>
    <div class="sidenav">
        <div class="sidenav_head">
            <p>24H自動贊助<br>後台管理系統</p>
            <hr>
            <p><i class="fas fa-tachometer-alt mr-1"></i>主控台</p>
            <hr>
        </div>
        <a href="{{ url('backend/index') }}">贊助儲值紀錄</a>
        @if(Auth::user()->role == 99)
		<hr class="line_white">
        <button class="dropdown-btn">贊助系統設定
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="{{ url('backend/server') }}">伺服器設定</a>
            <a href="{{ url('backend/ratio') }}">資料庫比值設定</a>
            <a href="{{ url('backend/item') }}">資料庫配發道具運算設定</a>
        </div>
        <hr class="line_white">
        <a href="{{ url('backend/casher') }}">金流商家設定</a>
        <hr class="line_white">
        <a href="{{ url('backend/limit') }}">付款方式限額設定</a>
        <hr class="line_white">
        <a href="{{ url('backend/frontend') }}">前台首頁設定</a>
        <hr class="line_white">
        <button class="dropdown-btn">系統設定
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="{{ url('backend/admin') }}">管理員設定</a>
            <a href="{{ url('backend/user') }}">使用者設定</a>
        </div>
		@endif
    </div>
    <div class="main">
        <header class="mb-40">
            <div class="container-fluid p-0">
                <div class="col-xs-12">
                    <nav class="navbar navbar-expand-lg navbar-light bg-lihgt back_end_nav ">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <p class="nav-link">Admin管理員</p>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('logout') }}">登出</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
		@yield('content')
    </div>
	
</body>
@section('script')
<script type="text/javascript" src="/js/bootstrap.js"></script>
<script type="text/javascript" src="/js/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.5.0/js/bootstrap4-toggle.min.js"></script>
<script>
    /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }
</script>
<script>
    $(document).ready(function () {
        $("#record_search").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $("#record_table tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
@show

</html>

