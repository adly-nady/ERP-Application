<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Top_admins;
use App\Models\User;
use App\Models\Admin;
use App\Models\milling_equipment;
use App\Models\send_mail;
use App\Models\Maintenance_db;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\day_data_operating_milling;
use App\Models\data_operating_milling;
use App\Models\mill_data;
use App\Models\equ_model;
use App\Models\day_data_opeating_milling;
use Illuminate\Support\Facades\DB;
use App\Models\data_between_relation;
use Illuminate\Support\Facades\Mail;
use App\Mail\sender;

class milling_operation extends Controller
{
    
    public function __construct()
    {
        $this->middleware('if_login');
    }



    public function send_mail_for_all()
    {
        foreach(DB::select("SELECT * FROM `sender` ORDER BY `sender`.`id` ASC") as $key)
        {
            Mail::to($key->email)->send(new sender('test',"koe"));
        }
    }


    public function get_all_mails(){
        return response()->json(DB::table('sender')->get());
    }

    public function send_mails(Request $R)
    {
        foreach($R->data as $key){
            Mail::to($key['email'])->send(new sender('test',"koe"));
        }
    }

    public function update_in_milling(Request $R)
    {
        day_data_opeating_milling::where('id_num',$R->now_table_heade['id_num'])->update([
            'id_num'=>$R->now_table_heade['id_num']??"",
            'Day_Name'=>$R->now_table_heade['Day_Name']??"",
            'Date'=>$R->now_table_heade['Date']??"",
        ]);
        $datas=data_operating_milling::where([['shift',$R->now_table[0]['shift']],['date',$R->now_table_heade['Date']]])->get();
        for($i=0;$i<count($R->now_table);$i++)
        {
            
                $d1 = new \DateTime($R->now_table[$i]['time_stop']);
                $d2 = new \DateTime($R->now_table[$i]['time_start']);
                $interval = $d1->diff($d2);
                $diffInSeconds = $interval->s;
                $diffInHours   = $interval->h;
                $diffInMinutes  = $interval->i;
                $timess=$diffInHours.":".$diffInMinutes.":".$diffInSeconds;
            data_operating_milling::find($datas[$i]['id'])->update([
                'id_num'=>$R->now_table_heade['id_num']??"",
                'shift'=>$R->now_table[0]['shift']??"",
                'line'=>$R->now_table[$i]['line']??"",
                'time_start'=>$R->now_table[$i]['time_start']??"",
                'time_stop'=>$R->now_table[$i]['time_stop']??"",
                'reason'=>$R->now_table[$i]['reason']??"",
                'error_type'=>$R->now_table[$i]['error_type']??"",
                'error_time'=>$timess??"",
                'power_a'=>$R->now_table[$i]['power_a']??0,
                'power_b'=>$R->now_table[$i]['power_b']??0,
                'extactiob_ratio_a'=>null,
                'extactiob_ratio_b'=>null,
                'date'=>$R->now_table_heade['Date'],
            ]);
        }
        data_between_relation::where([['shift',$R->now_table[0]['shift']],['id_num',$R->now_table_heade['id_num']]])->update([
                'id_num'=>$R->now_table_heade['id_num'],
                'shift'=>$R->now_table[0]['shift'],
                'total_wheal_a'=>$R->now_table_footer['total_wheal_a']??0,
                'total_wheal_b'=>$R->now_table_footer['total_wheal_b']??0,
                'total_Flour_a'=>$R->now_table_footer['total_Flour_a']??0,
                'total_Flour_b'=>$R->now_table_footer['total_Flour_b']??0,
                'total_sien_a'=>$R->now_table_footer['total_sien_a']??0,
                'total_sien_b'=>$R->now_table_footer['total_sien_b']??0,
                'total_apostasy_a'=>$R->now_table_footer['total_apostasy_a']??0,
                'total_apostasy_b'=>$R->now_table_footer['total_apostasy_b']??0,
                'ratio_A'=>$R->now_table_footer['ratio_A']??0,
                'ratio_B'=>$R->now_table_footer['ratio_B']??0,
                'shift_manager'=>$R->now_table_footer['shift_manager'],
                'controll_manager'=>$R->now_table_footer['controll_manager'],
            ]);

    }
    public function get_data_report_for_edit(Request $R)
    {
        $data1=data_operating_milling::where([['shift',$R->shift],['date',$R->date]])->get();
        $data2=data_between_relation::where([['shift',$R->shift],['id_num',$data1[0]->id_num]])->get()[0];
        $data3=day_data_opeating_milling::where([['Date',$R->date],['id_num',$data1[0]->id_num]])->get()[0];
        $all_data=collect([$data1,$data2,$data3]);
        return response()->json(['body'=>$data1,'footer'=>$data2,'heade'=>$data3]);
    }

    public function git_id_milling(){
        $inum=collect(day_data_opeating_milling::select('id_num')->get()[0]??0)->max();
        $id=(int)$inum??0;
        return response()->json($id+1);
    }


    
    public function add_in_milling(Request $R)
    {
        $data=json_decode($R->text_add);
        $validator = Validator::make($R->all(), [
            'control_manager' => 'required',
            'day'=>'required',
            'date'=>'required|date',
            'shift'=>'required',
        ],[
            'shift_manager.required'=>__('message.Enter signing the manager shift!'),
            'control_manager.required'=>__("message.Enter signing the manager control!"),
            'day.required'=>__('message.Enter the day name'),
            'date.required'=>__("message.Enter the date"),
            'date.unique'=>__("message.the date is already exist"),
            'shift.required'=>__("message.Enter The shift"),
        ]);
        if(!$validator->fails()){
            if($R->shift == "الوردية الاولي"){
                day_data_opeating_milling::insert([
                    'id_num'=>$R->numid,
                    'Day_Name'=>$R->day,
                    'Date'=>$R->date,
                    'total_houer_operating_a'=>0,
                    'Total_Houer_Stop_A'=>0,
                    'Extraction_Ratio_A'=>0,
                    'Total_Houer_Operating_B'=>0,
                    'Total_Houer_Stop_B'=>0,
                    'Extraction_Ratio_B'=>0,
                    'Wheat_Quantity_A'=>0,
                    'Floor_Quantity_A'=>0,
                    'Amount_Quantity_A'=>0,
                    'Elsen_Quantity_A'=>0,
                    'Wheat_Quantity_B'=>0,
                    'Floor_Quantity_B'=>0,
                    'Amount_Quantity_B'=>0,
                    'Elsen_Quantity_B'=>0,
                    'the_path_report'=>0
                ]);
            }
            for($v=0;$v< count($R->line_start);$v++)
            {
                data_operating_milling::insert([
                    'id_num'=>$R->numid??"",
                    'shift'=>$R->shift??"",
                    'line'=>$R->line_start[$v]??"",
                    'time_start'=>$R->time_start[$v]??"",
                    'time_stop'=>$R->time_stop[$v]??"",
                    'reason'=>$R->cause_stop[$v]??"",
                    'error_type'=>$R->type_error[$v]??"",
                    'error_time'=>$R->the_stop_time[$v]??"",
                    'power_a'=>$R->A[$v]??0,
                    'power_b'=>$R->B[$v]??0,
                    'extactiob_ratio_a'=>null,
                    'extactiob_ratio_b'=>null,
                    'date'=>$R->date,
                ]);
            }
                data_between_relation::insert([
                    'id_num'=>$R->numid,
                    'shift'=>$R->shift,
                    'total_wheal_a'=>$R->ZA[0]??0,
                    'total_wheal_b'=>$R->ZB[0]??0,
                    'total_Flour_a'=>$R->ZA[1]??0,
                    'total_Flour_b'=>$R->ZB[1]??0,
                    'total_sien_a'=>$R->ZA[2]??0,
                    'total_sien_b'=>$R->ZB[2]??0,
                    'total_apostasy_a'=>$R->ZA[3]??0,
                    'total_apostasy_b'=>$R->ZB[3]??0,
                    'ratio_A'=>$R->totalA??0,
                    'ratio_B'=>$R->totalB??0,
                    'shift_manager'=>$R->shift_manager,
                    'controll_manager'=>$R->control_manager,
                ]);
                if($R->shift == "الوردية الثالثة")
                {
                    $sum_data=DB::select("SELECT SUM(`total_wheal_a`) AS 'total_wheal_a' , SUM(`total_Flour_a`) AS 'total_Flour_a' , SUM(`total_sien_a`) AS 'total_sien_a' ,SUM(`total_apostasy_a`) AS 'total_apostasy_a' , SUM(`ratio_A`) AS 'ratio_A' FROM `data_between_relation` WHERE `id_num` = ".$R->numid)[0];
                    $sum_data2=DB::select("SELECT SUM(`total_wheal_b`) AS 'total_wheal_b' , SUM(`total_Flour_b`) AS 'total_Flour_b' , SUM(`total_sien_b`) AS 'total_sien_b' ,SUM(`total_apostasy_b`) AS 'total_apostasy_b' , SUM(`ratio_B`) AS 'ratio_B' FROM `data_between_relation` WHERE `id_num` = ".$R->numid)[0];        
                    $data_A_sum=DB::table('milling_start_stop')->where([['date',$R->date],['line','A']])->first();
                    $data_B_sum=DB::table('milling_start_stop')->where([['date',$R->date],['line','B']])->first();
                    
                        day_data_operating_milling::where('id_num',$R->numid)->update([
                            'total_houer_operating_a'=>$data_A_sum->Work_Time??"",
                            'Total_Houer_Stop_A'=>$data_A_sum->Stop_Time_Work??"",
                            'Total_Houer_Operating_B'=>$data_B_sum->Work_Time??"",
                            'Total_Houer_Stop_B'=>$data_B_sum->Stop_Time_Work??"",
                            'Extraction_Ratio_A'=>$sum_data->ratio_A/3??"",
                            'Extraction_Ratio_B'=>$sum_data2->ratio_B/3??"",
                            'Wheat_Quantity_A'=>$sum_data->total_wheal_a??"",
                            'Floor_Quantity_A'=>$sum_data->total_Flour_a??"",
                            'Amount_Quantity_A'=>$sum_data->total_apostasy_a??"",
                            'Elsen_Quantity_A'=>$sum_data->total_sien_a??"",
                            'Wheat_Quantity_B'=>$sum_data2->total_wheal_b??"",
                            'Floor_Quantity_B'=>$sum_data2->total_Flour_b??"",
                            'Amount_Quantity_B'=>$sum_data2->total_apostasy_b??"",
                            'Elsen_Quantity_B'=>$sum_data2->total_sien_b??"",
                        ]);
                        return response()->json($R->numid+1);
                }
                return response()->json($R->numid);
        }else{
            return response()->json([
                'errors'=>$validator->errors(),
            ]);
        }
    }



    public function give_me_this_report(Request $R){
        //$RE=json_decode($R->params);
        $body='';
        $body0='';
        $body00='';

        $end_re1='';
        $end_re2='';

        $end_table_re='';
        
        $divs=day_data_operating_milling::where('Date',$R->get_number_report)->get()[0];

        $data_1=data_between_relation::where([['id_num',$divs->id_num],['shift','الوردية الاولي']])->get();
        $data_2=data_between_relation::where([['id_num',$divs->id_num],['shift','الوردية الثانية']])->get();
        $data_3=data_between_relation::where([['id_num',$divs->id_num],['shift','الوردية الثالثة']])->get();

        $shift_1=data_operating_milling::where([['id_num',$divs->id_num],['shift','الوردية الاولي']])->get();
        $shift_2=data_operating_milling::where([['id_num',$divs->id_num],['shift','الوردية الثانية']])->get();
        $shift_3=data_operating_milling::where([['id_num',$divs->id_num],['shift','الوردية الثالثة']])->get();

        $lengths_1=collect($shift_1)->count();
        $lengths_2=collect($shift_2)->count();
        $lengths_3=collect($shift_3)->count();






        // -------------------------- shift 1 ---------------------------


        for($x=0;$x<$lengths_1;$x++){
            if($x == 0){
                $body.='
                <tr class="tr_class">
                  <td class="td_class editoers sh_1_line_1_line_b" name="power_b_1_0"> '.$shift_1[0]->power_b.' </td>
                  <td class="td_class editoers sh_1_line_1_line_a" name="power_a_1_0"> '.$shift_1[0]->power_a.' </td>
                  <td class="td_class editoers sh_1_line_1_line_time" name="error_time_1_0"> '.$shift_1[0]->error_time.' </td>
                  <td class="td_class editoers sh_1_line_1_line_type" name="error_type_1_0"> '.$shift_1[0]->error_type.' </td>
                  <td colspan="2" class="td_class editoers sh_1_line_1_line_reason" name="reason_1_0"> '.$shift_1[0]->reason.' </td>
                  <td class="td_class editoers sh_1_line_1_line_time_start" name="time_start_1_0"> '.$shift_1[0]->time_start.' </td>
                  <td class="td_class editoers sh_1_line_1_line_time_end" name="time_stop_1_0"> '.$shift_1[0]->time_stop.' </td>
                  <td class="td_class editoers sh_1_line_1_line_name" name="line_1_0"> '.$shift_1[0]->line.' </td>
                  <td rowspan="'.$lengths_1.'" class="td_class shift_one"> أولي </td>
                </tr>';
            }else{
                $body.='
                <tr class="tr_class">
                  <td class="td_class editoers sh_1_line_1_line_b" name="power_b_1_'.$x.'"> '.$shift_1[$x]->power_b.' </td>
                  <td class="td_class editoers sh_1_line_1_line_a" name="power_a_1_'.$x.'"> '.$shift_1[$x]->power_a.' </td>
                  <td class="td_class editoers sh_1_line_1_line_time" name="error_time_1_'.$x.'"> '.$shift_1[$x]->error_time.' </td>
                  <td class="td_class editoers sh_1_line_1_line_type" name="error_type_1_'.$x.'"> '.$shift_1[$x]->error_type.' </td>
                  <td colspan="2" class="td_class editoers sh_1_line_1_line_reason" name="reason_1_'.$x.'"> '.$shift_1[$x]->reason.' </td>
                  <td class="td_class editoers sh_1_line_1_line_time_start" name="time_start_1_'.$x.'"> '.$shift_1[$x]->time_start.' </td>
                  <td class="td_class editoers sh_1_line_1_line_time_end" name="time_stop_1_'.$x.'"> '.$shift_1[$x]->time_stop.' </td>
                  <td class="td_class editoers sh_1_line_1_line_name" name="line_1_'.$x.'"> '.$shift_1[$x]->line.' </td>
                </tr>';
            }
        }
        
        $body.='
                <tr class="tr_class">
                    <td class="td_class editoers sh_1_line_6_line_b" name="total_wheal_b_1_1"> '.$data_1[0]->total_wheal_b.' </td>
                    <td class="td_class editoers sh_1_line_6_line_a" name="total_wheal_a_1_1"> '.$data_1[0]->total_wheal_a.' </td>
                <td class="td_class" style="padding:2px;position:relative;">الـــقـــمـــح</td>
                <td class="td_class" rowspan="4">الكمية المطحونة</td>
                <td class="td_class" rowspan="4" colspan="1" style="width: 21%;position:relative;height: 100px;border-left: none;border-right: none;">
                    <span style=width:100%;position:absolute;right:5%;top:10px;height:100px;display:block">مسؤل الوردية<br>'.$data_1[0]->shift_manager.'</span>
                </td>
                <td class="td_class" rowspan="4" colspan="1" style="width: 21%;position:relative;height: 100px;border-left: none;border-right: none;">
                    <span class="mov_qu_lit">
                    نسبة الاستخراج <br>
                    <h6>A <span class="editoers" name="ratio_A_1_1">'.$data_1[0]->ratio_B.'</span>% </h6>
                    <h6>B <span class="editoers" name="ratio_B_1_1">'.$data_1[0]->ratio_A.'</span>% </h6>
                    </span>
                </td>
                <td class="td_class" rowspan="4" colspan="4" style="width: 22%;position:relative;height: 100px;border-left: none;border-right: 1px solid;">
                    <span style=width:100%;position:absolute;left:1%;top:10px;height:100px;display:block">مسؤل الكنترول <br>'.$data_1[0]->controll_manager.'</span>
                </td>
                </tr>
                <tr class="tr_class">
                <td class="td_class editoers sh_1_line_6_line_b" name="total_Flour_b_1_1"> '.$data_1[0]->total_Flour_b.' </td>
                <td class="td_class editoers sh_1_line_6_line_a" name="total_Flour_a_1_1"> '.$data_1[0]->total_Flour_a.' </td>
                <td class="td_class" style="padding:2px">دقـــيـــق</td>
                </tr>
                <tr class="tr_class">
                <td class="td_class editoers sh_1_line_6_line_b" name="total_sien_b_1_1"> '.$data_1[0]->total_sien_b.' </td>
                <td class="td_class editoers sh_1_line_6_line_a" name="total_sien_a_1_1"> '.$data_1[0]->total_sien_a.' </td>
                <td class="td_class" style="padding:2px">الســــــــــن</td>
                </tr>
                <tr class="tr_class">
                <td class="td_class editoers sh_1_line_6_line_b" name="total_apostasy_b_1_1"> '.$data_1[0]->total_apostasy_b.' </td>
                <td class="td_class editoers sh_1_line_6_line_a" name="total_apostasy_a_1_1"> '.$data_1[0]->total_apostasy_a.' </td>
                <td class="td_class" style="padding:2px">ردة</td>
                </tr>';



            // -------------------------- shift 2 ---------------------------

                
                for($x=0;$x<$lengths_2;$x++){
                    if($x == 0){
                        $body0.='
                        <tr class="tr_class">
                          <td class="td_class editoers sh_1_line_1_line_b" name="power_b_2_0"> '.$shift_2[0]->power_b.' </td>
                          <td class="td_class editoers sh_1_line_1_line_a" name="power_a_2_0"> '.$shift_2[0]->power_a.' </td>
                          <td class="td_class editoers sh_1_line_1_line_time" name="error_time_2_0"> '.$shift_2[0]->error_time.' </td>
                          <td class="td_class editoers sh_1_line_1_line_type" name="error_type_2_0"> '.$shift_2[0]->error_type.' </td>
                          <td colspan="2" class="td_class editoers sh_1_line_1_line_reason" name="reason_2_0"> '.$shift_2[0]->reason.' </td>
                          <td class="td_class editoers sh_1_line_1_line_time_start" name="time_start_2_0"> '.$shift_2[0]->time_start.' </td>
                          <td class="td_class editoers sh_1_line_1_line_time_end" name="time_stop_2_0"> '.$shift_2[0]->time_stop.' </td>
                          <td class="td_class editoers sh_1_line_1_line_name" name="line_2_0"> '.$shift_2[0]->line.' </td>
                          <td rowspan="'.$lengths_2.'" class="td_class shift_one"> الثانية </td>
                        </tr>';
                    }else{
                        $body0.='
                        <tr class="tr_class">
                          <td class="td_class editoers sh_1_line_1_line_b" name="power_b_2_'.$x.'"> '.$shift_2[$x]->power_b.' </td>
                          <td class="td_class editoers sh_1_line_1_line_a" name="power_a_2_'.$x.'"> '.$shift_2[$x]->power_a.' </td>
                          <td class="td_class editoers sh_1_line_1_line_time" name="error_time_2_'.$x.'"> '.$shift_2[$x]->error_time.' </td>
                          <td class="td_class editoers sh_1_line_1_line_type" name="error_type_2_'.$x.'"> '.$shift_2[$x]->error_type.' </td>
                          <td colspan="2" class="td_class editoers sh_1_line_1_line_reason" name="reason_2_'.$x.'"> '.$shift_2[$x]->reason.' </td>
                          <td class="td_class editoers sh_1_line_1_line_time_start" name="time_start_2_'.$x.'"> '.$shift_2[$x]->time_start.' </td>
                          <td class="td_class editoers sh_1_line_1_line_time_end" name="time_stop_2_'.$x.'"> '.$shift_2[$x]->time_stop.' </td>
                          <td class="td_class editoers sh_1_line_1_line_name" name="line_2_'.$x.'"> '.$shift_2[$x]->line.' </td>
                        </tr>';
                    }
                }
                $body0.='
                        <tr class="tr_class">
                        <td class="td_class editoers sh_1_line_6_line_b" name="total_wheal_b_2_2"> '.$data_2[0]->total_wheal_b.' </td>
                        <td class="td_class editoers sh_1_line_6_line_a" name="total_wheal_a_2_2"> '.$data_2[0]->total_wheal_a.' </td>
                        <td class="td_class" style="padding:2px;position:relative;">الـــقـــمـــح</td>
                        <td class="td_class" rowspan="4">الكمية المطحونة</td>
                        <td class="td_class" rowspan="4" colspan="1" style="width: 21%;position:relative;height: 100px;border-left: none;border-right: none;">
                            <span style=width:100%;position:absolute;right:5%;top:10px;display:block">مسؤل الوردية<br>'.$data_2[0]->shift_manager.'</span>
                        </td>
                        <td class="td_class" rowspan="4" colspan="1" style="width: 21%;position:relative;height: 100px;border-left: none;border-right: none;">
                            <span class="mov_qu_lit">
                            نسبة الاستخراج <br>
                            <h6>A <span class="editoers" name="ratio_A_2_2">'.$data_2[0]->ratio_B.'</span>% </h6>
                            <h6>B <span class="editoers" name="ratio_B_2_2">'.$data_2[0]->ratio_A.'</span>% </h6>
                            </span>
                        </td>
                        <td class="td_class" rowspan="4" colspan="4" style="width: 22%;position:relative;height: 100px;border-left: none;border-right: 1px solid;">
                            <span style=width:100%;position:absolute;left:1%;top:10px;display:block">مسؤل الكنترول <br>'.$data_2[0]->controll_manager.'</span>
                        </td>
                        </tr>
                        <tr class="tr_class">
                        <td class="td_class editoers sh_1_line_6_line_b" name="total_Flour_b_2_2"> '.$data_2[0]->total_Flour_b.' </td>
                        <td class="td_class editoers sh_1_line_6_line_a" name="total_Flour_a_2_2"> '.$data_2[0]->total_Flour_a.' </td>
                        <td class="td_class" style="padding:2px">دقـــيـــق</td>
                        </tr>
                        <tr class="tr_class">
                        <td class="td_class editoers sh_1_line_6_line_b" name="total_sien_b_2_2"> '.$data_2[0]->total_sien_b.' </td>
                        <td class="td_class editoers sh_1_line_6_line_a" name="total_sien_a_2_2"> '.$data_2[0]->total_sien_a.' </td>
                        <td class="td_class" style="padding:2px">الســــــــــن</td>
                        </tr>
                        <tr class="tr_class">
                        <td class="td_class editoers sh_1_line_6_line_b" name="total_apostasy_b_2_2"> '.$data_2[0]->total_apostasy_b.' </td>
                        <td class="td_class editoers sh_1_line_6_line_a" name="total_apostasy_a_2_2"> '.$data_2[0]->total_apostasy_a.' </td>
                        <td class="td_class" style="padding:2px">ردة</td>
                        </tr>';
                        

                    // -------------------------- shift 3 ---------------------------

                            
                    for($x=0;$x<$lengths_3;$x++){
                        if($x == 0){
                            $body00.='
                            <tr class="tr_class">
                            <td class="td_class editoers sh_1_line_1_line_b" name="power_b_3_0"> '.$shift_3[0]->power_b.' </td>
                            <td class="td_class editoers sh_1_line_1_line_a" name="power_a_3_0"> '.$shift_3[0]->power_a.' </td>
                            <td class="td_class editoers sh_1_line_1_line_time" name="error_time_3_0"> '.$shift_3[0]->error_time.' </td>
                            <td class="td_class editoers sh_1_line_1_line_type" name="error_type_3_0"> '.$shift_3[0]->error_type.' </td>
                            <td colspan="2" class="td_class editoers sh_1_line_1_line_reason" name="reason_3_0"> '.$shift_3[0]->reason.' </td>
                            <td class="td_class editoers sh_1_line_1_line_time_start" name="time_start_3_0"> '.$shift_3[0]->time_start.' </td>
                            <td class="td_class editoers sh_1_line_1_line_time_end" name="time_stop_3_0"> '.$shift_3[0]->time_stop.' </td>
                            <td class="td_class editoers sh_1_line_1_line_name" name="line_3_0"> '.$shift_3[0]->line.' </td>
                            <td rowspan="'.$lengths_3.'" class="td_class shift_one"> الثالثة </td>
                            </tr>';
                        }else{
                            $body00.='
                            <tr class="tr_class">
                            <td class="td_class editoers sh_1_line_1_line_b" name="power_b_3_'.$x.'"> '.$shift_3[$x]->power_b.' </td>
                            <td class="td_class editoers sh_1_line_1_line_a" name="power_a_3_'.$x.'"> '.$shift_3[$x]->power_a.' </td>
                            <td class="td_class editoers sh_1_line_1_line_time" name="error_time_3_'.$x.'"> '.$shift_3[$x]->error_time.' </td>
                            <td class="td_class editoers sh_1_line_1_line_type" name="error_type_3_'.$x.'"> '.$shift_3[$x]->error_type.' </td>
                            <td colspan="2" class="td_class editoers sh_1_line_1_line_reason" name="reason_3_'.$x.'"> '.$shift_3[$x]->reason.' </td>
                            <td class="td_class editoers sh_1_line_1_line_time_start" name="time_start_3_'.$x.'"> '.$shift_3[$x]->time_start.' </td>
                            <td class="td_class editoers sh_1_line_1_line_time_end" name="time_stop_3_'.$x.'"> '.$shift_3[$x]->time_stop.' </td>
                            <td class="td_class editoers sh_1_line_1_line_name" name="line_3_'.$x.'"> '.$shift_3[$x]->line.' </td>
                            </tr>';
                        }
                    }

                    $body00.='
                            <tr class="tr_class">
                            <td class="td_class editoers sh_1_line_6_line_b" name="total_wheal_b_3_3"> '.$data_3[0]->total_wheal_b.' </td>
                            <td class="td_class editoers sh_1_line_6_line_a" name="total_wheal_a_3_3'.$x.'"> '.$data_3[0]->total_wheal_a.' </td>
                            <td class="td_class" style="padding:2px;position:relative;">الـــقـــمـــح</td>
                            <td class="td_class" rowspan="4">الكمية المطحونة</td>
                            <td class="td_class" rowspan="4" colspan="1" style="width: 21%;position:relative;height: 100px;border-left: none;border-right: none;">
                                <span style=width:100%;position:absolute;right:5%;top:10px;height:100px;display:block">مسؤل الوردية<br>'.$data_3[0]->shift_manager.'</span>
                            </td>
                            <td class="td_class" rowspan="4" colspan="1" style="width: 21%;position:relative;height: 100px;border-left: none;border-right: none;">
                                <span class="mov_qu_lit">
                                نسبة الاستخراج <br>
                                <h6>A <span class="editoers" name="ratio_A_3_3">'.$data_3[0]->ratio_B.'</span>% </h6>
                                <h6>B <span class="editoers" name="ratio_B_3_3">'.$data_3[0]->ratio_A.'</span>% </h6>
                                </span>
                            </td>
                            <td class="td_class" rowspan="4" colspan="4" style="width: 22%;position:relative;height: 100px;border-left: none;border-right: 1px solid;">
                                <span style=width:100%;position:absolute;left:1%;top:10px;height:100px;display:block">مسؤل الكنترول <br>'.$data_3[0]->controll_manager.'</span>
                            </td>
                            </tr>
                            <tr class="tr_class">
                            <td class="td_class editoers sh_1_line_6_line_b" name="total_Flour_b_3_3"> '.$data_3[0]->total_Flour_b.' </td>
                            <td class="td_class editoers sh_1_line_6_line_a" name="total_Flour_a_3_3"> '.$data_3[0]->total_Flour_a.' </td>
                            <td class="td_class" style="padding:2px">دقـــيـــق</td>
                            </tr>
                            <tr class="tr_class">
                            <td class="td_class editoers sh_1_line_6_line_b" name="total_sien_b_3_3"> '.$data_3[0]->total_sien_b.' </td>
                            <td class="td_class editoers sh_1_line_6_line_a" name="total_sien_a_3_3"> '.$data_3[0]->total_sien_a.' </td>
                            <td class="td_class" style="padding:2px">الســــــــــن</td>
                            </tr>
                            <tr class="tr_class">
                            <td class="td_class editoers sh_1_line_6_line_b" name="total_apostasy_b_3_3"> '.$data_3[0]->total_apostasy_b.' </td>
                            <td class="td_class editoers sh_1_line_6_line_a" name="total_apostasy_a_3_3"> '.$data_3[0]->total_apostasy_a.' </td>
                            <td class="td_class" style="padding:2px">ردة</td>
                            </tr>';


                            $end_re1.=
                            '
                                <h6 class="col" style="text-align: right;float:left;width:200px;font-size:12px">
                                <span class="editoers" name="Extraction_Ratio_A_3_3">'.$divs->Extraction_Ratio_A.'</span> :اجمالي الاستخراج
                                </h6>
                                <h6 class="col" style="text-align: right;float:left;width:200px;font-size:12px">
                                <span class="editoers" name="Total_Houer_Stop_A_3_3">'.$divs->Total_Houer_Stop_A.'</span> :اجمالي عدد ساعات التوقف
                                </h6>
                                <h6 class="col" style="text-align: right;float:left;width:200px;font-size:12px">
                                <span class="editoers" name="total_houer_operating_A_3_3">'.$divs->total_houer_operating_a.'</span> :Aاجمالي ساعات التشغيل للخط
                                </h6>';

                            $end_re2.='
                           
						        <h6 class="col" style="text-align: right;float:left;width:200px;font-size:12px">
                                 <span class="editoers" name="Extraction_Ratio_B_3_3">'.$divs->Extraction_Ratio_B.'</span> :اجمالي الاستخراج
                                </h6>
                                <h6 class="col" style="text-align: right;float:left;width:200px;font-size:12px">
                                 <span class="editoers" name="Total_Houer_Stop_B_3_3">'.$divs->Total_Houer_Stop_B.'</span> :اجمالي عدد ساعات التوقف
                                </h6>
                                <h6 class="col" style="text-align: right;float:left;width:200px;font-size:12px">
                                 <span class="editoers" name="Total_Houer_Operating_B_3_3">'.$divs->Total_Houer_Operating_B.'</span> :Bاجمالي ساعات التشغيل للخط
                                </h6>';


                    $end_table_re.='<tr class="tr_class">
                    <th class="th_class" scope="col" style="width:21.5%;display:inline-table;height: 100%;">'.$divs->Wheat_Quantity_A.'</th>
                    <th class="th_class" scope="col" style="width:21.5%;display:inline-table;height: 100%;">'.$divs->Floor_Quantity_A.'</th>
                    <th class="th_class" scope="col" style="width:21.5%;display:inline-table;height: 100%;">'.$divs->Amount_Quantity_A.'</th>
                    <th class="th_class" scope="col" style="width:21%;display:inline-table;height: 100%;">'.$divs->Elsen_Quantity_A.'</th>
                    <th class="th_class" scope="col" style="width:14.5%;display:inline-table;height: 100%;"> A </th>
                </tr>
                <tr class="tr_class">
                <th class="th_class" scope="col" style="width:21.5%;display:inline-table;height: 100%;">'.$divs->Wheat_Quantity_B.'</th>
                <th class="th_class" scope="col" style="width:21.5%;display:inline-table;height: 100%;">'.$divs->Floor_Quantity_B.'</th>
                <th class="th_class" scope="col" style="width:21.5%;display:inline-table;height: 100%;">'.$divs->Amount_Quantity_B.'</th>
                <th class="th_class" scope="col" style="width:21%;display:inline-table;height: 100%;">'.$divs->Elsen_Quantity_B.'</th>
                <th class="th_class" scope="col" style="width:14.5%;display:inline-table;height: 100%;"> B </th>
            </tr>';//
            session()->put('id_reports',$divs->id);
            session()->put('id_reports2',$divs->id_num);
      return response()->json([
            'body1'=>$body,
            'body2'=>$body0,
            'body3'=>$body00,
            'end_re1'=>$end_re1,
            'end_re2'=>$end_re2,
            'end_table_re'=>$end_table_re,
            'day_report'=>$shift_1[0]->date,
            'date_report'=>$divs->Day_Name,
            'id'=>$divs->id_num
      ]);
    }
}
