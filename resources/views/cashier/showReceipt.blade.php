<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restuarnt App | Receipt | SaleID : {{$sale->id}} </title>
    <link rel="stylesheet" href="{{asset('/css/receipt.css')}}" media="all">
    <link rel="stylesheet" href="{{asset('/css/no-print.css')}}" media="print">
</head>
<body>
    <div id="wrapper">
        <div id="receipt-header">
            <h3 id="restaurant-name">
                Restuarant APP UJIKOM
            </h3>
            <p>Address  : Jl GKPN No. 68 Rt/RW 01/09</p>
            <p>Jatinangor, Sumedang-Jawa Barat</p>
            <P>Telp     :   089512929676</P>
            <p>Reference Receipt    : <strong>{{$sale->id}}</strong></p>
        </div>
        <div id="receipt-body">
            <table class="tb-sale-details">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Menu</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($saleDetails as $saleDetail)
                        <tr>
                            <td width="30">{{$saleDetail->menu_id}}</td>
                            <td width="180">{{$saleDetail->menu_name}}</td>
                            <td width="50">{{$saleDetail->quantity}}</td>
                            <td width="55">{{$saleDetail->menu_price}}</td>
                            <td width="65">{{$saleDetail->menu_price * $saleDetail->quantity}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <table class="tb-sale-total">
                <tbody>
                    <tr>
                        <td>Total Quantity</td>
                        <td>{{$saleDetail->count()}}</td>
                        <td>Total</td>
                        <td>${{number_format($sale->total_price, 2)}}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Payment Type</td>
                        <td colspan="2">{{$sale->payment_type}}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Paid Amount</td>
                        <td colspan="2">{{number_format($sale->total_received, 2)}}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Change</td>
                        <td colspan="2">{{number_format($sale->change, 2)}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="receipt-footer">
            <p>thank you for visiting our restaurant, some day are you coming back</p>
        </div>
        <div id="buttons">
           <a href="/cashier"><button class="btn btn-back">
                Back To cashier
            </button></a>
            <button class="btn btn-print" type="button" onclick="window.print(); return false;">
                Print
            </button>
        </div>
    </div>
    
</body>
</html>