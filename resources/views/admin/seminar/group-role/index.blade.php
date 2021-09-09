@extends("admin.master.home")

@section("pagecss")
    <link rel="stylesheet" href="{{asset("dist")}}/css/toastr.min.css">
    <link rel="stylesheet" href="{{asset("dist")}}/css/dual-listbox.css">
@endsection

@section("breadcrumcontent")
    <li class="breadcrumb-item">خانه</li>
    <li class="breadcrumb-item">فرم</li>
    <li class="breadcrumb-item active"><a href="#">ثبت گروه-نقش جدید</a></li>
@endsection

@section("vendorjs")
@endsection

@section("pagejs")
    <script src="{{asset("dist")}}/js/toastr.min.js"></script>
    <script src="{{asset("dist")}}/js/app.js"></script>
    <script src="{{asset("dist")}}/js/dual-listbox.min.js"></script>
    <script src="{{asset("dist")}}/js/group-role.custom.js"></script>


    <script>




    </script>

@endsection

@section("maincontent")
    <div class="col-12 mt-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">ثبت گروه - نقش جدید</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{route("group-role.update",$group->id)}}" method="post">
                                @csrf;
                                @method("PUT")
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="form-row mt-3">
                                            <div class="form-group col-md-5">
                                                <div class="field_wrapper">
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">گروه</div>
                                                        </div>
                                                        <input type="text" class="form-control" name="groupname" value="{{$group->name}}">
                                                        <input type="hidden" class="form-control" name="groupid" value="{{$group->id}}">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">

                                                @php($ids=[])
                                                @foreach($group->roles as $myrole)
                                                    @php ($ids[] = $myrole->id)
                                                @endforeach


                                                <label for="roles" class="roles-label">نقش های گروه</label>
                                                <div class="input-group mb-2">
                                                    <select class="roles" multiple name="roles[]" id="roles">
                                                        @foreach($roles as $role)



                                                            @if(in_array($role->id ,$ids))
                                                                <option value="{{$role->id}}" selected>{{$role->name}}</option>
                                                            @else
                                                                <option value="{{$role->id}}" >{{$role->name}}</option>
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
                                                <a type="button" href="{{route("group.index")}}"  class="w-100 warning btn btn-warning">کنسل</a>
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
