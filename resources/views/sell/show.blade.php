@extends('layouts.app')

@section('content')



<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="card">
                    <header class="card-header" style="color: Black;text-transform: capitalize;font-weight: bold; ">
                       Invoice 
                    </header>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="customer_info">
                                    Customer Name: <span class="info">{{$sell->clientName->name}}</span> <br>
                                    Customer Address: <span class="info">{{$sell->clientName->address}}</span> <br>
                                    Customer Mobile: <span class="info">{{$sell->clientName->mobile}}</span> <br>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="sellig_info">
                                    Selling Id: <span class="info">{{$sell->id}}</span> <br>
                                    Seller Name: <span class="info">{{$sell->staffName->name}}</span> <br>
                                    @php
                                        $date = $sell->created_at;
                                        $date = explode(' ',$date);
                                        $date = date('d-m-y',strtotime($date['0']))
                                    @endphp
                                    Sell Date: <span class="info">{{$date}}</span> <br>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <span style="display: inline-block;color: black;font-weight: bold;font-size: 16px;">Selled Product Info</span>
                               
                                <div class="table-responsive mt-3">
                                    <table id="myProductTable" class="table table-hover order-list">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Name</th>
                                                <th>Unit Price</th>
                                                <th>Quatity</th>
                                                <th>Sub Total</th>
                                            </tr>
                                        </thead>
                                        <tbody id="myProductTableBody">
                                            @php
                                                $i=1;
                                            @endphp
                                            @foreach ($sell_list as $sell_list)
                                            
                                                <tr>
                                                    <td>{{$i++}}</td>
                                                    <td>{{$sell_list->productName->name}}</td>
                                                    <td>{{$sell_list->price}}</td>
                                                    <td>{{$sell_list->quantity}}</td>
                                                    <td>{{$sell_list->subtotal}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot class="tfoot active">
                                            <th colspan="4">Total</th>
                                            <th id="total">{{$sell->sell_ammount}}</th>
                                        </tfoot>
                                    </table>
                                </div>
                                <button class="btn btn-success" id="print_invoice">Print</button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
</section>
<!--main content end-->

<style>

    @page {
      /*margin-top:  150px;*/
      margin-bottom: 50px;
    }
    
      @media print {
        aside{
            display: none;
        }
        header{
            display: none;
        }
        #print_invoice{
            display: none;
        }
    }
    </style>
    

@endsection
