@extends("admin.master.home")

@section("pagecss")
    <link rel="stylesheet" href="{{asset("dist")}}/css/toastr.min.css">
    <link rel="stylesheet" href="{{asset("dist")}}/css/dual-listbox.css">
@endsection

@section("breadcrumcontent")
    <li class="breadcrumb-item">خانه</li>
    <li class="breadcrumb-item">فرم</li>
    <li class="breadcrumb-item active"><a href="#">ثبت کارمند-گروه جدید</a></li>
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
                <h4 class="card-title">ثبت کارمند - گروه جدید</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{route("group-user.update",$seminarEmp->id)}}" method="post">
                                @csrf;
                                @method("PUT")
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-row mt-3">
                                            <div class="form-group col-md-5">
                                                <div class="field_wrapper">
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">کارمند</div>
                                                        </div>
                                                        <input type="text" class="form-control" name="seminarEmpname" value="{{$seminarEmp->name}}">
                                                        <input type="hidden" class="form-control" name="seminarEmpid" value="{{$seminarEmp->id}}">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">

                                                @php($ids=[])
                                                @foreach($seminarEmp->groups as $mygroup)
                                                    @php ($ids[] = $mygroup->id)
                                                @endforeach


                                                <label for="roles" class="roles-label">گروهای کارمند</label>
                                                <div class="input-group mb-2">
                                                    <select class="groups" multiple name="groups[]" id="groups">
                                                        @foreach($groups as $group)
                                                            @if(in_array($group->id ,$ids))
                                                                <option value="{{$group->id}}" selected>{{$group->name}}</option>
                                                            @else
                                                                <option value="{{$group->id}}" >{{$group->name}}</option>
                                                            @endif
                                                        @endforeach
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
                                                <a type="button" href="{{route("employee.index")}}"  class="w-100 warning btn btn-warning">کنسل</a>
                                            </div>
                                        </div>

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
