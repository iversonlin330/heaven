@extends('layouts.master')
@section('title', 'index')
 
@section('style')
@parent
<style>
</style>
@endsection
@section('content')
<div class="section_item_distribution mb-40">
	<div class="container">
		<div class="col-xs-12">
			<p class="back_title">資料庫運算道具配發設定</p>
			<form id="database_form" action="{{ url('backend/item') }}" method="get">
			<div class="form_style mb-40" style="margin-left: 200px;">
				<div class="form-group row ">
					<label for="data_port" class="col-sm-3 col-form-label">選擇資料庫名稱：</label>
					<div class="col-sm-4 p-0 mr-3">
						<select class="form-control" name="database">
							<option value=""></option>
							@foreach($databases as $v)
							<option value="{{ $v }}" {{ ($v == $database)? 'selected' : '' }}>{{ $v }}</option>
							@endforeach
						</select>
					</div>
					<button class="btn btn_blue mr-1" onclick="">選擇資料庫</button>
				</div>
				<div class="form-group row ">
					<label for="data_port" class="col-sm-3 col-form-label">選擇資料庫表單：</label>
					<div class="col-sm-4 p-0 mr-3">
					<select class="form-control" name="table">
						<option value=""></option>
						@foreach($tables as $v)
						<option value="{{ $v }}" {{ ($v == $table)? 'selected' : '' }}>{{ $v }}</option>
						@endforeach
					</select>
					</div>
					<button class="btn btn_blue mr-1" onclick="">選擇資料庫表單</button>
				</div>
			</div>
			</form>
			<hr class="line_white">
			<form action="{{ url('backend/item') }}" method="POST">
			<input name="_database" value="{{ $database }}">
			<input name="_table" value="{{ $table }}">
			<div class="form_style mb-40 mt-5 mx-auto" >
				<div class="form-group row d-flex justify-content-center">
					<label for="data_field" class="col-form-label">欄位：</label>
					<div class="col-sm-2 p-0 mr-3">
						<select class="form-control" name="column">
						@foreach($columns as $v)
						<option value="{{ $v }}" {{ ($v == $table)? 'selected' : '' }}>{{ $v }}</option>
						@endforeach
						</select>
					</div>
					<label for="data_value" class="col-form-label">輸入值：</label>
					<div class="col-sm-2 p-0">
						<input type="text" class="form-control" id="data_value" name="default_val" required>
					</div>
				</div>
			</div>
			<div class="text-center mb-40">
				<div class="btn-group">
					<button type="submit" class="btn btn_pink" onclick="">儲存</button>
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
$('[name="database"],[name="table"]').change(function(){
	$('#database_form').submit();
})
</script>
@endsection