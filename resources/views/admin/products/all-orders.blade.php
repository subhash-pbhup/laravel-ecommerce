@include('admin/include/header')
<?php $admin = $res[0];
// dd($categories);
// echo "<pre>";
// print_r($orders[0]->order_items);
// echo"<pre>";
// print_r(json_decode($orders[2]->order_items));

// die();

$order_sta = ['pending', 'shipped', 'processing', 'delivered', 'cancelled', 'returned', 'complete'];
?>
<!-- /page content -->

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>All Orders
                </h3>
            </div>
        </div>
        <div class="row myDiv">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Orders</h2>
                        <a style="float: right" href="#" class="btn btn-sm btn-success" data-toggle="modal"
                            data-target="#add-product">
                            Add Orders </a>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        @if (Session::has('message'))
                            <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissible"> <a
                                    href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ Session::get('message') }}</div>
                        @endif
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"
                            cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Order ID</th>
                                    <th>Customer name</th>
                                    <th>Billing address</th>
                                    <th>Order price</th>
                                    <th>Order status</th>
                                    <th>Order date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($orders as $key => $orders_res)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $orders_res->order_number }}</td>
                                        <td>{{ ucfirst($orders_res->user_name) }}</td>
                                        <td>{{ $orders_res->shipping_address }}</td>
                                        <td>{{ $orders_res->total_price + ($orders_res->subtotal / 100) * $orders_res->tax + $orders_res->shipping_cost }}.00
                                        </td>
                                        @if ($orders_res->status == 'pending')
                                            <td><span
                                                    class="label label-warning">{{ ucfirst($orders_res->status) }}</span>
                                            @elseif($orders_res->status == 'shipped')
                                            <td><span class="label label-success">{{ ucfirst($orders_res->status) }}</span>
                                            @elseif($orders_res->status == 'delivered')
                                            <td><span
                                                    class="label label-info">{{ ucfirst($orders_res->status) }}</span>
                                            @elseif($orders_res->status == 'complete')
                                            <td><span
                                                    class="label label-success">{{ ucfirst($orders_res->status) }}</span>
                                            @elseif($orders_res->status == 'cancelled')
                                            <td><span
                                                    class="label label-danger">{{ ucfirst($orders_res->status) }}</span>
                                            @elseif($orders_res->status == 'returned')
                                            <td><span
                                                    class="label label-danger">{{ ucfirst($orders_res->status) }}</span>
                                                    @elseif($orders_res->status == 'processing')
                                            <td><span
                                                    class="label label-info">{{ ucfirst($orders_res->status) }}</span>
                                                {{-- @else
                                        <td><span class="label label-warning">Order status is unknown.</span>   --}}
                                        @endif


                                        </td>
                                        <td>{{ $orders_res->order_date }}</td>
                                        
                                        <td>
                                            <a data-target="#change-status" data-toggle="modal"
                                                data-status="{{ $orders_res->status }}"
                                                data-id="{{ $orders_res->id }}"
                                                class="btn btn-success btn-sm view-order-status">View</a>

                                            @if($orders_res->status=="complete" ||  $orders_res->status == 'delivered')
                                            <a href="#" class="btn btn-sm btn-info view-data" data-toggle="modal"
                                                data-target="#view-product"
                                                data-user_name="{{ $orders_res->user_name }}"
                                                data-email="{{ $orders_res->email }}"
                                                data-mobile="{{ $orders_res->mobile }}"
                                                data-address="{{ $orders_res->address }}"
                                                data-order_date="{{ $orders_res->order_date }}"
                                                data-shipping_cost="{{ $orders_res->shipping_cost }}"
                                                data-tax="{{ $orders_res->tax }}"
                                                data-subtotal="{{ $orders_res->subtotal }}"
                                                data-total_price="{{ $orders_res->total_price }}"
                                                data-order_items="{{ $orders_res->order_items }}"
                                                data-order_number="{{ $orders_res->order_number }}"
                                                data-payment_method="{{ $orders_res->payment_method }}"
                                                data-shipping_address="{{ $orders_res->shipping_address }}">Invoice</a>
                                                @endif
                                            
                                            {{-- <a href="{{ url('/delete-products/' . $orders_res->id) }}"
                                                class="btn btn-sm btn-danger">Delete</a> --}}

                                        </td>
                                        
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>


<!-- Modal Edit form -->


<!-- status Edit form -->
<div class="modal fade" id="change-status" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Status</h4>
            </div>
            <div class="modal-body">
                <form id="status-form" data-parsley-validate method="POST">
                    @csrf
                    <label for="fullname">Order Status:</label>
                    <input type="hidden" id="order_id" name="order_id">
                    <select style="text-transform: capitalize" onchange="update_status()" id="update_order_status"
                        name="order_status" class="form-control">
                        @foreach ($order_sta as $orders_status)
                            <option value={{ $orders_status }}>{{ $orders_status }}</option>
                        @endforeach
                    </select>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


{{-- Add prodcuts form --}}

<div class="modal fade" id="view-product" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add new product</h4>
            </div>
            <div class="modal-body">


                <!-- start form for validation -->

                <?php
                // echo '<pre>';
                // print_r(json_decode($orders[2]->order_items));
                ?>

                <div class="right_col" role="main">
                    <div class="">

                        <div class="clearfix"></div>

                        <div class="row">
                            <div class="col-md-12" id="print-content">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Invoice</h2>

                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">

                                        <section class="content invoice">
                                            <!-- title row -->
                                            <div class="row">
                                                <div class="col-xs-12 invoice-header">
                                                    <h1>
                                                        <i class="fa fa-globe"></i> Invoice.
                                                        <small class="pull-right">Date: <span
                                                                id="order_date"></span></small>
                                                    </h1>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- info row -->
                                            <div class="row invoice-info">
                                                <div class="col-sm-4 invoice-col">
                                                    From
                                                    <address>
                                                        <strong><span class="user_name"></span></strong>
                                                        <br><span class="address"></span>
                                                        <br>Phone: <span class="mobile"></span>
                                                        <br>Email: <span class="email"></span>
                                                    </address>
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-4 invoice-col">
                                                    To
                                                    <address>
                                                        <strong><span class="user_name"></span></strong>
                                                        <br><span class="address"></span>
                                                        <br>Phone: <span class="mobile"></span>
                                                        <br>Email: <span class="email"></span>
                                                    </address>
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-4 invoice-col">
                                                    <b>Invoice #007612</b>
                                                    <br>
                                                    <br>
                                                    <b>Order ID:</b> 4F3S8J
                                                    <br>
                                                    <b>Payment Due:</b> 2/22/2014
                                                    <br>
                                                    <b>Account:</b> 968-34567
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->

                                            <!-- Table row -->
                                            <div class="row">
                                                <div class="col-xs-12 table">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>S.No</th>
                                                                <th>Image</th>
                                                                <th>Product</th>
                                                                <th>Qty</th>
                                                                <th>Subtotal</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="view-all-data">

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->

                                            <div class="row">
                                                <!-- accepted payments column -->
                                                <div class="col-xs-6">
                                                    <h4>Payment via : <span id="payment_method"></span></h4>
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-xs-6">
                                                    <p class="lead">Amount</p>
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <th style="width:50%">Subtotal:</th>
                                                                    <td><span id="subtotal"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Tax (18%)</th>
                                                                    <td><span id="tax"></span>.00</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Shipping:</th>
                                                                    <td><span id="shipping_cost"></span></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Total:</th>
                                                                    <td><span id="total_price"></span>.00</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->

                                            <!-- this row will not appear when printing -->
                                            <div class="row no-print">
                                                <div class="col-xs-12">
                                                    <button class="btn btn-default" id="generatePDF"><i
                                                            class="fa fa-print"></i> Print</button>
                                                    <button class="btn btn-success pull-right"><i
                                                            class="fa fa-credit-card"></i> Submit Payment</button>
                                                    <button class="btn btn-primary pull-right"
                                                        onclick="printDiv('print-content')"
                                                        style="margin-right: 5px;"><i class="fa fa-download"></i>
                                                        Generate PDF</button>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- end form for validations -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- /page content -->
<!-- Include jsPDF and html2canvas from CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

<script>
    const url = "{{ asset('storage/') }}";

    $("body").on("click", ".view-order-status", function() {

        $("#update_order_status").val($(this).data("status"));
        $("#order_id").val($(this).data("id"));
    })
    $("body").on("click", ".view-data", function() {


        const order_items = $(this).data("order_items");
        $("#order_number").text($(this).data("order_number"));
        $("#total_price").text(Number($(this).data("total_price")) + $(this).data("subtotal") / 100 * $(this)
            .data("tax") + Number($(this).data("shipping_cost")));
        $("#shipping_cost").text($(this).data("shipping_cost"));
        $("#shipping_address").text($(this).data("shipping_address"));
        $("#order_date").text($(this).data("order_date"));
        $("#payment_method").text($(this).data("payment_method"));

        $(".user_name").text($(this).data("user_name"));
        $(".email").text($(this).data("email"));
        $(".mobile").text($(this).data("mobile"));
        $(".address").text($(this).data("address"));


        let img = "";
        let total = 0;
        let i = 1;
        order_items.map((res) => {
            img +=
                `<tr>
                <td>${i++}</td>
                <td><img src="${ res.img }"
                        style="width:60px"></td>
                <td>${ res.name }</td>
                <td>${ res.qty }</td>
                <td>${ res.qty*res.price }</td>
            </tr>`;
            total += res.qty * res.price;
        })
        $("#view-all-data").html(img);

        $("#total_price").text(total + total / 100 * $(this)
            .data("tax") + Number($(this).data("shipping_cost")));
        $("#tax").text(total / 100 * $(this).data("tax"));
        $("#subtotal").text(total);

        // console.log($(this).data("subtotal")/100*$(this).data("tax"));
        


    })

    function update_status() {
        let data = $('#status-form').serialize();
        $.ajax({
            type: 'POST',
            url: "{{ url('/update-orders-status') }}",
            data: data,
            success: function(res) {
                $(".myDiv").load(location.href + " .myDiv>*", "");
                $('#change-status').modal('hide');
            }
        })
    }

    // create invoice
    $("body").on("click", "#generatePDF", function() {
        const {
            jsPDF
        } = window.jspdf;
        const content = document.getElementById('print-content');
        html2canvas(content).then(function(canvas) {
            const imgData = canvas.toDataURL('image/png');
            const pdf = new jsPDF();
            pdf.addImage(imgData, 'PNG', 10, 10, 180,
                160); // Parameters (imageData, format, x, y, width, height)
            pdf.save("invoice.pdf");
        });
    });
</script>


@include('admin/include/footer')
