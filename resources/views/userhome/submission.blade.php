@extends('layout.main')
@section('content')
<style>
	.stepwizard-step p {
		margin-top: 0px;
		color: #666;
	}

	.stepwizard-row {
		display: table-row;
	}

	.stepwizard {
		display: table;
		width: 100%;
		position: relative;
	}

	.stepwizard-step button[disabled] {
		/*opacity: 1 !important;
    filter: alpha(opacity=100) !important;*/
	}

	.stepwizard .btn.disabled,
	.stepwizard .btn[disabled],
	.stepwizard fieldset[disabled] .btn {
		opacity: 1 !important;
		color: #bbb;
	}

	.stepwizard-row:before {
		top: 14px;
		bottom: 0;
		content: " ";
		width: 100%;
		height: 1px;
		background-color: #ccc;
		z-index: 0;
	}

	.stepwizard-step {
		display: table-cell;
		text-align: center;
		position: relative;
	}

	.btn-circle {
		width: 30px;
		height: 30px;
		text-align: center;
		padding: 6px 0;
		font-size: 12px;
		line-height: 1.428571429;
		border-radius: 15px;
	}
	.list-judul{
		margin-top: 10px;
		margin-bottom: 10px;
	}
</style>
<div class="col-lg-12 col-md-12">
	<div class="stepwizard">
		<div class="stepwizard-row">
			<div class="stepwizard-step col-xs-3">
				<a href="{{ url('userhome/submit/1') }}" type="button" class="btn @if($page=='1')btn-success @else btn-default @endif btn-circle">1</a>
				<p><small>START</small></p>
			</div>
			<div class="stepwizard-step col-xs-2">
				<a href="javascript:void(0)" class="btn @if($page=='2')btn-success @else btn-default @endif btn-circle">2</a>
				<p><small>UPLOAD SUBMISSION</small></p>
			</div>
			<div class="stepwizard-step col-xs-2">
				<a href="javascript:void(0)" type="button" class="btn @if($page=='3')btn-success @else btn-default @endif btn-circle">3</a>
				<p><small>ENTER METADATA</small></p>
			</div>
			<div class="stepwizard-step col-xs-2">
				<a href="javascript:void(0)" type="button" class="btn @if($page=='4')btn-success @else btn-default @endif btn-circle">4</a>
				<p><small>UPLOAD SUPPLEMENTARY FILES</small></p>
			</div>
			<div class="stepwizard-step col-xs-3">
				<a href="javascript:void(0)" type="button" class="btn @if($page=='5')btn-success @else btn-default @endif btn-circle">5</a>
				<p><small>CONFIRMATION</small></p>
			</div>
		</div>
	</div>

		<?php if ($page == '1'): ?>
		 	<div class="panel panel-info setup" id="1" required>
				<form role="form" method="POST" enctype="multipart/form-data" action="{{ route('store_submit') }}" style="margin-top: 20px;">
	    		{{ csrf_field() }}
					<div class="panel-heading">
						<h3 class="panel-title">START</h3>
						<a href="{{url('userhome/')}}" class="btn btn-default" style="float: right;"><i class="fa fa-backward"> Back</i></a>
					</div>					
					<div class="panel-body" id="chk" required>				
						<h4>
							@if(Session::get('bahasa') == 'indonesia')
				              {!! $bahasa['bahasa18']->indonesia !!}
				            @else
				              {!! $bahasa['bahasa18']->inggris !!}
				            @endif
				        </h4>
						<p style="font-weight: bold;">Centang Label dibawah ini jika hasil penelitian anda sudah memenuhi melanjutkan Proses Submiting Hasil Penelitian.</p>					
						<div class="checkbox">
							<label><input type="checkbox" value="cek" id="chk" required>
								@if(Session::get('bahasa') == 'indonesia')
					              {!! $bahasa['bahasa20']->indonesia !!}
					            @else
					              {!! $bahasa['bahasa20']->inggris !!}
					            @endif
							</label>
						</div>
						<div class="checkbox">
							<label><input type="checkbox" value="cek" id="chk" required>
								@if(Session::get('bahasa') == 'indonesia')
					              {!! $bahasa['bahasa21']->indonesia !!}
					            @else
					              {!! $bahasa['bahasa21']->inggris !!}
					            @endif
							</label>
						</div>						
						<div class="checkbox">
							<label><input type="checkbox" value="cek" id="chk" required>
								@if(Session::get('bahasa') == 'indonesia')
					              {!! $bahasa['bahasa23']->indonesia !!}
					            @else
					              {!! $bahasa['bahasa23']->inggris !!}
					            @endif
							</label>
						</div>
						<div class="checkbox">
							<label><input type="checkbox" value="cek" id="chk" required>
								@if(Session::get('bahasa') == 'indonesia')
					              {!! $bahasa['bahasa24']->indonesia !!}
					            @else
					              {!! $bahasa['bahasa24']->inggris !!}
					            @endif
							</label>
						</div>
						<!-- <div class="checkbox">
							<label><input type="checkbox" value="cek" id="chk" required>
								@if(Session::get('bahasa') == 'indonesia')
					              {!! $bahasa['bahasa25']->indonesia !!}
					            @else
					              {!! $bahasa['bahasa25']->inggris !!}
					            @endif
							</label>
						</div> -->
						<div class="checkbox">
							<label><input type="checkbox" value="cek" id="chk" required>
								@if(Session::get('bahasa') == 'indonesia')
					              {!! $bahasa['bahasa26']->indonesia !!}
					            @else
					              {!! $bahasa['bahasa26']->inggris !!}
					            @endif
							</label>
						</div>
						<!-- <div class="checkbox">
							<label><input type="checkbox" value="cek" id="chk" required>
								@if(Session::get('bahasa') == 'indonesia')
					              {!! $bahasa['bahasa27']->indonesia !!}
					            @else
					              {!! $bahasa['bahasa27']->inggris !!}
					            @endif
							</label>
						</div> -->
						<hr style="  border: 1px solid DimGray;">

						<h4>
							@if(Session::get('bahasa') == 'indonesia')
				              {!! $bahasa['bahasa28']->indonesia !!}
				            @else
				              {!! $bahasa['bahasa28']->inggris !!}
				            @endif
				        </h4>
						<p>
							@if(Session::get('bahasa') == 'indonesia')
				              {!! $bahasa['bahasa29']->indonesia !!}
				            @else
				              {!! $bahasa['bahasa29']->inggris !!}
				            @endif
						</p>
						<ol>
						<li>
							@if(Session::get('bahasa') == 'indonesia')
				              {!! $bahasa['bahasa30']->indonesia !!}
				            @else
				              {!! $bahasa['bahasa30']->inggris !!}
				            @endif
				        </li>
							<li>
								@if(Session::get('bahasa') == 'indonesia')
					              {!! $bahasa['bahasa31']->indonesia !!}
					            @else
					              {!! $bahasa['bahasa31']->inggris !!}
					            @endif
								<ul>
									<li>
										@if(Session::get('bahasa') == 'indonesia')
							              {!! $bahasa['bahasa32']->indonesia !!}
							            @else
							              {!! $bahasa['bahasa32']->inggris !!}
							            @endif
							        </li>
									<li>
										@if(Session::get('bahasa') == 'indonesia')
							              {!! $bahasa['bahasa33']->indonesia !!}
							            @else
							              {!! $bahasa['bahasa33']->inggris !!}
							            @endif
									</li>
									<!-- <li>
										@if(Session::get('bahasa') == 'indonesia')
							              {!! $bahasa['bahasa34']->indonesia !!}
							            @else
							              {!! $bahasa['bahasa33']->inggris !!}
							            @endif
									</li> -->
									<li>
										@if(Session::get('bahasa') == 'indonesia')
							              {!! $bahasa['bahasa35']->indonesia !!}
							            @else
							              {!! $bahasa['bahasa35']->inggris !!}
							            @endif
									</li>
									<li>
										@if(Session::get('bahasa') == 'indonesia')
							              {!! $bahasa['bahasa36']->indonesia !!}
							            @else
							              {!! $bahasa['bahasa36']->inggris !!}
							            @endif
									</li>
									<!-- <li>
										@if(Session::get('bahasa') == 'indonesia')
							              {!! $bahasa['bahasa37']->indonesia !!}
							            @else
							              {!! $bahasa['bahasa37']->inggris !!}
							            @endif
									</li> -->
								</ul>
							</li>
						</ol>

						<h5>
							@if(Session::get('bahasa') == 'indonesia')
				              {!! $bahasa['bahasa38']->indonesia !!}
				            @else
				              {!! $bahasa['bahasa38']->inggris !!}
				            @endif
						:</h5>
						<p>
							@if(Session::get('bahasa') == 'indonesia')
				              {!! $bahasa['bahasa39']->indonesia !!}
				            @else
				              {!! $bahasa['bahasa39']->inggris !!}
				            @endif
						</p>
						<div class="checkbox">
							<label><input type="checkbox" value="cek" id="chk" required>
							@if(Session::get('bahasa') == 'indonesia')
				              {!! $bahasa['bahasa40']->indonesia !!}
				            @else
				              {!! $bahasa['bahasa40']->inggris !!}
				            @endif
							</label>
						</div>
						<hr style="  border: 1px solid DimGray;">

						<h4>
							@if(Session::get('bahasa') == 'indonesia')
				              {!! $bahasa['bahasa41']->indonesia !!}
				            @else
				              {!! $bahasa['bahasa41']->inggris !!}
				            @endif
				        </h4>
						<p>
							@if(Session::get('bahasa') == 'indonesia')
				              {!! $bahasa['bahasa42']->indonesia !!}
				            @else
				              {!! $bahasa['bahasa42']->inggris !!}
				            @endif
						</p>
						<hr style="  border: 1px solid DimGray;">

						<h4>
							@if(Session::get('bahasa') == 'indonesia')
				              {!! $bahasa['bahasa43']->indonesia !!}
				            @else
				              {!! $bahasa['bahasa43']->inggris !!}
				            @endif
				        </h4>
				        <div class="form-group list-judul">
							<label class="control-label col-sm-2">Judul Penelitian</label>
						    <div class="col-sm-10">
						    	<select class="form-control col-sm-10" name="permohonan_id">
							    	<option disabled value="">.:: Pilih Penelitian ::.</option> 
								    @foreach($pengajuan as $per)
						      			<option value="{{ $per->id_permohonan }}">{{ $per->judul_penelitian }}</option>
						        	@endforeach
						        </select>
						    </div>
						</div>
						<br><br>		
	            		<div class="form-group">
							<label class="control-label col-sm-2" for="email">Enter text (optional):</label>
							<div class="col-sm-10">
								<textarea class="form-control" old('comments') id="summary-ckeditor"
									name="comments">
										<?php if ($submission != ''): ?>
											 {!!$submission->comments!!}
										<?php endif ?>
									</textarea>
							</div>
						</div>
						<button type="submit" class="btn btn-success">Save</button>
					<a href="{{ url('userhome/submit/2') }}">
						<button class="btn btn-primary nextBtn pull-right" type="submit" style="margin-top: 10px;">Continue</button>
					</a>
					</div>
				</form>
			</div>
		 <?php endif ?>


		<?php if ($page == '2'): ?>
			<div class="panel panel-info setup" id="2">
				<div class="panel-heading">
					<h3 class="panel-title">Destination</h3>
				</div>
				<div class="panel-body">
					<h5>
						@if(Session::get('bahasa') == 'indonesia')
			              {!! $bahasa['bahasa44']->indonesia !!}
			            @else
			              {!! $bahasa['bahasa44']->inggris !!}
			            @endif
				    </h5>
					<ol>
						<li>
							@if(Session::get('bahasa') == 'indonesia')
				              {!! $bahasa['bahasa45']->indonesia !!}
				            @else
				              {!! $bahasa['bahasa45']->inggris !!}
				            @endif
			        	</li>
						<li>
							@if(Session::get('bahasa') == 'indonesia')
				              {!! $bahasa['bahasa46']->indonesia !!}
				            @else
				              {!! $bahasa['bahasa46']->inggris !!}
				            @endif
						</li>
						<li>
							@if(Session::get('bahasa') == 'indonesia')
				              {!! $bahasa['bahasa47']->indonesia !!}
				            @else
				              {!! $bahasa['bahasa47']->inggris !!}
				            @endif
						</li>
						<li>
							@if(Session::get('bahasa') == 'indonesia')
				              {!! $bahasa['bahasa48']->indonesia !!}
				            @else
				              {!! $bahasa['bahasa48']->inggris !!}
				            @endif
				        </li>
						<li>
							@if(Session::get('bahasa') == 'indonesia')
				              {!! $bahasa['bahasa49']->indonesia !!}
				            @else
				              {!! $bahasa['bahasa49']->inggris !!}
				            @endif
				        </li>
					</ol>
					<hr style="border: 1px solid DimGray;">
					<h4>Submission File</h4>
					<table class="table">
					    <tbody>
					        <tr>
					          <th>File Name	:</th>
					            <td>
					            @if(Session::has('filename'))
					            	{{ Session::get('filename')}}
					            @else
					            	-
					            @endif
					            </td>
					        </tr>
					        <tr>
					          <th>Original file name:</th>
					            <td>
					            	@if(Session::has('nameorigin'))
					            		{{Session::get('nameorigin')}}
					            	@else
					            		-
					            	@endif
					            </td>
					        </tr>
					        <tr>
					          <th>File Size	:</th>
					            <td>
					            	@if(Session::has('filesize'))
					            		{{Session::get('filesize')}}
					            	@else
					            		-
					            	@endif
					            </td>
					        </tr>
					      <tr>
					          <th>Date uploaded	:</th>
					          	<td>
					          		@if(Session::has('date'))
					            		{{Session::get('date')}}
					            	@else
					            		-
					            	@endif
					          	</td>
					        </tr>
					    </tbody>
					</table>
					<hr style="border: 1px solid DimGray;">

					<form class="form-inline" action="{{ route('up_filesubmit') }}" method="POST" enctype="multipart/form-data">
	    				{{ csrf_field() }}
						<div class="form-group">
							<label>Upload Submission File:</label>
							<input type="file" class="form-control" name="file_submission" required="" accept="application/msword, application/doc, .docx, text/plain, .pdf">
						</div>
					<hr style="border: 1px solid DimGray;">
						<button type="submit" class="btn btn-success">Upload</button>			
					</form>
					@if ($submission->file_submission != '')
						<a href="{{ url('userhome/submit/3') }}">
						<button class="btn btn-primary nextBtn pull-right" type="submit"  style="margin-top: 10px;">Save and Continue</button>
						</a>
					@endif
				</div>
			</div>
		<?php endif ?>

		<?php if ($page == '3'): ?>
			<div class="panel panel-info setup" id="step-3">
				<div class="panel-heading">
					<h3 class="panel-title">Author</h3>
				</div>
				<div class="panel-body">
					<form method="POST" enctype="multipart/form-data" action="{{ route('up_submission') }}"
						style="margin-top: 20px;">
						{{ csrf_field() }}
						<div class="form-group col-sm-4">
							<label>First Name *</label>
							<input type="text" name="first_name" value="{{$profile->first_name}}" required="" placeholder="First Name"
								class="form-control">
						</div>
						<div class="form-group col-sm-4">
							<label>Middle Name</label>
							<input type="text" name="middle_name" value="{{$profile->middle_name}}" placeholder="Middle Name" class="form-control">
						</div>
						<div class="form-group col-sm-4">
							<label>Last Name *</label>
							<input type="text" name="last_name" value="{{$profile->last_name}}" required="" placeholder="Last Name"
								class="form-control">
						</div>
						<div class="form-group col-sm-4">
							<label>Email *</label>
							<input type="text" name="email" value="{{$profile->email}}" required="" placeholder="Email" class="form-control">
						</div>
						<div class="form-group col-sm-4">
							<label>URL</label>
							<input type="text" name="url" value="{{$profile->url}}" placeholder="URL" class="form-control">
						</div>
						<div class="form-group col-sm-4">
							<label>Country</label>
							<select class="form-control" id="sel1" name="country">
								<option value="AF">Afghanistan</option>
								<option value="AX">Åland Islands</option>
								<option value="AL">Albania</option>
								<option value="DZ">Algeria</option>
								<option value="AS">American Samoa</option>
								<option value="AD">Andorra</option>
								<option value="AO">Angola</option>
								<option value="AI">Anguilla</option>
								<option value="AQ">Antarctica</option>
								<option value="AG">Antigua and Barbuda</option>
								<option value="AR">Argentina</option>
								<option value="AM">Armenia</option>
								<option value="AW">Aruba</option>
								<option value="AU">Australia</option>
								<option value="AT">Austria</option>
								<option value="AZ">Azerbaijan</option>
								<option value="BS">Bahamas</option>
								<option value="BH">Bahrain</option>
								<option value="BD">Bangladesh</option>
								<option value="BB">Barbados</option>
								<option value="BY">Belarus</option>
								<option value="BE">Belgium</option>
								<option value="BZ">Belize</option>
								<option value="BJ">Benin</option>
								<option value="BM">Bermuda</option>
								<option value="BT">Bhutan</option>
								<option value="BO">Bolivia, Plurinational State of</option>
								<option value="BQ">Bonaire, Sint Eustatius and Saba</option>
								<option value="BA">Bosnia and Herzegovina</option>
								<option value="BW">Botswana</option>
								<option value="BV">Bouvet Island</option>
								<option value="BR">Brazil</option>
								<option value="IO">British Indian Ocean Territory</option>
								<option value="BN">Brunei Darussalam</option>
								<option value="BG">Bulgaria</option>
								<option value="BF">Burkina Faso</option>
								<option value="BI">Burundi</option>
								<option value="KH">Cambodia</option>
								<option value="CM">Cameroon</option>
								<option value="CA">Canada</option>
								<option value="CV">Cape Verde</option>
								<option value="KY">Cayman Islands</option>
								<option value="CF">Central African Republic</option>
								<option value="TD">Chad</option>
								<option value="CL">Chile</option>
								<option value="CN">China</option>
								<option value="CX">Christmas Island</option>
								<option value="CC">Cocos (Keeling) Islands</option>
								<option value="CO">Colombia</option>
								<option value="KM">Comoros</option>
								<option value="CG">Congo</option>
								<option value="CD">Congo, the Democratic Republic of the</option>
								<option value="CK">Cook Islands</option>
								<option value="CR">Costa Rica</option>
								<option value="CI">Côte d'Ivoire</option>
								<option value="HR">Croatia</option>
								<option value="CU">Cuba</option>
								<option value="CW">Curaçao</option>
								<option value="CY">Cyprus</option>
								<option value="CZ">Czech Republic</option>
								<option value="DK">Denmark</option>
								<option value="DJ">Djibouti</option>
								<option value="DM">Dominica</option>
								<option value="DO">Dominican Republic</option>
								<option value="EC">Ecuador</option>
								<option value="EG">Egypt</option>
								<option value="SV">El Salvador</option>
								<option value="GQ">Equatorial Guinea</option>
								<option value="ER">Eritrea</option>
								<option value="EE">Estonia</option>
								<option value="ET">Ethiopia</option>
								<option value="FK">Falkland Islands (Malvinas)</option>
								<option value="FO">Faroe Islands</option>
								<option value="FJ">Fiji</option>
								<option value="FI">Finland</option>
								<option value="FR">France</option>
								<option value="GF">French Guiana</option>
								<option value="PF">French Polynesia</option>
								<option value="TF">French Southern Territories</option>
								<option value="GA">Gabon</option>
								<option value="GM">Gambia</option>
								<option value="GE">Georgia</option>
								<option value="DE">Germany</option>
								<option value="GH">Ghana</option>
								<option value="GI">Gibraltar</option>
								<option value="GR">Greece</option>
								<option value="GL">Greenland</option>
								<option value="GD">Grenada</option>
								<option value="GP">Guadeloupe</option>
								<option value="GU">Guam</option>
								<option value="GT">Guatemala</option>
								<option value="GG">Guernsey</option>
								<option value="GN">Guinea</option>
								<option value="GW">Guinea-Bissau</option>
								<option value="GY">Guyana</option>
								<option value="HT">Haiti</option>
								<option value="HM">Heard Island and McDonald Islands</option>
								<option value="VA">Holy See (Vatican City State)</option>
								<option value="HN">Honduras</option>
								<option value="HK">Hong Kong</option>
								<option value="HU">Hungary</option>
								<option value="IS">Iceland</option>
								<option value="IN">India</option>
								<option value="ID">Indonesia</option>
								<option value="IR">Iran, Islamic Republic of</option>
								<option value="IQ">Iraq</option>
								<option value="IE">Ireland</option>
								<option value="IM">Isle of Man</option>
								<option value="IL">Israel</option>
								<option value="IT">Italy</option>
								<option value="JM">Jamaica</option>
								<option value="JP">Japan</option>
								<option value="JE">Jersey</option>
								<option value="JO">Jordan</option>
								<option value="KZ">Kazakhstan</option>
								<option value="KE">Kenya</option>
								<option value="KI">Kiribati</option>
								<option value="KP">Korea, Democratic People's Republic of</option>
								<option value="KR">Korea, Republic of</option>
								<option value="KW">Kuwait</option>
								<option value="KG">Kyrgyzstan</option>
								<option value="LA">Lao People's Democratic Republic</option>
								<option value="LV">Latvia</option>
								<option value="LB">Lebanon</option>
								<option value="LS">Lesotho</option>
								<option value="LR">Liberia</option>
								<option value="LY">Libya</option>
								<option value="LI">Liechtenstein</option>
								<option value="LT">Lithuania</option>
								<option value="LU">Luxembourg</option>
								<option value="MO">Macao</option>
								<option value="MK">Macedonia, the former Yugoslav Republic of</option>
								<option value="MG">Madagascar</option>
								<option value="MW">Malawi</option>
								<option value="MY">Malaysia</option>
								<option value="MV">Maldives</option>
								<option value="ML">Mali</option>
								<option value="MT">Malta</option>
								<option value="MH">Marshall Islands</option>
								<option value="MQ">Martinique</option>
								<option value="MR">Mauritania</option>
								<option value="MU">Mauritius</option>
								<option value="YT">Mayotte</option>
								<option value="MX">Mexico</option>
								<option value="FM">Micronesia, Federated States of</option>
								<option value="MD">Moldova, Republic of</option>
								<option value="MC">Monaco</option>
								<option value="MN">Mongolia</option>
								<option value="ME">Montenegro</option>
								<option value="MS">Montserrat</option>
								<option value="MA">Morocco</option>
								<option value="MZ">Mozambique</option>
								<option value="MM">Myanmar</option>
								<option value="NA">Namibia</option>
								<option value="NR">Nauru</option>
								<option value="NP">Nepal</option>
								<option value="NL">Netherlands</option>
								<option value="NC">New Caledonia</option>
								<option value="NZ">New Zealand</option>
								<option value="NI">Nicaragua</option>
								<option value="NE">Niger</option>
								<option value="NG">Nigeria</option>
								<option value="NU">Niue</option>
								<option value="NF">Norfolk Island</option>
								<option value="MP">Northern Mariana Islands</option>
								<option value="NO">Norway</option>
								<option value="OM">Oman</option>
								<option value="PK">Pakistan</option>
								<option value="PW">Palau</option>
								<option value="PS">Palestinian Territory, Occupied</option>
								<option value="PA">Panama</option>
								<option value="PG">Papua New Guinea</option>
								<option value="PY">Paraguay</option>
								<option value="PE">Peru</option>
								<option value="PH">Philippines</option>
								<option value="PN">Pitcairn</option>
								<option value="PL">Poland</option>
								<option value="PT">Portugal</option>
								<option value="PR">Puerto Rico</option>
								<option value="QA">Qatar</option>
								<option value="RE">Réunion</option>
								<option value="RO">Romania</option>
								<option value="RU">Russian Federation</option>
								<option value="RW">Rwanda</option>
								<option value="BL">Saint Barthélemy</option>
								<option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
								<option value="KN">Saint Kitts and Nevis</option>
								<option value="LC">Saint Lucia</option>
								<option value="MF">Saint Martin (French part)</option>
								<option value="PM">Saint Pierre and Miquelon</option>
								<option value="VC">Saint Vincent and the Grenadines</option>
								<option value="WS">Samoa</option>
								<option value="SM">San Marino</option>
								<option value="ST">Sao Tome and Principe</option>
								<option value="SA">Saudi Arabia</option>
								<option value="SN">Senegal</option>
								<option value="RS">Serbia</option>
								<option value="SC">Seychelles</option>
								<option value="SL">Sierra Leone</option>
								<option value="SG">Singapore</option>
								<option value="SX">Sint Maarten (Dutch part)</option>
								<option value="SK">Slovakia</option>
								<option value="SI">Slovenia</option>
								<option value="SB">Solomon Islands</option>
								<option value="SO">Somalia</option>
								<option value="ZA">South Africa</option>
								<option value="GS">South Georgia and the South Sandwich Islands</option>
								<option value="SS">South Sudan</option>
								<option value="ES">Spain</option>
								<option value="LK">Sri Lanka</option>
								<option value="SD">Sudan</option>
								<option value="SR">Suriname</option>
								<option value="SJ">Svalbard and Jan Mayen</option>
								<option value="SZ">Swaziland</option>
								<option value="SE">Sweden</option>
								<option value="CH">Switzerland</option>
								<option value="SY">Syrian Arab Republic</option>
								<option value="TW">Taiwan, Province of China</option>
								<option value="TJ">Tajikistan</option>
								<option value="TZ">Tanzania, United Republic of</option>
								<option value="TH">Thailand</option>
								<option value="TL">Timor-Leste</option>
								<option value="TG">Togo</option>
								<option value="TK">Tokelau</option>
								<option value="TO">Tonga</option>
								<option value="TT">Trinidad and Tobago</option>
								<option value="TN">Tunisia</option>
								<option value="TR">Turkey</option>
								<option value="TM">Turkmenistan</option>
								<option value="TC">Turks and Caicos Islands</option>
								<option value="TV">Tuvalu</option>
								<option value="UG">Uganda</option>
								<option value="UA">Ukraine</option>
								<option value="AE">United Arab Emirates</option>
								<option value="GB">United Kingdom</option>
								<option value="US">United States</option>
								<option value="UM">United States Minor Outlying Islands</option>
								<option value="UY">Uruguay</option>
								<option value="UZ">Uzbekistan</option>
								<option value="VU">Vanuatu</option>
								<option value="VE">Venezuela, Bolivarian Republic of</option>
								<option value="VN">Viet Nam</option>
								<option value="VG">Virgin Islands, British</option>
								<option value="VI">Virgin Islands, U.S.</option>
								<option value="WF">Wallis and Futuna</option>
								<option value="EH">Western Sahara</option>
								<option value="YE">Yemen</option>
								<option value="ZM">Zambia</option>
								<option value="ZW">Zimbabwe</option>
							</select>
						</div>
						<div class="form-group col-sm-6">
							<label>ID ORCID</label>
							<input type="text" name="id_orcid" value="{{$profile->id_orcid}}" class="form-control">
							<small class="form-text text-muted">ORCID iDs can only be assigned by the ORCID Registry. You
								must conform to their standards for expressing ORCID iDs, and include the full URI (eg.
								http://orcid.org/0000-0002-1825-0097).</small>
						</div>
						<div class="form-group col-sm-6">
							<label>Affiliation</label>
							<textarea type="text" name="affiliation" rows="3" placeholder="Affiliation"
								class="form-control">{{$profile->affiliation}}</textarea>
							<small class="form-text text-muted">(Your institution, e.g. "Simon Fraser University").</small>
						</div>
						<div class="form-group col-sm-6">
							<label>Competing interests</label>
							<textarea class="form-control" name="interest" id="summary-ckeditor2">{{$profile->interest}}</textarea>
						</div>
						<div class="form-group col-sm-6">
							<label>BIO Statement</label>
							<textarea class="form-control" name="bio" id="summary-ckeditor">{!! $profile->bio !!}</textarea>
							<small class="form-text text-muted">Bio Statement (Your institution, e.g. "Simon Fraser University").</small>
						</div>
						<!-- Awal -->


						<button type="button" id="formButton" style="display: block; margin-top: 10px;" class="btn btn-primary col-sm btn-add-author">Add Author</button>

						<div id="panel-form" class="user" style="display: none;">
							<input type="hidden" name="jumlah_author" class="noAuthor">
							<div class="fmAut"></div>
							<!-- <button type="submit" class="btn btn-success">SAVE</button> -->
						</div>

						<hr style="border: 1px solid DimGray;"></hr>

						<h4>Title and Abstract</h4>
						<div class="form-group">
							<label>Title *</label>
							<input type="text" name="title" class="form-control">
						</div>
						<div class="form-group">
							<label>Upload File Abstract *</label>
							<input type="file" name="abstract" class="form-control" accept=".pdf">
						</div>

						<hr style="border: 1px solid DimGray;"></hr>

						<h4>Indexing</h4>
						<label class="control-label col-sm-2" for="email">Language:</label>
						<div class="col-sm-10">
							<input type="text" name="lang" class="form-control">
							<small>English=en; Indonesia=id;</small>
						</div>

						<hr style="border: 1px solid DimGray;"></hr>

						<h4>Contributors and Supporting Agencies</h4>
						<label class="control-label col-sm-2" for="email">Agencies:</label>
						<div class="col-sm-10">
							<input type="text" name="agencies" class="form-control">
							<small>Identify agencies (a person, an organization, or a service) that made contributions to the content or provided funding or support for the work presented in this submission. Separate them with a semi-colon (e.g. John Doe, Metro University; Master University, Department of Computer Science).</small>
						</div>

						<hr style="border: 1px solid DimGray;"></hr>

						<h4>References</h4>
						<label class="control-label col-sm-2">References:</label>
						<div class="col-sm-10">
							<input type="text" name="references" class="form-control">
							<small>Provide a formatted list of references for works cited in this submission. Please separate individual references with a blank line.</small>
						</div>
						<button class="btn btn-success" type="submit">Save</button>

						<hr style="border: 1px solid DimGray;"></hr>

					</form>
					@if ($submission->file_submission != '')
					<a href="{{ url('userhome/submit/4') }}">
						<button class="btn btn-primary nextBtn pull-right" type="submit"  style="margin-top: 10px;"> Next</button>
					</a>
					@endif
				</div>
			</div>
		<?php endif ?>

		<?php if ($page == '4'): ?>
			<div class="panel panel-info setup" id="step-4">
				<div class="panel-heading">
					<h3 class="panel-title">UPLOAD SUPPLEMENTARY FILES</h3>
				</div>
				<div class="panel-body">
				<p>
					@if(Session::get('bahasa') == 'indonesia')
		              {!! $bahasa['bahasa50']->indonesia !!}
		            @else
		              {!! $bahasa['bahasa50']->inggris !!}
			        @endif
			    </p>
					<table class="table">
					    <thead>
					      <tr>
					        <th>ID</th>
					        <th>TITLE</th>
					        <th>ORIGINAL FILE NAME</th>
					        <th>DATE UPLOAD</th>
					        <th>ACTION</th>
					      </tr>
					    </thead>
					    <tbody>
					    <?php
					    	$no = 1;
					     ?>
					    @if (!empty($fileSup))
					    	@foreach ($fileSup as $key)
					    		<tr>
							      	<td>{{$no++}}</td>
							      	<td>{{$key->title}}</td>
							        <td>{{$key->file}}</td>
							        <td>{{date('d-m-Y', strtotime($key->date))}}</td>
							        <td>
					                  	<div class="btn-group" role="group" aria-label="Basic example">
						                  	<a href="javascript:void(0);" onclick="UpdateSupp('{{$key->id}}')" class="btn btn-warning btn-sm" title="Edit">
							                  	<i class="fa fa-pencil"></i>
							                </a>&nbsp;
							                <a href="{{url('userhome/deletesupp/'.$key->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('are you sure to delete this?')" title="Edit">
							                  	<i class="fa fa-trash"></i>
							                </a>&nbsp;
					                  	</div>
							        </td>
							    </tr>
					    	@endforeach
					    @endif

					    </tbody>
					</table>

					<hr style="border: 1px solid DimGray;">

					<button type="button" id="formButton" style="display: block; margin-top: 10px;" class="btn btn-success btn-sm">Add Supplementary</button>

			            <form id="form1" method="POST" style="display : none;" enctype="multipart/form-data" action="{{ route('up_filesupple') }}">
						{{ csrf_field() }}
						<input type="hidden" name="id_spp" id="id_spp">
			             	<div class="form-group col-sm-6">
							  <label>Title *</label>
							  <input type="text" name="title" class="form-control" placeholder="Title" id="title_spp">
							</div>
							<div class="form-group col-sm-6">
							  <label>Creator (Or Owner) of file</label>
							  <input type="text" name="creator" placeholder="Creator / Owner" class="form-control" id="creator_spp">
							</div>
							<div class="form-group col-sm-6">
							  <label>Keywords</label>
							  <input type="text" name="keywords" placeholder="Keywords" class="form-control" id="keywords_spp">
							</div>
							<div class="form-group col-sm-6">
							  <label>Publisher</label>
							  <input type="text" name="publisher" placeholder="Publisher" id="publisher_spp" class="form-control">
							  <small class="form-text text-muted">Use only with formally published materials.</small>
							</div>
							<div class="form-group col-sm-12">
							  <label for="sel1">Select list:</label>
							  <select class="form-control" id="sel1" name="type" id="type_spp">
							    <option>Research Instrument</option>
							    <option>Research Materials</option>
							    <option>Research Results</option>
							    <option>Transcripts</option>
							    <option>Data Analysis</option>
							    <option>Data Set</option>
							    <option>Source Text</option>
							    <option>Others</option>
							  </select>
							  <label>Specify Other</label>
							  <input type="text" placeholder="Enter Specify Other" id="type_spp" name="type" class="form-control namespecify">
							</div>

							<div class="form-group col-sm-4">
							  <label>Contributor or sponsoring agency</label>
							  <input type="text" name="agencies" id="agencies_spp" placeholder="Contributor or sponsoring agency" class="form-control">
							</div>
							<div class="form-group col-sm-4">
							  <label>Date</label>
							  <input type="date" name="date" id="date_spp" class="form-control">
							  <small class="form-text text-muted">Date when data was collected or instrument created.</small>
							</div>
							<div class="form-group col-sm-4">
							  <label>Contributor or Language</label>
							  <input type="text" name="lang" id="lang_spp" placeholder="Language" class="form-control">
							  	<small>English=en; Indonesia=id;</small>

							</div>
							<div class="form-group col-sm-12">
							  <label>Brief Description</label>
							  <textarea type="text" name="description" rows="3" id="description_spp" placeholder="Enter Descriptions" class="form-control"></textarea>
							</div>

							<div class="form-group">
								<label>Upload Supplemenraty File:</label>
								<input type="file" class="form-control" name="file" id="file_spp" accept=".pdf">
							</div>
							<button type="submit" class="btn btn-success btn-sm">Save</button>
							<button type="button" class="btn btn-default btn-sm" onclick="batalUP()">Cancel</button>
			            </form>
					<hr style="  border: 1px solid DimGray;">

					<a href="{{ url('userhome/submit/5') }}">
						<button class="btn btn-primary nextBtn pull-right" type="submit"  style="margin-top: 10px;"> Next</button>
					</a>

				</div>
			</div>
		<?php endif ?>

		<?php if ($page == '5'): ?>
			<div class="panel panel-info setup" id="step-5">
				<div class="panel-heading">
					<h3 class="panel-title">CONFIRMATION</h3>
				</div>
				<div class="panel-body">
				<p>To submit your manuscript to Molecular and Cellular Biomedical Sciences click Finish Submission. The submission's principal contact will receive an acknowledgement by email and will be able to view the submission's progress through the editorial process by logging in to the journal web site. Thank you for your interest in publishing with Molecular and Cellular Biomedical Sciences.</p>
					<table class="table">
					    <thead>
					      <tr>
					        <th>ID</th>
					        <th>ORIGINAL FILE NAME</th>
					        <th>TYPE</th>
					        <th>FILE SIZE</th>
					        <th>DATE UPLOADED</th>
					      </tr>
					    </thead>
					    <tbody>
					    	<?php $no = 1; ?>
				    		<tr>
						        <td>{{ $no++ }}</td>
						        <td>{{$submission->original_filename}}</td>
						        <td>Submission File</td>
						        <td>{{$submission->file_size}}</td>
						        <td>{{date('d-m-Y', strtotime($submission->created_at))}}</td>
						    </tr>
						    @if (!empty($fileSup))
						    	@foreach ($fileSup as $supplemen)
						    		<tr>
						    			<td>{{ $no++ }}</td>
						    			<td>{{ $supplemen->file }}</td>
								        <td>Supplemenraty File</td>
								        <td>{{$supplemen->file_size}}</td>
							        	<td>{{date('d-m-Y', strtotime($supplemen->created_at))}}</td>
								    </tr>
						    	@endforeach
						    @endif
					    </tbody>
					</table>

					<hr style="  border: 1px solid DimGray;">
					<a href="{{ url('userhome/') }}">
						<button class="btn btn-primary nextBtn pull-right" type="submit"  style="margin-top: 10px;"> Save and Finish</button>
					</a>
				</div>
			</div>
		<?php endif ?>
</div>
@endsection
@section('js')
<script>
	  $(document).ready(function() {
	  $("#formButton").click(function() {

  		$('.waitingForm1').hide();
	    $("#form1").show();

		$('#id_spp').val('');
		$('#title_spp').val('');
		$('#creator_spp').val('');
		$('#keywords_spp').val('');
		$('#publisher_spp').val('');
		$('#type_spp').val('');
		$('#agencies_spp').val('');
		$('#date_spp').val('');
		$('#lang_spp').val('');
		$('#description_spp').val('');
		$('#file_spp').attr('required','required');
	  });
	});
	  function batalUP() {
	  	$("#form1").hide();


		$('#id_spp').val('');
		$('#title_spp').val('');
		$('#creator_spp').val('');
		$('#keywords_spp').val('');
		$('#publisher_spp').val('');
		$('#type_spp').val('');
		$('#agencies_spp').val('');
		$('#date_spp').val('');
		$('#lang_spp').val('');
		$('#description_spp').val('');
		$('#file_spp').attr('required','required');
	  }
</script>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
	integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
	integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
	integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script> -->
<script>
	$(document).ready(function () {

		var navListItems = $('div.setup-panel div a'),
			allWells = $('.setup-content'),
			allNextBtn = $('.nextBtn');

		allWells.hide();

		navListItems.click(function (e) {
			e.preventDefault();
			var $target = $($(this).attr('href')),
				$item = $(this);

			if (!$item.hasClass('disabled')) {
				navListItems.removeClass('btn-success').addClass('btn-default');
				$item.addClass('btn-success');
				allWells.hide();
				$target.show();
				$target.find('input:eq(0)').focus();
			}
		});

		allNextBtn.click(function () {
			var curStep = $(this).closest(".setup-content"),
				curStepBtn = curStep.attr("id"),
				nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next()
				.children("a"),
				curInputs = curStep.find("input[type='text'],input[type='url']"),
				isValid = true;

			$(".form-group").removeClass("has-error");
			for (var i = 0; i < curInputs.length; i++) {
				if (!curInputs[i].validity.valid) {
					isValid = false;
					$(curInputs[i]).closest(".form-group").addClass("has-error");
				}
			}

			if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
		});

		$('div.setup-panel div a.btn-success').trigger('click');
	});
</script>

<script type="text/javascript">
	$('.btn-add-author').click(function(){
		var no = $('.noAuthor').val();
		if(no == ''){
			no = 0;
		}else{
			no++;
		}
			$('#panel-form').show();

		var tag = '';
		tag += '<div class="form-group col-sm-4">';
		tag += '<label>First Name *</label>';
		tag += '<input type="text" name="first_name_aut['+parseInt(no)+']" required="" placeholder="First Name" class="form-control">';
		tag += '</div>';
		tag += '<div class="form-group col-sm-4">';
		tag += '<label>Middle Name</label>';
		tag += '<input type="text" name="middle_name_aut['+parseInt(no)+']" placeholder="Middle Name" class="form-control">';
		tag += '</div>';
		tag += '<div class="form-group col-sm-4">';
		tag += '<label>Last Name *</label>';
		tag += '<input type="text" name="last_name_aut['+parseInt(no)+']" required="" placeholder="Last Name" class="form-control">';
		tag += '</div>';
		tag += '<div class="form-group col-sm-4">';
		tag += '<label>Email *</label>';
		tag += '<input type="text" name="email_aut['+parseInt(no)+']" required="" placeholder="Email" class="form-control">';
		tag += '</div>';
		tag += '<div class="form-group col-sm-4">';
		tag += '<label>URL</label>';
		tag += '<input type="text" name="url_aut['+parseInt(no)+']" placeholder="URL" class="form-control">';
		tag += '</div>';
		tag += '<div class="form-group col-sm-4">';
		tag += '<label>Country</label>';
		tag += '<select class="form-control" id="sel1" name="country_aut['+parseInt(no)+']">';
		tag += '<option value="AF">Afghanistan</option>';
		tag += '<option value="AX">Åland Islands</option>';
		tag += '<option value="AL">Albania</option>';
		tag += '<option value="DZ">Algeria</option>';
		tag += '<option value="AS">American Samoa</option>';
		tag += '<option value="AD">Andorra</option>';
		tag += '<option value="AO">Angola</option>';
		tag += '<option value="AI">Anguilla</option>';
		tag += '<option value="AQ">Antarctica</option>';
		tag += '<option value="AG">Antigua and Barbuda</option>';
		tag += '<option value="AR">Argentina</option>';
		tag += '<option value="AM">Armenia</option>';
		tag += '<option value="AW">Aruba</option>';
		tag += '<option value="AU">Australia</option>';
		tag += '<option value="AT">Austria</option>';
		tag += '<option value="AZ">Azerbaijan</option>';
		tag += '<option value="BS">Bahamas</option>';
		tag += '<option value="BH">Bahrain</option>';
		tag += '<option value="BD">Bangladesh</option>';
		tag += '<option value="BB">Barbados</option>';
		tag += '<option value="BY">Belarus</option>';
		tag += '<option value="BE">Belgium</option>';
		tag += '<option value="BZ">Belize</option>';
		tag += '<option value="BM">Bermuda</option>';
		tag += '<option value="BT">Bhutan</option>';
		tag += '<option value="BO">Bolivia, Plurinational State of</option>';
		tag += '<option value="BQ">Bonaire, Sint Eustatius and Saba</option>';
		tag += '<option value="BA">Bosnia and Herzegovina</option>';
		tag += '<option value="BW">Botswana</option>';
		tag += '<option value="BV">Bouvet Island</option>';
		tag += '<option value="BR">Brazil</option>';
		tag += '<option value="IO">British Indian Ocean Territory</option>';
		tag += '<option value="BN">Brunei Darussalam</option>';
		tag += '<option value="BG">Bulgaria</option>';
		tag += '<option value="BF">Burkina Faso</option>';
		tag += '<option value="BI">Burundi</option>';
		tag += '<option value="KH">Cambodia</option>';
		tag += '<option value="CM">Cameroon</option>';
		tag += '<option value="CA">Canada</option>';
		tag += '<option value="CV">Cape Verde</option>';
		tag += '<option value="KY">Cayman Islands</option>';
		tag += '<option value="CF">Central African Republic</option>';
		tag += '<option value="TD">Chad</option>';
		tag += '<option value="CL">Chile</option>';
		tag += '<option value="CN">China</option>';
		tag += '<option value="CX">Christmas Island</option>';
		tag += '<option value="CC">Cocos (Keeling) Islands</option>';
		tag += '<option value="CO">Colombia</option>';
		tag += '<option value="KM">Comoros</option>';
		tag += '<option value="CG">Congo</option>';
		tag += '<option value="CD">Congo, the Democratic Republic of the</option>';
		tag += '<option value="CK">Cook Islands</option>';
		tag += '<option value="CR">Costa Rica</option>';
		tag += '<option value="CI">Côte d\'Ivoire</option>';
		tag += '<option value="HR">Croatia</option>';
		tag += '<option value="CU">Cuba</option>';
		tag += '<option value="CW">Curaçao</option>';
		tag += '<option value="CY">Cyprus</option>';
		tag += '<option value="CZ">Czech Republic</option>';
		tag += '<option value="DK">Denmark</option>';
		tag += '<option value="DJ">Djibouti</option>';
		tag += '<option value="DM">Dominica</option>';
		tag += '<option value="DO">Dominican Republic</option>';
		tag += '<option value="EC">Ecuador</option>';
		tag += '<option value="EG">Egypt</option>';
		tag += '<option value="SV">El Salvador</option>';
		tag += '<option value="GQ">Equatorial Guinea</option>';
		tag += '<option value="ER">Eritrea</option>';
		tag += '<option value="EE">Estonia</option>';
		tag += '<option value="ET">Ethiopia</option>';
		tag += '<option value="FK">Falkland Islands (Malvinas)</option>';
		tag += '<option value="FO">Faroe Islands</option>';
		tag += '<option value="FJ">Fiji</option>';
		tag += '<option value="FI">Finland</option>';
		tag += '<option value="FR">France</option>';
		tag += '<option value="GF">French Guiana</option>';
		tag += '<option value="PF">French Polynesia</option>';
		tag += '<option value="TF">French Southern Territories</option>';
		tag += '<option value="GA">Gabon</option>';
		tag += '<option value="GM">Gambia</option>';
		tag += '<option value="GE">Georgia</option>';
		tag += '<option value="DE">Germany</option>';
		tag += '<option value="GH">Ghana</option>';
		tag += '<option value="GI">Gibraltar</option>';
		tag += '<option value="GR">Greece</option>';
		tag += '<option value="GL">Greenland</option>';
		tag += '<option value="GD">Grenada</option>';
		tag += '<option value="GP">Guadeloupe</option>';
		tag += '<option value="GU">Guam</option>';
		tag += '<option value="GT">Guatemala</option>';
		tag += '<option value="GG">Guernsey</option>';
		tag += '<option value="GN">Guinea</option>';
		tag += '<option value="GW">Guinea-Bissau</option>';
		tag += '<option value="GY">Guyana</option>';
		tag += '<option value="HT">Haiti</option>';
		tag += '<option value="HM">Heard Island and McDonaldIslands</option>';
		tag += '<option value="VA">Holy See (Vatican City State)</option>';
		tag += '<option value="HN">Honduras</option>';
		tag += '<option value="HK">Hong Kong</option>';
		tag += '<option value="HU">Hungary</option>';
		tag += '<option value="IS">Iceland</option>';
		tag += '<option value="IN">India</option>';
		tag += '<option value="ID">Indonesia</option>';
		tag += '<option value="IR">Iran, Islamic Republic of</option>';
		tag += '<option value="IQ">Iraq</option>';
		tag += '<option value="IE">Ireland</option>';
		tag += '<option value="IM">Isle of Man</option>';
		tag += '<option value="IL">Israel</option>';
		tag += '<option value="IT">Italy</option>';
		tag += '<option value="JM">Jamaica</option>';
		tag += '<option value="JP">Japan</option>';
		tag += '<option value="JE">Jersey</option>';
		tag += '<option value="JO">Jordan</option>';
		tag += '<option value="KZ">Kazakhstan</option>';
		tag += '<option value="KE">Kenya</option>';
		tag += '<option value="KI">Kiribati</option>';
		tag += '<option value="KP">Korea, Democratic People\'s Republic of</option>';
		tag += '<option value="KR">Korea, Republic of</option>';
		tag += '<option value="KW">Kuwait</option>';
		tag += '<option value="KG">Kyrgyzstan</option>';
		tag += '<option value="LA">Lao People\'s Democratic Republic</option>';
		tag += '<option value="LV">Latvia</option>';
		tag += '<option value="LB">Lebanon</option>';
		tag += '<option value="LS">Lesotho</option>';
		tag += '<option value="LR">Liberia</option>';
		tag += '<option value="LY">Libya</option>';
		tag += '<option value="LI">Liechtenstein</option>';
		tag += '<option value="LT">Lithuania</option>';
		tag += '<option value="LU">Luxembourg</option>';
		tag += '<option value="MO">Macao</option>';
		tag += '<option value="MK">Macedonia, the former Yugoslav Republic of</option>';
		tag += '<option value="MG">Madagascar</option>';
		tag += '<option value="MW">Malawi</option>';
		tag += '<option value="MY">Malaysia</option>';
		tag += '<option value="MV">Maldives</option>';
		tag += '<option value="ML">Mali</option>';
		tag += '<option value="MT">Malta</option>';
		tag += '<option value="MH">Marshall Islands</option>';
		tag += '<option value="MQ">Martinique</option>';
		tag += '<option value="MR">Mauritania</option>';
		tag += '<option value="MU">Mauritius</option>';
		tag += '<option value="YT">Mayotte</option>';
		tag += '<option value="MX">Mexico</option>';
		tag += '<option value="FM">Micronesia, Federated States of</option>';
		tag += '<option value="MD">Moldova, Republic of</option>';
		tag += '<option value="MC">Monaco</option>';
		tag += '<option value="MN">Mongolia</option>';
		tag += '<option value="ME">Montenegro</option>';
		tag += '<option value="MS">Montserrat</option>';
		tag += '<option value="MA">Morocco</option>';
		tag += '<option value="MZ">Mozambique</option>';
		tag += '<option value="MM">Myanmar</option>';
		tag += '<option value="NA">Namibia</option>';
		tag += '<option value="NR">Nauru</option>';
		tag += '<option value="NP">Nepal</option>';
		tag += '<option value="NL">Netherlands</option>';
		tag += '<option value="NC">New Caledonia</option>';
		tag += '<option value="NZ">New Zealand</option>';
		tag += '<option value="NI">Nicaragua</option>';
		tag += '<option value="NE">Niger</option>';
		tag += '<option value="NG">Nigeria</option>';
		tag += '<option value="NU">Niue</option>';
		tag += '<option value="NF">Norfolk Island</option>';
		tag += '<option value="MP">Northern Mariana Islands</option>';
		tag += '<option value="NO">Norway</option>';
		tag += '<option value="OM">Oman</option>';
		tag += '<option value="PK">Pakistan</option>';
		tag += '<option value="PW">Palau</option>';
		tag += '<option value="PS">Palestinian Territory, Occupied</option>';
		tag += '<option value="PA">Panama</option>';
		tag += '<option value="PG">Papua New Guinea</option>';
		tag += '<option value="PY">Paraguay</option>';
		tag += '<option value="PE">Peru</option>';
		tag += '<option value="PH">Philippines</option>';
		tag += '<option value="PN">Pitcairn</option>';
		tag += '<option value="PL">Poland</option>';
		tag += '<option value="PT">Portugal</option>';
		tag += '<option value="PR">Puerto Rico</option>';
		tag += '<option value="QA">Qatar</option>';
		tag += '<option value="RE">Réunion</option>';
		tag += '<option value="RO">Romania</option>';
		tag += '<option value="RU">Russian Federation</option>';
		tag += '<option value="RW">Rwanda</option>';
		tag += '<option value="BL">Saint Barthélemy</option>';
		tag += '<option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>';
		tag += '<option value="KN">Saint Kitts and Nevis</option>';
		tag += '<option value="LC">Saint Lucia</option>';
		tag += '<option value="MF">Saint Martin (French part)</option>';
		tag += '<option value="PM">Saint Pierre and Miquelon</option>';
		tag += '<option value="VC">Saint Vincent and the Grenadines</option>';
		tag += '<option value="WS">Samoa</option>';
		tag += '<option value="SM">San Marino</option>';
		tag += '<option value="ST">Sao Tome and Principe</option>';
		tag += '<option value="SA">Saudi Arabia</option>';
		tag += '<option value="SN">Senegal</option>';
		tag += '<option value="RS">Serbia</option>';
		tag += '<option value="SC">Seychelles</option>';
		tag += '<option value="SL">Sierra Leone</option>';
		tag += '<option value="SG">Singapore</option>';
		tag += '<option value="SX">Sint Maarten (Dutch part)</option>';
		tag += '<option value="SK">Slovakia</option>';
		tag += '<option value="SI">Slovenia</option>';
		tag += '<option value="SB">Solomon Islands</option>';
		tag += '<option value="SO">Somalia</option>';
		tag += '<option value="ZA">South Africa</option>';
		tag += '<option value="GS">South Georgia and the South Sandwich Islands</option>';
		tag += '<option value="SS">South Sudan</option>';
		tag += '<option value="ES">Spain</option>';
		tag += '<option value="LK">Sri Lanka</option>';
		tag += '<option value="SD">Sudan</option>';
		tag += '<option value="SR">Suriname</option>';
		tag += '<option value="SJ">Svalbard and Jan Mayen</option>';
		tag += '<option value="SZ">Swaziland</option>';
		tag += '<option value="SE">Sweden</option>';
		tag += '<option value="CH">Switzerland</option>';
		tag += '<option value="SY">Syrian Arab Republic</option>';
		tag += '<option value="TW">Taiwan, Province of China</option>';
		tag += '<option value="TJ">Tajikistan</option>';
		tag += '<option value="TZ">Tanzania, United Republic of</option>';
		tag += '<option value="TH">Thailand</option>';
		tag += '<option value="TL">Timor-Leste</option>';
		tag += '<option value="TG">Togo</option>';
		tag += '<option value="TK">Tokelau</option>';
		tag += '<option value="TO">Tonga</option>';
		tag += '<option value="TT">Trinidad and Tobago</option>';
		tag += '<option value="TN">Tunisia</option>';
		tag += '<option value="TR">Turkey</option>';
		tag += '<option value="TM">Turkmenistan</option>';
		tag += '<option value="TC">Turks and Caicos Islands</option>';
		tag += '<option value="TV">Tuvalu</option>';
		tag += '<option value="UG">Uganda</option>';
		tag += '<option value="UA">Ukraine</option>';
		tag += '<option value="AE">United Arab Emirates</option>';
		tag += '<option value="GB">United Kingdom</option>';
		tag += '<option value="US">United States</option>';
		tag += '<option value="UM">United States Minor Outlying Islands</option>';
		tag += '<option value="UY">Uruguay</option>';
		tag += '<option value="UZ">Uzbekistan</option>';
		tag += '<option value="VU">Vanuatu</option>';
		tag += '<option value="VE">Venezuela, Bolivarian Republic of</option>';
		tag += '<option value="VN">Viet Nam</option>';
		tag += '<option value="VG">Virgin Islands, British</option>';
		tag += '<option value="VI">Virgin Islands, U.S.</option>';
		tag += '<option value="WF">Wallis and Futuna</option>';
		tag += '<option value="EH">Western Sahara</option>';
		tag += '<option value="YE">Yemen</option>';
		tag += '<option value="ZM">Zambia</option>';
		tag += '<option value="ZW">Zimbabwe</option>';
		tag += '</select>';
		tag += '</div>';
		tag += '<div class="form-group col-sm-6">';
		tag += '<label>ID ORCID</label>';
		tag += '<input type="text" name="id_orcid_aut['+parseInt(no)+']" placeholder="ORCID ID" class="form-control">';
		tag += '<small class="form-text text-muted">ORCID iDs can only be assigned by the ORCID Registry. Youmust conform to their standards for expressing ORCID iDs, and include the full URI (eg.http://orcid.org/0000-0002-1825-0097).</small>';
		tag += '</div>';
		tag += '<div class="form-group col-sm-6">';
		tag += '<label>Affiliation</label>';
		tag += '<textarea type="text" name="affiliation_aut['+parseInt(no)+']" rows="3" placeholder="Affiliation" class="form-control"></textarea>';
		tag += '<small class="form-text text-muted">(Your institution, e.g. "Simon Fraser University").</small>';
		tag += '</div>';
		tag += '<div class="form-group col-sm-6">';
		tag += '<label>Competing interests</label>';
		tag += '<textarea class="form-control" name="interest_aut['+parseInt(no)+']"></textarea>';
		tag += '</div>';
		tag += '<div class="form-group col-sm-6">';
		tag += '<label>BIO Statement</label>';
		tag += '<textarea class="form-control" name="bio_aut['+parseInt(no)+']"></textarea>';
		tag += '<small class="form-text text-muted">Bio Statement (Your institution, e.g. "Simon Fraser University").</small>';
		tag += '</div>';
		tag += '<div class="clearfix"></div>';
		tag += '<hr style="border: 1px solid DimGray;">';
		$('.fmAut').append(tag);
		$('.noAuthor').val(no);
	});
</script>

 <script>
	function UpdateSupp(id){

        $.post("{!! route('update_Supp') !!}",{id:id}).done(function(data){
			if(data.status == 'success'){
				$("#form1").show();
				$('#id_spp').val(data.data.id);
				$('#title_spp').val(data.data.title);
				$('#creator_spp').val(data.data.creator);
				$('#keywords_spp').val(data.data.keywords);
				$('#publisher_spp').val(data.data.publisher);
				$('#type_spp').val(data.data.type);
				$('#agencies_spp').val(data.data.agencies);
				$('#date_spp').val(data.data.date);
				$('#lang_spp').val(data.data.lang);
				$('#description_spp').val(data.data.description);
				$('#file_spp').removeAttr('required');
			} else {
			}
		});
    }

     $('input[type=file]').on('change',function (e) {
        var extValidation = new Array(".jpg", ".jpeg", ".pdf");
        var fileExt = e.target.value;
        fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
        if (extValidation.indexOf(fileExt) < 0) {
            swal('Extensi File Tidak Valid !','Upload file bertipe .jpg, .jpeg atau .pdf, untuk dapat melakukan upload data...','warning')
            $(this).val("")
            return false;
        }
        else return true;
    })
</script>

@endsection
