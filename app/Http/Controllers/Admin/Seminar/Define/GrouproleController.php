<?php

namespace App\Http\Controllers\Admin\Seminar\Define;

use App\Repository\Admin\Seminar\GroupRepo;
use App\Repository\Admin\Seminar\RoleRepo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GrouproleController extends Controller
{
    public $roleRepo;
    public $groupRepo;


    public function __construct(RoleRepo $roleRepo,GroupRepo $groupRepo)
    {
        $this->roleRepo=$roleRepo;
        $this->groupRepo=$groupRepo;
    }

    public function index()
    {

    }


    public function create()
    {

    }


    public function store(Request $request)
    {
      dd($request);
    }


    public function show($id)
    {
        $roles=$this->roleRepo->getAllRoles();
        $group=$this->groupRepo->getGoruoById($id);
        return view('admin.seminar.group-role.index',compact(["group","roles"]));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $group_id=$request->groupid;
        $newrole=[];
        foreach ($request->roles as $role)
        {
            $newrole[]=(int)$role;
        }
        $group=$this->groupRepo->getGoruoById($group_id);
        $group->roles()->sync($newrole);
        toastr()->success("ویرایش نقش های گروه کابری با موفقیت انجام شد");
        return redirect()->route("group.index");
    }


    public function destroy($id)
    {
        //
    }
}
