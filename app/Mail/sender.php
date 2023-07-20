<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use PhpParser\Node\Expr\AssignOp\Mul;

class sender extends Mailable
{
    use Queueable, SerializesModels;

    public $the_path_report;
    public $the_name_report;
    public function __construct($the_path_report,$the_name_report)
    {
        $this->the_path_report=$the_path_report;
        $this->the_name_report=$the_name_report;
    }

    public function build()
    {

        return $this->subject('ERB Nova System')->view('content_email')->attach(session()->get('the_path_report'),[
            'as'=>session()->get('the_path_report'),
            'mime' => 'pdf',
        ]);
    }
}
//SELECT * FROM `day_data_opeating_milling` WHERE `Date` = CURRENT_DATE() - INTERVAL 1 DAY