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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use App\Events\who_pay;
use App\Models\data_part;
use App\Models\paper_part;

class noifi_control extends Controller
{
    
    public function __construct()
    {
        $this->middleware('if_login');
    }

    public function get_data_form_in_form(Request $R)
    {
        $data1=DB::table('notifacationwrning_parts')->select('notifacationwrning_id', 'part_name', 'part_unit', 'part_count')->where('notifacationwrning_id',$R->id)->get();
        return response()->json($data1);
    }
    public function get_data_stop_report(Request $R)
    {
        DB::table('notifacationwrning_db')->where('id_num',$R->id)->update(['if_read'=>1]);
        $data1=DB::table($R->tables)->select('id_num', 'date', 'dp_WanteFix', 'controll_boy', 'error_location', 'start_time_error', 'shift_manger', 'department', 'who_will_fix', 'part_name', 'part_id', 'start_date_fix', 'start_time_fix', 'requerd', 'what_did', 'part_use', 'part_count', 'note', 'who_fix', 'name_WanteFix', 'mintanice_manger')->where('id_num',$R->id)->get()[0];
        return response()->json($data1);
    }
    public function get_notifi()
    {
        if(Auth::guard('users')->check()){
            $data=DB::table('all_users_notification_p')->where('recipient',Auth::guard('users')->user()->Signature)->orderBy('id_num', 'DESC')->get();
            return response()->json($data);
        }
        if(Auth::guard('admins')->check())
            return response()->json(DB::table('all_manger_notification')->get());
        if(Auth::guard('top_admins')->check())
            return response()->json(DB::table('all_manger_notification')->get()); 
    }

    
    public function accept_stop_report(Request $R)
    {
        if(Auth::guard('admins')->check())
        {
            DB::table('notifacationwrning_db')->where('id_num',$R->id)->update([
                'note'=>$R->data['note'],
                'what_did'=>$R->data['what_did'],
                'who_fix'=>Auth::guard('admins')->user()->Signature
            ]);
            if(Auth::guard('users')->check()){
                $data=collect([DB::table('all_users_notification')->where('recipient',Auth::guard('users')->user()->Signature)->get(),DB::table('notification_wrining')->where('recipient',Auth::guard('users')->user()->Signature)->get()]);
                return response()->json($data); }
            if(Auth::guard('admins')->check())
                return response()->json(DB::table('all_manger_notification')->get());
            if(Auth::guard('top_admins')->check())
                return response()->json(DB::table('all_manger_notification')->get());
        }else
        if(Auth::guard('users')->check())
        {
            DB::table('notifacationwrning_db')->where('id_num',$R->id)->update([//what_did
                'note'=>$R->data['note'],
                'what_did'=>$R->data['what_did'],
                'who_fix'=>Auth::guard('users')->user()->Signature
            ]);
            if(Auth::guard('users')->check()){
                $data=collect([DB::table('all_users_notification')->where('recipient',Auth::guard('users')->user()->Signature)->get(),DB::table('notification_wrining')->where('recipient',Auth::guard('users')->user()->Signature)->get()]);
                return response()->json($data); }
            if(Auth::guard('admins')->check())
                return response()->json(DB::table('all_manger_notification')->get());
            if(Auth::guard('top_admins')->check())
                return response()->json(DB::table('all_manger_notification')->get());
        }else{
            if(Auth::guard('users')->check()){
                $data=collect([DB::table('all_users_notification')->where('recipient',Auth::guard('users')->user()->Signature)->get(),DB::table('notification_wrining')->where('recipient',Auth::guard('users')->user()->Signature)->get()]);
                return response()->json($data); }
            if(Auth::guard('admins')->check())
                return response()->json(DB::table('all_manger_notification')->get());
            if(Auth::guard('top_admins')->check())
                return response()->json(DB::table('all_manger_notification')->get());
        }
    }



    public function accept_pay_report(Request $R)
    {



        if(Auth::guard('top_admins')->check())
        {
                if($R->tables == 'h_pay_part_db')
                {
                    $dates=DB::table($R->tables)->where('id_num',$R->id)->get()[0];
                    DB::table($R->tables)->where('id_num',$R->id)->update([
                        'recipient_name'=>Auth::guard('top_admins')->user()->Signature??""
                    ]);
                    $dataes=DB::table("b_pay_part_db")->where('title_id',$R->id);
                    foreach($dataes as $key)
                    {
                        paper_part::insert([
                            'id_part'=>$key->part_id,
                            'date'=>$dates->date,
                            'out_quantity'=>$key->part_count,
                            'report_name'=>$dates->my_name,
                            'name_f'=>$key->part_name,
                            'id_report_out'=>$key->id,
                            'recipient'=>Auth::guard('top_admins')->user()->Signature??""
                        ]);
                    }
                }
                if($R->tables == 'h_add_part_db')
                {
                    $dates=DB::table($R->tables)->where('id_num',$R->id)->get()[0];
                    DB::table($R->tables)->where('id_num',$R->id)->update([
                        'recipient_name'=>Auth::guard('top_admins')->user()->Signature??""
                    ]);
                    $dataes=DB::table("b_add_part_db")->where('title_id',$R->id)->get();
                    foreach($dataes as $key)
                    {
                        paper_part::insert([
                            'id_part'=>$key->part_id,
                            'date'=>$dates->date,
                            'income_quantity'=>$key->part_count,
                            'report_name'=>$dates->my_name,
                            'name_f'=>$key->part_name,
                            'id_report_out'=>$key->id,
                            'recipient'=>Auth::guard('top_admins')->user()->Signature??""
                        ]);
                    }
                }
                if($R->tables == 'h_addreturn_report_db')
                {
                    $dates=DB::table($R->tables)->where('id_num',$R->id)->get()[0];
                    DB::table($R->tables)->where('id_num',$R->id)->update([
                        'delivered_name'=>Auth::guard('top_admins')->user()->Signature??""
                    ]);
                    $dataes=DB::table("b_addreturn_report_db")->where('title_id',$R->id)->get();
                    foreach($dataes as $key)
                    {
                        paper_part::insert([
                            'id_part'=>$key->part_id,
                            'date'=>$dates->date,
                            'income_quantity'=>$key->income_balance,
                            'report_name'=>$dates->my_name,
                            'name_f'=>$key->part_name,
                            'id_report_out'=>$key->id,
                            'recipient'=>Auth::guard('top_admins')->user()->Signature??""
                        ]);
                    }
                }
                if($R->tables == 'h_payrequest_report_db')
                {
                    h_payrequest_report::where('id_num',$R->id)->update([
                        'milling_manage'=>Auth::guard('top_admins')->user()->Signature??""
                    ]);
                }
                if($R->tables == 'h_payrequest_normal_report')
                {
                    h_payrequest_normal_report::where('id_num',$R->id)->update([
                        'milling_manage'=>Auth::guard('top_admins')->user()->Signature??""
                    ]);
                }
            
        }
        
        
        
        
        else if(Auth::guard('admins')->check())
        {
            if($R->tables == 'h_pay_part_db')
            {
                $dates=DB::table($R->tables)->where('id_num',$R->id)->get()[0];
                DB::table($R->tables)->where('id_num',$R->id)->update([
                    'recipient_name'=>Auth::guard('admins')->user()->Signature??""
                ]);
                $dataes=DB::table("b_pay_part_db")->where('title_id',$R->id);
                foreach($dataes as $key)
                {
                    paper_part::insert([
                        'id_part'=>$key->part_id,
                        'date'=>$dates->date,
                        'out_quantity'=>$key->part_count,
                        'report_name'=>$dates->my_name,
                        'name_f'=>$key->part_name,
                        'id_report_out'=>$key->id,
                        'recipient'=>Auth::guard('admins')->user()->Signature??""
                    ]);
                }
            }
            if($R->tables == 'h_add_part_db')
            {
                $dates=DB::table($R->tables)->where('id_num',$R->id)->get()[0];
                DB::table($R->tables)->where('id_num',$R->id)->update([
                    'recipient_name'=>Auth::guard('admins')->user()->Signature??""
                ]);
                $dataes=DB::table("b_add_part_db")->where('title_id',$R->id)->get();
                foreach($dataes as $key)
                {
                    paper_part::insert([
                        'id_part'=>$key->part_id,
                        'date'=>$dates->date,
                        'income_quantity'=>$key->part_count,
                        'report_name'=>$dates->my_name,
                        'name_f'=>$key->part_name,
                        'id_report_out'=>$key->id,
                        'recipient'=>Auth::guard('admins')->user()->Signature??""
                    ]);
                }
            }
            if($R->tables == 'h_addreturn_report_db')
            {
                $dates=DB::table($R->tables)->where('id_num',$R->id)->get()[0];
                DB::table($R->tables)->where('id_num',$R->id)->update([
                    'delivered_name'=>Auth::guard('admins')->user()->Signature??""
                ]);
                $dataes=DB::table("b_addreturn_report_db")->where('title_id',$R->id)->get();
                foreach($dataes as $key)
                {
                    paper_part::insert([
                        'id_part'=>$key->part_id,
                        'date'=>$dates->date,
                        'income_quantity'=>$key->income_balance,
                        'report_name'=>$dates->my_name,
                        'name_f'=>$key->part_name,
                        'id_report_out'=>$key->id,
                        'recipient'=>Auth::guard('admins')->user()->Signature??""
                    ]);
                }
            }
            if($R->tables == 'h_payrequest_report_db')
            {
                DB::table($R->tables)->where('id_num',$R->id)->update([
                    'milling_manage'=>Auth::guard('admins')->user()->Signature??""
                ]);
            }
            if($R->tables == 'h_payrequest_normal_report_db')
            {
                DB::table($R->tables)->where('id_num',$R->id)->update([
                    'milling_manage'=>Auth::guard('admins')->user()->Signature??""
                ]);
            }
            
        }
        
        
        
        
        else if(Auth::guard('users')->check())
        {
                if($R->tables == 'h_pay_part_db')// part_id
                {
                    $tru=0;
                    $dataes=DB::table("b_pay_part_db")->where('title_id',$R->id)->get();
                    $dates=DB::table($R->tables)->where('id_num',$R->id)->get()[0];
                    foreach($dataes as $key){
                        $dataes2=DB::table("total_part_balance_cost")->where('part_id',$key->part_id)->select('Balance')->get();
                        foreach($dataes2 as $ky)
                        {
                                if($key->part_count <= $ky->Balance)
                                {   $tru+=1;
                                   paper_part::insert([
                                        'id_part'=>$key->part_id,
                                        'date'=>$dates->date,
                                        'out_quantity'=>$key->part_count,
                                        'report_name'=>$dates->my_name,
                                        'name_f'=>$key->part_name,
                                        'id_report_out'=>$R->id,
                                        'recipient'=>Auth::guard('users')->user()->Signature??""
                                    ]);
                                }
                            
                        }
                    }
                    if($tru == count($dataes))
                    {
                        DB::table($R->tables)->where('id_num',$R->id)->update([
                            'recipient_name'=>Auth::guard('users')->user()->Signature??""
                        ]);
                    }else{
                        return ["stat"=>"Error"];
                    }
                }
                if($R->tables == 'h_add_part_db')
                {
                    $dates=DB::table($R->tables)->where('id_num',$R->id)->get()[0];
                    DB::table($R->tables)->where('id_num',$R->id)->update([
                        'recipient_name'=>Auth::guard('users')->user()->Signature??""
                    ]);
                    $dataes=DB::table("b_add_part_db")->where('title_id',$R->id)->get();
                    foreach($dataes as $key)
                    {
                        paper_part::insert([
                            'id_part'=>$key->part_id,
                            'date'=>$dates->date,
                            'income_quantity'=>$key->part_count,
                            'report_name'=>$dates->my_name,
                            'name_f'=>$key->part_name,
                            'id_report_out'=>$key->id,
                            'recipient'=>Auth::guard('users')->user()->Signature??""
                        ]);
                    }
                }
                if($R->tables == 'h_addreturn_report_db')
                {
                    $dates=DB::table($R->tables)->where('id_num',$R->id)->get()[0];
                    DB::table($R->tables)->where('id_num',$R->id)->update([
                        'delivered_name'=>Auth::guard('users')->user()->Signature??""
                    ]);
                    $dataes=DB::table("b_addreturn_report_db")->where('title_id',$R->id)->get();
                    foreach($dataes as $key)
                    {
                        paper_part::insert([
                            'id_part'=>$key->part_id,
                            'date'=>$dates->date,
                            'income_quantity'=>$key->income_balance,
                            'report_name'=>$dates->my_name,
                            'name_f'=>$key->part_name,
                            'id_report_out'=>$key->id,
                            'recipient'=>Auth::guard('users')->user()->Signature??""
                        ]);
                    }
                }
                if($R->tables == 'h_payrequest_report_db')
                {
                    DB::table($R->tables)->where('id_num',$R->id)->update([
                        'who_want_name'=>Auth::guard('users')->user()->Signature??""
                    ]);
                }
                if($R->tables == 'h_chack_report_db')
                {
                    DB::table($R->tables)->where('id_num',$R->id)->update([
                        'recipient_name'=>Auth::guard('users')->user()->Signature??""
                    ]);
                    
                    for($i = 0 ;$i < count($R->data);$i++)
                    {
                        DB::table('b_chack_report_db')->where('title_id',$R->id)->update([
                            'resuilt_chack'=>$R->data[$i]['resuilt_chack']
                        ]);
                    }
                }
        }


        if(Auth::guard('users')->check()){
            $data=collect([DB::table('all_users_notification')->where('recipient',Auth::guard('users')->user()->Signature)->get(),DB::table('notification_wrining')->where('recipient',Auth::guard('users')->user()->Signature)->get()]);
            return response()->json($data); }
        if(Auth::guard('admins')->check())
            return response()->json(DB::table('all_manger_notification')->get());
        if(Auth::guard('top_admins')->check())
            return response()->json(DB::table('all_manger_notification')->get());
            
            
    }









    public function no_accept_pay_report(Request $R)
    {
        if(Auth::guard('top_admins')->check())
        {
            if($R->tables == 'h_addreturn_report_db')
            {
                DB::table($R->tables)->where('id_num',$R->id)->update([
                    'delivered_name'=>"غير مطابق"
                ]);
            }else{
                DB::table($R->tables)->where('id_num',$R->id)->update([
                    'recipient_name'=>"غير مطابق"
                ]);
            }
        }else
        if(Auth::guard('admins')->check())
        {
            if($R->tables == 'h_addreturn_report_db')
            {
                DB::table($R->tables)->where('id_num',$R->id)->update([
                    'delivered_name'=>"غير مطابق"
                ]);
            }else{
                DB::table($R->tables)->where('id_num',$R->id)->update([
                    'recipient_name'=>"غير مطابق"
                ]);
            }
            if($R->tables == 'h_payrequest_normal_report_db')
            {
                DB::table($R->tables)->where('id_num',$R->id)->update([
                    'milling_manage'=>"لاغي"
                ]);
            }
        }else
        if(Auth::guard('users')->check())
        {
            if($R->tables == 'h_addreturn_report_db')
            {
                DB::table($R->tables)->where('id_num',$R->id)->update([
                    'delivered_name'=>"غير مطابق"
                ]);
            }else if($R->tables == 'h_payrequest_report_db')
            {
                DB::table($R->tables)->where('id_num',$R->id)->update([
                    'who_want_name'=>"غير مطابق"
                ]);
            }else{
                DB::table($R->tables)->where('id_num',$R->id)->update([
                    'recipient_name'=>"غير مطابق"
                ]);
            }
        }
        
        if(Auth::guard('users')->check()){
            $data=collect([DB::table('all_users_notification')->where('recipient',Auth::guard('users')->user()->Signature)->get(),DB::table('notification_wrining')->where('recipient',Auth::guard('users')->user()->Signature)->get()]);
            return response()->json($data); }
        if(Auth::guard('admins')->check())
            return response()->json(DB::table('all_manger_notification')->get());
        if(Auth::guard('top_admins')->check())
            return response()->json(DB::table('all_manger_notification')->get()); 
    }
}