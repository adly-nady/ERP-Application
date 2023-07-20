<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\total_balance_part;
use App\Models\storage\h_pay_part;
use App\Models\storage\b_pay_part;
use App\Models\storage\h_add_part;
use App\Models\storage\b_add_part;
use App\Models\data_part;
use App\Models\paper_part;
use App\Models\storage\h_addreturn_report;
use App\Models\storage\b_addreturn_report;
use App\Models\storage\h_chack_report;
use App\Models\storage\b_chack_report;
use App\Models\storage\h_payrequest_report;
use App\Models\storage\b_payrequest_report;
use App\Models\storage\h_payrequest_normal_report;
use App\Models\storage\b_payrequest_normal_report;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use App\Events\who_pay;
use Illuminate\Support\Facades\DB;

class storage_control extends Controller
{

    public function __construct()
    {
        $this->middleware('if_login');
    }

    // _____________________________________________________________Pay Parts Report ________________________________________________

    public function save_pay_parts(Request $R)
    {
        $validator = Validator::make($R->all(), [
            'data_h_f.shift' => 'required',
            'data_h_f.date' => 'required',
            'data_h_f.sec'=>'required',
        ],[
            'data_h_f.shift.required'=>__('Enter signing the shift!'),
            'data_h_f.sec.required'=>__('Enter the department'),
            'data_h_f.date.required'=>__("Enter the date"),
        ]);
        if(!$validator->fails()){
            $hs_erorr="";

            
            $insert_opction=new h_pay_part;
            $insert_opction->date=$R->data_h_f['date']??"";
            $insert_opction->shift=$R->data_h_f['shift']??"";
            $insert_opction->couses=$R->data_h_f['rec_name']??"";
            $insert_opction->id_num=$R->data_h_f['id_num']??"";
            $insert_opction->department_name=Db::table('department')->find($R->data_h_f['sec'])->dep_name??"";
            $insert_opction->oprating_order_id=$R->data_h_f['num_of_tools']??"";
            if(Auth::guard('top_admins')->check())
                $insert_opction->storage_manger=Auth::guard('top_admins')->user()->Signature??"";
            if(Auth::guard('admins')->check())
                $insert_opction->storage_manger=Auth::guard('admins')->user()->Signature??"";
            if(Auth::guard('users')->check())
                $insert_opction->storage_manger=Auth::guard('users')->user()->Signature??"";
            $insert_opction->save();
            
            if($R->data_b)
            {

                for($i = 0 ;$i < count($R->data_b);$i++)
                {
                    $dataes2=DB::table("total_part_balance_cost")->where('part_id',$R->data_b[$i]['part_id'])->select('Balance')->get();

                    if($dataes2[0]->Balance >= $R->data_b[$i]['part_count']){

                        b_pay_part::insert([
                            "part_id"=>$R->data_b[$i]['part_id']??"",
                            "part_name"=>$R->data_b[$i]['Name']??"",
                            "part_unit"=>$R->data_b[$i]['part_unit']??"",
                            "part_count"=>$R->data_b[$i]['part_count']??"",
                            "note"=>$R->data_b[$i]['notes']??"",
                            "title_id"=>$R->data_h_f['id_num'],
                        ]);

                    }else{
                         h_pay_part::find($insert_opction->id)->delete();
                        return response()->json(['new_id'=>$R->data_h_f['id_num'],"stat"=>"error"]);
                    }
                }

                
                return response()->json(['new_id'=>1+$insert_opction->id_num,"stat"=>"normal"]);

            }else{
                return response()->json(['new_id'=>$R->data_h_f['id_num'],"stat"=>"error"]);
            }
            
        }else{
            return response()->json([
                "errors"=>[$validator->errors()->first('data_h_f.shift'),
                $validator->errors()->first('data_h_f.date'),
                $validator->errors()->first('data_h_f.sec')]
            ]);
        }
    }



    // _____________________________________________________________Add Parts Report ________________________________________________save_return_add

    public function save_add_part(Request $R)
    {
        $validator = Validator::make($R->all(), [
            'data_h_f.shift' => 'required',
            'data_h_f.date' => 'required',
            'data_h_f.supplayer' => 'required',
            'data_h_f.sec'=>'required',
        ],[
            'data_h_f.shift.required'=>__('Enter signing the shift!'),
            'data_h_f.sec.required'=>__('Enter the department'),
            'data_h_f.date.required'=>__("Enter the date"),
            'data_h_f.supplayer.required'=>__("Enter the supplayer"),
        ]);
        if(!$validator->fails()){
            $insert_opction=new h_add_part;
            $insert_opction->date=$R->data_h_f['date'];
            $insert_opction->shift=$R->data_h_f['shift'];
            $insert_opction->supplayer=$R->data_h_f['supplayer'];
            $insert_opction->id_num=$R->data_h_f['id_num'];
            $insert_opction->chackReport_id=$R->data_h_f['chack_id'];
            $insert_opction->incomeOrder_id=$R->data_h_f['income_id'];
            $insert_opction->department_name=Db::table('department')->find($R->data_h_f['sec'])->dep_name??"";
            if(Auth::guard('top_admins')->check())
                $insert_opction->storage_manger=Auth::guard('top_admins')->user()->Signature??"";
            if(Auth::guard('admins')->check())
                $insert_opction->storage_manger=Auth::guard('admins')->user()->Signature??"";
            if(Auth::guard('users')->check())
                $insert_opction->storage_manger=Auth::guard('users')->user()->Signature??"";
            $insert_opction->save();
            if($R->data)
            {
                for($i = 0 ;$i < count($R->data);$i++)
                {
                    b_add_part::insert([
                        "part_id"=>$R->data[$i]['part_id']??"",
                        "part_name"=>$R->data[$i]['Name']??"",
                        "part_unit"=>$R->data[$i]['part_unit']??"",
                        "part_count"=>$R->data[$i]['part_count']??"",
                        "note"=>$R->data[$i]['notes']??"",
                        "title_id"=>$R->data_h_f['id_num'],
                    ]);
                    paper_part::insert([
                        "id_part"=>$R->data[$i]['part_id']??"",
                        "date"=>$R->data_h_f['date']??"",
                        "income_quantity"=>$R->data[$i]['part_count']??"",
                        "id_report_income"=>$insert_opction->id??"",
                        "recipient"=>$insert_opction->storage_manger??"",
                        "report_name"=>h_add_part::find($insert_opction->id)->my_name??"",
                        "name_f"=>$R->data[$i]['Name']??"",
                    ]);
                }
                //broadcast(new who_pay())->toOthers();
                $datt=DB::table('total_part_balance_p')->limit(50)->get();
                return response()->json(['new_id'=>1+$insert_opction->id_num,'table_data'=>$datt]);
            }
        }else{
            return response()->json(['new_id'=>$insert_opction->id_num,
                "errors"=>[$validator->errors()->first('data_h_f.shift'),
                $validator->errors()->first('data_h_f.date'),
                $validator->errors()->first('data_h_f.sec'),
                $validator->errors()->first('data_h_f.supplayer')]
            ]);
        }
    }




    // _____________________________________________________________return Add Parts Report ________________________________________________

    public function save_return_add(Request $R)
    {
        $validator = Validator::make($R->all(), [
            'data.shift' => 'required',
            'data.date' => 'required',
        ],[
            'data.shift.required'=>__('Enter signing the shift!'),
            'data.date.required'=>__("Enter the date"),
        ]);
        if(!$validator->fails()){

            $insert_opction=new h_addreturn_report;
            $insert_opction->date=$R->data['date'];
            $insert_opction->shift=$R->data['shift'];
            $insert_opction->Cause_of_reflux=$R->data['Cause_of_reflux'];
            $insert_opction->id_num=$R->data['id_num'];
            $insert_opction->payed_befor=DB::table('department')->find($R->data['Previous_exchange_for_t'])->dep_name??"";
            $insert_opction->return_from=$R->data['returned_from'];
            //$insert_opction->department_name=DB::table('department')->find($R->data['sec'])->dep_name??"";
            if(Auth::guard('top_admins')->check())
            $insert_opction->storage_manage=Auth::guard('top_admins')->user()->Signature??"";
        if(Auth::guard('admins')->check())
            $insert_opction->storage_manage=Auth::guard('admins')->user()->Signature??"";
        if(Auth::guard('users')->check())
            $insert_opction->storage_manage=Auth::guard('users')->user()->Signature??"";
            $insert_opction->save();
            if($R->data_b)
            {
                for($i = 0 ;$i < count($R->data_b);$i++)
                {
                    b_addreturn_report::insert([
                        "part_id"=>$R->data_b[$i]['part_id']??"",
                        "part_name"=>$R->data_b[$i]['Name']??"",
                        "part_unit"=>$R->data_b[$i]['part_unit']??"",
                        "income_balance"=>$R->data_b[$i]['part_count']??"",
                        "note"=>$R->data_b[$i]['note']??"",
                        "title_id"=>$R->data['id_num'],
                    ]);
                }
                return response()->json(['new_id'=>1+$insert_opction->id_num]);
            }
        }else{
            return response()->json(["errors"=>[$validator->errors()->first('data.shift'),$validator->errors()->first('data.date')]]);
        }
    }




    // _____________________________________________________________Chack Parts Report ________________________________________________

    public function save_Chack_Report(Request $R)
    {
        $validator = Validator::make($R->all(), [
            'data_h_f.supplairs' => 'required',
            'data_h_f.date' => 'required',
        ],[
            'data_h_f.supplairs.required'=>__('Enter signing the supplairs!'),
            'data_h_f.date.required'=>__("Enter the date"),
        ]);
        if(!$validator->fails()){
            $insert_opction=new h_chack_report;
            $insert_opction->date=$R->data_h_f['date'];
            $insert_opction->recipient=$R->data_h_f['supplairs'];
            $insert_opction->id_num=$R->data_h_f['id_num'];
            $insert_opction->department=Db::table('department')->find($R->data_h_f['department'])->dep_name;
            $insert_opction->date_arrived=$R->data_h_f['date_income'];
            if(Auth::guard('top_admins')->check())
                $insert_opction->storage_manage=Auth::guard('top_admins')->user()->Signature??"";
            if(Auth::guard('admins')->check())
                $insert_opction->storage_manage=Auth::guard('admins')->user()->Signature??"";
            if(Auth::guard('users')->check())
                $insert_opction->storage_manage=Auth::guard('users')->user()->Signature??"";
            $insert_opction->save();
            if($R->data_b)
            {
                for($i = 0 ;$i < count($R->data_b);$i++)
                {
                    b_chack_report::insert([
                        "part_name"=>$R->data_b[$i]['Name']??"",
                        "part_unit"=>$R->data_b[$i]['part_unit']??"",
                        "part_count"=>$R->data_b[$i]['part_count']??"",
                        "part_discription"=>$R->data_b[$i]['description']??"",
                        "resuilt_chack"=>$R->data_b[$i]['resuilt_chack']??"",
                        "note"=>$R->data_b[$i]['notes']??"",
                        "title_id"=>$R->data_h_f['id_num'],
                    ]);
                }
                //broadcast(new who_pay())->toOthers();
                return response()->json(['new_id'=>1+$insert_opction->id_num]);
            }
        }else{
            return response()->json(['new_id'=>$R->data_h_f['id_num'],
                "errors"=>[$validator->errors()->first('supplairs'),
                $validator->errors()->first('date'),]
                //$validator->errors()->first('sec'),
            ]);
        }
    }

    




    // _____________________________________________________________order buy Parts Report ________________________________________________

    public function save_order_pay(Request $R)
    {
        $validator = Validator::make($R->all(), [
            'hadr_foter.date' => 'required',
            'hadr_foter.depart'=>'required',
        ],[
            'hadr_foter.depart.required'=>__('Enter the department'),
            'hadr_foter.date.required'=>__("Enter the date"),
        ]);
        if(!$validator->fails()){
            $insert_opction=new h_payrequest_report;
            $insert_opction->date=$R->hadr_foter['date'];
            $insert_opction->who_want=$R->hadr_foter['who_want'];
            $insert_opction->id_num=$R->hadr_foter['id_num'];
            $insert_opction->depart=Db::table('department')->find($R->hadr_foter['depart'])->dep_name;
            if(Auth::guard('top_admins')->check())
                $insert_opction->storag_manage=Auth::guard('top_admins')->user()->Signature??"";
            if(Auth::guard('admins')->check())
                $insert_opction->storag_manage=Auth::guard('admins')->user()->Signature??"";
            if(Auth::guard('users')->check())
                $insert_opction->storag_manage=Auth::guard('users')->user()->Signature??"";
            $insert_opction->save();
            if($R->data_b)
            {
                for($i = 0 ;$i < count($R->data_b);$i++)
                {
                    b_payrequest_report::insert([
                        "part_name"=>$R->data_b[$i]['Name']??"",
                        "part_quantity"=>$R->data_b[$i]['part_count']??"",
                        "part_balance"=>$R->data_b[$i]['Balance']??"",
                        "part_id"=>$R->data_b[$i]['part_id']??"",
                        "note"=>$R->data_b[$i]['notes']??"",
                        "title_id"=>$R->hadr_foter['id_num'],
                    ]);
                }
                //broadcast(new who_pay())->toOthers();
                return response()->json(['new_id'=>1+$insert_opction->id_num]);
            }
        }else{
            return response()->json(['new_id'=>1+$R->hadr_foter['id_num'],
                "errors"=>[$validator->errors()->first('hadr_foter.depart'),
                $validator->errors()->first('hadr_foter.date'),]
                //$validator->errors()->first('sec'),
            ]);
        }
    }

    




    // _____________________________________________________________order buy Parts Report2 ________________________________________________

    public function save_order_pay2(Request $R)
    {
        $validator = Validator::make($R->all(), [
            'hadr_foter.date' => 'required',
        ],[
            'hadr_foter.date.required'=>__("Enter the date"),
        ]);
        if(!$validator->fails()){
            $insert_opction=new h_payrequest_normal_report;
            $insert_opction->date=$R->hadr_foter['date'];
            $insert_opction->id_num=$R->hadr_foter['id_num'];
            if(Auth::guard('top_admins')->check())
                $insert_opction->storag_manage=Auth::guard('top_admins')->user()->Signature??"";
            if(Auth::guard('admins')->check())
                $insert_opction->storag_manage=Auth::guard('admins')->user()->Signature??"";
            if(Auth::guard('users')->check())
                $insert_opction->storag_manage=Auth::guard('users')->user()->Signature??"";
            $insert_opction->save();
            if($R->data_b)
            {
                for($i = 0 ;$i < count($R->data_b);$i++)
                {
                    b_payrequest_normal_report::insert([
                        "part_name"=>$R->data_b[$i]['Name']??"",
                        "part_quantity"=>$R->data_b[$i]['part_count']??"",
                        "part_balance"=>$R->data_b[$i]['Balance']??"",
                        "part_id"=>$R->data_b[$i]['part_id']??"",
                        "note"=>$R->data_b[$i]['notes']??"",
                        "title_id"=>$R->hadr_foter['id_num'],
                    ]);
                }
                //broadcast(new who_pay())->toOthers();
                return response()->json(['new_id'=>1+$insert_opction->id_num]);
            }
        }else{
            return response()->json(['new_id'=>$R->hadr_foter['id_num'],
                "errors"=>[$validator->errors()->first('depart'),
                $validator->errors()->first('hadr_foter.date'),]
                //$validator->errors()->first('sec'),
            ]);
        }
    }
    public function get_users_of_dpart(Request $R)
    {
        return response()->json(DB::table('users_a')->where('dep_id',$R->id)->get());
    }
    public function get_list_depe(Request $R)
    {   
        return response()->json(data_part::get());
    }
    public function get_all_equp(Request $R)
    {
            $data= DB::table("total_part_balance_p")->limit(50)->get();
        
        return response()->json($data);
    }
    public function live_search_storage_name(Request $R)
    {
        $data;
        if($R->search_storage != null)
        {
            $data=DB::table('total_part_balance_p')->where('Name','like','%'.$R->search_storage.'%')->get();
        }else{
            $data= DB::table("total_part_balance_p")->limit(50)->get();
        }
        return response()->json($data);
    }
    public function live_search_storage_code(Request $R)
    {
        $data;
        if($R->search_storage != null)
        {
            $data=DB::table('total_part_balance_p')->where('part_id','like','%'.$R->search_storage.'%')->get();
        }else{
            $data= DB::table("total_part_balance_p")->limit(50)->get();
        }
        return response()->json($data);
    }
}
//DB::select("SELECT SUM(`income_quantity`)-SUM(`out_quantity`) AS 'Balance' FROM `paper_part` GROUP by `id_part`");