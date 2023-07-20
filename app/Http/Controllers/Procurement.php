<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;//no_price_part
use Illuminate\Support\Facades\DB;
use App\Models\no_price_part;
use Illuminate\Support\Facades\Mail;
use App\Mail\tester_send;

class Procurement extends Controller
{
    public function sender_(){
        Mail::to("kokop812@gmail.com")->send(new tester_send());
    }
    public function get_all_qup_need_order_buy(Request $R)
    {
        $query=DB::select("SELECT * FROM `notif_minimam`");
        $count_notifi=collect($query)->count();
        return ["data"=>$query,"counts"=>$count_notifi];
    }
    public function search_by_name_buy_two(Request $R)
    {
        return response()->json(DB::table('general_report')->select('date', 'part_id', 'part_name', 'department_name', 'part_unit', 'part_count', 'price', 'Cost', 'storage_manger', 'my_name', 'recipient_name')->where('part_name','like','%'.$R->words.'%')->get());
    }
    public function search_by_date_buy_two(Request $R)
    {
        return response()->json(DB::table('general_report')->select('date', 'part_id', 'part_name', 'department_name', 'part_unit', 'part_count', 'price', 'Cost', 'storage_manger', 'my_name', 'recipient_name')->where('date','like','%'.$R->words.'%')->get());
    }
    public function search_by_code_buy_two(Request $R)
    {
        return response()->json(DB::table('general_report')->select('date', 'part_id', 'part_name', 'department_name', 'part_unit', 'part_count', 'price', 'Cost', 'storage_manger', 'my_name', 'recipient_name')->where('part_id','like','%'.$R->words.'%')->get());
    }
    public function search_by_type_report_buy_two(Request $R)
    {
        return response()->json(DB::table('general_report')->select('date', 'part_id', 'part_name', 'department_name', 'part_unit', 'part_count', 'price', 'Cost', 'storage_manger', 'my_name', 'recipient_name')->where('my_name','like','%'.$R->words.'%')->get());
    }
    public function search_by_menager_storage_buy_two(Request $R)
    {
        return response()->json(DB::table('general_report')->select('date', 'part_id', 'part_name', 'department_name', 'part_unit', 'part_count', 'price', 'Cost', 'storage_manger', 'my_name', 'recipient_name')->where('storage_manger','like','%'.$R->words.'%')->get());
    }
    public function search_by_recipted_report_buy_two(Request $R)
    {
        return response()->json(DB::table('general_report')->select('date', 'part_id', 'part_name', 'department_name', 'part_unit', 'part_count', 'price', 'Cost', 'storage_manger', 'my_name', 'recipient_name')->where('recipient_name','like','%'.$R->words.'%')->get());
    }
    public function search_by_name_of_department_buy_two(Request $R)
    {
        return response()->json(DB::table('general_report')->select('date', 'part_id', 'part_name', 'department_name', 'part_unit', 'part_count', 'price', 'Cost', 'storage_manger', 'my_name', 'recipient_name')->where('department_name','like','%'.$R->words.'%')->get());
    }
    public function get_data_ge_report(Request $R)
    {
        return response()->json(DB::table('general_report')->select('date', 'part_id', 'part_name', 'department_name', 'part_unit', 'part_count', 'price', 'Cost', 'storage_manger', 'my_name', 'recipient_name')->get());
    }
    public function search_by_name_buy_two2(Request $R)
    {
        $query=DB::table('total_part_balance_cost')->select('id', 'part_id', 'Name', 'Balance', 'price', 'Cost')->where('Name','like','%'.$R->words.'%')->get();
        $total_price=collect($query)->sum('Cost');
        return response()->json(["data"=>$query,"totals"=>$total_price]);
    }
    public function search_by_code_buy_two2(Request $R)
    {
        $query=DB::table('total_part_balance_cost')->select('id', 'part_id', 'Name', 'Balance', 'price', 'Cost')->where('part_id','like','%'.$R->words.'%')->get();
        $total_price=collect($query)->sum('Cost');
        return response()->json(["data"=>$query,"totals"=>$total_price]);
    }
    public function get_data_ge_report2(Request $R)
    {
        $query=DB::table('total_part_balance_cost')->select('id', 'part_id', 'Name', 'Balance', 'price', 'Cost')->get();
        $total_price=collect(DB::table('total_part_balance_cost')->select('Cost')->get('Cost'))->sum('Cost');
        return response()->json(["data"=>$query,"totals"=>$total_price]);
    }
    public function get_data_buy_sec(Request $R)
    {
        return response()->json(no_price_part::select('id','date','recipient','price','income_quantity','id_part','name_f')->get());
    }
    public function search_by_name_buy(Request $R)
    {
        $data=no_price_part::select('id','date','recipient','price','income_quantity','id_part','name_f')->where('name_f','like','%'.$R->words.'%')->get();
        return response()->json($data);
    }
    public function search_by_date_buy(Request $R)
    {
        $data=no_price_part::select('id','date','recipient','price','income_quantity','id_part','name_f')->where('date','like','%'.$R->date.'%')->get();
        return response()->json($data);
    }
    public function search_by_code_buy(Request $R)
    {
        $data=no_price_part::select('id','date','recipient','price','income_quantity','id_part','name_f')->where('id_part','like','%'.$R->code.'%')->get();
        return response()->json($data);
    }
    public function save_now_change_buy(Request $R)
    {
        no_price_part::find($R->id)->update([
            'date'=>$R->date,
            'recipient'=>$R->recipient,
            'price'=>$R->price,
            'income_quantity'=>$R->income_quantity,
            'id_part'=>$R->id_part,
            'name_f'=>$R->name_f
        ]);
        return response()->json(no_price_part::select('id','date','recipient','price','income_quantity','id_part','name_f')->get());
    }
}