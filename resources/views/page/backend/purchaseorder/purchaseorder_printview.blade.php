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
                <div>
                    <div>
                        <img src="{{ asset('assets/backend/img/spmheader1.png') }}" style="margin-top: 5px;">
                        <hr style="margin-top: -8px; background-color : blue">
                    </div>
                    <div style="margin-right: 10px; margin-left: 10px; margin-top: -10px;">
                        <div>
                            <div style="display: flex; font-weight: 900">
                                <p style="text-align: left; margin-bottom: 3px; color: darkblue;">திரு : <span
                                        style="color: darkblue;">{{ $supplier_upper }}</span></p>
                                <p style="text-align: right; margin-bottom: 3px; color: darkblue;">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    |
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </p>
                                <p style="text-align: right; margin-bottom: 3px; color: darkblue;">தேதி : <span
                                        style="color: darkblue;">{{ date('d-m-Y', strtotime($PurchaseData->date)) }}</span>
                                </p>
                            </div>
                            <div style="margin-top: 5px;">
                                <table style="line-height: inherit;text-align: left;overflow: auto; width:100%;">
                                    <tr class="heading "
                                        style="background:#eee; border-bottom: 1px solid lightgray ; border-top: 1px solid lightgray ;">
                                        <td style="padding: 2px;vertical-align: middle;color: green;">
                                            <b>Rate</b>
                                        </td>
                                        <td style="padding: 2px;vertical-align: middle;color: green;">
                                            <b>Particulars</b>
                                        </td>
                                        <td style="padding: 2px;vertical-align: middle;color: green;">
                                            <b>Count</b>
                                        </td>
                                        <td style="padding: 2px;vertical-align: middle;color: green;">
                                            <b>Note</b>
                                        </td>
                                        <td style="padding: 2px;vertical-align: middle;color: green; text-align: right;">
                                            <b>Amount</b>
                                        </td>
                                    </tr>
                                    @foreach ($PurchaseProducts as $index => $PurchaseProducts_array)
                                        @if ($PurchaseProducts_array->purchase_id == $PurchaseData->id)
                                            <tr class="details" style="border-bottom:1px solid lightgray ;">
                                                <td
                                                    style="padding: 2px;vertical-align: top; vertical-align: inherit;vertical-align: inherit;color:#000;">
                                                    {{ $PurchaseProducts_array->price_per_kg }}
                                                </td>
                                                <td
                                                    style="padding: 2px;vertical-align: top; vertical-align: inherit;vertical-align: inherit;color:#000;">
                                                    @foreach ($productlist as $products)
                                                        @if ($products->id == $PurchaseProducts_array->productlist_id)
                                                            {{ $products->name }}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td
                                                    style="padding: 2px;vertical-align: top; vertical-align: inherit;vertical-align: inherit;color:#000;">
                                                    {{ $PurchaseProducts_array->count }} -
                                                    {{ $PurchaseProducts_array->bagorkg }}
                                                </td>
                                                <td
                                                    style="padding: 2px;vertical-align: top;vertical-align: inherit;vertical-align: inherit;color:#000;">
                                                    {{ $PurchaseProducts_array->note }}
                                                </td>
                                                <td
                                                    style="padding: 2px;vertical-align: top; vertical-align: inherit;vertical-align: inherit;color:#000; text-align: right;">
                                                    {{ $PurchaseProducts_array->total_price }}.00
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </table>
                            </div>
                            <div class="row" style="margin-top: 3px;">
                                <p style="text-align: left; margin-bottom: 3px; color: darkblue;">Extra Cost</p>
                                <div class="col-3">
                                    <p style="text-align: left; margin-bottom: 3px; color: black;">COOLI</p>
                                </div>
                                <div class="col-1">
                                    <p style="text-align: left; margin-bottom: 3px; color: black;">:</p>
                                </div>
                                <div class="col-2">
                                    <p style="text-align: right; margin-bottom: 3px; color: black; border-right:1px solid black; padding-right : 2px;">₹ 0.00</p>
                                </div>
                                <div class="col-3">
                                    <p style="text-align: left; margin-bottom: 3px; color: green; border-left:1px solid black; padding-left : 2px;">GROSS AMOUNT</p>
                                    <p style="text-align: left; margin-bottom: 3px; color: red; border-left:1px solid black; padding-left : 2px;">OLD BALANCE</p>
                                    <p style="text-align: left; margin-bottom: 3px; color: blue; border-left:1px solid black; padding-left : 2px;">GRAND TOTAL</p>
                                    <p style="text-align: left; margin-bottom: 3px; color: green; border-left:1px solid black; padding-left : 2px;">PAID AMOUNT</p>
                                    <p style="text-align: left; margin-bottom: 3px; color: red; border-left:1px solid black; padding-left : 52x;">NET AMOUNT</p>
                                </div>
                                <div class="col-1">
                                    <p style="text-align: left; margin-bottom: 3px; color: green;">:</p>
                                    <p style="text-align: left; margin-bottom: 3px; color: red;">:</p>
                                    <p style="text-align: left; margin-bottom: 3px; color: blue;">:</p>
                                    <p style="text-align: left; margin-bottom: 3px; color: green;">:</p>
                                    <p style="text-align: left; margin-bottom: 3px; color: red;">:</p>
                                </div>
                                <div class="col-2">
                                    <p style="text-align: left; margin-bottom: 3px; color: green; text-align: right;">₹ </p>
                                    <p style="text-align: left; margin-bottom: 3px; color: red; border-bottom:1px solid lightgray; text-align: right;">₹ </p>
                                    <p style="text-align: left; margin-bottom: 3px; color: blue; text-align: right;">₹ </p>
                                    <p style="text-align: left; margin-bottom: 3px; color: green; border-bottom:1px solid lightgray; text-align: right;">₹ </p>
                                    <p style="text-align: left; margin-bottom: 3px; color: red; text-align: right;">₹ </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
