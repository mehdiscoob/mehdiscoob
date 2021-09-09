@extends("admin.master.home")

@section("pagecss")
    <link rel="stylesheet" href="{{asset("dist")}}/css/toastr.min.css">
@endsection

@section("breadcrumcontent")
    <li class="breadcrumb-item">خانه</li>
    <li class="breadcrumb-item">فرم</li>
    <li class="breadcrumb-item active"><a href="#">ثبت سمت جدید</a></li>
@endsection

@section("vendorjs")
@endsection

@section("pagejs")
    <script src="{{asset("dist")}}/js/toastr.min.js"></script>
    <script src="{{asset("dist")}}/js/app.js"></script>
@endsection

@section("maincontent")

    <div class="col-12 mt-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">ثبت گروه جدید</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form>
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-row mt-3">
                                            <div class="form-group col-md-5">
                                                <div class="field_wrapper">
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">عنوان گروه</div>
                                                        </div>
                                                        <input type="text" class="form-control rounded" name="group">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-row mt-3">
                                            <div class="form-group w-100">
                                                <button type="button" class="success btn btn-success w-100"
                                                        onclick="toastr.success('ddd')">ثبت
                                                </button>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group w-100">
                                                <button type="button" class="w-100 warning btn btn-warning">کنسل
                                                </button>
                                            </div>
                                        </div>


                                        @if($errors->any())
                                            <div class="form-row">
                                                <div class="form-group w-100">
                                                    <button type="button" class="w-100 warning btn btn-warning">کنسل
                                                    </button>
                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
