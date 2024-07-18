<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Author_submit;
use App\Profile;
use App\Registrasi;
use App\User;
use App\Submission;
use App\Supplementary;
use App\Reviewer;
use App\Permohonan;
use App\Doc_Pendukung;
use Validator;
use App\bahasa;
use App\VerifikasiTempatPenelitian;
use Auth,Redirect,Hash,Session;

class UserhomeController extends Controller
{
  function main(Request $request){

    if (!empty(Session::get('id'))) {
      Session()->forget('id');
    }
    $bahasa = [
      'bahasa16' => bahasa::find(16),
    ];

        $dataB =  Permohonan::leftjoin('hasil_penelitian as hp','hp.permohonan_id','permohonan.id_permohonan')
        ->join('item_permohonan as item', 'item.permohonan_id', 'permohonan.id_permohonan')
        ->where('users_id', Auth::User()->id)->orderBy('id_permohonan','DESC')->paginate(10);
    $noPerB = 0;

    foreach($dataB as $keyB){
        $dataB[$noPerB]['row'] = VerifikasiTempatPenelitian::where('permohonan_id',$keyB->id_permohonan)->get();
        $noPerB++;
    }
    
    $permohonan = $dataB;

    // anas
    $data_permohonan = Permohonan::leftjoin('hasil_penelitian as hp','hp.permohonan_id','permohonan.id_permohonan')->where('users_id', Auth::User()->id)->orderBy('id_permohonan','DESC')->paginate(10);
    $noPer1 = 0;
    foreach($data_permohonan as $key1){
        $data_permohonan[$noPer1]['row'] = VerifikasiTempatPenelitian::where('permohonan_id',$key1->id_permohonan)->get();
        $noPer1++;
    }
    // end anas
    
    $get = User::join('profiles', 'profiles.users_id', 'users.id')->find(Auth::User()->id);
    if(Auth::User() -> level == 3){
        $category = $get->category;
    } else {
        $category = 'admin';
    }
    $data = [
      'id_menu' => '9',
      'bahasa'=> $bahasa,
      'permohonan' => $permohonan,
      'data_permohonan' => $data_permohonan,//anas
      'category' => $category,
      'pengajuan' => Permohonan::join('item_permohonan as item', 'item.permohonan_id', 'permohonan.id_permohonan')
    //   join('doc_pendukung','permohonan.id_permohonan', '=', 'doc_pendukung.permohonan_id')
    //                            ->join('jenis_file_pendukung','doc_pendukung.jenis_file', '=' , 'jenis_file_pendukung.id_jenis_file')
                               ->where('users_id', Auth::User()->id)
                            //    ->limit(1)//anas
                               ->get(),
                               
      'hasil' => Permohonan::join('hasil_penelitian','hasil_penelitian.permohonan_id', '=' , 'permohonan.id_permohonan')
      ->where('users_id', Auth::User()->id)->get(),
    ];
    // return $data;

    return view('userhome.main',$data)
    ->with('submissions_count', Submission::where('users_id', Auth::User()->id)->count())
    ->with('review_count', Submission::where('users_id', Auth::User()->id)->where('status','review')->count())
    ->with('revisi_count', Submission::where('users_id', Auth::User()->id)->where('status','revisi')->count())
    ->with('accept_count', Submission::where('users_id', Auth::User()->id)->where('status','accept')->count())
    ->with('publish_count', Submission::where('users_id', Auth::User()->id)->where('status','publish')->count());
  }

  	function edit(){

		$id =  Auth::User()->id;
		$data = [
		  'id_menu' => '9',
		];
		$profile = Profile::join('users', 'users.id', 'profiles.users_id')->where('users.id', $id)->first();
		return view('userhome.edit', $data, compact('profile', $profile));

  	}

    public function do_update(Request $request)
    {
        // return $request->all();
      // $get = Auth::User()->id;
      $validator=Validator::make($request->all(),[
        'idProfile' => 'required',
        'username' => 'required',
        'password' => 'required',
        // 'salutation' => 'required',
        'first_name' => 'required',
        // 'middle_name' => 'required',
        'last_name' => 'required',
        'category' => 'required',
        // 'initials' => 'required',
        // 'pendidikan_terakhir' => 'required',
        'gender' => 'required',
        'email' => 'required|email|unique:email',
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
    
    // if ($request->category != 'mhs') {
    //     $validator->validate(['unit_kerja' => 'required',]);
    // }

      $profile = Profile::where('users_id', $request->idProfile)->first();
      $u = User::where('id', $profile->users_id)->first();
      $u->email = $request->email;
      $u->save();
      if (!empty($request->image)) {
        $ext_foto   = $request->image->getClientOriginalExtension();
        $filename   = date('Ymd-His')."_".$request->username.".".$ext_foto;
        $temp_foto = 'uploads/images/';
        $proses = $request->image->move($temp_foto, $filename);
        $profile->image = $filename;
      }

      $profile->username = $request->username;
      $profile->salutation = $request->salutation;
      $profile->first_name = $request->first_name;
      $profile->middle_name = $request->middle_name;
      $profile->last_name = $request->last_name;
      $profile->category = $request->category;
      $profile->initials = $request->initials;
      $profile->gender = $request->gender;
      $profile->pendidikan_terakhir = $request->jenjang.' '.$request->pendidikan_terakhir;
      $profile->pangkat_golongan = $request->pangkat_golongan;
      $profile->jabatan = $request->jabatan;
      $profile->email = $request->email;
      $profile->phone = $request->phone;
      $profile->mailing_ads = $request->mailing_ads;
      $profile->country = $request->country;
      $profile->bio = $request->bio;
      // $profile->confirm_reg = join(',',$request->confirm_reg);
      $profile->identify = $request->identify;
      $profile->no_identitas =$request->no_identitas;
      $profile->unit_instansi =/*strtoupper(*/$request->unit_instansi/*)*/;
      $profile->unit_kerja =/*strtoupper(*/$request->unit_kerja/*)*/;
      // $profile->image 		= $request->image;
      $profile->users_id 		= Auth::User()->id;
      $profile->save();
      return redirect('/userhome/');
    }

    public function change_pass(Request $request)
    {

        $id =  Auth::User()->id;
        $data = [
          'id_menu' => '9',
        ];
        return view('userhome.password',$data);
    }

    public function update_pass(Request $request)
    {
        $validator=Validator::make($request->all(),[
        'old_password'     => 'required',
        'new_password'     => 'required|min:6',
        'confirm_password' => 'required|same:new_password',
        ]);

        $data = $request->all();

        $users =  Auth::user();
        $u = User::find(Auth::user()->id);

        if(!Hash::check($data['old_password'],$u->password)){
             return back()
            ->with('error','The specified password does not match the database password');
        }else{
            // $users->update([
            //     'password' => $request->new_password,
            // ]);
            if (!empty($u)) {
                $u->password = bcrypt($request->new_password);
                $u->save();
                return redirect('/userhome/');
            }

        }
    }

    public function view_submit(Request $request)

    {

        $bahasa = [
            'bahasa16' => bahasa::find(16),
            'bahasa17' => bahasa::find(17),
            'bahasa18' => bahasa::find(18),
            'bahasa19' => bahasa::find(19),
            'bahasa20' => bahasa::find(20),
            'bahasa21' => bahasa::find(21),
            'bahasa22' => bahasa::find(22),
            'bahasa23' => bahasa::find(23),
            'bahasa24' => bahasa::find(24),
            'bahasa25' => bahasa::find(25),
            'bahasa26' => bahasa::find(26),
            'bahasa27' => bahasa::find(27),
            'bahasa28' => bahasa::find(28),
            'bahasa29' => bahasa::find(29),
            'bahasa30' => bahasa::find(30),
            'bahasa31' => bahasa::find(31),
            'bahasa32' => bahasa::find(32),
            'bahasa33' => bahasa::find(33),
            'bahasa34' => bahasa::find(34),
            'bahasa35' => bahasa::find(35),
            'bahasa36' => bahasa::find(36),
            'bahasa37' => bahasa::find(37),
            'bahasa38' => bahasa::find(38),
            'bahasa39' => bahasa::find(39),
            'bahasa40' => bahasa::find(40),
            'bahasa41' => bahasa::find(41),
            'bahasa42' => bahasa::find(42),
            'bahasa43' => bahasa::find(43),
            'bahasa44' => bahasa::find(44),
            'bahasa45' => bahasa::find(45),
            'bahasa46' => bahasa::find(46),
            'bahasa47' => bahasa::find(47),
            'bahasa48' => bahasa::find(48),
            'bahasa49' => bahasa::find(49),
            'bahasa50' => bahasa::find(50),
        ];

        $page = $request->id;
        $submission = '';

        $fileSup = [];
        // return Session::get('id');

        if (Session::has('id')) {
            $submission = Submission::where('id', Session::get('id'))->first();
            if (!empty($submission)) {
            $cekSup = Supplementary::where('submission_id', $submission->id)->get();
            $fileSup = $cekSup;
            }
        }


        $profil = Profile::where('users_id', Auth::User()->id)->first();

        $data = [
          'id_menu' => '9',
          'page' => $page,
          'submission' => $submission,
          'profile' =>$profil,
          'fileSup' =>$fileSup,
          'bahasa' =>$bahasa,
          'pengajuan' => Permohonan::where('users_id', Auth::User()->id)
                                ->where('surat_ijin', 'sudah')->get(),
        ];

        // return $data;

        return view('userhome.submission',$data);
    }

    public function insert_submit(Request $request)
    {

        $validator=Validator::make($request->all(),[
            'comments'      => 'required',
            'permohonan_id' => 'required',
        ]);

            $profile = Submission::create([
                'permohonan_id' => $request->permohonan_id,
                'comments'      => $request->comments,
                'users_id'      => Auth::user()->id,
                ]);

             if ($profile) {
                 $newsub = Submission::orderby('id', 'desc')->first();
                 Session::put('id', $newsub->id);
             }
             // return Session::get('id');
            Session::flash('pesan','Next for completed your Jurnal upload');
            return Redirect::to('userhome/submit/2');
    }

    public function up_filesub(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'file_submission' => 'required|file|max:5000',
        ]);

        $file_sub = Submission::where('id', Session::get('id'))->first();

        $file = date('YmdHis');

        $nameFile = 'Jurnal-'.$file.'.'.$request->file_submission->getClientOriginalExtension();
        $originalNameFile = $_FILES['file_submission']['name'];

        $bytes = filesize($request->file_submission);
        $units = array('B', 'KB', 'MB', 'GB', 'TB');
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $base = log($bytes, 1024);
        $sizeFile = round(pow(1024, $base - floor($base)), 2).' '.$units[$pow];

        $dateUp = date('d-m-Y');
        $file_sub->file_size = '';
        if (!empty($request->file_submission)) {
            if ($file_sub->file_submission != '') {

                if(file_exists('uploads/file_submissions/'.$file_sub->file_submission)){
                    unlink('uploads/file_submissions/'.$file_sub->file_submission);
                }
            }
            $ext_foto = $request->file_submission->getClientOriginalExtension();
            $filename = 'Jurnal-'.$file.'.'.$ext_foto;
            $temp_foto = 'uploads/file_submissions/';
            $proses = $request->file_submission->move($temp_foto, $filename);
            $file_sub->file_submission = $filename;

            $file_sub->original_filename = $_FILES['file_submission']['name'];
            $file_sub->file_size = $sizeFile;

        }

        $masuk = $file_sub->save();

        if ($masuk) {
            Session::flash('pesan','file success to upload');
        }
            return Redirect::to('userhome/submit/2')->with('filename', $nameFile)->with('nameorigin', $originalNameFile)->with('filesize', $sizeFile)->with('date', $dateUp);
    }

    public function up_submission(Request $request)
    {

        $validator=Validator::make($request->all(),[
            'title' => 'required',
            'lang' => 'required',
            'abstract' => 'required',
            'agencies' => 'required',
            'references' => 'required',
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'id_orcid' => 'required',
            'url'  => 'required',
            'affiliation' => 'required',
            'country' => 'required',
            'interest' => 'required',
            'bio'      => 'required',

        ]);

        $up_sub = Submission::where('id', Session::get('id'))->first();
        $up_sub->title          = $request->title;
        $up_sub->lang        = $request->lang;
        $up_sub->abstract        = $request->abstract;
        $up_sub->agencies        = $request->agencies;
        $up_sub->references      = $request->references;

        $where = User::join('profiles','users.id', '=', 'profiles.users_id')
                        ->where('users.id', Auth::User()->id)->first();

        if ($where->category == 'pns') {
            $up_sub->status          = 'pending';
        }else{
            $up_sub->status          = 'accept';
        }
        $up_sub->save();

        $auth_sub= new Author_submit;
        $auth_sub->first_name = $request->first_name;
        $auth_sub->middle_name = $request->middle_name;
        $auth_sub->last_name = $request->last_name;
        $auth_sub->email = $request->email;
        $auth_sub->id_orcid = $request->id_orcid;
        $auth_sub->url  = $request->url;
        $auth_sub->affiliation = $request->affiliation;
        $auth_sub->country = $request->country;
        $auth_sub->interest = $request->interest;
        $auth_sub->bio      = $request->bio;
        $auth_sub->submission_id = Session::get('id');
        $auth_sub->save();

        if ($request->jumlah_author != '') {
            for ($i=0; $i <= $request->jumlah_author ; $i++) {
                $save_auth = new Author_submit;
                $save_auth->first_name = $request->first_name_aut[$i];
                $save_auth->middle_name = $request->middle_name_aut[$i];
                $save_auth->last_name = $request->last_name_aut[$i];
                $save_auth->email = $request->email_aut[$i];
                $save_auth->id_orcid = $request->id_orcid_aut[$i];
                $save_auth->url  = $request->url_aut[$i];
                $save_auth->affiliation = $request->affiliation_aut[$i];
                $save_auth->country = $request->country_aut[$i];
                $save_auth->interest = $request->interest_aut[$i];
                $save_auth->bio      = $request->bio_aut[$i];
                $save_auth->submission_id = Session::get('id');

                $save_auth->save();
            }
        }

        if ($up_sub) {
            Session::flash('pesan','successed, click for next');
        }
            return Redirect::to('userhome/submit/4');
    }

    public function up_filesupple(Request $request)
    {
        $id = $request->id_spp;

        if ($id == '') {
        $validator=Validator::make($request->all(),[
            'title' => 'required',
            'file' => 'required|file|max:5000',
            'file_size' => 'required',
            'date' => 'required',
            'creator' => 'required',
            'keywords' => 'required',
            'type' => 'required',
            'description' => 'required',
            'publisher' => 'required',
            'agencies' => 'required',
            'lang' => 'required',
        ]);

        $file_submission = Submission::where('id', Session::get('id'))->first();
        $id_sup = '';
        $cekSup = Supplementary::where('submission_id', $file_submission->id)->first();

        $addSup = new Supplementary;

        }else{
            $addSup = Supplementary::find($id);

        }

        $bytes = filesize($request->file);
        $units = array('B', 'KB', 'MB', 'GB', 'TB');
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);
        $base = log($bytes, 1024);
        $sizeFile = round(pow(1024, $base - floor($base)), 2).' '.$units[$pow];

        $addSup->file_size = '';

        if (!empty($request->file)) {
            $filename = $request->file->getClientOriginalName();
            $temp_foto = 'uploads/files/';
            $proses = $request->file->move($temp_foto, $filename);
            $addSup->file = $filename;
        }

        $addSup->title = $request->title;
        $addSup->date = $request->date;
        $addSup->creator = $request->creator;
        $addSup->keywords = $request->keywords;
        $addSup->type = $request->type;
        $addSup->description = $request->description;
        $addSup->publisher = $request->publisher;
        $addSup->agencies = $request->agencies;
        $addSup->lang = $request->lang;
        $addSup->submission_id = Session::get('id');
        $addSup->file_size = $sizeFile;

        $addSup->save();

        if ($addSup) {
            Session::flash('pesan','file success to upload');
        }
            return Redirect::to('userhome/submit/4');
    }

    public function update_Supp(Request $request)
    {
        // return $request->all();

        $id = $request->id;

        $supplementary = Supplementary::find($id);

        if (!empty($supplementary)) {
            return ["status"=>'success', 'data'=>$supplementary];
        }else{
            return ["status"=>'error'];
        }
    }

    public function destroy(Request $request)
    {

        $id = $request->id;

        $supplementary = Supplementary::find($id);

        $supplementary->delete();

          if ($supplementary) {
            Session::flash('pesan','Delete Successed');
        }
            return Redirect::to('userhome/submit/4');
    }

    public function view_active(Request $request)
    {
        $data = [
          'id_menu' => '9',
        ];

        $submission = Submission::where('users_id', Auth::User()->id)->where('status', '!=', 'publish')->get();
        return view('userhome.active', $data, compact('submission', $submission));

    }

    public function view_archive(Request $request)
    {
        $data = [
          'id_menu' => '9',
        ];

        $submission = Submission::where('users_id', Auth::User()->id)->get();
        return view('userhome.archive', $data, compact('submission', $submission));

    }

    public function det_active($id)
    {
        $submission = Submission::find($id);
        $data = [
          'id_menu' => '9',
          'submission' => $submission,
          'id' => $id,
        ];
        return view('userhome.det_active', $data);
    }

    public function det_archive($id)
    {
        $data = [
          'id_menu' => '9',
        ];

        $id = Submission::find('id');
        $submission = Submission::join('supplementaries', 'submission.id', '=', 'supplementaries.submission_id')
                                ->join('author_submits', 'submission.id', '=', 'author_submits.submission_id')->get();
        return view('userhome.det_active', $data, $id, compact('submission', $submission));
    }

    public function view_review(Request $request)
    {
        $submission = Submission::selectRaw("submissions.*,reviewers.*,submissions.status as sub_sta,submissions.id as id_sub")->join('reviewers', 'submissions.id','=', 'reviewers.submission_id')
                                ->where('reviewers.users_id', Auth::User()->id)
                                ->where('submissions.status','in_review')
                                ->where('reviewers.status','in_review')->get();

        // $submission = Reviewer::join('submissions as s','s.id','reviewers.submission_id')->where('reviewers.users_id',Auth::User()->id)->where('s.status','in_review')->get();

                                // return $submission;
        $data = [
            'id_menu' => '9',
            'submission' => $submission,
        ];

        return view('userhome.review', $data, compact('submission', $submission));
    }

    public function view_revisi(Request $request)
    {
        $data = [
            'id_menu' => '9',
        ];

         $submission = Submission::selectRaw("submissions.*,submissions.id as id_sub")
                                ->where('submissions.users_id', Auth::User()->id)
                                ->where('submissions.status','in_revisi')->get();

            // return $submission;
        // $submission = Reviewer::select('reviewers.*','submissions.*','submissions.id as id_submission','reviewers.id as id_reviewer')->join('submissions', 'submissions.id','=', 'reviewers.submission_id')
        //                         ->where('reviewers.status','in_revisi')
        //                         ->where('submissions.users_id', Auth::User()->id)->get();

        return view('userhome.revisi', $data, compact('submission', $submission));
    }

    public function det_review($id)
    {
        $submission = Reviewer::select('submissions.*','reviewers.*','reviewers.id as id_reviewer')->join('submissions', 'submissions.id','reviewers.submission_id')->where('reviewers.users_id', Auth::User()->id)->where('submissions.id', $id)->first();
        $data = [
          'id_menu' => '9',
          'submission' => $submission,
          'id' => $id,
        ];
        return view('userhome.add_review', $data);
    }

    public function det_revisi($id)
    {
        $submissionRev = Reviewer::select('reviewers.*','reviewers.id as id_reviewer')->where('submission_id', $id)->get();
        $submissionSub = Submission::find($id);
        // return $submissionRev;

        $data = [
          'id_menu' => '9',
          'submission' => $submissionSub,
          'reviewer' => $submissionRev,
          'id' => $id,
        ];

        return view('userhome.det_revisi', $data);
    }

    public function up_review(Request $request)
    {
        $up_review = Reviewer::find($request->id_reviewer);

        if (!empty($request->file_sub)) {
            $filename = $request->file_sub->getClientOriginalName();
            $temp_foto = 'uploads/file_sub/';
            $proses = $request->file_sub->move($temp_foto, $filename);
            $up_review->file_sub = $filename;
        }
        $up_review->description   = $request->description;
        $up_review->status        = $request->status;
        $up_review->save();

        $countRev = Reviewer::where('submission_id', $up_review->submission_id)->where('status', 'in_revisi')->count();
        if ($countRev == '0') {
            $countRev1 = Reviewer::where('submission_id', $up_review->submission_id)->where('status', 'in_review')->count();
            if ($countRev1 == '0') {
                    $statusSup = 'accept';
            }else{
                    $statusSup = 'in_review';
            }
        }else{
            $countRev1 = Reviewer::where('submission_id', $up_review->submission_id)->where('status', 'in_review')->count();
            if ($countRev1 == '0') {
                    $statusSup = 'in_revisi';
            }else{
                    $statusSup = 'in_review';
            }
        }

        $updateSub = Submission::find($up_review->submission_id);
        $updateSub->status = $statusSup;


        $updateSub->save();

        if ($up_review) {
            Session::flash('pesan','successed to Add Comments');
        }
            return Redirect::to('userhome/review');
    }

    public function get_Sub($id)
    {
       $submission = Submission::find($id);
        // return $submission;
        $data = [
          'id_menu' => '9',
          'submission' => $submission,
          'id' => $id,
        ];

        return view('userhome.add_revisi', $data);
    }

    public function Update_Sub(Request $request)
    {
         $up_revisi = Submission::find($request->id);

        if (!empty($request->file_submission)) {
            $filename = $request->file_submission->getClientOriginalName();
            $temp_foto = 'uploads/file_submissions/';
            $proses = $request->file_submission->move($temp_foto, $filename);
            $up_revisi->file_submission = $filename;
        }

        $up_revisi->status  = 'in_review';
        $up_revisi->save();

        $updateSub = Reviewer::where('submission_id', $request->id)->update(['status' => 'in_review']);

        if ($up_revisi) {
            Session::flash('pesan','successed to Add Comments');
        }
            return Redirect::to('userhome/revisi');
    }

    public function up_revisi(Request $request)
    {
        $up_revisi = Submission::find($request->id_submission);

        if (!empty($request->file_sub)) {
            $filename = $request->file_sub->getClientOriginalName();
            $temp_foto = 'uploads/file_submissions/';
            $proses = $request->file_sub->move($temp_foto, $filename);
            $up_revisi->file_submission = $filename;
        }

        $up_revisi->status  = 'in_review';
        $up_revisi->save();


        if ($up_revisi) {
            Session::flash('pesan','successed to Add Comments');
        }
            return Redirect::to('userhome/revisi');
    }

    public function pernyataan($id)
    {
        $data = [
          'id_menu' => '9',
          'permohonan' => Permohonan::where('id_permohonan', $id)->get(),
        ];

        return view('userhome.form_pernyataan', $data);

        // return view('emails.notifSurat');
    }

    public function confirm_penelitian(Request $request)
    {
        Permohonan::where('id_permohonan', $request->id)->update([
            'surat_ijin'     => "sudah",
            'estimasi_waktu' => $request->estimasi
        ]);

        return Redirect::to('userhome');
    }
}
