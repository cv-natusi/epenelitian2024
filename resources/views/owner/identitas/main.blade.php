@extends('owner.master.main')
@section('content')
  <div class="row">
    <div class="col-lg-12 col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          {{$title}}
        </div>
        <div class="panel-body">
          <form class="" action="{{route('simpan_identitas_owner')}}" method="post">
            {{csrf_field()}}
            <div class="col-lg-6 col-md-6" style="padding: 0px">
              <div class="form-group">
                <label class="col-lg-4 col-md-4">Nama Web</label>
                <div class="col-lg-8 col-md-8">
                  <input autocomplete="off" type="text" class="form-control" name="nama_web" value="{{$identitas->nama_web}}">
                </div>
              </div>
              <div class="clearfix" style="margin-bottom: 10px"></div>
              <div class="form-group">
                <label class="col-lg-4 col-md-4">Alamat</label>
                <div class="col-lg-8 col-md-8">
                  <textarea name="alamat" class="form-control">{{$identitas->alamat}}</textarea>
                </div>
              </div>
              <div class="clearfix" style="margin-bottom: 10px"></div>
              <div class="form-group">
                <label class="col-lg-4 col-md-4">Email</label>
                <div class="col-lg-8 col-md-8">
                  <input autocomplete="off" type="text" class="form-control" name="email" value="{{$identitas->email}}">
                </div>
              </div>
              <div class="clearfix" style="margin-bottom: 10px"></div>
              <div class="form-group">
                <label class="col-lg-4 col-md-4">Telepon</label>
                <div class="col-lg-8 col-md-8">
                  <input autocomplete="off" type="text" class="form-control" name="telepon" value="{{$identitas->telepon}}">
                </div>
              </div>
              <div class="clearfix" style="margin-bottom: 10px"></div>
              <div class="form-group">
                <label class="col-lg-4 col-md-4">Fax</label>
                <div class="col-lg-8 col-md-8">
                  <input autocomplete="off" type="text" class="form-control" name="fax" value="{{$identitas->fax}}">
                </div>
              </div>
              <div class="clearfix" style="margin-bottom: 10px"></div>
            </div>
            <div class="clearfix" style="margin-bottom: 10px"></div>
            <div class="col-lg-12 col-md-12">
              <input type="submit" name="" value="Simpan" class="form-control btn btn-primary">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
