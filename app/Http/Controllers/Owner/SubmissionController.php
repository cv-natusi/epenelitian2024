<?php

namespace App\Http\Controllers\Owner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Libraries\MenuOwner;
use App\Http\Models\Identitas;
use App\Http\Models\ArticlePending;
use App\Http\Models\Menu;
use Illuminate\Support\Facades\Mail;

use App\Submission;
use App\Profile;
use App\User;
use Validator;
use App\Reviewer;
use App\bahasa;
use Auth;

use Session,Redirect;

class SubmissionController extends Controller
{
    public function sub_pending(Request $request)
    {
	    $menu = MenuOwner::menuActive('mn_data_submission');
	    $data = [
	      'menus'=>Menu::orderBy('id_menu','desc')->get(),
	      'title'=>'Submission Pending',
	      'submission'=>Submission::all(),        
	    ];
	    $data = array_merge($data,$menu);
	    return view('owner.data_submission.sub_pending',$data);
    }

     public function detailAuth(Request $request)
    {
    	$id = $request->id;
	    $menu = MenuOwner::menuActive('mn_data_submission');
	    $data = [
	      'menus'=>Menu::orderBy('id_menu','desc')->get(),
	      'title'=>'Details Author',
	      'submission'=>Submission::find($id),

	    ];
	    $data = array_merge($data,$menu);
	   	$content = view('owner.data_submission.detailAuth',$data)->render();
        return ['status'=>'success','content'=>$content];
    }

     public function reviewJournal(Request $request)
    {
    	$id = $request->id;
      $submission = Submission::find($id);
	    $menu = MenuOwner::menuActive('mn_data_submission');
	    $data = [
	      'menus'=>Menu::orderBy('id_menu','desc')->get(),
	      'title'=>'In Review',
	      'submission'=> $submission,
	      'profile'=>Profile::where('confirm_reg', 'LIKE', '%Reviewer%')->where('users_id', '!=', $submission->users_id)->get(),
	    ];
	    $data = array_merge($data,$menu);
	   	$content = view('owner.data_submission.reviewJournal',$data)->render();
        return ['status'=>'success','content'=>$content];
    }

    public function addReviewer(Request $request)
    {    	
       $submission= Submission::find($request->submission_id);
       $submission->status = 'in_review';
       $submission->save();

        if ($request->jumlah_reviewer != '') {
            for ($i=0; $i <= $request->jumlah_reviewer ; $i++) { 
                $add_rev = new Reviewer;
                $add_rev->description = $request->descriptions[$i];
                $add_rev->users_id = $request->reviewer[$i];
                $add_rev->submission_id = $request->submission_id;
                $add_rev->status = 'in_review';
                $add_rev->file_sub = 

                $add_rev->save();


                $data = [
                  'reviews' => $add_rev,
                  'batas_waktu' => date('d F Y', strtotime("+7 day", strtotime($add_rev->created_at))),
                ];
              $tujuan = profile::where('users_id',$request->reviewer[$i])->first();        
              $sendMail = Mail::send('emails.notifRev', $data, function ($mail) use ($tujuan) {
                          // $mail->to('zeinsaedi.92@gmail.com'); 
                          $mail->to($tujuan->email);
                          // $mail->to($tujuan);
                          $mail->subject('New Submission! Mohon Segera Direview ');
                          // silvyaanggraini99@gmail.com
              });
            }
        }

        return Redirect::to('/data_submission/menu/pending');
    }

    public function detReview(Request $request)
    {
      $id = $request->id;
      $menu = MenuOwner::menuActive('mn_data_submission');
      $data = [
        'menus'=>Menu::orderBy('id_menu','desc')->get(),
        'title'=>'Details Submission Review',
        'submission'=>Submission::find($id),
        'profile'=>Profile::where('confirm_reg', 'LIKE', '%Reviewer%' )->get(),
      ];
      $data = array_merge($data,$menu);
      $content = view('owner.data_submission.detReview',$data)->render();
        return ['status'=>'success','content'=>$content];
    }

    public function sub_review(Request $request)
    {
    	$menu = MenuOwner::menuActive('mn_data_submission');
	    $data = [
	      'menus'=>Menu::orderBy('id_menu','desc')->get(),
	      'title'=>'Submission In Review',
	      'submission'=>Submission::all(),
	    ];
	    $data = array_merge($data,$menu);
	    return view('owner.data_submission.sub_review',$data);
    }

    public function sub_revisi(Request $request)
    {
	    $menu = MenuOwner::menuActive('mn_data_submission');
	    $data = [
	      'menus'=>Menu::orderBy('id_menu','desc')->get(),
	      'title'=>'Submission In Revisi',
	      'submission'=>Submission::all(),
	    ];
	    $data = array_merge($data,$menu);
	    return view('owner.data_submission.sub_revisi',$data);
    }

    public function sub_accept(Request $request)
    {
	    $menu = MenuOwner::menuActive('mn_data_submission');
	    $data = [
	      'menus'=>Menu::orderBy('id_menu','desc')->get(),
	      'title'=>'Submission Accept',
	      'submission'=>Submission::all(),
        'nama_pkm' => User::join('tempat_penelitian','tempat_penelitian.id_tempat_penelitian','=', 'users.tempat_penelitian_id')
                        ->where('users.id',Auth::User()->id)->first(),
        'nama_user' => User::where('users.id',Auth::User()->id)->first(),

	    ];
	    $data = array_merge($data,$menu);
	    return view('owner.data_submission.sub_accept',$data);
    }
    public function sub_publish(Request $request)
    {
	    $menu = MenuOwner::menuActive('mn_data_submission');
	    $data = [
	      'menus'=>Menu::orderBy('id_menu','desc')->get(),
	      'title'=>'Submission Publish',
	      'submission'=>Submission::all(),
        'nama_pkm' => User::join('tempat_penelitian','tempat_penelitian.id_tempat_penelitian','=', 'users.tempat_penelitian_id')
                        ->where('users.id',Auth::User()->id)->first(),
        'nama_user' => User::where('users.id',Auth::User()->id)->first(),

	    ];
	    $data = array_merge($data,$menu);
	    return view('owner.data_submission.sub_publish',$data);
    }


    public function datagridpending(Request $request)
    {
      $data = Submission::getJsonPending($request);
      return response()->json($data);
    }

    public function datagridreview(Request $request)
   	{
      $data = Submission::getJsonReview($request);
      return response()->json($data);
    }

    public function datagridrevisi(Request $request)
    {
      $data = Submission::getJsonRevisi($request);
      return response()->json($data);
    }

     public function datagridaccept(Request $request)
    {
      $data = Submission::getJsonAccept($request);
      return response()->json($data);
    }

     public function datagridpublish(Request $request)
    {
      $data = Submission::getJsonPublish($request);
      return response()->json($data);
    }

    public function view_accept(Request $request)
    {
      $menu = MenuOwner::menuActive('mn_data_submission');
      $viewacc =Submission::where("id",$request->id)->first();
          $data['id'] = $viewacc;
          $data['title'] = 'File Submissions';
          $data = array_merge($data,$menu);
          $content = view('owner.data_submission.view_accept',$data)->render();
          return ['status'=>'success','content'=>$content];
    }

    public function detail_accept(Request $request)
    {
      $id = $request->id;
      $submission = Submission::find($id);
      $menu = MenuOwner::menuActive('mn_data_submission');
      $data = [
        'menus'=>Menu::orderBy('id_menu','desc')->get(),
        'title'=>'In Review',
        'submission'=> $submission,
      
      ];
      $data = array_merge($data,$menu);
      $content = view('owner.data_submission.detail_accept',$data)->render();
        return ['status'=>'success','content'=>$content];
    }

     public function detailAccept(Request $request)
    {
      $id = $request->id;
      $submission = Submission::where('submissions.id',$id)->first();
      $reviewer = Reviewer::join('profiles', 'profiles.users_id', '=', 'reviewers.users_id')
                            ->where('submission_id', $id)->get();
                            
      $submission['reviewer'] = $reviewer;
      $menu = MenuOwner::menuActive('mn_data_submission');
      $data = [
        'menus'=>Menu::orderBy('id_menu','desc')->get(),
        'title'=>'In Review',
        'submission'=> $submission,
      
      ];
      $data = array_merge($data,$menu);
      $content = view('owner.data_submission.detailAccept',$data)->render();
      return ['status'=>'success','content'=>$content];
    }

    public function publish_accept(Request $request)
    {
      $publish = Submission::where("id",$request->id)->update(['status' => 'publish']);  
      
        if($publish){
            return ['status' => 'success'];
        }else{
            return ['status'=>'error'];
        }   
    }

    //DATA MILIK BAHASA

    public function  index_bahasa(Request $request)
    {
      $menu = MenuOwner::menuActive('mn_data_master');
      $data = [
        'menus'=>Menu::orderBy('id_menu','ASC')->get(),
        'title'=>'Bahasa',
        'bahasa'=>bahasa::all(),
        'nama_pkm' => User::join('tempat_penelitian','tempat_penelitian.id_tempat_penelitian','=', 'users.tempat_penelitian_id')
                        ->where('users.id',Auth::User()->id)->first(),
        'nama_user' => User::where('users.id',Auth::User()->id)->first(),

      ];
      $data = array_merge($data,$menu);
      return view('owner.data_submission.bahasa',$data);
    }

     public function datagridbahasa(Request $request)
    {
      $data = bahasa::getJsonBahasa($request);
      return response()->json($data);
    }

     public function update_bahasa(Request $request)
    {
      $menu = MenuOwner::menuActive('mn_data_master');
      $data = [
        'menus'=>Menu::orderBy('id_menu','desc')->get(),
        'title'=>'Bahasa',
        'bahasa'=>bahasa::find($request->id),
      ];
          $content = view('owner.data_submission.update_bahasa',$data)->render();
          return ['status'=>'success','content'=>$content];
    }

     public function doup_bahasa(Request $request)
     {
      $bahasa = bahasa::where("id_bahasa",$request->id)->first();
      $bahasa->inggris = $request->inggris;
      $bahasa->indonesia = $request->indonesia;
      
      $bahasa->save(); 

      if($bahasa){
        $title = 'Success';
        $message = 'Berhasil disimpan';
        $type = 'success';
      }else{
        $title = 'Whooops';
        $message = 'Gagal disimpan';
        $type = 'error';
      }

      Session::flash('title',$title);
      Session::flash('message',$message);
      Session::flash('type',$type);
      return Redirect::route('bahasa');
    }

    public function dohapus(Request $request)
    {
      $hapus = bahasa::where("id_bahasa",$request->id)->first();
          if(!empty($hapus)){
              $hapus->delete();
              return ['status' => 'success'];
          }else{
              return ['status'=>'error'];
          }   
    }

     public function UpdateAccept(Request $request)
    {
      $up_accept = Submission::find($request->id);

        if (!empty($request->file_submission)) {
            $fileupload = $request->file_submission->getClientOriginalName();
            $temp_foto = 'uploads/file_submissions/';
            $proses = $request->file_submission->move($temp_foto, $fileupload);
            $up_accept->file_submission = $fileupload;
        }
        $up_accept->save();

        if ($up_accept) {
            Session::flash('pesan','successed to convert file');
        }
        return Redirect::to('/data_submission/menu/accept');
    }

     public function detail_publish(Request $request)
    {
      $id = $request->id;
      $submission = Submission::where('submissions.id',$id)->first();
      $reviewer = Reviewer::join('profiles', 'profiles.users_id', '=', 'reviewers.users_id')
                            ->where('submission_id', $id)->get();
                            
      $submission['reviewer'] = $reviewer;
      $menu = MenuOwner::menuActive('mn_data_submission');
      $data = [
        'menus'=>Menu::orderBy('id_menu','desc')->get(),
        'title'=>'In Review',
        'submission'=> $submission,
      
      ];
      $data = array_merge($data,$menu);
      $content = view('owner.data_submission.details_publish',$data)->render();
      return ['status'=>'success','content'=>$content];
    }
}