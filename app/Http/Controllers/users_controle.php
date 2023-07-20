<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Top_admins;
use App\Models\User;
use App\Models\Admin;
use App\Models\milling_equipment;
use App\Models\send_mail;
use App\Models\Maintenance_db;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Http\Response;
use App\Http\Requests;
use Illuminate\Validation\Rule;
use App\Events\i_open;

class users_controle extends Controller
{
    public function save_change_data_now(Request $R)
    {
        
        $validator = Validator::make($R->all(), [
            'other_data' => 'required',
            'name'=>'required',
            'Signature'=>'required',
        ],[
            'other_data.required'=>__("message.Enter the pass!"),
            'name.required'=>__("message.Enter the name!"),
            'Signature.required'=>__("message.Enter the Signature!"),
        ]);

        if(!$validator->fails())
        {

            if($R->status == 'user')
            {
                $vare=User::find($R->id);
                $vare->name=$R->name;
                $vare->email=$R->email;
                $vare->phone=$R->phone;
                $vare->Signature=$R->Signature;
                $vare->password=Hash::make($R->other_data);
                $vare->other_data=$R->other_data;
                $vare->dep_id=$R->dep_id;
                $vare->status='user';
                $vare->save();
                $data=DB::select("SELECT `users_a`.`id`,`users_a`.`img`,`users_a`.`name`,`users_a`.`Signature`,`users_a`.`email`,`users_a`.`phone`,`users_a`.`password`,`users_a`.`other_data`,`users_a`.`status`,`users_a`.`open`,`department`.`dep_name` FROM `users_a`,`department` WHERE `users_a`.`dep_id` = `department`.`id`;");
                return response()->json($data);
            }
            if($R->status == 'Admin')
            {
                $vare=Admin::find($R->id);
                $vare->name=$R->name;
                $vare->email=$R->email;
                $vare->phone=$R->phone;
                $vare->Signature=$R->Signature;
                $vare->password=Hash::make($R->other_data);
                $vare->other_data=$R->other_data;
                $vare->dep_id=$R->dep_id;
                $vare->status='Admin';
                $vare->save();
                $data=DB::select("SELECT `admins`.`id`,`admins`.`img`,`admins`.`name`,`admins`.`Signature`,`admins`.`email`,`admins`.`phone`,`admins`.`password`,`admins`.`other_data`,`admins`.`status`,`admins`.`open`,`department`.`dep_name` FROM `admins`,`department` WHERE `admins`.`dep_id` = `department`.`id`;");
                return response()->json($data);
            }
            if($R->status == 'Top_Admin')
            {
                $vare=Top_admins::find($R->id);
                $vare->name=$R->name;
                $vare->email=$R->email;
                $vare->phone=$R->phone;
                $vare->Signature=$R->Signature;
                $vare->password=Hash::make($R->other_data);
                $vare->other_data=$R->other_data;
                $vare->dep_id=$R->dep_id;
                $vare->status='Top_Admin';
                $vare->save();
                $data=DB::select("SELECT `top_admin`.`id`,`top_admin`.`img`,`top_admin`.`name`,`top_admin`.`Signature`,`top_admin`.`email`,`top_admin`.`phone`,`top_admin`.`password`,`top_admin`.`other_data`,`top_admin`.`status`,`top_admin`.`open`,`department`.`dep_name` FROM `top_admin`,`department` WHERE `top_admin`.`dep_id` = `department`.`id`;");
                return response()->json($data);
            }

        }else{
            return response()->json(['error'=>$validator->errors()]);
        } 
    }
    public function edit_users_table(Request $R)
    {
        if($R->name == 'user')
            return response()->json(User::find($R->id));
        else if($R->name == 'admins')   
            return response()->json(Admin::find($R->id));
        else if($R->name == 'top_admins')   
            return response()->json(Top_admins::find($R->id));
    }
    public function delete_users_table(Request $R)
    {
        if($R->name == 'user')
        {
            User::find($R->id)->delete();
            $data=DB::select("SELECT `users_a`.`id`,`users_a`.`img`,`users_a`.`name`,`users_a`.`Signature`,`users_a`.`email`,`users_a`.`phone`,`users_a`.`password`,`users_a`.`other_data`,`users_a`.`status`,`users_a`.`open`,`department`.`dep_name` FROM `users_a`,`department` WHERE `users_a`.`dep_id` = `department`.`id`;");
            return response()->json($data);
        }
        else if($R->name == 'admins')
        {
            Admin::find($R->id)->delete();
            $data=DB::select("SELECT `admins`.`id`,`admins`.`img`,`admins`.`name`,`admins`.`Signature`,`admins`.`email`,`admins`.`phone`,`admins`.`password`,`admins`.`other_data`,`admins`.`status`,`admins`.`open`,`department`.`dep_name` FROM `admins`,`department` WHERE `admins`.`dep_id` = `department`.`id`;");
            return response()->json($data);
        }
        else if($R->name == 'top_admins')
        {
            Top_admins::find($R->id)->delete();
            $data=DB::select("SELECT `top_admin`.`id`,`top_admin`.`img`,`top_admin`.`name`,`top_admin`.`Signature`,`top_admin`.`email`,`top_admin`.`phone`,`top_admin`.`password`,`top_admin`.`other_data`,`top_admin`.`status`,`top_admin`.`open`,`department`.`dep_name` FROM `top_admin`,`department` WHERE `top_admin`.`dep_id` = `department`.`id`;");
            return response()->json($data);
        }
    }
    public function save_now_user(Request $R)
    {
        $validator = Validator::make($R->all(), [
            'Officer' => 'required',
            'pass' => 'required',
            'name'=>'required|unique:App\Models\User,name|unique:App\Models\Admin,name|unique:App\Models\Top_admins,name',
        ],[
            'Officer.required'=>__("message.Enter the Officer!"),
            'pass.required'=>__("message.Enter the pass!"),
            'name.required'=>__("message.Enter the name!"),
            'name.unique'=>__("message.Your name are frequent!"),
        ]);
        if(!$validator->fails())
        {
            $filename;
            if($R->file('file'))
            {
                $uploadedFile = $R->file('file');
                $filename = microtime(true).'.'.$uploadedFile->getClientOriginalExtension()??"";
                $R->file('file')->move('public/images_people/',$filename);
            }else{
                $filename="user1.png";
            }

            if($R->Officer=='User'){
                User::insert([
                    'img'=>'public/images_people/'.$filename??"user1.png",
                    'name'=>$R->name,
                    'email'=>$R->email,
                    'phone'=>$R->phone,
                    'password'=>Hash::make($R->pass),
                    'other_data'=>$R->pass,
                    'dep_id'=>$R->department,
                    'Signature'=>$R->signature,
                    'status'=>'user',
                ]);
            }elseif($R->Officer=='Admin')
            {
                Admin::insert([
                    'img'=>'public/images_people/'.$filename??"user1.png",
                    'name'=>$R->name,
                    'email'=>$R->email,
                    'phone'=>$R->phone,
                    'password'=>Hash::make($R->pass),
                    'other_data'=>$R->pass,
                    'dep_id'=>$R->department,
                    'Signature'=>$R->signature,
                    'status'=>'Admin',
                ]);
            }elseif($R->Officer=='Top Admin')
            {
                Top_admins::insert([
                    'img'=>'public/images_people/'.$filename??"user1.png",
                    'name'=>$R->name,
                    'email'=>$R->email,
                    'phone'=>$R->phone,
                    'password'=>Hash::make($R->pass),
                    'other_data'=>$R->pass,
                    'dep_id'=>$R->department,
                    'Signature'=>$R->signature,
                    'status'=>'Top_Admin',
                ]);
            }
            return response()->json('okey');
        }else{
            return response()->json(['errors'=>$validator->errors()]);
        }
    }
    public function users_show(Request $R)
    {
        $data=DB::select("SELECT `users_a`.`id`,`users_a`.`img`,`users_a`.`name`,`users_a`.`Signature`,`users_a`.`email`,`users_a`.`phone`,`users_a`.`password`,`users_a`.`other_data`,`users_a`.`status`,`users_a`.`open`,`department`.`dep_name` FROM `users_a`,`department` WHERE `users_a`.`dep_id` = `department`.`id`;");
        return response()->json($data);
    }
    public function admins_show(Request $R)
    {
        $data=DB::select("SELECT `admins`.`id`,`admins`.`img`,`admins`.`name`,`admins`.`Signature`,`admins`.`email`,`admins`.`phone`,`admins`.`password`,`admins`.`other_data`,`admins`.`status`,`admins`.`open`,`department`.`dep_name` FROM `admins`,`department` WHERE `admins`.`dep_id` = `department`.`id`;");
        return response()->json($data);
    }
    public function topadmins_show(Request $R)
    {
        $data=DB::select("SELECT `top_admin`.`id`,`top_admin`.`img`,`top_admin`.`name`,`top_admin`.`Signature`,`top_admin`.`email`,`top_admin`.`phone`,`top_admin`.`password`,`top_admin`.`other_data`,`top_admin`.`status`,`top_admin`.`open`,`department`.`dep_name` FROM `top_admin`,`department` WHERE `top_admin`.`dep_id` = `department`.`id`;");
        return response()->json($data);
    }
    public function Add_mail(Request $R)
    {
        send_mail::insert(['email'=>$R->text_add]);
        return response()->json(send_mail::get());
    }
    public function dropz(Request $R)
    {
        send_mail::find($R->text_add)->delete();
        return response()->json(send_mail::get());
    }
    public function editz(Request $R)
    {
        return response()->json(send_mail::find($R->id_text)->email??"");
    }
    public function update_mail(Request $R)
    {
        send_mail::find($R->id_text)->update(['email'=>$R->text_add]);
        return response()->json(send_mail::get());
    }
    public function change_my_data(Request $R)
    {
        $validator = Validator::make($R->all(), [
            'data.pass' => 'required',
            'data.name'=>'required|unique:App\Models\User,name|unique:App\Models\Admin,name|unique:App\Models\Top_admins,name',
            'data.Signature'=>'required|unique:App\Models\User,Signature|unique:App\Models\Admin,Signature|unique:App\Models\Top_admins,Signature',
        ],[
            'data.pass.required'=>__("message.Enter the pass!"),
            'data.name.required'=>__("message.Enter the name!"),
            'data.name.unique'=>__("message.Your name are frequent!"),
            'data.Signature.required'=>__("message.Enter the Signature!"),
            'data.Signature.unique'=>__("message.Your Signature are frequent!"),
        ]);

        if(!$validator->fails())
        {
            
            if($R->img != null && $R->img != '[]' && $R->img != '{}'){
                $uploadedFile = $R->file('img');
                $filename = microtime(true).'.'.$uploadedFile->getClientOriginalExtension();
                $R->file('img')->move('public/images_people/',$filename);
            }else{
                    $filename=null;
            }

            if(Auth::guard('users')->check())
            {
                $vare=User::find(Auth::guard('users')->user()->id);
                if($filename != null)
                    $vare->img='public/images_people/'.$filename;
                $vare->name=$R->data['name'];
                $vare->email=$R->data['email'];
                $vare->phone=$R->data['phone'];
                $vare->Signature=$R->data['Signature'];
                $vare->password=Hash::make($R->data['pass']);
                $vare->other_data=$R->data['pass'];
                $vare->status='user';
                $vare->save();
                return response()->json($vare);
            }
            if(Auth::guard('admins')->check())
            {
                $vare=Admin::find(Auth::guard('admins')->user()->id);
                if($filename != null)
                    $vare->img='public/images_people/'.$filename;
                $vare->name=$R->data['name'];
                $vare->email=$R->data['email'];
                $vare->phone=$R->data['phone'];
                $vare->Signature=$R->data['Signature'];
                $vare->password=Hash::make($R->data['pass']);
                $vare->other_data=$R->data['pass'];
                $vare->status='Admin';
                $vare->save();
                return response()->json($vare);
            }
            if(Auth::guard('top_admins')->check())
            {
                $vare=Top_admins::find(Auth::guard('top_admins')->user()->id);
                if($filename != null)
                    $vare->img='public/images_people/'.$filename;
                $vare->name=$R->data['name'];
                $vare->email=$R->data['email'];
                $vare->phone=$R->data['phone'];
                $vare->Signature=$R->data['Signature'];
                $vare->password=Hash::make($R->data['pass']);
                $vare->other_data=$R->data['pass'];
                $vare->status='Top_Admin';
                $vare->save();
                return response()->json($vare);
            }

        }else{
            return response()->json(['error'=>$validator->errors()]);
        }
    }
    public function Events(){
        $calendardata=Maintenance_db::get();
        return response()->json(["calendardata" => $calendardata]);
    }
    public function tool_add(Request $R)
    {
        $data=json_decode($R->text_add);
        Maintenance_db::insert([
            'type_dep'=>$data->type == 1? 'الميكانيكة' : 'الكهرباء',
            'date'=>$data->date,
            'title'=>$data->texter,
        ]);
        return response()->json(Maintenance_db::get());
    }
    
    public function tool_edit(Request $R){
        return response()->json(Maintenance_db::find($R->id));
    }
    
    public function tool_drop(Request $R){
        Maintenance_db::find($R->id)->delete();
        return response()->json(Maintenance_db::get());
    }
    
    public function tool_update(Request $R){
        $data=json_decode($R->text_add);
        Maintenance_db::find($R->id)->update([
            'type_dep'=>$data->type == 1? 'الميكانيكة' : 'الكهرباء',
            'date'=>$data->date,
            'title'=>$data->texter,
        ]);
        return response()->json(Maintenance_db::get());
    }
    public function add_qm(Requset $R)
    {
        $data=json_decode($R->text_add);
        milling_equipment::insert([
            'MQ_name'=>$data->qm_name,
            'MQ_number'=>$data->qm_number,
            'Department'=>$data->Department
        ]);
        return response()->json(milling_equipment::get());
    }
}