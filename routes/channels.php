<?php

use Illuminate\Support\Facades\Broadcast;


Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});


Broadcast::channel('my-channel{id}', function ($id) {
    return $id;
});

Broadcast::channel('i_opens',function(){return true;});
Broadcast::channel('get_data_change{id}',function($id){return $id;});
Broadcast::channel('show_data_equps{id}',function($id){return $id;});
Broadcast::channel('show_pay_datas{id}',function($id){return $id;});
Broadcast::channel('stop_reports_ch{id}',function($id){return $id;});
Broadcast::channel('channels_buy_report_count',function(){return true;});
