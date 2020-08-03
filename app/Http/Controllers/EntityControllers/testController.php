<?php


namespace App\Http\Controllers\EntityControllers;

use App\Entities\Test;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\Util\Json;


class testController extends Controller
{
    /*
     * 查询病人付费项目及价格
     * date: 2020 7-27
     * Auth wl
     * */
//        $request->headers->set ('Accept', 'application/JSON' );
//        $request->headers->set ('content-type', 'application/x-www-form-urlencoded');
    public function get_list_type(Request $request) {
        $start = $request['start'];
        $end = $request['end'];
//        if ($start == null && $end == null) {
//            $view_list = DB::table('brjs_main')->select('feetype as name','fyze as value','jssj')->get();
//        } else {
            $view_list = DB::select('call sp_mysql_brjs_pay(?,?)',array($start,$end));
//        }
        dd($view_list);
        return $this->jsonResponse('',0,$view_list);
    }

    public function add_list_type(Request $request) {

        /**
         * 添加某个病人的付费情况
         * date: 2020 7-27
         * Auth wl
         */
        $json = $request['json'];
        $data = json_decode($json);

        $feiyong= $data->feiyong ;

        $length = count($feiyong);
            for ($i = 0; $i < $length; $i++ ) {
                $jzdjh =  $data->jzdjh;
                $ftzt  = $data->fyzt;
                $customer_id = $data->customer_id;
                $type = $data ->feiyong[$i]->feetype;
                $fyze = $data ->feiyong[$i]->fyze;
                $jssj = $data->jssj;
                $view_list = DB::table('brjs_main')->insert([
                'jzdjh' =>$jzdjh,
                'ftzt' =>$ftzt,
                'customer_id' => $customer_id,
                'feetype' => $type,
                'fyze' => $fyze,
                'jssj' => $jssj
                ]);
            }
        return $this->jsonResponse('',0,$view_list);
    }

}
