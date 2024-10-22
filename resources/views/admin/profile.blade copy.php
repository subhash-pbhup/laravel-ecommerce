@include('admin/include/header');

<!-- /page content -->
<?php $admin = $res[0]; ?>

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Admin Profile</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Edit Admin Profile Page</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        @if (Session::has('message'))
                            <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissible"> <a
                                    href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ Session::get('message') }}</div>
                        @endif
                        <form id="demo-form2" method="POST" action="{{ url('/admin-update') }}"
                            enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                            @csrf
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"> Name <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="name" value="<?= $admin->name ?>" required="required"
                                        class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Email <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="email" value="<?= $admin->email ?>" name="email"
                                        required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="middle-name"
                                    class="control-label col-md-3 col-sm-3 col-xs-12">Mobile</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="mobile" value="<?= $admin->mobile ?>"
                                        class="form-control col-md-7 col-xs-12" type="text" name="mobile">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Image</label>
                                <div class="col-md-5 col-sm-5 col-xs-12">
                                    <input class="form-control col-md-7 col-xs-12" type="file" name="img">
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-12">
                                    <a target="_blank" href="{{ asset('storage/' . $admin->img) }}"><img
                                            src="{{ asset('storage/' . $admin->img) }}" style="width: 80px"
                                            alt="image"></a>
                                    <input type="hidden" value="<?= $admin->img ?>" name="old_img">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Passsword <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="<?= $admin->password ?>" class="form-control col-md-7 col-xs-12"
                                        type="password" name="pwd">

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Address <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea id="address" required="required" class="form-control" name="address" data-parsley-trigger="keyup"
                                        data-parsley-minlength="20" data-parsley-maxlength="100"
                                        data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                                        data-parsley-validation-threshold="10" spellcheck="false"><?= $admin->address ?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Store Name <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="<?= $admin->store_name ?>" class="form-control col-md-7 col-xs-12"
                                        type="text" name="store_name">

                                </div>
                            </div>

                            {{-- <div class="ln_solid"></div> --}}
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<!-- /page content -->


@include('admin/include/footer')
