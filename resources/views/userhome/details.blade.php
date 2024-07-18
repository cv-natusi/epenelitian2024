@extends('layout.main')
@section('content')
  <div class="col-lg-12 col-md-12">
    <a href="{{url('userhome')}}" class="btn btn-info" style="float: right;"><i class="fa fa-backward">  Back</i></a>
    <h3>Detail data Pengajuan</h3>
     @if (!empty($details))
        @foreach ($details as $key)
          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    {{$key->nama_form}}
                  </a>
                </h4>
              </div>
              <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                    @if(file_exists($key->nama_file))
                      <?php $ext = explode('.',$key->nama_file); ?>
                      @if($ext[1]=='pdf' || $ext[1]=='PDF')
                        <iframe src="{{ url('/') }}/{{$key->nama_file}}" width="100%" height="550px"></iframe>;
                      @else                        
                        <img src="{{ url('/') }} /{{$key->nama_file}}" alt="" style="width: 100%">
                      @endif
                    @else
                      <?php $status = 'Tidak ada file'; ?>
                    @endif  
                </div>
              </div>
            </div>
          </div>
       @endforeach
    @endif
    <hr style="  border: 1px solid DimGray;">  
  </div>
@endsection

 <script type="text/javascript">
    $('.panel-collapse').on('show.bs.collapse', function () {
      $(this).siblings('.panel-heading').addClass('active');
    });

    $('.panel-collapse').on('hide.bs.collapse', function () {
      $(this).siblings('.panel-heading').removeClass('active');
    });    
  </script>
