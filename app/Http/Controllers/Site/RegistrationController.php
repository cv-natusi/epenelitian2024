<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

use App\User;
use Validator;
use App\Profile;
use Hash;
use Session;
use Redirect;


class RegistrationController extends Controller
{
	public function main()
	{
		$data = [
		  'id_menu' => '4',
		  ];
		return view('registrasi.main',$data);
	}

    public function store(Request $request)
    {
    $validator=Validator::make($request->all(),[
            'username' => 'required',
            'password' => 'required',
            // 'salutation' => 'required',
            'first_name' => 'required',
            // 'middle_name' => 'required',
            'last_name' => 'required',
            // 'category' => 'required',
            // 'initials' => 'required',
            // 'jenjang' => 'required',
            // 'pendidikan_terakhir' => 'required',
            'gender' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'mailing_ads' => 'required',
            'country' => 'required',
            // 'bio' => 'required',
            'confirm_reg' => 'required',
			// 'identify' => 'required',
			'unit_instansi' => 'required',
            // 'unit_kerja' => 'required',
            'no_identitas' => 'required',
        ]);
    if ($request->category != 'mhs') {
        $validator->validate(['unit_kerja' => 'required',]);
    }

    if ($validator->fails()) {
        return redirect()
            ->back()
            ->withInput()
            ->withErrors($validator->errors());
    }else{
         $user = User::create([

            'username' => $request->username,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'level' => '3',
            ]);

         if($user)
            {

            $getUser= User::orderBy('id', 'desc')->first();

            $profile = Profile::create([
                'username' => strip_tags($request->username),
                'password' => Hash::make($request->password),
                'salutation' => strip_tags($request->salutation),
                'first_name' => strip_tags($request->first_name),
                'middle_name' => strip_tags($request->middle_name),
                'last_name' => strip_tags($request->last_name),
                'category' => $request->category,
                'initials' => strip_tags($request->initials),
                'gender' => $request->gender,
				'pendidikan_terakhir' => $request->jenjang.' '.$request->pendidikan_terakhir,
				'pangkat_golongan' => $request->pangkat_golongan,
				'jabatan' => $request->jabatan,
                'email' => strip_tags($request->email),
				'phone' => strip_tags($request->phone),
                'mailing_ads' => strip_tags($request->mailing_ads),
                'country' => $request->country,
                'bio' => strip_tags($request->bio),
                'confirm_reg' => join(',',$request->confirm_reg),
                'identify' => strip_tags($request->identify),
				'no_identitas'=>strip_tags($request->no_identitas),
				'unit_instansi'=>$request->unit_instansi,
                'unit_kerja'=>/*strtoupper(*/$request->unit_kerja/*)*/,
                'users_id' => $getUser->id,
                ]);

            }
                $data = [
                    'foo'=>'bar',
                    'username'=>$request->username,
                    'password'=>$request->password,
                ];
                $tujuan = $request->email;
                
                // Komen Sementara
                $sendMail = Mail::send('emails.hello', $data, function ($mail) use ($tujuan) {
                            // $mail->to('zeinsaedi.92@gmail.com');
                            $mail->to($tujuan);
                            // $mail->to($tujuan);
                            // $mail->from('deltaepenelitian01@gmail.com','E-Penelitian');
                            $mail->subject('Congratulations! your account was successfully created');
                            // silvyaanggraini99@gmail.com
                });

            Session::flash('pesan','You have succeeded to register');
            return Redirect::route('login');
    	}
    }
}
