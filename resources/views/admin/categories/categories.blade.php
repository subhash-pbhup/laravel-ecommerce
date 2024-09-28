@include('admin/include/header');
<?php $admin = $res[0]; ?>
<!-- /page content -->


<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Product categories
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Add new category</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <!-- start form for validation -->
                        <form data-parsley-validate action="{{ url('/add-categories') }}" method="POST">
                            @csrf
                            <label for="fullname">Categories Name * :</label>
                            <input type="text" id="name" class="form-control" name="name" required />

                            <br />

                            <label for="message">Description :</label>
                            <textarea id="description" class="form-control" name="description" data-parsley-trigger="keyup"
                                data-parsley-minlength="5" data-parsley-maxlength="100" data-parsley-validation-threshold="10"></textarea>

                            <br />
                            <button type="submit" class="btn btn-primary">Add new category</button>

                        </form>
                        <!-- end form for validations -->

                    </div>
                </div>
            </div>

            <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Product Categories</h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        @if (Session::has('message'))
                            <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissible"> <a
                                    href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ Session::get('message') }}</div>
                        @endif
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($categories as $categorie_res)
                                    <tr>
                                        <td>{{ $categorie_res->id }}</td>
                                        <td>{{ $categorie_res->name }}</td>
                                        <td>{{ $categorie_res->description }}</td>

                                        @if ($categorie_res->status == 1)
                                            <td><span class="label label-success">Enable</span></td>
                                        @else
                                            <td><span class="label label-danger">Disable</span></td>
                                        @endif


                                        <td><a href="#" class="btn btn-sm btn-info setdata" data-toggle="modal"
                                                data-target="#myModal" data-id="{{ $categorie_res->id }}"
                                                data-name="{{ $categorie_res->name }}"
                                                data-status="{{ $categorie_res->status }}"
                                                data-description="{{ $categorie_res->description }}">Edit</a> <a
                                                href="{{ url('/delete-categories/' . $categorie_res->id) }}"
                                                class="btn btn-sm btn-danger">Delete</a></td>
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
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit categories</h4>

            </div>
            <div class="modal-body">
                <!-- start form for validation -->
                <form data-parsley-validate action="{{ url('/update-categories') }}" method="POST">
                    @csrf
                    <label for="fullname">Categories Name * :</label>
                    <input type="text" id="update-name" class="form-control" name="name" required />
                    <input type="hidden" id="id" class="form-control" name="id" required />

                    <br />

                    <label for="message">Description :</label>
                    <textarea id="update-description" class="form-control" name="description" data-parsley-trigger="keyup"
                        data-parsley-minlength="5" data-parsley-maxlength="100" data-parsley-validation-threshold="10"></textarea>

                    <br />

                    <label for="fullname">Status:</label>
                    <select id="update-status" name="status" class="form-control">
                        <option value="1">Enable</option>
                        <option value="0">Disable</option>
                    </select>

                    <br />


                    <button type="submit" class="btn btn-primary">Update category</button>

                </form>
                <!-- end form for validations -->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- /page content -->


<script>
    $(document).ready(function() {
        $(".setdata").click(function() {
            $("#id").val($(this).data("id"));
            $("#update-status").val($(this).data("status"));
            $("#update-name").val($(this).data("name"));
            $("#update-description").val($(this).data("description"));

        })
    });
</script>


@include('admin/include/footer');
