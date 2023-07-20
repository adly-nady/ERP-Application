<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Top_admins;
use App\Models\User;
use App\Models\Admin;
use App\Events\i_open;

class controller_page extends Controller
{
	public function enter_page(Request $R)
	{
            if(Auth::guard('users')->attempt(['name' => $R->email, 'password' => $R->pass])||Auth::guard('admins')->attempt(['name' => $R->email, 'password' => $R->pass])||Auth::guard('top_admins')->attempt(['name' => $R->email, 'password' => $R->pass])){
                if(Auth::guard('top_admins')->user()->status ?? "ops" == 'Top_Admin'){
                    $user=Top_admins::find(Auth::guard('top_admins')->user()->id);
                    $user->open=1;
                    $user->save();
                }
                if(Auth::guard('admins')->user()->status ?? "ops" == 'Admin'){
                    $user=Admin::find(Auth::guard('admins')->user()->id);
                    $user->open=1;
                    $user->save();
                }
                if(Auth::guard('users')->user()->status ?? "ops" == 'user'){
                    $user=User::find(Auth::guard('users')->user()->id);
                    $user->open=1;
                    $user->save();
                }
                session()->put('error_login_','trun');
                return redirect()->route('sections');
            }else{
                session()->put('error_login_','false');
                return redirect()->route('login');
            }

    }
    public function Sign_out(){

        if(Auth::guard('top_admins')->user()->status ?? 'ops' == 'Top_Admin'){
        //    broadcast(new outsit(Auth::guard('top_admins')->user()->status,Auth::guard('top_admins')->user()->id))->toOthers();
            $user=Top_admins::find(Auth::guard('top_admins')->user()->id);
            $user->open=0;
            $user->save();
            Auth::guard('top_admins')->logout();
        }elseif(Auth::guard('admins')->user()->status ?? 'ops' == 'Admin'){
        //    broadcast(new outsit(Auth::guard('admins')->user()->status,Auth::guard('admins')->user()->id))->toOthers();
            $user=Admin::find(Auth::guard('admins')->user()->id);
            $user->open=0;
            $user->save();
            Auth::guard('admins')->logout();
        }elseif(Auth::guard('users')->user()->status ?? 'ops' == 'user'){
        //    broadcast(new outsit(Auth::guard('users')->user()->status,Auth::guard('users')->user()->id))->toOthers();
            $user=User::find(Auth::guard('users')->user()->id);
            $user->open=0;
            $user->save();
            Auth::guard('users')->logout();
        }
        broadcast(new i_open())->toOthers();
        return redirect()->route('login');
    }
    public function login_here()
    {
        if(Auth::guard('users')->check())
            return response()->json(Auth::guard('users')->user()); 
        if(Auth::guard('admins')->check())
            return response()->json(Auth::guard('admins')->user());
        if(Auth::guard('top_admins')->check())
            return response()->json(Auth::guard('top_admins')->user());
    }
}
