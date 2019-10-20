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
	<form action="{{ url('backend/admin') }}" method="post">
		<div class="col-xs-12">
			<p class="front_title">管理員設定</p>
			<div class="box_style_gray">
				<div style="margin-left: 100px;">
					<div class="form-group row ">
						<label for="admin_mail" class="col-sm-4 col-form-label mr-3 p-1">後台登入帳號設定</label>
						<div class="col-sm-5 p-0 mr-1 mr-1">
							<input type="text" class="form-control" id="admin_mail" name="account" value="{{ $admin['account'] }}">
						</div>
					</div>
				   
					<div class="form-group row ">
						<label for="skype_account" class="col-sm-4 col-form-label mr-3 p-1">原自動贊助系統後台登入密碼</label>
						<div class="col-sm-5 p-0 mr-1">
							<input type="text" class="form-control" id="skype_account" value="{{ $admin['password'] }}">
						</div>
					</div>
					<div class="form-group row ">
						<label for="dc_account" class="col-sm-4 col-form-label mr-3 p-1">新自動贊助後台密碼設定</label>
						<div class="col-sm-5 p-0 mr-1">
							<input type="text" class="form-control" id="dc_account" name="password">
						</div>
					</div>
					<div class="form-group row ">
						<label for="line_account" class="col-sm-4 col-form-label mr-3 p-1">新自動贊助後台密碼確認</label>
						<div class="col-sm-5 p-0 mr-1">
							<input type="text" class="form-control" id="line_account" name="password">
						</div>
					</div>
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