<?php

namespace App\Http\Controllers\Admin\Seminar\Define;

use App\Http\Requests\GroupFormRequest;
use App\Model\Group;
use App\Repository\Admin\Seminar\GroupRepo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupsController extends Controller
{

    private $groupRepo;

    public function __construct(GroupRepo $groupRepo)
    {
        $this->groupRepo=$groupRepo;
    }

    public function index()
    {
        $groups=Group::all();

        return view("admin.seminar.group.index",compact('groups'));

//        return response()->json($groups, 200, ['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'],
//            JSON_UNESCAPED_UNICODE);

//        return view("aaa",compact("groups"),)
    }


    public function create()
    {
        return view('admin.seminar.group.index');
    }


    public function store(GroupFormRequest $request)
    {
        $groupName=trim($request->newgroupname);

        $result=$this->groupRepo->insertGroup($groupName);
        if ($result=="success")
        {
            toastr()->success("success");
        }
        elseif ($result=="error")
        {
            toastr()->success("error");
        }
        elseif ($result=="registered")
        {
            toastr()->success("registered");
        }
        elseif ($result=="notEnteredName")
        {
            toastr()->success("notEnteredName");
        }
        return back();
    }


    public function show(Request $request,$id)
    {
        $group=null;
        if ($this->groupRepo->getGoruoById($id))
        {
            $group=$this->groupRepo->getGoruoById($id);

            if ($request->ajax())
            {
                return [
                    "groupname"=>$group->name
                ];
            }
            return view("admin.seminar.group.show",compact('group'));


        }
        else
        {
            toastr()->warning("گروه مورد نظر وجود ندارد");
            return back();
        }
    }


    public function edit($id)
    {
        $group=null;
        if ($this->groupRepo->getGoruoById($id))
        {
            $group=$this->groupRepo->getGoruoById($id);
            return [
                "groupname"=>$group->name
            ];
        }
        else
        {
            toastr()->warning("گروه مورد نظر وجود ندارد");
            return back();
        }
    }


    public function update(GroupFormRequest $request, $id)
    {
        $groupId=$id;
        $groupName=$request->newgroupname;

        if (!$this->groupRepo->checkGroupExistByName($groupName))
        {
            $updatedGroup=$this->groupRepo->getGoruoById($groupId);
            $updatedGroup->name=$groupName;
            if ($updatedGroup->save())
            {
                toastr()->success("نام گروه با موفقیت ویرایش شد");
            }
            else
            {
                toastr()->error("ویرایش نام گروه دچار خطا شد");

            }
        }
        else
        {
            toastr()->warning("نام گروه تکراری است");
        }
        return redirect()->route("group.index");
    }


    public function destroy($id)
    {
        if ($this->groupRepo->checkGroupExistById($id))
        {
            if ($this->groupRepo->deleteGroup($id))
            {
                toastr()->success("گروه با موفقیت حذف شد");
            }
            else
            {
                toastr()->error("در عملیات حذف خطایی رخ داده است");
            }

        }
        else
        {
            toastr()->warning("گروه مورد نظر پیدا نشد");
        }


        return redirect()->route("group.index");
    }
}
