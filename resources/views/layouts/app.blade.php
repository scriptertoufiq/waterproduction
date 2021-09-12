<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'WM') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-reset.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/datepicker/daterangepicker.css') }}" rel="stylesheet"> --}}
    <!--external css-->
    <link href="{{ asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css') }}" rel="stylesheet"
    type="text/css" media="screen" />
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/select2/css/select2.min.css') }}" type="text/css">

    <!--right slidebar-->
    <link href="{{ asset('css/slidebars.css') }}" rel="stylesheet">
    <!--dynamic table-->
    <link href="{{ asset('assets/advanced-datatable/media/css/demo_page.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/advanced-datatable/media/css/demo_table.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/data-tables/DT_bootstrap.css') }}" />

    <!-- daterange picker css -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" /> 
    <link rel="stylesheet" href="{{ asset('assets/daterangepicker-master/daterangepicker.css') }}" />
    <!-- Custom styles for this template -->

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-responsive.css') }}" rel="stylesheet" />


</head>

<body>
    <div id="app">
        @guest

        @else
            <!-- <li class="nav-item dropdown">
                                                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                                    {{ Auth::user()->name }}
                                                                </a>

                                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                                       onclick="event.preventDefault();
                                                                                     document.getElementById('logout-form').submit();">
                                                                        {{ __('Logout') }}
                                                                    </a>

                                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                                        @csrf
                                                                    </form>
                                                                </div>
                                                            </li> -->

                                                            <!--header start-->
                                                            <header class="header white-bg">
                                                                <div class="sidebar-toggle-box">
                                                                    <i class="fa fa-bars"></i>
                                                                </div>
                                                                <!--logo start-->
                                                                <a class="logo" href="{{ url('/') }}">
                                                                    W<span>M</span>
                                                                </a>

                                                                <div class="top-nav ">
                                                                    <!--search & user info start-->
                                                                    <ul class="nav pull-right top-menu">
                        {{-- <li>
                        <input type="text" class="form-control search" placeholder="Search">
                    </li> --}}
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="img/avatar1_small.jpg">
                            <span class="username">{{ Auth::user()->name }}</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout dropdown-menu-right">
                            <div class="log-arrow-up"></div>
                            {{-- <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li> --}}
                            @php
                                $id = Auth::user()->id;
                            @endphp
                            <li><a href="{{ URL::to('/edituser/'.$id) }}" ><i class="fa fa-cog"></i> Settings</a></li>
                            {{-- <li><a href="#"><i class="fa fa-bell-o"></i> Notification</a></li> --}}
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="fa fa-key"></i> Log Out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>
        <!--header end-->

        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse ">
                <!-- sidebar menu start-->

                <ul class="sidebar-menu" id="nav-accordion">
                    <li>
                        <a href="{{ route('home') }}">
                            <i class="fa fa-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    {{-- <li class="sub-menu">
                        <a href="/register">
                            <i class="fa fa-user"></i>
                            <span>Add User</span>
                        </a>
                    </li> --}}
                    @if (Auth::user()->post=='manager')
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-male"></i>
                                <span>Staffs</span>
                            </a>
                            <ul class="sub">
                                <li><a href="/staffs/create">Add Staffs</a></li>
                                <li><a href="/staffs">View Staffs</a></li>
                            </ul>
                        </li>
                            {{-- <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-dollar"></i>
                                <span>Commission</span>
                            </a>
                            <ul class="sub">
                                <li><a href="/commissions/create">Add Commission</a></li>
                                <li><a href="/commissions">View Commission</a></li>
                            </ul>
                        </li> --}}

                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-dollar"></i>
                                <span>Salary</span>
                            </a>
                            <ul class="sub">
                                <li><a href="/salary">Salary Pay List</a></li>
                                <li><a href="/commissions">Salary Earn List</a></li>
                            </ul>
                        </li>


                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-dollar"></i>
                                <span>Bank Accounts Info</span>
                            </a>
                            <ul class="sub">
                                <li><a href="/bankaccounts/create">Add Bank Account</a></li>
                                <li><a href="/bankaccounts">View Bank Account</a></li>
                            </ul>
                        </li>

                        {{-- <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-cogs"></i>
                                <span>Raw Materials Info</span>
                            </a>
                            <ul class="sub">
                                <li><a href="/materials/create">Add Raw Materials</a></li>
                                <li><a href="/materials">View Raw Materials</a></li>
                            </ul>
                        </li> --}}
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-heart"></i>
                                <span>Bottle Size And Pricing</span>
                            </a>
                            <ul class="sub">
                                <li><a href="/bottlesize/create">Add Pricing</a></li>
                                <li><a href="/bottlesize">View Pricing</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-heart"></i>
                                <span>Bottles Info</span>
                            </a>
                            <ul class="sub">
                                <li><a href="/bottles/create">Add Bottles</a></li>
                                <li><a href="/bottles">View Bottles</a></li>
                            </ul>
                        </li>



                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-cogs"></i>
                                <span>Water Production Info</span>
                            </a>
                            <ul class="sub">
                                <li><a href="/productions/create">Add Production</a></li>
                                <li><a href="/productions">View Production</a></li>
                            </ul>
                        </li>

                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-backward"></i>
                                <span>Debit/Credit TR Category</span>
                            </a>
                            <ul class="sub">
                                <li><a href="/category/create">Add Category</a></li>
                                <li><a href="/category">View Category</a></li>
                            </ul>
                        </li>

                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-dollar"></i>
                                <span>All Debit/Credit TR</span>
                            </a>
                            <ul class="sub">
                                <li><a href="/accounts/create">Add Transection</a></li>
                                <li><a href="/accounts">View Transection</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-cogs"></i>
                                <span>Report</span>
                            </a>
                            <ul class="sub">
                                <li><a href="/reports">Accounts Report</a></li>
                                <li><a href="/sellReport">Sells Report</a></li>
                                <li><a href="/moneyCollection">Money Collection Report</a></li>
                                <li><a href="/clientReport">Customer Wise Report</a></li>
                                <li><a href="/profitLoss">Profit/Loss Report</a></li>
                            </ul>
                        </li>
                    @endif
                    

                      

                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-male"></i>
                            <span>Client Information</span>
                        </a>
                        <ul class="sub">
                            <li><a href="/clients/create">Add Client</a></li>
                            <li><a href="/clients">View Client</a></li>
                        </ul>
                    </li>
                    

                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-dollar"></i>
                            <span>Sell</span>
                        </a>
                        <ul class="sub">
                            <li><a href="/sells/create">Add Sell</a></li>
                            <li><a href="/sells">View Sell</a></li>
                        </ul>
                    </li>
                    <!--multi level menu end-->
                </ul>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->



        @endguest


        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script class="include" type="text/javascript" src="{{ asset('js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.sparkline.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.js') }}"></script>
    <script src="{{ asset('js/jquery.customSelect.min.js') }}"></script>
    <script src="{{ asset('js/respond.min.js') }}"></script>


    <!--right slidebar-->
    <script src="{{ asset('js/slidebars.min.js') }}"></script>

    <!--common script for all pages-->
    <script src="{{ asset('js/common-scripts5e1f.js?v=2') }}"></script>
    <script src="{{ asset('assets/select2/js/select2.min.js') }}"></script>

    <!--script for this page-->
    <script src="{{ asset('js/sparkline-chart.js') }}"></script>
    <script src="{{ asset('js/easy-pie-chart.js') }}"></script>
    <script src="{{ asset('js/count.js') }}"></script>

    <script src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <script type="text/javascript" language="javascript"
    src="{{ asset('assets/advanced-datatable/media/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/data-tables/DT_bootstrap.js') }}"></script>
    <!--dynamic table initialization -->
    <script src="{{ asset('js/dynamic_table_init.js') }}"></script>
    {{-- <script src="{{ asset('js/datepicker/daterangepicker.min.js') }}"></script> --}}

    <!-- date range picker + momment js -->
    <!-- <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script> -->
    <script type="text/javascript" src="{{ asset('assets/daterangepicker-master/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/daterangepicker-master/daterangepicker.js') }}"></script>
    <!-- <script type="text/javascript" src="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script> -->

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <script>
        //owl carousel

        $(document).ready(function() {
            $("#owl-demo").owlCarousel({
                navigation: true,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true,
                autoPlay: true

            });

        });

        //custom select box

        $(function() {
            $('select.styled').customSelect();
        });

        $(window).on("resize", function() {
            var owl = $("#owl-demo").data("owlCarousel");
            owl.reinit();
        });

    </script>

    <!-- daterange picker required js  -->

    <script type="text/javascript">
        $(function() {

            var start = moment().subtract(29, 'days');
            var end = moment();

            function cb(start, end) {
                $('#reportrange span').html(start.format('YYYY/M/D') + ' - ' + end.format('YYYY/M/D'));
            }

            $('#reportrange').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')]
                }
            }, cb);

            cb(start, end);

        });

    </script>

    <script>
        $(document).ready(function() {
            $('#debit').focusout(function(event) {
                /* Act on the event */
                var data = $(this).val();
                if (data != "") {
                    $('#credit').attr('disabled', 'disabled');
                }
            });

            $('#debit').focusin(function(event) {
                /* Act on the event */
                var data = $(this).val();
                if (data != "") {
                    $('#credit').removeAttr('disabled');
                }
            });

            // // field disabled

            $('#credit').focusout(function(event) {
                /* Act on the event */
                var data = $(this).val();
                if (data != "") {
                    $('#debit').attr('disabled', 'disabled');
                }
            });

            $('#credit').focusin(function(event) {
                /* Act on the event */
                var data = $(this).val();
                if (data != "") {
                    $('#debit').removeAttr('disabled');
                }
            });

            // cheque auth

            $('#type').change(function(event) {
                /* Act on the event */
                var data = $(this).val();
                if (data == "cheque") {
                    $('#cheque_no').removeAttr('disabled');
                } else {
                    $('#cheque_no').attr('disabled', 'disabled');
                }
            });

            // bottle availibity search
            $('#bottle_id').change(function(event) {
                /* Act on the event */
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var bottle_id = $(this).val();
                $.ajax({
                    url: '{{ URL::to('searchBottle') }}',
                    type: 'POST',
                    data: {
                        bottle_id: bottle_id
                    },
                    success: function(data) {
                        // alert(data);
                        var data = data.split('-');
                        var available_bottle = data['0'] - data['1'];
                        // alert(available_bottle);
                        if (parseFloat(available_bottle) >= 0) {
                            $('#available_bottle').val(available_bottle);
                        } else {
                            $('#available_bottle').val('No Available Bottle');
                        }
                        $('#quantity').val(null);
                        $('#overAlert').html(null);
                    }
                })
            });

            $('#quantity').focusout(function(event) {
                /* Act on the event */
                var available_bottle = $('#available_bottle').val();
                var quantity = $('#quantity').val();
                if (parseFloat(available_bottle) < parseFloat(quantity)) {
                    $('#overAlert').html(
                        'Invalid Data,You are Crossing The Limit! Please provide Valid Data');
                    $('#quantity').val(null);
                } else {
                    $('#overAlert').html('');
                }
            });

            // product search


            $('#production_id').change(function(event) {
                /* Act on the event */
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var production_id = $(this).val();
                $.ajax({
                    url: '{{ URL::to('searchProduct') }}',
                    type: 'POST',
                    data: {
                        production_id: production_id
                    },
                    success: function(data) {
                        $('#available_product').val(data);
                    }
                })
            });

            $('#distribute_quantity').focusout(function(event) {
                /* Act on the event */
                var quantity = $('#distribute_quantity').val();
                var available_product = $('#available_product').val();
                // alert(available_product);
                if (parseFloat(available_product) < parseFloat(quantity)) {
                    alert('Invalid Data,You are Crossing The Limit! Please provide Valid Data');
                }
            });

            function calculatesubtoal() {
                var total = 0;
                $(".producttotal").each(function() {
                    total += parseFloat($(this).text());
                    // alert($(this).text());
                });
                $("#total").text(total);
                $("#totaltaka").val(total);
            }

            


            // function calculateSubtotalChangeQuantity(){
            //     $row = $(this).closest('tr');
            //     var production_id  = $row.find(".product_id").val();
            //     var quantity = $row.find('.product_quantity').val();
            //     var price = $row.find('.product_price').val();
            //     var total = quantity*price;
            //     $row.find('.producttotal').val(total);
            // }

            // product price
            $('#product').change(function(event) {

                var customer = $('#client_id').val();

                if (customer != '') {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    var product = $(this).val();
                    $.ajax({
                        url: '{{ URL::to('productPrice') }}',
                        type: 'POST',
                        data: {
                            product: product
                        },
                        success: function(data) {
                            var name = data['name'];
                            var price = data['price'];

                            var i = 0;
                            $('#myTableBody').append(
                                '<tr><td><input type="hidden" class="product_id" name="product_id[]" id="product_id" value="' +
                                product + '" readonly="" >' + name +
                                '</td><td><input id="product_price" class="product_price" name="product_price[]" type="number" value="' +
                                price +
                                '" ></td><td><input id="product_quantity" class="product_quantity" name="product_quantity[]" type="number" value="1"/></td><td><input type="hidden" id="producttotal"  name="producttotal[]" class="producteachtotal"  value=" '+price +'"/><span class="producttotal">'+price+'</span></span></td></td><td><i id="deleterow" style="color:red;" class="fa fa-trash-o"></i><td></tr>'
                                );
                            calculatesubtoal();

                        }
                    })
                } else {
                    alert("Select Client/Customer First");
                }
            });

            // product availibity at selling time


            $(document).on('keyup', '.product_quantity', function(event) {
                event.preventDefault();
                /* Act on the event */
                var quantity = $(this).val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $row = $(this).closest('tr');
                var production_id  = $row.find(".product_id").val();
                var product_price  = $row.find(".product_price").val();
                // alert(product_price);
                $.ajax({
                    url: '{{ URL::to('searchProduct') }}',
                    type: 'POST',
                    data: {
                        production_id: production_id,
                        quantity: quantity
                    },
                    success: function(data) {
                        if (parseFloat(quantity)>parseFloat(data)) {
                            alert('Product Not Available');
                            $row.find(".product_quantity").val('1');
                        }else{
                            var product_total = product_price*quantity;
                            $row.find('.producteachtotal').val(product_total);
                            $row.find('.producttotal').text(product_total);
                            calculatesubtoal();
                        }
                    }
                })
            });

           

            $(document).on('keyup', '.product_price', function(event) {
                event.preventDefault();
                /* Act on the event */
                $row = $(this).closest('tr');
                var product_quantity  = $row.find(".product_quantity").val();
                var product_price  = $row.find(".product_price").val();
                var product_total = product_price*product_quantity;
                $row.find('.producteachtotal').val(product_total);
                $row.find('.producttotal').text(product_total);
                calculatesubtoal();

            });

            function sellingcalculatesubtoal() {
                var total = 0;
                $(".sell_producttotal").each(function() {
                    total += parseFloat($(this).text());
                    // alert($(this).text());
                });
                $("#total").text(total);
                $("#totaltaka").val(total);
            }

            // edit sell
            $(document).on('keyup', '.sell_product_price', function(event) {
                event.preventDefault();
                /* Act on the event */
                $row = $(this).closest('tr');
                var product_quantity  = $row.find(".sell_product_quantity").val();
                var product_price  = $row.find(".sell_product_price").val();
                var product_total = product_price*product_quantity;
                $row.find('.sellproducttotal').val(product_total);
                $row.find('.sell_producttotal').text(product_total);
                sellingcalculatesubtoal();

            });

            
            //row delete
            $('#myTableBody').on('click', '#deleterow', function(event) {
                event.preventDefault();
                $(this).closest('tr').remove();
                calculatesubtoal();
            });

            // bottle information of client
            $('#client_id').change(function(event) {
                /* Act on the event */
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var client_id = $(this).val();
                $.ajax({
                    url: '{{ URL::to('SearchBottleDue') }}',
                    type: 'POST',
                    data: {
                        client_id: client_id
                    },
                    success: function(data) {
                        // alert(data);
                        $('#due_bottle').val(data);
                    }
                })
            });

            $('#print_invoice').click(function(event) {
                /* Act on the event */
                window.print();
            });
        });



</script>
 <script type="text/javascript">
      $(document).ready(function () {
          $(".select2box").select2();
      });
      
  </script>



</body>

</html>
