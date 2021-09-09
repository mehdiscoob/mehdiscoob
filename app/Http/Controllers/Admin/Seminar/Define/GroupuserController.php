<?php

namespace App\Http\Controllers\Admin\Seminar\Define;

use App\Repository\Admin\Seminar\GroupRepo;
use App\Repository\Admin\Seminar\SeminarEmpRepo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $groupRepo;
    private $seminarempRepo;

    public function __construct(GroupRepo $groupRepo, SeminarEmpRepo $seminarEmpRepo)
    {
        $this->groupRepo = $groupRepo;
        $this->seminarempRepo = $seminarEmpRepo;
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.seminar.group-user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seminarEmp = $this->seminarempRepo->getSeminarEmById($id);
        $groups = $this->groupRepo->getAllgroups();
        return view('admin.seminar.group-user.index',compact('seminarEmp','groups'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $seminarEmp_id=$request->seminarEmpid;
        $newgroup=[];
        foreach ($request->groups as $group)
        {
            $newgroup[]=(int)$group;
        }
        $seminarEmp = $this->seminarempRepo->getSeminarEmById($seminarEmp_id);
        $seminarEmp->groups()->sync($newgroup);
        toastr()->success("ویرایش گروه های کارمند با موفقیت انجام شد");
        return redirect()->route("employee.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
