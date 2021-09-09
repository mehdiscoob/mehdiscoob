<?php

namespace App\Http\Controllers\Admin\Seminar\Define;

use App\Http\Requests\RoleFormRequest;
use App\Model\Role;
use App\Repository\Admin\Seminar\RoleRepo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RolesController extends Controller
{
    private $roleRepo;

    public function __construct(RoleRepo $roleRepo)
    {
        $this->roleRepo=$roleRepo;
    }

    public function index()
    {
        $roles=Role::all();

        return view("admin.seminar.role.index",compact('roles'));

//        return response()->json($Roles, 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
//            JSON_UNESCAPED_UNICODE);

//        return view("aaa",compact("Roles"),)
    }


    public function create()
    {
        return view('admin.seminar.role.create');
    }


    public function store(RoleFormRequest $request)
    {
        $newrolename=$request->newrolename;
        if (!$this->roleRepo->checkRoleExistByName($newrolename))
        {
            $insertResult=$this->roleRepo->insertRole($newrolename);
            if ($insertResult=="success")
            {
                toastr()->success("عمیات با موفقیت اجرا شد");
            }
            elseif ($insertResult=="error")
            {
                toastr()->error("در انجام عمیات خطایی رخ داده است");
            }
            elseif ($insertResult=="registered")
            {
                toastr()->warning("این نقش تکراری است");
            }
            elseif ($insertResult=="notEnteredName")
            {
                toastr()->warning("اطلاعات به درستی وارد نشده اند");
            }

        }
        else
        {
            toastr()->warning("این نقش تکراری است");
        }
        return back();
    }


    public function show(Request $request,$id)
    {
        $role=null;
        if ($this->roleRepo->getRoleById($id))
        {
            $role=$this->roleRepo->getRoleById($id);
            if ($request->ajax())
            {
                return [
                    "rolename"=>$role->name,
                ];
            }
            else
            {
                return view("admin.seminar.role.show",compact('role'));
            }
        }
        else
        {
            toastr()->warning("نقش مورد نظر پیدا نشد");
            return back();
        }
    }


    public function edit($id)
    {
        $role=$this->roleRepo->getRoleById($id);
        return [
            "rolename"=>$role->name
        ];
    }


    public function update(Request $request, $id)
    {
        $roleId=$id;
        $roleName=$request->newrolename;
        if (!$this->roleRepo->checkRoleExistByName($roleName))
        {
            $updatedRole=$this->roleRepo->getRoleById($roleId);
            $updatedRole->name=$roleName;
            if ($updatedRole->save())
            {
                toastr()->success("نقش با موفقیت ویرایش شد");
            }
            else
            {
                toastr()->error("عمیات ویرایش نقش دچار خطا شد");

            }
        }
        else{
            toastr()->warning("نقش تکراری است");
        }
        return back();
    }


    public function destroy($id)
    {
       $deleteResult=$this->roleRepo->deleteRole($id);
       if ($deleteResult=="success")
       {
           toastr()->success("حذف نقش با موفقیت انجام شد");
       }
       elseif ($deleteResult=="error")
       {
           toastr()->error("در عملیات حذف مشکلی‌ رخ داد");
       }
       elseif ($deleteResult=="notFound")
       {
           toastr()->warning("نقش مورد نظر موجود نیست");
       }

        return back();
    }
}
