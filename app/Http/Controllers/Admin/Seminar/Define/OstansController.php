<?php

namespace App\Http\Controllers\Admin\Seminar\Define;

use App\Http\Requests\OstanFormRequest;
use App\Repository\Admin\Seminar\OstanRepo;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Whoops\Exception\Inspector;
use function Sodium\compare;

class OstansController extends Controller
{

    public $ostanRepo;

    public function __construct(OstanRepo $ostanRepo)
    {
        $this->ostanRepo=$ostanRepo;
    }


    public function index()
    {
        $ostans=$this->ostanRepo->getAllOstan();

//        foreach ($ostans as $g){
//            $c =new Verta($g->created_at);
//            $g->created_at = $c;
//            $u =new Verta($g->updated_at);
//            $g->updated_at = $u;
//            $d =new Verta($g->deleted_at);
//            $g->deleted_at = $d;
//        }
//        $ostans = response()->json($ostans,200,["Content-Type"=>"application/json;charset=utf-8","Charset"=>"utf-8"],JSON_UNESCAPED_UNICODE);
//        $ostans = $ostans->content();
        return view('admin.seminar.ostan.index', compact('ostans'));


    }


    public function create()
    {
        return view("admin.seminar.ostan.createostan");
    }


    public function store(OstanFormRequest $request)
    {
        $insertResult=$this->ostanRepo->insertOneOstan($request->ostanname);
//        dd($insertResult);
        if ($insertResult=="registered")
        {
            toastr()->warning("استان قبلا ثبت شده است","نتیجه عملیات");

        }
        elseif($insertResult=="error")
        {

            toastr()->error("در انجام عملیات خطایی رخ داده است","نتیجه عملیات");
        }
        elseif($insertResult=="success")
        {
            toastr()->success("استان با موفقیت افزوده شد","نتیجه عملیات");
        }



        return back();

    }


    public function show(Request  $request,$id)
    {
        if ($this->ostanRepo->selectOstanById($id))
        {
            $ostan=$this->ostanRepo->selectOstanById($id);
            if ($request->ajax())
            {
                return [
                    "ostanname"=>$ostan->name
                ];
            }
            else
            {
                return view("admin.seminar.ostan.show",compact('ostan'));
            }
        }
        else
        {
            toastr()->warning("استان مورد نظر وجود ندارد");
            return back();
        }

    }


    public function edit($id)
    {
        if ($this->ostanRepo->selectOstanById($id)->count())
        {
            $ostan=$this->ostanRepo->selectOstanById($id);
            return [
                "ostanname"=>$ostan->name
            ];
        }
        else
        {
            toastr()->warning("استان مورد نظر وجود ندارد");
            return back();
        }
    }


    public function update(OstanFormRequest $request,$id)
    {
//        dd($request);
        $ostanID=$id;
        $ostanName=$request->ostanname;

        if (!$this->ostanRepo->checkOstanExistByName($ostanName))
        {
            $updatedOstan=$this->ostanRepo->selectOstanById($ostanID);
            $updatedOstan->name=$ostanName;
            if ($updatedOstan->save())
            {
                toastr()->success("نام استان با موفقیت ویرایش شد");
            }
            else
            {
                toastr()->error("ویرایش نام استان دچار خطا شد");

            }
        }
        else
        {
            toastr()->warning("نام استان تکراری است");
        }
        return redirect()->route("ostan.index");

    }


    public function destroy($id)
    {
        if ($this->ostanRepo->checkOstanExistById($id))
        {
            if ($this->ostanRepo->deleteOstan($id))
            {
                toastr()->success("استان با موفقیت حذف شد");
            }
            else
            {
                toastr()->error("در عملیات حذف خطایی رخ داده است");
            }

        }
        else
        {
            toastr()->warning("استان مورد نظر پیدا نشد");
        }


        return redirect()->route("ostan.index");
    }


}
