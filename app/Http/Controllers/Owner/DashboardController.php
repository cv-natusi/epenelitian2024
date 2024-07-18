<?php

namespace App\Http\Controllers\Owner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Libraries\MenuOwner;
use App\Http\Models\Identitas;
use App\Permohonan;
use App\Author_submit;
use App\Supplementary;
use App\VerifikasiTempatPenelitian;

use App\User;
use Auth,Redirect,Hash,Session;


class DashboardController extends Controller
{
  function main(){
    $menu = MenuOwner::menuActive('mn_dashboard');
    $data = [
      'identitas'=>Identitas::find(1),
      'title'=>'Dashboard',
      'nama_pkm' => User::join('tempat_penelitian','tempat_penelitian.id_tempat_penelitian','=', 'users.tempat_penelitian_id')
                        ->where('users.id',Auth::User()->id)->first(),
      'nama_user' => User::where('users.id',Auth::User()->id)->first(),
    ];

    // return $data;
    $data = array_merge($data,$menu);
    $pending_pkm_count  = VerifikasiTempatPenelitian::join('users', 'users.tempat_penelitian_id', '=', 'verifikasi_tempat_penelitian.tempat_penelitian_id')
                        ->join('doc_pendukung', 'doc_pendukung.permohonan_id', '=', 'verifikasi_tempat_penelitian.permohonan_id')
                        ->where('users.id', Auth::User()->id)
                        ->where('doc_pendukung.permohonan_id', '>', '0')
                        ->where('verifikasi_tempat_penelitian.status_verifikasi','Menunggu')->count();
    $acc_pkm_count      = VerifikasiTempatPenelitian::join('users', 'users.tempat_penelitian_id', '=', 'verifikasi_tempat_penelitian.tempat_penelitian_id')
                        ->where('users.id', Auth::User()->id)->where('verifikasi_tempat_penelitian.status_verifikasi','Terima')->count();
    $reject_pkm_count   = VerifikasiTempatPenelitian::join('users', 'users.tempat_penelitian_id', '=', 'verifikasi_tempat_penelitian.tempat_penelitian_id')
                        ->where('users.id', Auth::User()->id)->where('verifikasi_tempat_penelitian.status_verifikasi','Tolak')->count();
                        // return $pending_pkm_count;
    return view('owner.dashboard.main',$data)
                ->with('users_count', User::where('level','3')->count())
                ->with('supplementary_count', Supplementary::all()->count())
                ->with('pending_count_admin', Permohonan::where('status', 'like','%Menunggu Admin%')->count())
                ->with('pending_count_kasi', Permohonan::where('status', 'like','%Menunggu Kasi%')->count())
                ->with('acc_count', Permohonan::where('status','terima')->count())
                ->with('reject_count', Permohonan::where('status','Tolak')->count())
                ->with('pending_pkm_count', $pending_pkm_count)
                ->with('acc_pkm_count', $acc_pkm_count)
                ->with('reject_pkm_count', $reject_pkm_count);
  }
}
