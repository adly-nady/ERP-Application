<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\notifacationwrning_db;
use App\Models\equ_model;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class stop_report extends Controller
{
    public function save_data_stop_report(Request $R)
    {
        notifacationwrning_db::insert([
            'date'=>$R->date,
            'id_num'=>$R->id_num,
            'dp_WanteFix'=>$R->dp_WanteFix,
            'controll_boy'=>$R->controll_boy,
            'error_location'=>$R->error_location,
            'start_time_error'=>$R->start_time_error,
            'shift_manger'=>$R->shift_manger,
            'department'=>$R->department,
            'who_will_fix'=>$R->who_will_fix,
            'part_name'=>$R->part_name,
            'part_id'=>$R->part_id,
            'start_date_fix'=>$R->start_date_fix,
            'start_time_fix'=>$R->start_time_fix,
            'requerd'=>$R->requerd,
            'what_did'=>$R->what_did,
            'part_use'=>$R->part_use,
            'part_count'=>$R->part_count,
            'note'=>$R->note,
            'who_fix'=>null,
            'name_WanteFix'=>$R->name_WanteFix,
            'mintanice_manger'=>$R->mintanice_manger
        ]);
        return response()->json($R->id_num+1);
    }
    public function inserts_tools(Request $R)
    {
        equ_model::insert([
            'MQ_name'=>$R->qm_name,
            'MQ_number'=>$R->qm_number,
        ]);
        return response()->json(equ_model::select('MQ_name')->get());
    }
    public function get_all_equ_milling(Request $R)
    {
        $arr1r=collect(DB::select("SELECT `id_num` FROM `notifacationwrning_db` WHERE 1"))->max()??0;
        $arr=DB::select("SELECT  `MQ_name` FROM `milling_equipment` GROUP BY `MQ_name`");
        if(!$arr1r->id_num && $arr1r == 0)
            return response()->json(['MQ_name'=>$arr,'id_nums'=>$arr1r+1]);
        else
            return response()->json(['MQ_name'=>$arr,'id_nums'=>$arr1r->id_num+1]);
    }
    public function get_after_change(Request $R)
    {
        if($R->tools_name)
        {
            $data=equ_model::where('MQ_name',$R->tools_name)->get();
            return response()->json($data);
        }
    }
    public function depart_change(Request $R)
    {
        $data=User::where('dep_id',$R->department)->select('Signature')->get();
        return response()->json($data);
    }
    public function get_users_controlle_milling(Request $R)
    {
        $data=User::where('dep_id',16)->select('Signature')->get();
        return response()->json($data);
    }
}
