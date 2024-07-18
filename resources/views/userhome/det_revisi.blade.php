@extends('layout.main')
@section('content')
  <div class="col-lg-12 col-md-12">
    </br>
      <h4 style="font-weight: bold; color: #4682B4;"><a href="{{url('userhome/revisi')}}" style="float: left;"><< Details Revisi Submission</a></h4>
      <hr style="  border: 1px solid DimGray;">
      <table class="table">
        <tbody>
            <tr>
              <th>Original Filename </th>
              <td> : {{$submission->file_submission}}</td>           
            </tr>            
            <tr>
              <th>Title</th>
              <td> : {{$submission->title}}</td>            
            </tr>           
            <tr>
              <th>Abstract</th>
              <td> : {{$submission->abstract}}</td>           
            </tr>
            <tr>
              <th>Agencies</th>
              <td> : {{$submission->agencies}}</td>            
            </tr>
            <tr>
              <th>References</th>
              <td> : {{$submission->references}}</td>            
            </tr>
             <tr>
              <th>Author Comments</th>
              <td> : {{$submission->comments}}</td>            
            </tr>            
        </tbody>
      </table>
      
      <h4 style="font-weight: bold; color: #4682B4;">Status</h4>
      <hr style="  border: 1px solid DimGray;">
      <table class="table">
        <tbody>
            <tr>
              <th>Status</th>
              <td> : {{$submission->status}}</td>           
            </tr>
            <tr>
              <th>Created</th>
              <td> : {{$submission->created_at}}</td>            
            </tr>
            <tr>
              <th>Last Modified</th>
              <td> : {{$submission->updated_at}}</td>            
            </tr>                    
        </tbody>
      </table>

      <h4 style="font-weight: bold; color: #4682B4;">Details Reviewers</h4>
      <hr style="  border: 1px solid DimGray;">
      <table class="table">
        <tbody>
            @if(!empty($reviewer))
              @foreach ($reviewer as $rev)
              <tr>
                <th>REV ID</th>
                <td> : {{$rev->id_reviewer}}</td>           
              </tr>
              <tr>
                <th>USER ID</th>
                <td> : {{$rev->users_id}}</td>            
              </tr>
                <th>Download File</th>
                <td><a href="{{url('/')}}/uploads/file_sub/{{$rev->file_sub}}" target="_blank" style="text-decoration: underline;"> : {{$rev->file_sub}} </a></td>            
              </tr>
              <tr>
                <th>Descriptions</th>
                <td> : {{$rev->description}}</td>            
              </tr>            
              <tr>
                <td colspan="2">
                <hr style="  border: 1px solid DimGray;">                              
                </td>
              </tr>   
              @endforeach              
            @endif                      
        </tbody>
      </table>  
  </div>
@endsection