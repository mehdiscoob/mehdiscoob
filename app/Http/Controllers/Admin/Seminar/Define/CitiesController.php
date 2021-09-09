<?php

namespace App\Http\Controllers\Admin\Seminar\Define;

use App\Http\Requests\CityFormRequest;
use App\Repository\Admin\Seminar\CityRepo;
use App\Repository\Admin\Seminar\OstanRepo;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CitiesController extends Controller
{

    public $ostanRepo;
    public $cityRepo;

    public function __construct(OstanRepo $ostanRepo,CityRepo $cityRepo)
    {

        $this->ostanRepo=$ostanRepo;
        $this->cityRepo=$cityRepo;
    }

    public function index()
    {
        $cities=$this->cityRepo->getAllCity();
        $ostans=$this->ostanRepo->getAllOstan();
//        foreach ($cities as $g){
//            $c =new Verta($g->created_at);
//            $g->created_at = $c;
//            $u =new Verta($g->updated_at);
//            $g->updated_at = $u;
//            $d =new Verta($g->deleted_at);
//            $g->deleted_at = $d;
//
//
//        }
//        $cities = response()->json($cities,200,["Content-Type"=>"application/json;charset=utf-8","Charset"=>"utf-8"],JSON_UNESCAPED_UNICODE);
//        $cities = $cities->content();
        return view('admin.seminar.city.index', compact(['cities',"ostans"]));
    }


    public function create()
    {
        $ostans=$this->ostanRepo->getAllOstan();
        return view("admin.seminar.city.createcity",compact('ostans'));
    }


    public function store(CityFormRequest $request)
    {
        $cityname=$request->cityname;
        $ostan_id=$request->ostan_id;

        if ($ostan_id > 0 && strlen($cityname))
        {
            $insertResult=$this->cityRepo->insertOneCity($cityname,$ostan_id);
//        dd($insertResult);

            if ($insertResult=="registered")
            {
                toastr()->warning("شهر قبلا ثبت شده است","نتیجه عملیات");

            }
            elseif($insertResult=="error")
            {

                toastr()->error("در انجام عملیات خطایی رخ داده است","نتیجه عملیات");
            }
            elseif($insertResult=="success")
            {
                toastr()->success("شهر با موفقیت افزوده شد","نتیجه عملیات");
            }
            elseif ($insertResult=="notdata")
            {
                toastr()->warning("اطلاعات را صحیح وارد نکرده اید","نتیجه عملیات");

            }


            return back();
        }
        else
        {
            toastr()->warning("نام شهر یا استان نادرست وارد شده است","نتیجه عملیات",['timeOut' => 1000]);
        }

        return back();
    }


    public function show($id)
    {
        $city=$this->cityRepo->selectOneCityById($id);
        $ostan=$this->ostanRepo->selectOstanById($city->ostan_id);
//        return view("admin.seminar.city.showcity",compact(['city','ostan']));
        return [
            "cityname"=>$city->name,
            "ostanname"=>$ostan->name,
            "ostan_id"=>$ostan->id
        ];
    }


    public function edit($id)
    {
        $city=$this->cityRepo->selectOneCityById($id);

        $content=" ";
        $ostans=$this->ostanRepo->getAllOstan();
        foreach ($ostans as $ostan)
        {
            if ((int)$city->ostan_id == $ostan->id)
            {
                $content.="<option value='$ostan->id' selected>$ostan->name</option>";
            }
            else
            {
                $content.="<option value='$ostan->id' >$ostan->name</option>";
            }
        }

        return [
            "cityname"=>$city->name,
            "content"=>$content

        ];
    }


    public function update(CityFormRequest $request, $id)
    {
//        dd($request);

        $updateres=$this->cityRepo->updateCity($id,$request->cityname,$request->ostan_id);
        if ($updateres=="success")
        {
            toastr()->success("ویرایش شهر با موفقیت انجام شد","نتیجه عملیات",['timeOut'=>3000]);
        }
        elseif ($updateres=="error" ){
            toastr()->error("ویرایش شهر   انجام نشد","نتیجه عملیات",['timeOut'=>3000]);

        }
        elseif ($updateres=="notFound")
        {
            toastr()->warning("شهر مورد نظر پیدا نشد","نتیجه عملیات",['timeOut'=>3000]);
        }
        elseif ($updateres=="registered")
        {
            toastr()->error("شهر با این مشخصات قبلا ثبت شده است","نتیجه عملیات",['timeOut'=>3000]);
        }
        return redirect()->route("city.index");
    }


    public function destroy($id)
    {
        $deleteres=$this->cityRepo->deleteCity($id);
        if ($deleteres=="success")
        {
            toastr()->success("حذف شهر انجام شد","نتیجه عملیات",['timeOut'=>3000]);
        }
        elseif($deleteres=="error")
        {
            toastr()->error("حذف شهر انجام نشد","نتیجه عملیات",['timeOut'=>3000]);
        }
        elseif($deleteres=="notFound")
        {
            toastr()->warning("شهری با این مشخصات پیدا نشد","نتیجه عملیات",['timeOut'=>3000]);
        }
        return redirect()->route("city.index");
    }
}
