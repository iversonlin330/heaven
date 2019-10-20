@extends('layouts.master')
@section('title', 'index')
 
@section('style')
@parent
<style>
</style>
@endsection
@section('content')
<div class="section_pay_firm mb-40">
	<div class="container">
	<form action="{{ url('backend/server') }}" method="post">
		<div class="col-xs-12">
			<p class="front_title">金流商家設定</p>
			<div class="box_style_gray">
				<div class="form-group row">
					<label for="evn_status" class="col-sm-4 col-form-label mr-3 p-1">使用環境狀態</label>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="casher[env]" value="production">
						<label class="form-check-label" for="inlineRadio1">正式環境</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="casher[env]" value="test">
						<label class="form-check-label" for="inlineRadio2">模擬環境</label>
					</div>
				</div>
				<div class="form-group row">
					<label for="convenience" class="col-sm-4 col-form-label mr-3 p-1">超商代碼繳款開關</label>
					<input type="checkbox" data-toggle="toggle" data-onstyle="info" data-size="sm" data-offstyle="dark" name="casher[cvs]" value="1" {{ ($casher['cvs'])? 'checked' : '' }}>
				</div>
				<div class="form-group row">
					<label for="atm" class="col-sm-4 col-form-label mr-3 p-1">ATM轉帳繳款開關</label>
					<input type="checkbox" data-toggle="toggle" data-onstyle="info" data-size="sm" data-offstyle="dark" name="casher[atm]" value="1" {{ ($casher['atm'])? 'checked' : '' }}>
				</div>
				<div class="form-group row">
					<label for="crefit_card" class="col-sm-4 col-form-label mr-3 p-1">信用卡線上刷卡繳款開關</label>
					<input type="checkbox" data-toggle="toggle" data-onstyle="info" data-size="sm" data-offstyle="dark" name="casher[credit]" value="1" {{ ($casher['credit'])? 'checked' : '' }}>
				</div>
				<div class="form-group row ">
					<label for="ecpay" class="col-sm-4 col-form-label mr-3 p-1">商家代號</label>
					<div class="col-sm-5 p-0">
						<input type="text" class="form-control" id="ecpay" name="casher[shop_no]" value="{{ $casher['shop_no'] }}">
					</div>
				</div>
				<div class="form-group row ">
					<label for="hsahkey" class="col-sm-4 col-form-label mr-3 p-1">HashKey</label>
					<div class="col-sm-5 p-0">
						<input type="text" class="form-control" id="hsahkey" name="casher[key]" value="{{ $casher['key'] }}">
					</div>
				</div>
				<div class="form-group row ">
					<label for="hashiv" class="col-sm-4 col-form-label mr-3 p-1">HashIV</label>
					<div class="col-sm-5 p-0">
						<input type="text" class="form-control" id="Hashiv"  name="casher[iv]" value="{{ $casher['iv'] }}">
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