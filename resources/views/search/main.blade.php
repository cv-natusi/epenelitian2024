@extends('layout.main')
@section('content')
  <div class="col-lg-12 col-md-12">

    <div class="col-lg-12 col-md-12">
      <h3>Search</h3>
      <p style="color: red;font-weight: bold;">Click link Title for details Journal</p>
      <form method="POST" enctype="multipart/form-data" action="{{ route('Search_Sub') }}" style="margin-top: 20px;">
        {{ csrf_field() }}
        <div class="input-group col-md-6">
          <input  type="text" class="form-control" name="search" placeholder="Additional Info" required>
          <span class="input-group-addon" style="padding: 0">
            <button type="submit" style="height:31px"><i class="fa fa-search"></i> Search </button>
          </span>
        </div>
      </form>
    </div>
        <!-- <div class="col-lg-12 col-md-12">
            <button type="button" id="formButton" style="display: block; margin-top: 10px;" class="btn btn-success btn-sm">Additional Search Options(Click to Show or Hide)</button>
            <form id="form1" style="display : none;">
              <h3>Search categories</h3>
                <div class="form-group">
                    <label for="exampleInputEmail1">Author</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Title</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Abstract</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Full Text</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Supplementary File(s)</label>
                    <input type="text" class="form-control">
                </div>
                  <h3>Publication Date</h3>
                  <fieldset class="date">
                      <label for="month_start">From</label>
                      <select id="month_start"
                              name="month_start"/>
                        <option>January</option>
                        <option>February</option>
                        <option>March</option>
                        <option>April</option>
                        <option>May</option>
                        <option>June</option>
                        <option>July</option>
                        <option>August</option>
                        <option>September</option>
                        <option>October</option>
                        <option>November</option>
                        <option>December</option>
                      </select>
                      <select id="day_start"
                              name="day_start"/>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                        <option>13</option>
                        <option>14</option>
                        <option>15</option>
                        <option>16</option>
                        <option>17</option>
                        <option>18</option>
                        <option>19</option>
                        <option>20</option>
                        <option>21</option>
                        <option>22</option>
                        <option>23</option>
                        <option>24</option>
                        <option>25</option>
                        <option>26</option>
                        <option>27</option>
                        <option>28</option>
                        <option>29</option>
                        <option>30</option>
                        <option>31</option>
                      </select>
                      <select id="year_start"
                             name="year_start"/>
                        <option>2009</option>
                        <option>2010</option>
                        <option>2011</option>
                        <option>2012</option>
                        <option>2013</option>
                        <option>2014</option>
                        <option>2015</option>
                        <option>2016</option>
                        <option>2017</option>
                        <option>2018</option>
                      </select>
                  </fieldset>

                  <fieldset class="date">
                    <label for="month_end">Until</label>
                    <select id="month_end"
                            name="month_end"/>
                      <option>January</option>
                      <option>February</option>
                      <option>March</option>
                      <option>April</option>
                      <option>May</option>
                      <option>June</option>
                      <option>July</option>
                      <option>August</option>
                      <option>September</option>
                      <option>October</option>
                      <option>November</option>
                      <option>December</option>
                    </select>
                    <select id="day_end"
                            name="day_end"/>
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                      <option>6</option>
                      <option>7</option>
                      <option>8</option>
                      <option>9</option>
                      <option>10</option>
                      <option>11</option>
                      <option>12</option>
                      <option>13</option>
                      <option>14</option>
                      <option>15</option>
                      <option>16</option>
                      <option>17</option>
                      <option>18</option>
                      <option>19</option>
                      <option>20</option>
                      <option>21</option>
                      <option>22</option>
                      <option>23</option>
                      <option>24</option>
                      <option>25</option>
                      <option>26</option>
                      <option>27</option>
                      <option>28</option>
                      <option>29</option>
                      <option>30</option>
                      <option>31</option>
                    </select>
                    <select id="year_end"
                           name="year_end"/>
                      <option>2009</option>
                      <option>2010</option>
                      <option>2011</option>
                      <option>2012</option>
                      <option>2013</option>
                      <option>2014</option>
                      <option>2015</option>
                      <option>2016</option>
                      <option>2017</option>
                      <option>2018</option>
                    </select>
                  </fieldset>
                  <h3>Index terms</h3>
                <div class="form-group">
                    <label for="exampleInputEmail1">Discipline(s)</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Keyword(s)</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Type (method/approach)</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Coverage</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">All index term fields</label>
                    <input type="text" class="form-control">
                </div>
              <button type="button" class="btn btn-primary" id="submit">Submit</button>
            </form>
        </div> -->
    <div class="col-lg-12 col-md-12">
      <table class="table table-sm" style="margin-top: 20px;">
        <thead>
          <tr>
            <th scope="col">Title</th>
            <th>Nama Penulis</th>
            <th>Abstract</th>
            <!-- <th>Keywords</th> -->
          </tr>
        </thead>
        <tbody>
          @if(isset($search))
            @foreach ($search as $search)
              <tr>
                <!-- <td><a href="{{url('/archive/viewArchive/'.$search->id_sub)}}">{{$search->judul_penelitian}}</a></td> -->
                <td><a href="{{url('/current/viewCurrentIn/'.$search->id_hasil_penelitian)}}" style="color: blue">{{$search->judul_penelitian}}</a></td>
                <td>{{$search->first_name}} {{$search->midle_name}} {{$search->last_name}}</td>
                <td>{!! $search->abstrak !!}</td>
                <!-- <td>{{$search->keywords}}</td> -->
              </tr>
            @endforeach
          @endif
        </tbody>
      </table>
    </div>
    <div class="list-group">
      <h4>
        @if(Session::get('bahasa') == 'indonesia')
          {!! $bahasa['bahasa10']->indonesia !!}
        @else
          {!! $bahasa['bahasa10']->inggris !!}
        @endif
      </h4>
      <li>
        @if(Session::get('bahasa') == 'indonesia')
          {!! $bahasa['bahasa11']->indonesia !!}
        @else
          {!! $bahasa['bahasa11']->inggris !!}
        @endif
      </li>
      <li>
        @if(Session::get('bahasa') == 'indonesia')
        {!! $bahasa['bahasa12']->indonesia !!}
        @else
        {!! $bahasa['bahasa12']->inggris !!}
        @endif
      </li>
      <li>
        @if(Session::get('bahasa') == 'indonesia')
        {!! $bahasa['bahasa13']->indonesia !!}
        @else
        {!! $bahasa['bahasa13']->inggris !!}
        @endif
      </li>
      <li>
        @if(Session::get('bahasa') == 'indonesia')
        {!! $bahasa['bahasa14']->indonesia !!}
        @else
        {!! $bahasa['bahasa14']->inggris !!}
        @endif
      </li>
      <li>
        @if(Session::get('bahasa') == 'indonesia')
        {!! $bahasa['bahasa15']->indonesia !!}
        @else
        {!! $bahasa['bahasa15']->inggris !!}
        @endif:
      </li>
    </div>

  </div>
  <script>
  $(document).ready(function() {
  $("#formButton").click(function() {
    $("#form1").toggle();
  });
});

  </script>
@endsection
