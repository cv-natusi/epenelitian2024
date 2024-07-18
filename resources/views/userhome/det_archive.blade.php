@extends('layout.main')
@section('content')
  <div class="col-lg-12 col-md-12">
      <h4 style="font-weight: bold; color: #4682B4;">Archive Submission</h4>
      <hr style="  border: 1px solid DimGray;">
      <table class="table">
        <tbody>
            <tr>
              <th>Original Filename </th>
              <td> : {{$submission->original_filename}}</td>           
            </tr>
            <tr>
              <th>File Size</th>
              <td> : {{$submission->file_size}}</td>            
            </tr>
            <tr>
              <th>Title</th>
              <td> : {{$submission->title}}</td>            
            </tr>
            <tr>
              <th>Language</th>
              <td> : {{$submission->lang}}</td>            
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

      <h4 style="font-weight: bold; color: #4682B4;">Author Submission</h4>
      <hr style="  border: 1px solid DimGray;">
      <table class="table">
        <tbody>
        @if(!empty($submission->author_submit))
          @foreach ($submission->author_submit as $aut)
            <tr>
              <th>first Name</th>
              <td> : {{$aut->first_name}}</td>           
            </tr>
            <tr>
              <th>Email</th>
              <td> : {{$aut->email}}</td>            
            </tr>
            <tr>
              <th>Orcid ID</th>
              <td> : {{$aut->id_orcid}}</td>            
            </tr>
            <tr>
              <th>Affiliation</th>
              <td> : {{$aut->affiliation}}</td>            
            </tr>
            <tr>
              <th>Interest</th>
              <td> : {!!$aut->interest!!}</td>           
            </tr>
            <tr>
              <th>Bio</th>
              <td> : {!!$aut->bio!!}</td>            
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

      <h4 style="font-weight: bold; color: #4682B4;">Supplementary File</h4>
      <hr style="  border: 1px solid DimGray;">
      <table class="table">
        <tbody>
            @if(!empty($submission->supplementary))
              @foreach ($submission->supplementary as $sup)
              <tr>
                <th>Title</th>
                <td> : {{$sup->title}}</td>           
              </tr>
              <tr>
                <th>File</th>
                <td> : {{$sup->file}}</td>            
              </tr>
              <tr>
                <th>Creator</th>
                <td> : {{$sup->creator}}</td>            
              </tr>
              <tr>
                <th>Type</th>
                <td> : {{$sup->type}}</td>            
              </tr>
              <tr>
                <th>Descriptions</th>
                <td> : {{$sup->description}}</td>           
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