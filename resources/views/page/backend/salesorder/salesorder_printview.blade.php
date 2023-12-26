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
            <div id="printableArea" style="width:148mm; height:210mm">
                <div class="card">
                    <div>
                        <img src="{{ asset('assets/backend/img/spmheader.png') }}" style="margin-top: 5px;">
                        <hr style="margin-top: -8px; background-color : blue">
                    </div>
                    <div style="margin-right: 10px; margin-left: 10px; margin-top: -10px;">
                        <div>
                            <div style="display: flex">
                                <p style="text-align: left; margin-bottom: 3px; color: green;">உயர்திரு : <span
                                        style="color: black;">{{ $customer_upper }}</span></p>
                                <p style="text-align: right; margin-bottom: 3px; color: black;">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    |
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </p>
                                <p style="text-align: right; margin-bottom: 3px; color: green;">தேதி : <span
                                        style="color: black;">{{ date('d-m-Y', strtotime($SalesData->date)) }}</span></p>
                            </div>
                        </div>
                        <div>
                            <table style="line-height: inherit;text-align: left;overflow: auto; width:100%;">
                                <tr class="heading "
                                    style="background:#eee; border-bottom: 1px solid black ; border-top: 1px solid black ;">
                                    <td style="padding: 2px;vertical-align: middle;color: black;">
                                        <b>Rate</b>
                                    </td>
                                    <td style="padding: 2px;vertical-align: middle;color: black;">
                                        <b>Particulars</b>
                                    </td>
                                    <td style="padding: 2px;vertical-align: middle;color: black;">
                                        <b>Count</b>
                                    </td>
                                    <td style="padding: 2px;vertical-align: middle;color: black;">
                                        <b>Note</b>
                                    </td>
                                    <td style="padding: 2px;vertical-align: middle;color: black;">
                                        <b>Amount</b>
                                    </td>
                                </tr>
                                @foreach ($SalesProduct_darta as $index => $SalesProduct_darta_arr)
                                    @if ($SalesProduct_darta_arr->sales_id == $SalesData->id)
                                        <tr class="details" style="border-bottom:1px solid black ;">
                                            <td
                                                style="padding: 2px;vertical-align: top; vertical-align: inherit;vertical-align: inherit;color:#000;">
                                                {{ $SalesProduct_darta_arr->price_per_kg }}
                                            </td>
                                            <td
                                                style="padding: 2px;vertical-align: top; vertical-align: inherit;vertical-align: inherit;color:#000;">
                                                @foreach ($productlist as $products)
                                                    @if ($products->id == $SalesProduct_darta_arr->productlist_id)
                                                        {{ $products->name }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td
                                                style="padding: 2px;vertical-align: top; vertical-align: inherit;vertical-align: inherit;color:#000;">
                                                {{ $SalesProduct_darta_arr->count }} -
                                                {{ $SalesProduct_darta_arr->bagorkg }}
                                            </td>
                                            <td
                                                style="padding: 2px;vertical-align: top;vertical-align: inherit;vertical-align: inherit;color:#000;">
                                                {{ $SalesProduct_darta_arr->note }}
                                            </td>
                                            <td
                                                style="padding: 2px;vertical-align: top; vertical-align: inherit;vertical-align: inherit;color:#000;">
                                                {{ $SalesProduct_darta_arr->total_price }}
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-5"></div>
                            <div class="col-3">
                                <p style="text-align: left; margin-bottom: 3px; color: black;">EXTRA CHARGE</p>
                                <p style="text-align: left; margin-bottom: 3px; color: green;">GROSS AMOUNT</p>
                                <p style="text-align: left; margin-bottom: 3px; color: red;">OLD BALANCE</p>
                                <p style="text-align: left; margin-bottom: 3px; color: blue;">GRAND TOTAL</p>
                                <p style="text-align: left; margin-bottom: 3px; color: green;">PAID AMOUNT</p>
                                <p style="text-align: left; margin-bottom: 3px; color: red;">NET AMOUNT</p>
                            </div>
                            <div class="col-1">
                                <p style="text-align: left; margin-bottom: 3px; color: black;">:</p>
                                <p style="text-align: left; margin-bottom: 3px; color: green;">:</p>
                                <p style="text-align: left; margin-bottom: 3px; color: red;">:</p>
                                <p style="text-align: left; margin-bottom: 3px; color: blue;">:</p>
                                <p style="text-align: left; margin-bottom: 3px; color: green;">:</p>
                                <p style="text-align: left; margin-bottom: 3px; color: red;">:</p>
                            </div>
                            <div class="col-3">
                                <p style="text-align: left; margin-bottom: 3px; color: black;">₹ {{ $SalesData->extra_cost }}</p>
                                <p style="text-align: left; margin-bottom: 3px; color: green;">₹ {{ $SalesData->gross_amount }}</p>
                                <p style="text-align: left; margin-bottom: 3px; color: red;">₹ {{ $SalesData->old_balance }}</p>
                                <p style="text-align: left; margin-bottom: 3px; color: blue;">₹ {{ $SalesData->grand_total }}</p>
                                <p style="text-align: left; margin-bottom: 3px; color: green;">₹ {{ $SalesData->paid_amount }}</p>
                                <p style="text-align: left; margin-bottom: 3px; color: red;">₹ {{ $SalesData->balance_amount }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
