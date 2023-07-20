<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\data_part;

class equ_control extends Controller
{



    public function get_data_milling_reports()
    {
        $if_read_query=DB::select("SELECT DISTINCT `notifacationwrning_db`.`id_num`,`notifacationwrning_db`.`date`,`notifacationwrning_db`.`part_name`,`notifacationwrning_db`.`part_id`,`notifacationwrning_db`.`what_did`,`notifacationwrning_db`.`note`,`notifacationwrning_db`.`who_will_fix`,`notifacationwrning_db`.`if_read`,`users_a`.`open`,`users_a`.`Signature` FROM `top_admin`,`admins`,`notifacationwrning_db`,`users_a` WHERE `users_a`.`Signature` = `notifacationwrning_db`.`who_will_fix` || `top_admin`.`Signature` = `notifacationwrning_db`.`who_will_fix` || `admins`.`Signature` = `notifacationwrning_db`.`who_will_fix` ORDER by `notifacationwrning_db`.`id` DESC LIMIT 50");
        return response()->json($if_read_query);
    }
    public function search_by_name_milling(Request $R)
    {
        if($R->words != null)
        return response()->json(DB::table('notifacationwrning_db')->select('if_read','date', 'id_num', 'part_id', 'part_name', 'who_will_fix', 'what_did', 'note')->where('part_name','like','%'.$R->words.'%')->get());
        else
        return response()->json(DB::table('notifacationwrning_db')->select('if_read','date', 'id_num', 'part_id', 'part_name', 'who_will_fix', 'what_did', 'note')->limit(50)->get());
    }
    public function search_by_date_milling(Request $R)
    {
        if($R->words != null)
        return response()->json(DB::table('notifacationwrning_db')->select('if_read','date', 'id_num', 'part_id', 'part_name', 'who_will_fix', 'what_did', 'note')->where('date','like','%'.$R->words.'%')->get());
        else
        return response()->json(DB::table('notifacationwrning_db')->select('if_read','date', 'id_num', 'part_id', 'part_name', 'who_will_fix', 'what_did', 'note')->limit(50)->get());
    }
    public function search_by_code_milling(Request $R)
    {
        if($R->words != null)
        return response()->json(DB::table('notifacationwrning_db')->select('if_read','date', 'id_num', 'part_id', 'part_name', 'who_will_fix', 'what_did', 'note')->where('part_id','like','%'.$R->words.'%')->get());
        else
        return response()->json(DB::table('notifacationwrning_db')->select('if_read','date', 'id_num', 'part_id', 'part_name', 'who_will_fix', 'what_did', 'note')->limit(50)->get());
    }

    public function save_add_new_tools(Request $R)
    {
        DB::table('data_part')->insert([
            'part_id'=>$R->part_id,
            'part_name'=>$R->part_name,
            'type_quantity'=>$R->type_quantity,
            'minimum_quantity'=>$R->minimum_quantity,
            'part_type'=>$R->part_type,
            'part_depart'=>$R->part_depart,
        ]);
        return response()->json(["table"=>DB::table('data_part')->get()]);
    }
    public function get_all_data(){
        return response()->json(["table"=>DB::table('data_part')->get()]);
    }
    public function delete_this_ele(Request $R)
    {
        data_part::find($R->id)->delete();
        return response()->json(["table"=>data_part::get()]);
    }
    public function edit_this_ele(Request $R)
    {
        return response()->json(["row"=>data_part::find($R->id)]);
    }
    public function update_add_new_tools(Request $R)
    {
        data_part::find($R->id)->update([
            'part_id'=>$R->part_id,
            'part_name'=>$R->part_name,
            'type_quantity'=>$R->type_quantity,
            'minimum_quantity'=>$R->minimum_quantity,
            'part_type'=>$R->part_type,
            'part_depart'=>$R->part_depart,
        ]);
        return response()->json(["table"=>data_part::get()]);
    }
    public function live_search_of_qu(Request $R)
    {
        $dat=data_part::where('part_name','like','%'.$R->live_text.'%')->get();
        return response()->json(["table"=>$dat]);
    }
}
