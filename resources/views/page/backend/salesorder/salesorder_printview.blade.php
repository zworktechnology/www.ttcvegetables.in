@extends('layout.backend.auth')

@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Print Area View</h4>
            </div>
            <div style="display: flex;">
                <button onclick="printDiv('printableArea')" class="btn btn-success me-2"><i class="fa fa-print"></i>
                    Print</button>
            </div>
        </div>

        <div class="content">
            <div id="printableArea" style="width:105mm;height:148mm">
                <div class="card">
                    <div>
                        <img src="{{ asset('assets/backend/img/spmheader.png') }}" style="margin-top: 10px;">
                        <hr style="margin-top: -8px; background-color : blue">
                    </div>
                    <div style="margin-right: 10px; margin-left: 10px; margin-top: -15px;">
                        <div>
                            <p style="text-align: left; margin-bottom: 5px; color: green;">தேதி : <span
                                    style="color: black;">{{ date('d-m-Y', strtotime($SalesData->date)) }}</span></p>
                            {{-- <p style="text-align: left; margin-bottom: 5px; color: green;">ரசிது எண் : <span style="color: black;">#
                                    {{ $SalesData->bill_no }}</span></p> --}}
                            <p style="text-align: left; color: green;">உயர்திரு : <span
                                    style="color: black;">{{ $customer_upper }}</span> அவர்கள்</p>
                        </div>
                        <div>
                            <table style="line-height: inherit;text-align: left;overflow: auto;margin:15px auto;">
                                <tr class="heading " style="background:#eee;">
                                    <td
                                        style="vertical-align: middle;color: black;padding: 10px; ">
                                        Rate
                                    </td>
                                    <td
                                        style="vertical-align: middle;color: black;padding: 10px; ">
                                        Particulars
                                    </td>
                                    <td
                                        style="vertical-align: middle;color: black;padding: 10px; ">
                                        Count
                                    </td>
                                    <td
                                        style="vertical-align: middle;color: black;padding: 10px; ">
                                        Note
                                    </td>
                                    <td
                                        style="vertical-align: middle;color: black;padding: 10px; ">
                                        Amount
                                    </td>
                                </tr>
                                @foreach ($SalesProduct_darta as $index => $SalesProduct_darta_arr)
                                    @if ($SalesProduct_darta_arr->sales_id == $SalesData->id)
                                        <tr class="details" style="border-bottom:1px solid #E9ECEF ;">
                                            <td
                                                style="padding: 5px 10px 5px 10px; vertical-align: top; vertical-align: inherit; color:#000;">
                                                {{ $SalesProduct_darta_arr->price_per_kg }}
                                            </td>
                                            <td
                                                style="padding: 5px 10px 5px 10px; vertical-align: top; vertical-align: inherit; color:#000;">
                                                @foreach ($productlist as $products)
                                                    @if ($products->id == $SalesProduct_darta_arr->productlist_id)
                                                        {{ $products->name }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td
                                                style="padding: 5px 10px 5px 10px; vertical-align: top; vertical-align: inherit; color:#000;">
                                                {{ $SalesProduct_darta_arr->count }} -
                                                {{ $SalesProduct_darta_arr->bagorkg }}
                                            </td>
                                            <td
                                                style="padding: 5px 10px 5px 10px; vertical-align: top;vertical-align: inherit; color:#000;">
                                                {{ $SalesProduct_darta_arr->note }}
                                            </td>
                                            <td
                                                style="padding: 5px 10px 5px 10px; vertical-align: top; vertical-align: inherit; color:#000;">
                                                {{ $SalesProduct_darta_arr->total_price }}
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </table>
                        </div>
                        <div>
                            <div class="total-order w-100 max-widthauto">
                                <ul style="text-align: right;">
                                    <li style="margin-top: -15px;">
                                        <h4 style="color:black;">Extra Charge</h4>
                                        <h5 style="color:black;">₹ <span
                                                class="">{{ $SalesData->extra_cost }}</span></h5>
                                    </li>
                                    <hr style="margin-top: -5px;">
                                    <li style="margin-top: -20px;">
                                        <h4 style="color:blue;">Gross Amount</h4>
                                        <h5 style="color:blue;">₹ <span
                                                class="">{{ $SalesData->gross_amount }}</span></h5>
                                    </li>
                                    <hr style="margin-top: -4px;">
                                    <li style="margin-top: -20px;">
                                        <h4 style="color:red;">Old Balance</h4>
                                        <h5 style="color:red;">₹ <span
                                                class="">{{ $SalesData->old_balance }}</span></h5>
                                    </li>
                                    <hr style="margin-top: -5px;">
                                    <li style="margin-top: -20px;">
                                        <h4 style="color:blue;">Grand Total</h4>
                                        <h5 style="color:blue;">₹ <span
                                                class="">{{ $SalesData->grand_total }}</span></h5>
                                    </li>
                                    <hr style="margin-top: -5px;">
                                    <li style="margin-top: -20px;">
                                        <h4 style="color:green;">Paid Amount</h4>
                                        <h5 style="color:green;">₹ <span
                                                class="">{{ $SalesData->paid_amount }}</span></h5>
                                    </li>
                                    <hr style="margin-top: -4px;">
                                    <li style="margin-top: -20px;">
                                        <h4 style="color:red;">Nett Balance</h4>
                                        <h5 style="color:red;">₹ <span
                                                class="">{{ $SalesData->balance_amount }}</span></h5>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
