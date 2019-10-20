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
			<p class="back_title">資料庫比值設定</p>
			<div class="form_style mb-40" style="margin-left: 200px;">
				<div class="form-group row ">
					<label for="service_name" class="col-sm-3 col-form-label">金額範圍：</label>
					<div class="col-sm-2 p-0">
						<input type="text" class="form-control" id="start">
					</div>
					<p class="col-form-label ml-1">元～</p>
					<div class="col-sm-2 p-0">
						<input type="text" class="form-control" id="end">
					</div>
					<p class="col-form-label ml-1">元</p>
				</div>
				<div class="form-group row ">
					<label for="data_port" class="col-sm-3 col-form-label">比值：</label>
					<div class="col-sm-5 p-0">
						<input type="text" class="form-control" id="ratio">
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
			<div class="mb-1 mt-3" style="width:70%; margin:0 auto;">
				<button class="btn btn_blue d-inline" onclick="delete_ratio()">刪除</button>
			</div>
			<form action="{{ url('backend/ratio') }}" method="post">
			<table class="table table-striped mb-40" style="width:70%; margin:0 auto 20px auto;">
				<thead class="table_head">
					<tr>
						<th scope="col" style="width:10%;">選取</th>
						<th scope="col">金額範圍</th>
						<th scope="col">金額範圍</th>
						<th scope="col">比值</th>
					</tr>
				</thead>
				<tbody>
				@foreach($ratios as $ratio)
				<tr>
					<td>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" id="inlineCheckbox1"
								value="option1">
							<label class="form-check-label" for=""></label>
						</div>
					</td>
					<td>{{ $ratio->start }}<input type="text" name="start[]" value="{{ $ratio->start }}" hidden></td>
					<td>{{ $ratio->end }}<input type="text" name="end[]" value="{{ $ratio->end }}" hidden></td>
					<td>{{ $ratio->ratio }}<input type="text" name="ratio[]" value="{{ $ratio->ratio }}" hidden></td>
				</tr>
				@endforeach
				</tbody>
			</table>
			<div class="text-center mb-40">
				<div class="btn-group">
					<button type="submit" class="btn btn_pink">儲存</button>
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