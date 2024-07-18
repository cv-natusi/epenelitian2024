<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NotifController extends Controller
{
    public function sendmail(Request $request)
    {
        $data =[
          'batas_waktu' => '0',
        ];
        $sendMail = Mail::send('emails.notifAcc', $data, function ($mail){
          $tujuan = ['silvyaanggraini99@gmail.com'];
          $mail->to($tujuan);
          $mail->subject('Selamat! Judul Pengajuan anda diterima mohon segera upload file pendukung');
        });
    }
}
