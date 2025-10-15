
<div class="form_box">
<form method="post" action="/payment">
<input type="hidden" name="ptype" value="reward" />
<table class="list">
<tr>
<th width="20" class="txt_center"><input type="checkbox" id="checkAll" /></th>
<th width="70">サービス</th>
<th width="60">相談ID</th>
<th width="120">依頼者名</th>
<th width="120">かな</th>
<th width="100">予定日</th>
<th width="100">摘要</th>
<th width="100">出金額</th>
<th> </th>
</tr>

{{-- @foreach ($plans as $idx => $plan)
<tr>
<td class="txt_center"><input type="checkbox" name="ldgid[]" value="{{{$plan->ldgid}}}" class="ldgid" data-total="{{{$plan->total}}}" /></td>
<td>{{{$plan->service }}}</td>
@endforeach --}}