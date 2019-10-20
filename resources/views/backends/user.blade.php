@extends('layouts.master')
@section('title', 'index')
 
@section('style')
@parent
<style>
</style>
@endsection
@section('content')
<div class="section_data_rate_setting mb-40">
	<div class="container">
		<div class="col-xs-12">
			<p class="back_title">使用者設定</p>
			<div class="form_style mb-40" style="margin-left: 200px;">
				<div class="form-group row">
					<label for="user_account" class="col-sm-3 col-form-label">帳號：</label>
					<div class="col-sm-5 p-0">
						<input type="text" class="form-control" id="account">
					</div>
				</div>
				<div class="form-group row">
					<label for="user_password" class="col-sm-3 col-form-label">密碼：</label>
					<div class="col-sm-5 p-0">
						<input type="text" class="form-control" id="password">
					</div>
				</div>
				<div class="form-group row">
					<label for="user_permission" class="col-sm-3 col-form-label">權限：</label>
					<div class="col-sm-5 p-0">
						<input type="text" class="form-control" id="user_permission" placeholder="使用者"
							disabled="disabled">
					</div>
				</div>
				<div class="form-group row">
					<label for="expiry_date" class="col-sm-3 col-form-label">合約到期日：</label>
					<div class="col-sm-5 p-0">
						<input type="date" class="form-control" vlaue="expiry_date" type="text" id="expired_date">
					</div>
				</div>
			</div>
			<div class="text-center mb-40">
				<div class="btn-group">
					<button class="btn btn_blue mr-3" onclick="clear()">清空</button>
					<button class="btn btn_dark d-inline" onclick="add()">新增</button>
				</div>
			</div>
			<hr class="line_white">
			<div class="mb-1 mt-3" style="width:80%; margin:0 auto;">
				<button class="btn btn_blue d-inline" onclick="delete_ratio()">刪除</button>
			</div>
			<form action="{{ url('backend/user') }}" method="post">
			<table class="table table-striped" style="width:80%; margin:0 auto 20px auto;">
				<thead class="table_head">
					<tr>
						<th scope="col" style="width:10%;">選取</th>
						<th scope="col">帳號</th>
						<th scope="col">密碼</th>
						<th scope="col">權限</th>
						<th scope="col">合約到期日</th>
					</tr>
				</thead>
				<tbody>
				@foreach($users as $user)
				<tr>
					<td>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" id="inlineCheckbox1"
								value="option1">
							<label class="form-check-label" for=""></label>
						</div>
					</td>
					<td>{{ $user->account }}<input type="text" name="account[]" value="{{ $user->account }}" hidden></td>
					<td>{{ $user->password }}<input type="text" name="password[]" value="{{ $user->password }}" hidden></td>
					<td>使用者</td>
					<td>{{ $user->expired_date }}<input type="text" name="expired_date[]" value="{{ $user->expired_date }}" hidden></td>
				</tr>
				@endforeach
				</tbody>
			</table>
			<div class="text-center mb-40">
				<div class="btn-group">
					<button class="btn btn_pink" onclick="">儲存</button>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>
@endsection
 
@section('script')
@parent
<script>
function clear(){
	$("#account,#password,#expired_date").val('');
}
   
function add(){
	var start_val = $("#account").val();
	var end_val = $("#password").val();
	var ratio_val = $("#expired_date").val();
	$("table tbody").append('<tr><td><div class="form-check form-check-inline"><input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1"><label class="form-check-label" for=""></label></div></td><td>'+start_val+'<input type="text" name="account[]" value="'+start_val+'" hidden></td><td>'+end_val+'<input type="text" name="password[]" value="'+end_val+'" hidden></td><td>使用者</td><td>'+ratio_val+'<input type="date" name="expired_date[]" value="'+ratio_val+'" hidden></td></tr>')
}

function delete_ratio(){
	$("input[type='checkbox']:checked").each(function(){
		$(this).closest('tr').remove();
	})
}
</script>
@endsection