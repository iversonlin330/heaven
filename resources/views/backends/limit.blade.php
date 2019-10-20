@extends('layouts.master')
@section('title', 'index')
 
@section('style')
@parent
<style>
</style>
@endsection
@section('content')
<div class="section_pay_type mb-40">
	<div class="container">
	<form action="{{ url('backend/server') }}" method="post">
		<div class="col-xs-12">
			<p class="front_title">付款方式限額設定</p>
			<div class="box_style_gray">
				<div style="margin-left: 100px;">
					<div class="form-group row">
						<label for="convenience_limit" class="col-sm-3 col-form-label">超商代碼限額</label>
						<div class="col-sm-2 p-0">
							<input type="text" class="form-control" id="convenience_limit_max" name="limit[cvs1]" value="{{ $limit['cvs1'] }}">
						</div>
						<p class="col-form-label ml-1">元<span
								style="margin:0 15px 0 10px; padding: 5px;background-color: gray;">至</span>
						</p>
						<div class="col-sm-2 p-0">
							<input type="text" class="form-control" id="convenience_limit_min" name="limit[cvs2]" value="{{ $limit['cvs2'] }}">
						</div>
						<p class="col-form-label ml-1">元</p>
					</div>
					<div class="form-group row">
						<label for="atm_limit" class="col-sm-3 col-form-label">ATM虛擬帳號限額</label>
						<div class="col-sm-2 p-0">
							<input type="text" class="form-control" id="atm_limit_max" name="limit[atm1]" value="{{ $limit['atm1'] }}">
						</div>
						<p class="col-form-label ml-1">元<span
								style="margin:0 15px 0 10px; padding: 5px;background-color: gray;">至</span>
						</p>
						<div class="col-sm-2 p-0">
							<input type="text" class="form-control" id="atm_limit_min" name="limit[atm2]" value="{{ $limit['atm2'] }}">
						</div>
						<p class="col-form-label ml-1">元</p>
					</div>
					<div class="form-group row">
						<label for="crefit_card_limit" class="col-sm-3 col-form-label">線上刷卡限額</label>
						<div class="col-sm-2 p-0">
							<input type="text" class="form-control" id="crefit_card_limit_max" name="limit[credit1]" value="{{ $limit['credit1'] }}">
						</div>
						<p class="col-form-label ml-1">元<span
								style="margin:0 15px 0 10px; padding: 5px;background-color: gray;">至</span>
						</p>
						<div class="col-sm-2 p-0">
							<input type="text" class="form-control" id="crefit_card_limit_min" name="limit[credit2]" value="{{ $limit['credit2'] }}">
						</div>
						<p class="col-form-label ml-1">元</p>
					</div>
				</div>

			</div>
			<div class="text-center mb-40">
				<div class="btn-group">
					<button type="button"  class="btn btn_blue mr-3" onclick="">重新設定</button>
					<button type="submit"  class="btn btn_pink" onclick="">儲存</button>
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