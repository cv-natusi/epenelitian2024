@extends('owner.master.main')
@section('content')
  <div class="row">
    <div class="col-lg-12 col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          {{$title}}
        </div>
        <div class="panel-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th width="40%">Nama Menu Indonesia</th>
                <th width="40%">Nama Menu Inggris</th>
                <th width="20%">View</th>
              </tr>
            </thead>
            <tbody>
              @if(count($menus)!=0)
                @foreach($menus as $menu)
                  @if($menu->id_menu!=8 && $menu->id_menu!=6)
                  <tr>
                    <td>{{$menu->nama_menu}}</td>
                    <td>{{$menu->name_menu}}</td>
                    <td>
                      <a href="{{url($menu->url)}}" target="_blank" class="btn btn-default">
                        <i class="fa fa-eye"></i>
                      </a>
                      <a href="javascript:void(0)" onclick="form('{{$menu->id_menu}}')" class="btn btn-success">
                        <i class="fa fa-edit"></i>
                      </a>
                    </td>
                  </tr>
                @endif
                @endforeach
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="modal-dialog">

  </div>
@endsection
@section('js')
  <script type="text/javascript">
    function form(id){
      $.post("{{route('form_menu_owner')}}",{id:id},function(data){
        if(data.status=='success'){
          $('.modal-dialog').html(data.content);
        }
      });
    }
  </script>
@endsection
