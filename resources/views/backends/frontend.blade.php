@extends('layouts.master')
@section('title', 'index')
 
@section('style')
@parent
<style>
</style>
@endsection
@section('content')
<div class="section_front_setting mb-40">
	<div class="container">
	<form action="{{ url('backend/server') }}" enctype="multipart/form-data" method="post">
		<div class="col-xs-12">
			<p class="front_title">前台首頁設定</p>
			<div class="box_style_gray">
				<div class="form-group row ">
					<label for="admin_mail" class="col-sm-4 col-form-label mr-3 p-1">遊戲伺服器管理員信箱</label>
					<div class="col-sm-5 p-0 mr-1 mr-1">
						<input type="text" class="form-control" id="admin_mail" name="frontend[email]" value="{{ $frontend['email'] }}">
					</div>
					<input type="checkbox" data-toggle="toggle" data-onstyle="info" data-size="sm" data-offstyle="dark" value="1" name="frontend[email_show]" {{ ($frontend['email_show'])? 'checked' : '' }}>
				</div>
				<div class="form-group row ">
					<label for="qq_account" class="col-sm-4 col-form-label mr-3 p-1">遊戲管理員或客服qq帳號</label>
					<div class="col-sm-5 p-0 mr-1">
						<input type="text" class="form-control" id="qq_account" name="frontend[qq]" value="{{ $frontend['qq'] }}">
					</div>
					<input type="checkbox" data-toggle="toggle" data-onstyle="info" data-size="sm" data-offstyle="dark" value="1" name="frontend[qq_show]" {{ ($frontend['qq_show'])? 'checked' : '' }}>
				</div>
				<div class="form-group row ">
					<label for="skype_account" class="col-sm-4 col-form-label mr-3 p-1">遊戲管理員或客服Skype</label>
					<div class="col-sm-5 p-0 mr-1">
						<input type="text" class="form-control" id="skype_account" name="frontend[skype]" value="{{ $frontend['skype'] }}">
					</div>
					<input type="checkbox" data-toggle="toggle" data-onstyle="info" data-size="sm" data-offstyle="dark" value="1" name="frontend[skype_show]" {{ ($frontend['skype_show'])? 'checked' : '' }}>
				</div>
				<div class="form-group row ">
					<label for="dc_account" class="col-sm-4 col-form-label mr-3 p-1">遊戲管理員或客服DC語音房號</label>
					<div class="col-sm-5 p-0 mr-1">
						<input type="text" class="form-control" id="dc_account" name="frontend[dc]" value="{{ $frontend['dc'] }}">
					</div>
					<input type="checkbox" data-toggle="toggle" data-onstyle="info" data-size="sm" data-offstyle="dark" value="1" name="frontend[dc_show]" {{ ($frontend['dc_show'])? 'checked' : '' }}>
				</div>
				<div class="form-group row ">
					<label for="line_account" class="col-sm-4 col-form-label mr-3 p-1">遊戲管理員或客服LINE</label>
					<div class="col-sm-5 p-0 mr-1">
						<input type="text" class="form-control" id="line_account" name="frontend[line]" value="{{ $frontend['line'] }}">
					</div>
					<input type="checkbox" data-toggle="toggle" data-onstyle="info" data-size="sm" data-offstyle="dark" value="1" name="frontend[line_show]" {{ ($frontend['line_show'])? 'checked' : '' }}>
				</div>
				<div class="form-group row ">
					<label for="wechat_account" class="col-sm-4 col-form-label mr-3 p-1">遊戲管理員或客服微信</label>
					<div class="col-sm-5 p-0 mr-1">
						<input type="text" class="form-control" id="wechat_account" name="frontend[wechat]" value="{{ $frontend['wechat'] }}">
					</div>
					<input type="checkbox" data-toggle="toggle" data-onstyle="info" data-size="sm" data-offstyle="dark" value="1" name="frontend[wechat_show]" {{ ($frontend['wechat_show'])? 'checked' : '' }}>
				</div>
				<div class="form-group row ">
					<label for="official_website_link" class="col-sm-4 col-form-label mr-3 p-1">官網連結設定</label>
					<div class="col-sm-5 p-0 mr-1">
						<input type="text" class="form-control" id="official_website_link" name="frontend[link]" value="{{ $frontend['link'] }}">
					</div>
					<input type="checkbox" data-toggle="toggle" data-onstyle="info" data-size="sm" data-offstyle="dark" value="1" name="frontend[link_show]" {{ ($frontend['link_show'])? 'checked' : '' }}>
				</div>
				<div class="form-group row ">
					<label for="official_website" class="col-sm-4 col-form-label mr-3 p-1">官網名稱</label>
					<div class="col-sm-5 p-0 mr-1">
						<input type="text" class="form-control" id="official_website" name="frontend[name]" value="{{ $frontend['name'] }}">
					</div>
					<input type="checkbox" data-toggle="toggle" data-onstyle="info" data-size="sm" data-offstyle="dark" value="1" name="frontend[name_show]" {{ ($frontend['name_show'])? 'checked' : '' }}>
				</div>
				<div class="form-group row ">
					<label for="system_background" class="col-sm-4 col-form-label mr-3 p-1">贊助系統背景</label>
					<div class="col-sm-5 p-0 mr-1">
						<input type="file" class="form-control" id="system_background" name="frontend[background]" value="{{ $frontend['background'] }}">
					</div>
					<input type="checkbox" data-toggle="toggle" data-onstyle="info" data-size="sm" data-offstyle="dark" value="1" name="frontend[background_show]" {{ ($frontend['background_show'])? 'checked' : '' }}>
				</div>
				<div class="form-group row ">
					<label for="system_logo" class="col-sm-4 col-form-label mr-3 p-1">贊助系統Logo</label>
					<div class="col-sm-5 p-0 mr-1">
						<input type="file" class="form-control" id="system_logo" name="frontend[logo]" value="{{ $frontend['logo'] }}">
					</div>
					<input type="checkbox" data-toggle="toggle" data-onstyle="info" data-size="sm" data-offstyle="dark" value="1" name="frontend[logo_show]" {{ ($frontend['logo_show'])? 'checked' : '' }}>
				</div>
				<div class="form-group row ">
					<label for="text_bg" class="col-sm-4 col-form-label mr-3 p-1">文字框呈現背景</label>
					<div class="col-sm-5 p-0 mr-1">
						<input type="file" class="form-control" id="text_bg" name="frontend[text_background]" value="{{ $frontend['text_background'] }}">
					</div>
					<input type="checkbox" data-toggle="toggle" data-onstyle="info" data-size="sm" data-offstyle="dark" value="1" name="frontend[text_background_show]" {{ ($frontend['text_background_show'])? 'checked' : '' }}>
				</div>
			</div>
			<div class="text-center mb-40">
				<div class="btn-group">
					<button type="button" class="btn btn_blue mr-3" onclick="">重新設定</button>
					<button type="submit" class="btn btn_pink" onclick="">儲存</button>
				</div>
			</div>
		</div>
		</form>
	</div>
</div>
@endsection
 
@section('script')
@parent
<script>
function clear(){
	$("#start,#end,#ratio").val('');
}
   
function add(){
	var start_val = $("#start").val();
	var end_val = $("#end").val();
	var ratio_val = $("#ratio").val();
	$("table tbody").append('<tr><td><div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"><label class="form-check-label" for=""></label></div></td><td>'+start_val+'<input type="text" name="start[]" value="'+start_val+'" hidden></td><td>'+end_val+'<input type="text" name="end[]" value="'+end_val+'" hidden></td><td>'+ratio_val+'<input type="text" name="ratio[]" value="'+ratio_val+'" hidden></td></tr>')
}

function delete_ratio(){
	$("input[type='checkbox']:checked").each(function(){
		$(this).closest('tr').remove();
	})
}
</script>
@endsection