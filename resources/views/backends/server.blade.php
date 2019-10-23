@extends('layouts.master')
@section('title', 'index')
 
@section('style')
@parent
<style>
</style>
@endsection
@section('content')
<div class="section_service_setting mb-40">
	<div class="container">
	<form action="{{ url('backend/server') }}" method="post">
		<div class="col-xs-12">
			<p class="front_title">伺服器設定</p>
			<div class="box_style_gray">
				<div class="form-group row ">
					<label for="service_name" class="col-sm-4 col-form-label">遊戲伺服器(名稱)：</label>
					<div class="col-sm-5 p-0">
						<input type="text" class="form-control" id="service_name" name="server[name]" value="{{ $server['name'] }}" required>
					</div>
				</div>
				<div class="form-group row ">
					<label for="service_ip" class="col-sm-4 col-form-label">遊戲伺服器資校庫IP：</label>
					<div class="col-sm-5 p-0">
						<input type="text" class="form-control" id="service_ip" name="server[ip]" value="{{ $server['ip'] }}" required>
					</div>
				</div>
				<div class="form-group row ">
					<label for="data_port" class="col-sm-4 col-form-label">遊戲資料庫端口(port)：</label>
					<div class="col-sm-5 p-0">
						<input type="text" class="form-control" id="data_port" name="server[port]" value="{{ $server['port'] }}" required>
					</div>
				</div>
				<div class="form-group row ">
					<label for="data_port" class="col-sm-4 col-form-label">遊戲資料庫名稱：</label>
					<div class="col-sm-5 p-0">
						<input type="text" class="form-control" id="data_port" name="server[database]" value="{{ $server['database'] }}" required>
					</div>
				</div>
				<div class="form-group row ">
					<label for="service_account" class="col-sm-4 col-form-label">遊戲伺服器資料庫帳號：</label>
					<div class="col-sm-5 p-0">
						<input type="text" class="form-control" id="service_account" name="server[account]" value="{{ $server['account'] }}" required>
					</div>
				</div>
				<div class="form-group row ">
					<label for="service_password" class="col-sm-4 col-form-label">遊戲伺服器資料庫密碼：</label>
					<div class="col-sm-5 p-0 mr-3">
						<input type="text" class="form-control" id="service_password" name="server[password]" value="{{ $server['password'] }}" required>
					</div>
					<button class="btn btn_blue mr-1" onclick="">連線</button>
					<button class="btn btn_blue" onclick="">測試連線</button>
				</div>
			</div>
			<div class="text-center">
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