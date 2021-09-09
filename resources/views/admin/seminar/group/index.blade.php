@extends("admin.master.home")

@section("pagecss")
    <link rel="stylesheet" href="{{asset("dist")}}/css/toastr.min.css">
    <link rel="stylesheet" href="{{asset("dist")}}/css/dataTables.bootstrap4.css">
    <style>
        .toLtr {
            direction: ltr;
        }
        .dataTable .btn {
            padding: 2px 15px;
        }
    </style>
@endsection

@section("breadcrumcontent")
    <li class="breadcrumb-item">خانه</li>
    <li class="breadcrumb-item">فرم</li>
    <li class="breadcrumb-item active"><a href="#">نمایش گروه ها</a></li>
@endsection

@section("vendorjs")
@endsection

@section("pagejs")
    <script src="{{asset("dist")}}/js/toastr.min.js"></script>
    <script src="{{asset("dist")}}/js/app.js"></script>
    <script src="{{asset("dist")}}/js/jquery.dataTables.js"></script>
    <script src="{{asset("dist")}}/js/dataTables.bootstrap4.js"></script>
    <script>
        // Fire DataTable
        $('#myTable').dataTable();
        //Customize DataTable
        let a = $('.select-items').parent();
        a.siblings().first().removeClass('col-md-6').addClass('col-md-4');
        a.removeClass('col-md-6').addClass('col-md-2');
        a.after('<div class="col-sm-12 col-md-6"><button class="btn btn-success col-md-2" data-toggle="modal" data-target="#add-record">افزودن</button></div>');


        /////////////////////////////////////////Update Button
        $('.update-record-button').click(function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            $.getJSON("{{asset('admin/group/')}}"+"/"+id+"/edit ", function (data) {
                // console.log(data);
                // jQuery.noConflict();
                $('#update-record').modal('show');
                $('.update-form-action').attr("action","{{asset("/admin/group/")}}/"+id);
                $('.update-modal form .groupname').val(data.groupname);
            })
                .fail(function () {
                    toastr.error('دریافت اطلاعات دچار خطا شده است');
                })
        });


        ////////////////////////////Delete Button
        $('.delete-record-button').click(function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            $.getJSON("{{asset('admin/group/')}}/" + id, function (data) {
                // jQuery.noConflict();
                $('#delete-record').modal('show');
                $('.delete-form-action').attr("action","{{asset("/admin/group/")}}/"+id);
                $('.delete-modal form .groupname').val(data.groupname);
            })
                .fail(function () {
                    toastr.error('دریافت اطلاعات دچار خطا شده است');
                })
        });
        //Button ToolTip
        $('[data-toggle="tooltip"]').tooltip()




        ///////////////////


        @if($errors->any())
        @foreach($errors->all() as $err)
        toastr.error("{{$err}}");
        @endforeach

        @endif

    </script>
@endsection

@section("maincontent")
    <div class="col-12 mt-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">نمایش گروه ها</h4>
            </div>
            <div class="card-content">
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-12 p-0">
                            <div class="container-fluid p-3">
                                <table class="table table-hover table-dark table-striped" id="myTable">
                                    <thead>
                                    <tr>
                                        <th>عنوان</th>
                                        <th>تاریخ ایجاد</th>
                                        <th>تاریخ بروزرسانی</th>
                                        <th>تاریخ حذف</th>
                                        <th>عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($groups as $group)
                                        <tr>
                                            <td>{{$group->name}}</td>

                                            @if($group->created_at!=null)
                                                <td class="toLtr">{{\Hekmatinasser\Verta\Verta::instance($group->created_at)}}</td>
                                            @else
                                                <td class="toLtr"></td>
                                            @endif


                                            @if($group->updated_at!=null)
                                                <td class="toLtr">{{\Hekmatinasser\Verta\Verta::instance($group->updated_at)}}</td>
                                            @else
                                                <td class="toLtr"></td>
                                            @endif

                                            @if($group->deleted_at!=null)
                                            <td class="toLtr">{{\Hekmatinasser\Verta\Verta::instance($group->deleted_at)}}</td>
                                            @else
                                            <td class="toLtr"></td>
                                            @endif
                                            <td>
                                                <button class="btn btn-warning update-record-button"
                                                        data-id="{{$group->id}}" data-toggle="tooltip"
                                                        data-placement="top" title="بروزرسانی آیتم">
                                                    <i class="icon-pencil"></i>
                                                </button>
                                                <button class="btn btn-danger delete-record-button"
                                                        data-id="{{$group->id}}" data-toggle="tooltip"
                                                        data-placement="top" title="حذف آیتم">
                                                    <i class="icon-trash"></i>
                                                </button>
                                                <a href="{{route("group.show",$group->id)}}" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="نمایش آیتم">
                                                    <i class="icon-eye"></i>
                                                </a>
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
        <!-- Modal ADD RECORD -->
        <div class="modal fade add-modal" id="add-record" tabindex="-1" role="dialog" style="display: none;">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle1">افزودن گروه کاربری</h5>
                        <button type="button" class="close mr-auto p-0 m-0" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route("group.store")}}" method="post" id="form-add-modal" class="add-form-action">
                            @csrf
                            <div class="form-group">
                                <label for="groupname">عنوان گروه</label>
                                <input type="text" class="form-control groupname" id="groupname" name="newgroupname">
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                        <button type="submit" class="btn btn-success" form="form-add-modal">ذخیره</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>





        <!-- Modal UPDATE RECORD -->
        <div class="modal fade update-modal" id="update-record" tabindex="-1" role="dialog" style="display: none;">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle1">ویرایش گروه کاربری</h5>
                        <button type="button" class="close mr-auto p-0 m-0" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="#" id="update-form-modal" method="post" class="update-form-action">
                            @csrf
                            @method("PUT")
                            <div class="form-group">
                                <label for="newgroupname">عنوان گروه</label>
                                <input type="text" class="form-control groupname" id="newgroupname" name="newgroupname">
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                        <button type="submit" class="btn btn-success" form="update-form-modal">ذخیره تغییرات</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>




        <!-- Modal DELETE RECORD -->
        <div class="modal fade delete-modal" id="delete-record" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">حذف گروه</h5>
                        <button type="button" class="close mr-auto p-0 m-0" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="#" id="delete-form-modal" method="post" class="delete-form-action">
                            @csrf
                            @method("DELETE")
                            <div class="form-group">
                                <label for="deletegroupname">عنوان گروه</label>
                                <input type="text" class="form-control groupname" id="deletegroupname" name="groupname" disabled>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                        <button type="submit" class="btn btn-success" form="delete-form-modal">ذخیره تغییرات</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection
