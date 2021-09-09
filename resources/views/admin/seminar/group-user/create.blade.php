@extends("admin.master.home")

@section("pagecss")
    <link rel="stylesheet" href="{{asset("dist")}}/css/toastr.min.css">
    <link rel="stylesheet" href="{{asset("dist")}}/css/dual-listbox.css">
@endsection

@section("breadcrumcontent")
    <li class="breadcrumb-item">خانه</li>
    <li class="breadcrumb-item">فرم</li>
    <li class="breadcrumb-item active"><a href="#">ثبت گروه - کاربر جدید</a></li>
@endsection

@section("vendorjs")
@endsection

@section("pagejs")
    <script src="{{asset("dist")}}/js/toastr.min.js"></script>
    <script src="{{asset("dist")}}/js/app.js"></script>
    <script src="{{asset("dist")}}/js/dual-listbox.min.js"></script>
    <script src="{{asset("dist")}}/js/group-user.custom.js"></script>
@endsection

@section("maincontent")
    <div class="col-12 mt-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">ثبت گروه - کاربر جدید</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{asset('test2')}}" method="post">
                                @csrf;
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-row mt-3">
                                            <div class="form-group col-md-6">
                                                <div class="field_wrapper">
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">کاربر</div>
                                                        </div>
                                                        <select class="form-control" name="user">
                                                            <option selected>انتخاب کنید</option>
                                                            <option value="1">کاربر اول</option>
                                                            <option value="2">کاربر دوم</option>
                                                            <option value="3">کاربر سوم</option>
                                                            <option value="4">کاربر چهارم</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="group" class="group-label">گروه های کاربر</label>
                                                <div class="input-group mb-2">
                                                    <select class="roles" multiple name="group[]" id="group">
                                                        <option value="1">حراست</option>
                                                        <option value="2">سرپرست</option>
                                                        <option value="3">مدیر داخلی</option>
                                                        <option value="4">حسابدار</option>
                                                        <option value="4">مدیر مالی</option>
                                                        <option value="4">مسئول ثبت نام</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-row mt-3">
                                            <div class="form-group w-100">
                                                <button type="submit" class="success btn btn-success w-100">ثبت
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
