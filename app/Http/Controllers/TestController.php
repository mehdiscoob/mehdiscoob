<?php

namespace App\Http\Controllers;

use App\Model\Group;
use App\Model\seminar_karshens_modir;
use App\Repository\Admin\Seminar\SeminarRepo;
use App\Repository\Admin\Seminar\SeminarsansuserRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{

    private $seminarsansuserRepo;

    /**
     * SeminarsController constructor.
     * @param $seminarRepo
     * @param $cityRepo
     */
    public function __construct(SeminarsansuserRepo $seminarsansuserRepo)
    {
        $this->seminarsansuserRepo = $seminarsansuserRepo;

    }
    public function test()
    {
//        $seminarsans= $this->seminarsansuserRepo->getAllSeminarSan();
//        return $seminarsans->seminarsan->;
//        return $this->seminarRepo->checkSansExists(41);
//        $q = DB::table("users")->select('*')->whereNotIn('id',function($query) {
//
//            $query->select('user_id')->from('seminarsan_modirs');
//
//        })->get();
//        dd($q);

//        dd(Group::find(1)->users);
//        $q = DB::table("users")->select('*')->whereIn('id',function($query) {
//
//            $query->select('user_id')->from('seminarsan_modirs');
//
//        })->get();
//        $users = seminar_karshens_modir::where('modir_id', 1)->get();
//        $users = seminar_karshens_modir::with('user')->whereNotIn('modir_id', 1)->get();
//       foreach ($users as $u){
//           return $u->id;
//       }
//        $user =DB::table("users")->select('*')->whereNotIn('id',function($query) {
//            $query->select('user_id')->from('seminarsan_modirs');
//        })->whereNotIn('id', function ($q){
//            $q->select('user_id')->from('group_user')->where('group_id', 1);
//        })->get();
//        return $user;
//        $users = seminar_karshens_modir::where('modir_id', 1)->get();
//
//            $user = seminar_karshens_modir::with(['user'])->where('modir_id', 1)->get();
//            foreach($user as $u){
//                return $u->user->name. '' .$u->user->family;
//            }

//            $users = seminar_karshens_modir::with(['user','modir','seminar','city'])->where('modir_id', 1)->get();
//            foreach($users as $u){
//                dd($u->user->name);
//            }
    }

}
