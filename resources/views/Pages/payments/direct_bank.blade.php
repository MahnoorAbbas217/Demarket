<ul>
    <h5>{{ $paymentMethod->service_provider }}</h5>

<li>
    <span class="proerty-price pull-left"><b>Title: </b> {{ $paymentMethod->acount_title }}</span>
</li>

<li>
    <span class="proerty-price pull-left"><b>Account #: </b> {{ $paymentMethod->acount_no }}</span>
</li>
@if(!empty($paymentMethod->acount_iban))
        <li><span class="proerty-price pull-left"><b>IBAN: </b> {{ $paymentMethod->acount_iban }}</span></li>
    @endif
@if(!empty($paymentMethod->branch_code))
    <li><span class="proerty-price pull-left"><b>Branch Code: </b> {{ $paymentMethod->branch_code }}</span></li>
@endif
<li><span class="proerty-price pull-left"><b>Ad Cost: </b> <small>Rs</small> {{ $adCost->value ?? 0 }}</span></li>
<small class="proerty-price pull-left">Pay Rs:{{ $adCost->value ?? 0 }} To Bank Account & Please Send your Transection Image or Transection ID to Approve Payment</small>


</ul>

<br>
<br>
@include('Pages.payments.transection_prove')
