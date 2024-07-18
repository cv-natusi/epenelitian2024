@extends('layout.main')
@section('content')
<div class="col-lg-12 col-md-12">
  <a href="{{url('about/')}}" class="btn btn-primary" style="float: right;font-size:15px;"><i class="fa fa-backward"> Kembali</i></a>
</br></br></br>
      <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingTwo">
            <h4 class="panel-title">
              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <b>
                 @if(Session::get('bahasa') == 'indonesia')
                    {!! $bahasa['bahasa56']->indonesia !!}
                  @else
                    {!! $bahasa['bahasa56']->inggris !!}
                  @endif
                </b>
              </a>
            </h4>
          </div>
          <div id="collapseTwo" class="panel-collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="panel-body">
             {!!$contact->contact!!}
             <hr style="  border: 1px solid DimGray;">
             </br>
             <p style="color:red; font-weight: 900;">Dibawah ini merupakan contoh dari Lembar Orsinilitas. Klik dan Silahakan Download.</p>
             <p><a href="{{url('/')}}/uploads/files/LAMPIRAN 01_LEMBAR PERSETUJUAN PENELITIANPENGAMBILAN DATA.docx" download><i class="fa fa-download btn btn-xs btn-info"></i></a> LAMPIRAN 01_LEMBAR PERSETUJUAN PENELITIAN</p>
             <p><a href="{{url('/')}}/uploads/files/LAMPIRAN 02_SURAT PERNYATAAN PENELITI.docx" download><i class="fa fa-download btn btn-xs btn-info"></i></a> LAMPIRAN 02_SURAT PERNYATAAN PENELITI</p>

             <p style="display: none;"><a href="{{url('/')}}/uploads/files/lembar Konfirmasi Dinkes.docx" download><i class="fa fa-download btn btn-xs btn-info"></i></a> LEMBAR KONFIRMASI</p>

            </div>
          </div>
        </div>
      </div>
</div>
<script type="text/javascript">
    $('.panel-collapse').on('show.bs.collapse', function () {
      $(this).siblings('.panel-heading').addClass('active');
    });

    $('.panel-collapse').on('hide.bs.collapse', function () {
      $(this).siblings('.panel-heading').removeClass('active');
    });
  </script>
@endsection
