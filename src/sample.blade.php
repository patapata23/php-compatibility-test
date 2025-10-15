
<div class="form_box">

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
</table>
</div>

@foreach ($plans as $idx => $plan)
<tr>
<td class="txt_center"><input type="checkbox" name="ldgid[]" value="{{{$plan->ldgid}}}" class="ldgid" data-total="{{{$plan->total}}}" /></td>
<td>{{{$plan->service }}}</td>
 <td class="bside">{{{ $result->cost ?? ''}}}@if($result->cost_etc != "")({{{ isset($result->cost_etc) ? number_format($result->cost_etc ?? 0) ? '' }}}円)@endif</td>
@endforeach