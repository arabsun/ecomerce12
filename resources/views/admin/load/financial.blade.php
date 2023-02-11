


@if ($genereate_invoice == 1 && $paid_amount == 0)
<div class="form-group">
   <label>@lang('Due days')*</label>
   <input type="date" class="form-control" value="" name="due_day">
</div>


<div class="form-group">
  <label>@lang('Payment Gateway')*</label>
  <select name="payment_gateway" class="form-control" id="">
     <option value="stripe">Stripe</option>
     <option value="stripe">Paypal</option>
  </select>
</div>


<div class="form-group">
  <label>@lang('Transaction ID')*</label>
  <input type="text" class="form-control" value="" name="txn_id">
</div>


<div class="form-group">
  <label>@lang('Fees')*</label>
  <input type="text" class="form-control" value="" name="fees">
</div>


<div class="form-group">
  <label>@lang('Credit Balance Validity')*</label>
  <input type="number" class="form-control" value="" name="balance_validity">
</div>

@endif

@if ($genereate_invoice == 0 && $paid_amount == 1)
<div class="form-group">
   <label>@lang('Credit Balance Validity')*</label>
   <input type="number" class="form-control" value="" name="balance_validity">
 </div>
@endif

@if ($genereate_invoice == 1 && $paid_amount == 1)



<div class="form-group">
  <label>@lang('Payment Gateway')*</label>
  <select name="payment_gateway" class="form-control" id="">
     <option value="stripe">Stripe</option>
     <option value="stripe">Paypal</option>
  </select>
</div>


<div class="form-group">
  <label>@lang('Transaction ID')*</label>
  <input type="text" class="form-control" value="" name="txn_id">
</div>


<div class="form-group">
  <label>@lang('Fees')*</label>
  <input type="text" class="form-control" value="" name="fees">
</div>


<div class="form-group">
  <label>@lang('Credit Balance Validity')*</label>
  <input type="number" class="form-control" value="" name="balance_validity">
</div>
@endif

@if ($genereate_invoice == 0 && $paid_amount == 0)
<div class="form-group">
   <label>@lang('Due days')*</label>
   <input type="date" class="form-control" value="" name="due_day">
</div>

<div class="form-group">
   <label>@lang('Credit Balance Validity')*</label>
   <input type="number" class="form-control" value="" name="balance_validity">
 </div>
@endif




<div class="form-group">
    <label>@lang('Admin Note')*</label>
    <textarea name="admin_note" id="" class="form-control" style="height: 120px"></textarea>
</div>


<div class="form-group">
   <label>@lang('User Note')*</label>
   <textarea name="user_note" id="" class="form-control" style="height: 120px"></textarea>
</div>