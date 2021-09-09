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
echo "salam":
    }

}
