@extends('owner.master.main')
@section('content')
  <div class="row">
    <div class="col-lg-12 col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          {{$title}}
        </div>
        <div class="panel-body">
          <form class="" action="{{route('simpan_identitas_pkm')}}" method="post">
            {{csrf_field()}}
            <div class="col-lg-12 col-md-12" style="padding: 0px">
              <div class="form-group">
                <label class="col-lg-4 col-md-4">Username :</label>
                <div class="col-lg-8 col-md-8">
                  <input autocomplete="off" type="text" class="form-control" name="username" value="{{$pkm->username}}">
                  <small style="color: red; font-weight: bold;">(*Password akan di setting sama dengan Username.)</small>
                </div>
              </div>
              <div class="clearfix" style="margin-bottom: 10px"></div>
              <div class="form-group">
                <label class="col-lg-4 col-md-4">Email :</label>
                <div class="col-lg-8 col-md-8">
                  <input name="email" class="form-control" value="{{$pkm->email}}">
                </div>
              </div>              
              <div class="clearfix" style="margin-bottom: 10px"></div>
              <div class="form-group">
               <label class="col-sm-4 col-form"> Pilih Tempat Penelitian :</label>
                <div class="col-sm-8">
                  <select class="form-control" name="tempat_penelitian_id" required>
                    <option value="" unselected style="font-weight: bold;"> .:: Pilih Nama Tempat ::. </option>
                    @if($pkm->tempat_penelitian_id != 0)
                        <option selected value="{{$pkm->id_tempat_penelitian}}">{{$pkm->nama_tempat}}</option>
                    @endif
                    @foreach ($tempat_penelitian as $tp)
                        <option value="{{$tp->id_tempat_penelitian}}">{{$tp->nama_tempat}}</option>
                    @endforeach
                  </select>
                </div>
              </div>            
            </div>
            <div class="clearfix" style="margin-bottom: 10px"></div>
            <div class="col-lg-2 col-md-2">
              <input type="submit" name="" value="Simpan Perubahan" class="form-control btn btn-primary btn-xs">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
