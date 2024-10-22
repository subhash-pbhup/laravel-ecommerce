@include('admin/include/header')
<?php $admin = $res[0];
// dd($categories);

// die();
?>
<!-- /page content -->

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>All Products
                </h3>
            </div>
        </div>
        <div class="row">


            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Products</h2>
                        <a style="float: right" href="#" class="btn btn-sm btn-success" data-toggle="modal"
                            data-target="#add-product">
                            Add Product </a>
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
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Categories</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Create Date</th>
                                    <th>Update Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($products as $key => $products_res)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ ucfirst($products_res->products_name) }}</td>
                                        <td>{{ $products_res->price }}</td>
                                        <td>{{ $products_res->stock }}</td>
                                        <td>{{ ucfirst($products_res->categories_name) }}</td>

                                        @if ($products_res->products_status == 1)
                                            <td><span class="label label-success">Enable</span></td>
                                        @else
                                            <td><span class="label label-danger">Disable</span></td>
                                        @endif

                                        <td><a target="_blank"
                                                href="{{ asset('storage/' . $products_res->image) }}"><img
                                                    src="{{ asset('storage/' . $products_res->image) }}"
                                                    style="width: 80px;height: 90px;" alt="image"></a></td>

                                        <td>{{ $products_res->products_created_at }}</td>
                                        <td>{{ $products_res->products_updated_at }}</td>


                                        <td><a href="#" data-toggle="modal" data-target="#open-image-gallery"
                                                class="btn btn-sm btn-success view-gallery"
                                                data-gallery_image="{{ $products_res->gallery_image }}">Products
                                                Images</a><a href="#" class="btn btn-sm btn-info setdata"
                                                data-toggle="modal" data-target="#update-product"
                                                data-id="{{ $products_res->products_id }}"
                                                data-name="{{ $products_res->products_name }}"
                                                data-status="{{ $products_res->products_status }}"
                                                data-image="{{ $products_res->image }}"
                                                data-gallery_image="{{ $products_res->gallery_image }}"
                                                data-stock="{{ $products_res->stock }}"
                                                data-price="{{ $products_res->price }}"
                                                data-categories_id="{{ $products_res->categories_id }}"
                                                data-description="{{ $products_res->products_description }}">Edit</a>
                                            <a href="{{ url('/delete-products/' . $products_res->products_id) }}"
                                                class="btn btn-sm btn-danger">Delete</a>
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

{{-- Add prodcuts form --}}

<div class="modal fade" id="add-product" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add new product</h4>


            </div>
            <div class="modal-body">


                <!-- start form for validation -->
                <form method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left input_mask"
                    data-parsley-validate action="{{ url('/add-products') }}">
                    @csrf

                    <label for="fullname">Product Name * :</label>
                    <input type="text" class="form-control" name="name" required />

                    </br>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label for="fullname">Product Price * :</label>
                        <input type="text" class="form-control" name="price" required />
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label for="fullname">Product Stock :</label>
                        <input type="text" class="form-control" name="stock" required />
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label for="fullname">Product Image * :</label>
                        <input type="file" class="form-control" name="image" required />
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label for="fullname">Product Images Gallery :</label>
                        <input type="file" multiple class="form-control" name="gallery_image[]" required />
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label for="fullname">Status:</label>
                        <select name="status" class="form-control">
                            <option value="1">Enable</option>
                            <option value="0">Disable</option>
                        </select>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label for="fullname">Product Categories:</label>
                        <select name="categories_id" class="form-control">
                            <option disabled>Select Categories</option>
                            @foreach ($categories as $key => $categorie_res)
                                <option value="{{ $categorie_res->id }}">{{ $categorie_res->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <br />
                    <label for="fullname">Product Description:</label>

                    <textarea id="add-description" name="description"></textarea>
                    <script>
                        CKEDITOR.replace('add-description');
                    </script>

                    <br />

                    <button type="submit" class="btn btn-primary">Add Product</button>

                </form>
                <!-- end form for validations -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

{{-- update form --}}

<div class="modal fade" id="update-product" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit product</h4>

            </div>
            <div class="modal-body">
                <!-- start form for validation -->
                <form method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left input_mask"
                    data-parsley-validate action="{{ url('/update-products') }}">
                    @csrf

                    <label for="fullname">Product Name * :</label>
                    <input type="text" id="update-name" class="form-control" name="name" required />
                    <input type="hidden" id="id" class="form-control" name="id" required />

                    </br>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label for="fullname">Product Price * :</label>
                        <input id="update-price" type="text" class="form-control" name="price" required />


                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label for="fullname">Product Stock :</label>
                        <input id="update-stock" type="text" class="form-control" name="stock" required />
                    </div>


                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label for="fullname">Status:</label>
                        <select id="update-status" name="status" class="form-control">
                            <option value="1">Enable</option>
                            <option value="0">Disable</option>
                        </select>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label for="fullname">Product Categories:</label>
                        <select id="update-categories" name="categories_id" class="form-control">
                            <option disabled>Select Categories</option>
                            @foreach ($categories as $key => $categorie_res)
                                <option value="{{ $categorie_res->id }}">{{ $categorie_res->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label for="fullname">Product Image * :</label>
                        <input type="file" class="form-control" name="image" />
                        <input type="hidden" id="old-image" class="form-control" name="old_image" required />

                        </br>
                        <img class='img-thumbnail' style="width: 414px;height: 272px;" id="update-image" />

                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label for="fullname">Product Images Gallery :</label>
                        <input type="file" multiple class="form-control" name="gallery_image[]" />
                        <input type="hidden" id="old-gallery-image" class="form-control" name="old_gallery_image"
                            required />

                        </br>
                        <div style="height: 273px;" id="view-gallery-image"></div>

                    </div>


                    <br />
                    <label for="fullname">Product Description:</label>

                    <textarea id="update-description" name="description"></textarea>
                    <script>
                        CKEDITOR.replace('update-description');
                    </script>

                    <br />

                    <button type="submit" class="btn btn-primary">Update Product</button>

                </form>
                <!-- end form for validations -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



{{-- product-images --}}


<div class="modal fade" id="open-image-gallery" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit product</h4>

            </div>
            <div class="modal-body">

                <div class="right_col" role="main">
                    <div class="">


                        <div class="row">
                            <div class="col-md-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Products Images</h2>

                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <div class="row">
                                            <div id="view-all-gallery-image"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- /page content -->


<script>
    const url = "{{ asset('storage/') }}";
    $("body").on("click", ".setdata", function() {
        // $("#update_description").val($(this).data("description"));

        // console.log(url);
        // return;

        $("#id").val($(this).data("id"));
        $("#update-name").val($(this).data("name"));
        $("#update-status").val($(this).data("status"));
        $("#update-stock").val($(this).data("stock"));
        $("#old-image").val($(this).data("image"));
        $("#old-gallery-image").val($(this).data("gallery_image"));
        $('#update-image').attr('src', url + "/" + $(this).data("image"));
        CKEDITOR.instances['update-description'].setData($(this).data("description"));
        $("#update-price").val($(this).data("price"));
        $("#update-categories").val($(this).data("categories_id"));

        const gallery = $(this).data("gallery_image").split(",");
        let img = "";
        gallery.map((res) => {
            img +=
                `<img class='img-thumbnail' style="width:130px;height: 130px;margin: 4px;" src='${url + "/"+res}'/>`;
        })

        $("#view-gallery-image").html(img);
    })


    $("body").on("click", ".view-gallery", function() {

        const gallery = $(this).data("gallery_image").split(",");
        // console.log(gallery[0]);

        let img = "";
        gallery.map((res) => {
            img +=
                `<img class='img-thumbnail' style="width:270px;height: 270px;margin: 4px;" src='${url + "/"+res}'/>`;
        })
        $("#view-all-gallery-image").html(img);


    })
</script>


@include('admin/include/footer')
