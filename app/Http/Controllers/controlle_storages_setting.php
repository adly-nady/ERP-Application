<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\storage\h_pay_part;
use App\Models\storage\b_pay_part;
use App\Models\storage\h_add_part;
use App\Models\storage\b_add_part;
use App\Models\storage\h_addreturn_report;
use App\Models\storage\b_addreturn_report;
use App\Models\storage\h_chack_report;
use App\Models\storage\b_chack_report;
use App\Models\storage\h_payrequest_report;
use App\Models\storage\b_payrequest_report;
use App\Models\storage\h_payrequest_normal_report;
use App\Models\storage\b_payrequest_normal_report;
use App\Models\User;
use App\Models\Admin;
use App\Models\Top_admins;

class controlle_storages_setting extends Controller
{
    
    public function __construct()
    {
        $this->middleware('if_login');
    }
    
    public function storage_settinng_data(Request $R)
    {
        $ty='';
        $data=DB::table($R->type_of_reports)->where('date',$R->date)->get();

        if($R->type_of_reports == 'h_pay_part_db')
            $ty="butn1";
        if($R->type_of_reports == 'h_add_part_db')
            $ty="butn2";
        if($R->type_of_reports == 'h_addreturn_report_db')
            $ty="butn3";
        if($R->type_of_reports == 'h_chack_report_db')
            $ty="butn4";
        if($R->type_of_reports == 'h_payrequest_report_db')
            $ty="butn5";
        if($R->type_of_reports == 'h_payrequest_normal_report_db')
            $ty="butn6";

        return response()->json(['table'=>$data,'ty'=>$ty]);
    }
    public function get_data_h_b(Request $R)
    {
        $data1=DB::table($R->tables)->where('id_num',$R->id)->get()[0];
        $replaced = Str::replace('h_', 'b_', $R->tables);
        $data2=DB::table($replaced)->where('title_id',$R->id)->get();
        return response()->json(['data_h'=>$data1,'data_table'=>$data2]);
    }
    public function update_pay_report(Request $R)
    {
        $data1=DB::table($R->n_table)->where('id_num',$R->id)->update([
            'shift'=>$R->data_he['shift']??"",
            'oprating_order_id'=>$R->data_he['oprating_order_id']??"",  
            'recipient_name'=>$R->data_he['recipient_name']??"",  
            'department_name'=>$R->data_he['department_name']??"",
        ]);
        
        if($R->data_tables)
        {
                foreach($R->data_tables as $data)
                {
                    b_pay_part::find($data['id'])->update([
                        'part_id'=>$data['part_id'],
                        'part_name'=>$data['part_name'],
                        'part_unit'=>$data['part_unit'],
                        'part_count'=>$data['part_count'],
                        'note'=>$data['note'],
                    ]);
                }
            
        }
            return response()->json("Done!");
    }
    public function update_add_report(Request $R)
    {
        $data1=DB::table($R->n_table)->where('id_num',$R->id)->update([
            'shift'=>$R->data_he['shift']??"",
            'supplayer'=>$R->data_he['supplayer']??"",  
            'chackReport_id'=>$R->data_he['chackReport_id']??"",  
            'incomeOrder_id'=>$R->data_he['incomeOrder_id']??"", 
            'department_name'=>$R->data_he['department_name']??"",
        ]);
        
        if($R->data_tables)
        {
                foreach($R->data_tables as $data)
                {
                    b_add_part::find($data['id'])->update([
                        'part_id'=>$data['part_id'],
                        'part_name'=>$data['part_name'],
                        'part_unit'=>$data['part_unit'],
                        'part_count'=>$data['part_count'],
                        'note'=>$data['note'],
                    ]);
                }
            
        }
            return response()->json("Done!");  
    }
    public function update_addreturn_report(Request $R)
    {
        $data1=DB::table($R->n_table)->where('id_num',$R->id)->update([
            'shift'=>$R->data_he['shift']??"",
            'return_from'=>$R->data_he['return_from']??"",  
            'Cause_of_reflux'=>$R->data_he['Cause_of_reflux']??"",  
            'delivered_name'=>$R->data_he['delivered_name']??"", 
        ]);
        
        if($R->data_tables)
        {
                foreach($R->data_tables as $data)
                {
                    b_addreturn_report::find($data['id'])->update([
                        'part_name'=>$data['part_name'],
                        'part_id'=>$data['part_id'],
                        'part_unit'=>$data['part_unit'],
                        'old_balance'=>$data['old_balance'],
                        'income_balance'=>$data['income_balance'],
                        'balance_after_add'=>$data['balance_after_add'],
                        'note'=>$data['note'],
                    ]);
                }
            
        }
            return response()->json("Done!");  
    }
    public function update_check_report(Request $R)
    {
        $data1=DB::table($R->n_table)->where('id_num',$R->id)->update([
            'supplier'=>$R->data_he['supplier']??"",  
            'recipient'=>$R->data_he['recipient']??"",  
            'date_arrived'=>$R->data_he['date_arrived']??"", 
        ]);
        
        if($R->data_tables)
        {
                foreach($R->data_tables as $data)
                {
                    b_chack_report::find($data['id'])->update([
                        'part_name'=>$data['part_name'],
                        'part_unit'=>$data['part_unit'],
                        'part_count'=>$data['part_count'],
                        'part_discription'=>$data['part_discription'],
                        'resuilt_chack'=>$data['resuilt_chack'],
                        'note'=>$data['note'],
                    ]);
                }
            
        }
            return response()->json("Done!");  
    }
    public function update_ordder_buy_report(Request $R)
    {
        $data1=DB::table($R->n_table)->where('id_num',$R->id)->update([
            'who_want'=>$R->data_he['who_want']??"",  
            'depart'=>$R->data_he['depart']??"",  
            'date'=>$R->data_he['date']??"", 
        ]);
        
        if($R->data_tables)
        {
                foreach($R->data_tables as $data)
                {
                    b_payrequest_report::find($data['id'])->update([
                        'part_name'=>$data['part_name'],
                        'part_quantity'=>$data['part_quantity'],
                        'part_balance'=>$data['part_balance'],
                        'part_quantity_want'=>$data['part_quantity_want'],
                        'part_id'=>$data['part_id'],
                        'note'=>$data['note'],
                    ]);
                }
            
        }
            return response()->json("Done!");  
    }
    public function update_ordder_buy_report1(Request $R)
    {
        $data1=DB::table($R->n_table)->where('id_num',$R->id)->update([
            'who_want'=>$R->data_he['who_want']??"",  
            'depart'=>$R->data_he['depart']??"",  
            'date'=>$R->data_he['date']??"", 
        ]);
        
        if($R->data_tables)
        {
                foreach($R->data_tables as $data)
                {
                    b_payrequest_normal_report::find($data['id'])->update([
                        'part_name'=>$data['part_name'],
                        'part_quantity'=>$data['part_quantity'],
                        'part_balance'=>$data['part_balance'],
                        'part_quantity_want'=>$data['part_quantity_want'],
                        'part_id'=>$data['part_id'],
                        'note'=>$data['note'],
                    ]);
                }
            
        }
            return response()->json("Done!");  
    }
    public function create_dep(Request $R)
    {
        DB::table('department')->insert([
            'dep_name'=>$R->dep_name
        ]);
        return ['items'=>DB::table('department')->get()];
    }
    public function delete_element(Request $R)
    {
        DB::table('department')->where('id',$R->id)->delete();
        return ['items'=>DB::table('department')->get()];
    }
    public function edit_element(Request $R)
    {
        return ['items'=>DB::table('department')->where('id',$R->id)->get()[0]->dep_name];
    }
    public function update_element(Request $R)
    {
        DB::table('department')->where('id',$R->id)->update(['dep_name'=>$R->dep_name]);
        return ['items'=>DB::table('department')->get()];
    }
    public function delet_dp(Request $R)
    {
        DB::table($R->tables)->where('id_num',$R->id)->delete();
        return response()->json(DB::table($R->tables)->get());
    }
    public function get_users_of_der(Request $R)
    {
        $data=User::where('Signature',$R->seg)->get()[0] ?? Admin::where('Signature',$R->seg)->get()[0] ?? Top_admins::where('Signature',$R->seg)->get()[0];
        return response()->json($data);
    }
}