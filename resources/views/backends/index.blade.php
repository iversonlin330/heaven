@extends('layouts.master')
@section('title', 'index')
 
@section('style')
@parent
<style>
</style>
@endsection
@section('content')
<div class="section_deposit_record_head mb-40">
	<div class="container">
		<p class="back_title">贊助儲值紀錄</p>
		<div class="row">
			<div class="col-4">
				<div class="record_box flex_center" style="border-left: 4px solid #59B53A;">
					<div>
						<p>今日收入<span style="color:#59B53A; font-size: 20px;"> 183 </span>元</p>
						<p class="record_box_date">2019-09-22</p>
					</div>
					<i class="fas fa-coins record_box_icon"></i>
				</div>
			</div>
			<div class="col-4">
				<div class="record_box flex_center" style="border-left: 4px solid #E58910;">
					<div>
						<p>今日收入<span style="color:#E58910; font-size: 20px;"> 2,094 </span>元</p>
						<p class="record_box_date">2019-09-22</p>
					</div>
					<i class="fas fa-coins record_box_icon"></i>
				</div>
			</div>
			<div class="col-4">
				<div class="record_box flex_center" style="border-left: 4px solid #495C7F;">
					<div>
						<p>合約到期日</p>
						<p class="record_box_date">{{ Auth::user()->expired_date }}</p>
					</div>
					<i class="fas fa-calendar-alt record_box_icon"></i>
				</div>
			</div>
		</div>

	</div>
</div>
<div class="section_deposit_record_table">
	<div class="container">
		<div class="col-xs-12">
			<div class="mb-3">
				<button class="btn btn_blue d-inline" onclick="">刪除</button>
				<div class="ml-auto d-inline">
					<input class="form-control search_bar" id="record_search" type="text"
						placeholder="搜尋.." style="margin-right: 0;">
				</div>
			</div>

			<table class="table table-striped">
				<thead class="table_head">
					<tr>
						<th scope="col" style="width:5%;">選取</th>
						<th scope="col br-5">訂單編號</th>
						<th scope="col">金流訂單編號</th>
						<th scope="col">付款方式</th>
						<th scope="col">交易金額</th>
						<th scope="col">是否繳費</th>
						<th scope="col">遊戲帳號</th>
						<th scope="col">日期</th>
					</tr>
				</thead>
				<tbody id="record_table">
				@foreach($orders as $order)
					<tr>
						<td>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
								<label class="form-check-label" for=""></label>
							</div>
						</td>
						<td>{{ $order->id }}</td>
						<td>{{ $order->no }}</td>
						<td>{{ $order->type }}</td>
						<td>{{ $order->money }}</td>
						<td>{{ ($order->is_pay == 1)? '是' : '否' }}</td>
						<td>{{ $order->account }}</td>
						<td>{{ $order->created_at }}</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
 
@section('script')
@parent

@endsection