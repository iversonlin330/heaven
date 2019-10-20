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
			<div class="form_style mb-40" style="margin-left: 200px;">
				<div class="form-group row ">
					<label for="data_port" class="col-sm-3 col-form-label">選擇資料庫名稱：</label>
					<div class="col-sm-4 p-0 mr-3">
						<input type="text" class="form-control" id="data_port">
					</div>
					<button class="btn btn_blue mr-1" onclick="">選擇資料庫</button>
				</div>
				<div class="form-group row ">
					<label for="data_port" class="col-sm-3 col-form-label">選擇資料庫表單：</label>
					<div class="col-sm-4 p-0 mr-3">
						<input type="text" class="form-control" id="data_port">
					</div>
					<button class="btn btn_blue mr-1" onclick="">選擇資料庫表單</button>
				</div>
			</div>
			<hr class="line_white">
			<div class="form_style mb-40 mt-5 mx-auto" >
				<div class="form-group row d-flex justify-content-center">
					<label for="data_field" class="col-form-label">欄位：</label>
					<div class="col-sm-2 p-0 mr-3">
						<input type="text" class="form-control" id="data_field">
					</div>
					<label for="data_value" class="col-form-label">輸入值：</label>
					<div class="col-sm-2 p-0">
						<input type="text" class="form-control" id="data_value">
					</div>
				</div>
			</div>
			<div class="text-center mb-40">
				<div class="btn-group">
					<button class="btn btn_pink" onclick="">儲存</button>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
 
@section('script')
@parent

@endsection