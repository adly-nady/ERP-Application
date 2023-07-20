<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\day_data_operating_milling;
use PDF;

class PDF_control extends Controller
{
    public function PDF_cont(Request $R)
    {
    $gogoline='
    <link rel="stylesheet" type="text/css" href="public/vendors/styles/style2.css">
    <link rel="stylesheet" type="text/css" href="public/vendors/styles/style.css">
    <style>
    *{      
        padding:0%;
        margin: 0%;
        box-sizing: border-box;
    }
        body {
            font-family: '.'examplefont'.', sans-serif;
            background-color: white;
        }

        .table_class{
            background-color: white;
            position: relative;
            left: 50%;
            top: 0%;
            transform: translate(-50%, 10%);
            width:100%;
            height:200px;
            font-size: 14px;border-collapse: collapse;vertical-align: middle;
        }
        .td_class {
            border: 1px solid;
            width: auto;
            text-align: center;
            margin: 0%;
            border-collapse: collapse;
            vertical-align: middle;
            position: relative;
            text-decoration: none;
            text-transform: none;
            text-justify: auto;
        }
        .th_class{
        border: 1px solid;
        width: auto;
        text-align: center;
        margin: 0%;border-collapse: collapse;vertical-align: middle;
        }
        
        .title{
            margin-top:-40px;
            margin-left:250px;
        }
        
.table_class_privet{
    position: relative;
    left: 150px;
    top: 0px;
}
.wish_hober{
    width:100%;
    display: block;
    float: left;
    text-align:right;
    position:absolute;
    left:0px;
    top:45px
}
.linne_a{
    position:relative;margin-top:-4%;right:0%;font-size:14.3px;width:65%;float:right
}
.linne_b{
    position:relative;margin-top:-4%;right:0%;font-size:14.5px;width:65%;float:right
}
.sh_me_1{
    width:30%;position:absolute;right:5%;top:10px;height:100px;display:block
}
.sh_me_2{
    width:32%;position:absolute;left:28%;top:10px;height:100px;display:block
}
.sh_me_3{
    width:22%;position:absolute;left:1%;top:10px;height:100px;display:block
}

.mov_qu_lit{
    width:100%;position:absolute;left:28%;top:10px;height:100px;display:block;
}
    </style>';
    
    PDF::loadHTML($gogoline.$R->table,[
        'format'=> 'A3',
        'auto_language_detection'  => true,
        'show_watermark'       => true,
    ])->save('public/pdf_files/report'.session()->get('id_reports2').'.pdf');
    session()->put('the_path_report','public/pdf_files/report'.session()->get('id_reports2').'.pdf');
    day_data_operating_milling::where('id_num',session()->get('id_reports2')??'')->update([
        'the_path_report'=> session()->get('the_path_report')??'',
        'the_name_report'=> 'report'.session()->get('id_reports2').'.pdf'
    ]);
    }
}
