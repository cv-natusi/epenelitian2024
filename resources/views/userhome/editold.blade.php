@extends('layout.main')
@section('content')
<div class="col-lg-12 col-md-12">
	<div class="col-lg-12 col-md-12">
		<a href="{{url('userhome/')}}" class="btn btn-info" style="float: right;"><i class="fa fa-backward">  Back</i></a>
		<div class="col-lg-6 col-lg-offset-3">
			<form method="post" enctype="multipart/form-data" action="{{ route('update_profil') }}" style="margin-top: 20px;">
				{{ csrf_field() }}
				<input type="hidden" name="idProfile" value="{{$profile->id}}">
				<input type="hidden" name="_method" value="PUT">
				{{-- <img src="{{url('/')}}/uploads/images/{{$profile->image}}" width="250px" height="200px"> --}}
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="username" value="{{$profile->username}}" readonly="" class="form-control" >
					<small class="form-text text-muted">The username must contain only lowercase letters, numbers, and hyphens/underscores.</small>
				</div>
				{{-- <div class="form-group">
					<label>Salutation</label>
					<input type="text" name="salutation" value="{{$profile->salutation}}" class="form-control">
				</div> --}}
				<div class="form-group">
					<label>First Name</label>
					<input type="text" name="first_name" value="{{$profile->first_name}}" class="form-control">
				</div>
				<div class="form-group">
					<label>Middle Name</label>
					<input type="text" name="middle_name" value="{{$profile->middle_name}}" class="form-control">
				</div>
				<div class="form-group">
					<label>Last Name</label>
					<input type="text" name="last_name" value="{{$profile->last_name}}" class="form-control">
				</div>
				{{-- <div class="form-group">
					<label>Initials</label>
					<input type="text" name="initials" value="{{$profile->initials}}" class="form-control">
				</div> --}}
				<?php
				$cat = ['','','',''];
				if($profile->category=='pns'){
					$cat[0] = 'checked';
				}elseif($profile->category=='mhs'){
					$cat[2] = 'checked';
				}elseif($profile->category=='dosen'){
					$cat[1] = 'checked';
				}elseif($profile->category=='umum'){
					$cat[3] = 'checked';
				}
				?>
				<div class="form-group">
					<label>Status Pekerjaan : </label>
					&nbsp;
					<label class="radio-inline">
						<input type="radio" name="category" {{$cat[0]}} value="pns" required onclick="show_form()"><b>ASN</b>
					</label>
					<!-- <label class="radio-inline">
						<input type="radio" name="category" {{$cat[1]}} value="dosen" onclick="show_form()"><b>Dosen</b>
					</label> -->
					<label class="radio-inline">
						<input type="radio" name="category" {{$cat[2]}} value="mhs" onclick="show_form()"><b>Mahasiswa</b>
					</label>
					<!-- <label class="radio-inline">
						<input type="radio" name="category" {{$cat[3]}} value="umum" onclick="show_form()"><b>Lainnya</b>
					</label> -->
				</div>

				<div class="form-group" id="div-instansi">
					<label id="instansi"></label>
					<input type="text" id="unit_instansi" name="unit_instansi" value="{{$profile->unit_instansi}}" class="form-control" required>
					<div id="tempat-instansi">

					</div>
				</div>
				<div class="form-group" id="div-kerja">
					<label id="kerja"></label>
					<input type="text" id="unit_kerja" name="unit_kerja" value="{{$profile->unit_kerja}}" class="form-control" required>
					<div id="tempat-kerja">

					</div>
				</div>
				<div class="form-group" id="div-no-identitas">
					<label id="no-identitas"></label>
					<input type="text" name="no_identitas" value="{{$profile->no_identitas}}" class="form-control" required>
				</div>

				<?php 
				$pendakhir = explode(" ", $profile->pendidikan_terakhir);
				$jenjang = $pendakhir[0];
				if ($jenjang == 'D1' || $jenjang == 'D2' || $jenjang == 'D3' || $jenjang == 'S1' || $jenjang == 'S2' || $jenjang == 'S3') {
					$word=array_slice($pendakhir, 1);
					$jurusan = implode(" ",$word);
				}else{
					$jurusan = $profile->pendidikan_terakhir;
				}


				?>

				<div class="form-group" id="div-jenjang">
					<label>Jenjang</label>	
					<select class="form-control" name="jenjang" id="exampleFormControlSelect1">
						<option value="">-- Pilih Jenjang --</option>
						<option value="D1" @if ($jenjang == "D1") {{ 'selected' }} @endif >D1</option>
						<option value="D2" @if ($jenjang == "D2") {{ 'selected' }} @endif >D2</option>
						<option value="D3" @if ($jenjang == "D3") {{ 'selected' }} @endif >D3</option>
						<option value="S1" @if ($jenjang == "S1") {{ 'selected' }} @endif >S1</option>
						<option value="S2" @if ($jenjang == "S2") {{ 'selected' }} @endif >S2</option>
						<option value="S3" @if ($jenjang == "S3") {{ 'selected' }} @endif >S3</option>
					</select>
				</div>
				<div class="form-group" id="div-pendidikan-terakhir">
					<label>Nama Jurusan</label>
					<input type="text" name="pendidikan_terakhir" value="{{$jurusan}}" class="form-control">
				</div>

				<div class="form-group" id="div-pangkat-golongan">
					<label>Pangkat Golongan</label>
					<input type="text" name="pangkat_golongan" value="{{$profile->pangkat_golongan}}" class="form-control">
				</div>

				<div class="form-group" id="div-jabatan">
					<label>Jabatan</label>
					<input type="text" name="jabatan" value="{{$profile->jabatan}}" class="form-control">
				</div>


				<?php
				$jk = $profile->gender;
				// if($profile->gender=='male'){
				// 	$jk[0] = 'checked';
				// }else{
				// 	$jk[1] = 'checked';
				// }
				?>
				<div class="form-group">
					<label>Jenis Kelamin</label>
					<select class="form-control" name="gender" id="exampleFormControlSelect1" required>
						<option value="male" @if ($jk == "male") {{ 'selected' }} @endif >Laki-laki</option>
						<option value="female" @if ($jk == "female") {{ 'selected' }} @endif >Perempuan</option>
					</select>
				</div>
				{{-- <div class="form-group">
					<label>Affiliation</label>
					<textarea type="text" name="affiliation" col-lg-12 col-md-12s="3" class="form-control">{{$profile->affiliation}}</textarea>
					<small class="form-text text-muted">(Your institution, e.g. "Simon Fraser University").</small>
				</div> --}}
				{{-- <div class="form-group">
					<label>Signature</label>
					<textarea type="text" name="signature" col-lg-12 col-md-12s="3" class="form-control">{{$profile->signature}}</textarea>
					<small class="form-text text-muted">(Your institution, e.g. "Simon Fraser University").</small>
				</div> --}}
				<div class="form-group">
					<label>Email</label>
					<input type="text" name="email" value="{{$profile->email}}" class="form-control">
				</div>
				{{-- <div class="form-group">
					<label>ID ORCID</label>
					<input type="text" name="id_orcid" value="{{$profile->id_orcid}}" class="form-control">
					<small class="form-text text-muted">ORCID iDs can only be assigned by the ORCID Registry. You must conform to their standards for expressing ORCID iDs, and include the full URI (eg. http://orcid.org/0000-0002-1825-0097).</small>
				</div>
				<div class="form-group">
					<label>URL</label>
					<input type="text" name="url" value="{{$profile->url}}" class="form-control">
				</div> --}}
				<div class="form-group">
					<label>Phone</label>
					<input type="text" name="phone" value="{{$profile->phone}}" class="form-control">
				</div>
				{{-- <div class="form-group">
					<label>Fax Number</label>
					<input type="text" name="fax" value="{{$profile->fax}}" class="form-control">
				</div> --}}
				<div class="form-group">
					<label>Alamat</label>
					<textarea class="form-control" id="summary-ckeditor" name="mailing_ads">{{$profile->mailing_ads}}</textarea>
				</div>
				<div class="form-group">
					<label>Country</label>
					<select class="form-control" id="sel1" name="country">
						<option value="AF" {{ ($profile->country == "AF") ? 'selected' : '' }} >Afghanistan</option>
						<option value="AX" {{ ($profile->country == "AX") ? 'selected' : '' }} >Åland Islands</option>
						<option value="AL" {{ ($profile->country == "AL") ? 'selected' : '' }} >Albania</option>
						<option value="DZ" {{ ($profile->country == "DZ") ? 'selected' : '' }} >Algeria</option>
						<option value="AS" {{ ($profile->country == "AS") ? 'selected' : '' }} >American Samoa</option>
						<option value="AD" {{ ($profile->country == "AD") ? 'selected' : '' }} >Andorra</option>
						<option value="AO" {{ ($profile->country == "AO") ? 'selected' : '' }} >Angola</option>
						<option value="AI" {{ ($profile->country == "AI") ? 'selected' : '' }} >Anguilla</option>
						<option value="AQ" {{ ($profile->country == "AQ") ? 'selected' : '' }} >Antarctica</option>
						<option value="AG" {{ ($profile->country == "AG") ? 'selected' : '' }} >Antigua and Barbuda</option>
						<option value="AR" {{ ($profile->country == "AR") ? 'selected' : '' }} >Argentina</option>
						<option value="AM" {{ ($profile->country == "AM") ? 'selected' : '' }} >Armenia</option>
						<option value="AW" {{ ($profile->country == "AW") ? 'selected' : '' }} >Aruba</option>
						<option value="AU" {{ ($profile->country == "AU") ? 'selected' : '' }} >Australia</option>
						<option value="AT" {{ ($profile->country == "AT") ? 'selected' : '' }} >Austria</option>
						<option value="AZ" {{ ($profile->country == "AZ") ? 'selected' : '' }} >Azerbaijan</option>
						<option value="BS" {{ ($profile->country == "BS") ? 'selected' : '' }} >Bahamas</option>
						<option value="BH" {{ ($profile->country == "BH") ? 'selected' : '' }} >Bahrain</option>
						<option value="BD" {{ ($profile->country == "BD") ? 'selected' : '' }} >Bangladesh</option>
						<option value="BB" {{ ($profile->country == "BB") ? 'selected' : '' }} >Barbados</option>
						<option value="BY" {{ ($profile->country == "BY") ? 'selected' : '' }} >Belarus</option>
						<option value="BE" {{ ($profile->country == "BE") ? 'selected' : '' }} >Belgium</option>
						<option value="BZ" {{ ($profile->country == "BZ") ? 'selected' : '' }} >Belize</option>
						<option value="BJ" {{ ($profile->country == "BJ") ? 'selected' : '' }} >Benin</option>
						<option value="BM" {{ ($profile->country == "BM") ? 'selected' : '' }} >Bermuda</option>
						<option value="BT" {{ ($profile->country == "BT") ? 'selected' : '' }} >Bhutan</option>
						<option value="BO" {{ ($profile->country == "BO") ? 'selected' : '' }} >Bolivia, Plurinational State of</option>
						<option value="BQ" {{ ($profile->country == "BQ") ? 'selected' : '' }} >Bonaire, Sint Eustatius and Saba</option>
						<option value="BA" {{ ($profile->country == "BA") ? 'selected' : '' }} >Bosnia and Herzegovina</option>
						<option value="BW" {{ ($profile->country == "BW") ? 'selected' : '' }} >Botswana</option>
						<option value="BV" {{ ($profile->country == "BV") ? 'selected' : '' }} >Bouvet Island</option>
						<option value="BR" {{ ($profile->country == "BR") ? 'selected' : '' }} >Brazil</option>
						<option value="IO" {{ ($profile->country == "IO") ? 'selected' : '' }} >British Indian Ocean Territory</option>
						<option value="BN" {{ ($profile->country == "BN") ? 'selected' : '' }} >Brunei Darussalam</option>
						<option value="BG" {{ ($profile->country == "BG") ? 'selected' : '' }} >Bulgaria</option>
						<option value="BF" {{ ($profile->country == "BF") ? 'selected' : '' }} >Burkina Faso</option>
						<option value="BI" {{ ($profile->country == "BI") ? 'selected' : '' }} >Burundi</option>
						<option value="KH" {{ ($profile->country == "KH") ? 'selected' : '' }} >Cambodia</option>
						<option value="CM" {{ ($profile->country == "CM") ? 'selected' : '' }} >Cameroon</option>
						<option value="CA" {{ ($profile->country == "CA") ? 'selected' : '' }} >Canada</option>
						<option value="CV" {{ ($profile->country == "CV") ? 'selected' : '' }} >Cape Verde</option>
						<option value="KY" {{ ($profile->country == "KY") ? 'selected' : '' }} >Cayman Islands</option>
						<option value="CF" {{ ($profile->country == "CF") ? 'selected' : '' }} >Central African Republic</option>
						<option value="TD" {{ ($profile->country == "TD") ? 'selected' : '' }} >Chad</option>
						<option value="CL" {{ ($profile->country == "CL") ? 'selected' : '' }} >Chile</option>
						<option value="CN" {{ ($profile->country == "CN") ? 'selected' : '' }} >China</option>
						<option value="CX" {{ ($profile->country == "CX") ? 'selected' : '' }} >Christmas Island</option>
						<option value="CC" {{ ($profile->country == "CC") ? 'selected' : '' }} >Cocos (Keeling) Islands</option>
						<option value="CO" {{ ($profile->country == "CO") ? 'selected' : '' }} >Colombia</option>
						<option value="KM" {{ ($profile->country == "KM") ? 'selected' : '' }} >Comoros</option>
						<option value="CG" {{ ($profile->country == "CG") ? 'selected' : '' }} >Congo</option>
						<option value="CD" {{ ($profile->country == "CD") ? 'selected' : '' }} >Congo, the Democratic Republic of the</option>
						<option value="CK" {{ ($profile->country == "CK") ? 'selected' : '' }} >Cook Islands</option>
						<option value="CR" {{ ($profile->country == "CR") ? 'selected' : '' }} >Costa Rica</option>
						<option value="CI" {{ ($profile->country == "CI") ? 'selected' : '' }} >Côte d'Ivoire</option>
						<option value="HR" {{ ($profile->country == "HR") ? 'selected' : '' }} >Croatia</option>
						<option value="CU" {{ ($profile->country == "CU") ? 'selected' : '' }} >Cuba</option>
						<option value="CW" {{ ($profile->country == "CW") ? 'selected' : '' }} >Curaçao</option>
						<option value="CY" {{ ($profile->country == "CY") ? 'selected' : '' }} >Cyprus</option>
						<option value="CZ" {{ ($profile->country == "CZ") ? 'selected' : '' }} >Czech Republic</option>
						<option value="DK" {{ ($profile->country == "DK") ? 'selected' : '' }} >Denmark</option>
						<option value="DJ" {{ ($profile->country == "DJ") ? 'selected' : '' }} >Djibouti</option>
						<option value="DM" {{ ($profile->country == "DM") ? 'selected' : '' }} >Dominica</option>
						<option value="DO" {{ ($profile->country == "DO") ? 'selected' : '' }} >Dominican Republic</option>
						<option value="EC" {{ ($profile->country == "EC") ? 'selected' : '' }} >Ecuador</option>
						<option value="EG" {{ ($profile->country == "EG") ? 'selected' : '' }} >Egypt</option>
						<option value="SV" {{ ($profile->country == "SV") ? 'selected' : '' }} >El Salvador</option>
						<option value="GQ" {{ ($profile->country == "GQ") ? 'selected' : '' }} >Equatorial Guinea</option>
						<option value="ER" {{ ($profile->country == "ER") ? 'selected' : '' }} >Eritrea</option>
						<option value="EE" {{ ($profile->country == "EE") ? 'selected' : '' }} >Estonia</option>
						<option value="ET" {{ ($profile->country == "ET") ? 'selected' : '' }} >Ethiopia</option>
						<option value="FK" {{ ($profile->country == "FK") ? 'selected' : '' }} >Falkland Islands (Malvinas)</option>
						<option value="FO" {{ ($profile->country == "FO") ? 'selected' : '' }} >Faroe Islands</option>
						<option value="FJ" {{ ($profile->country == "FJ") ? 'selected' : '' }} >Fiji</option>
						<option value="FI" {{ ($profile->country == "FI") ? 'selected' : '' }} >Finland</option>
						<option value="FR" {{ ($profile->country == "FR") ? 'selected' : '' }} >France</option>
						<option value="GF" {{ ($profile->country == "GF") ? 'selected' : '' }} >French Guiana</option>
						<option value="PF" {{ ($profile->country == "PF") ? 'selected' : '' }} >French Polynesia</option>
						<option value="TF" {{ ($profile->country == "TF") ? 'selected' : '' }} >French Southern Territories</option>
						<option value="GA" {{ ($profile->country == "GA") ? 'selected' : '' }} >Gabon</option>
						<option value="GM" {{ ($profile->country == "GM") ? 'selected' : '' }} >Gambia</option>
						<option value="GE" {{ ($profile->country == "GE") ? 'selected' : '' }} >Georgia</option>
						<option value="DE" {{ ($profile->country == "DE") ? 'selected' : '' }} >Germany</option>
						<option value="GH" {{ ($profile->country == "GH") ? 'selected' : '' }} >Ghana</option>
						<option value="GI" {{ ($profile->country == "GI") ? 'selected' : '' }} >Gibraltar</option>
						<option value="GR" {{ ($profile->country == "GR") ? 'selected' : '' }} >Greece</option>
						<option value="GL" {{ ($profile->country == "GL") ? 'selected' : '' }} >Greenland</option>
						<option value="GD" {{ ($profile->country == "GD") ? 'selected' : '' }} >Grenada</option>
						<option value="GP" {{ ($profile->country == "GP") ? 'selected' : '' }} >Guadeloupe</option>
						<option value="GU" {{ ($profile->country == "GU") ? 'selected' : '' }} >Guam</option>
						<option value="GT" {{ ($profile->country == "GT") ? 'selected' : '' }} >Guatemala</option>
						<option value="GG" {{ ($profile->country == "GG") ? 'selected' : '' }} >Guernsey</option>
						<option value="GN" {{ ($profile->country == "GN") ? 'selected' : '' }} >Guinea</option>
						<option value="GW" {{ ($profile->country == "GW") ? 'selected' : '' }} >Guinea-Bissau</option>
						<option value="GY" {{ ($profile->country == "GY") ? 'selected' : '' }} >Guyana</option>
						<option value="HT" {{ ($profile->country == "HT") ? 'selected' : '' }} >Haiti</option>
						<option value="HM" {{ ($profile->country == "HM") ? 'selected' : '' }} >Heard Island and McDonald Islands</option>
						<option value="VA" {{ ($profile->country == "VA") ? 'selected' : '' }} >Holy See (Vatican City State)</option>
						<option value="HN" {{ ($profile->country == "HN") ? 'selected' : '' }} >Honduras</option>
						<option value="HK" {{ ($profile->country == "HK") ? 'selected' : '' }} >Hong Kong</option>
						<option value="HU" {{ ($profile->country == "HU") ? 'selected' : '' }} >Hungary</option>
						<option value="IS" {{ ($profile->country == "IS") ? 'selected' : '' }} >Iceland</option>
						<option value="IN" {{ ($profile->country == "IN") ? 'selected' : '' }} >India</option>
						<option value="ID" {{ ($profile->country == "ID") ? 'selected' : '' }} >Indonesia</option>
						<option value="IR" {{ ($profile->country == "IR") ? 'selected' : '' }} >Iran, Islamic Republic of</option>
						<option value="IQ" {{ ($profile->country == "IQ") ? 'selected' : '' }} >Iraq</option>
						<option value="IE" {{ ($profile->country == "IE") ? 'selected' : '' }} >Ireland</option>
						<option value="IM" {{ ($profile->country == "IM") ? 'selected' : '' }} >Isle of Man</option>
						<option value="IL" {{ ($profile->country == "IL") ? 'selected' : '' }} >Israel</option>
						<option value="IT" {{ ($profile->country == "IT") ? 'selected' : '' }} >Italy</option>
						<option value="JM" {{ ($profile->country == "JM") ? 'selected' : '' }} >Jamaica</option>
						<option value="JP" {{ ($profile->country == "JP") ? 'selected' : '' }} >Japan</option>
						<option value="JE" {{ ($profile->country == "JE") ? 'selected' : '' }} >Jersey</option>
						<option value="JO" {{ ($profile->country == "JO") ? 'selected' : '' }} >Jordan</option>
						<option value="KZ" {{ ($profile->country == "KZ") ? 'selected' : '' }} >Kazakhstan</option>
						<option value="KE" {{ ($profile->country == "KE") ? 'selected' : '' }} >Kenya</option>
						<option value="KI" {{ ($profile->country == "KI") ? 'selected' : '' }} >Kiribati</option>
						<option value="KP" {{ ($profile->country == "KP") ? 'selected' : '' }} >Korea, Democratic People's Republic of</option>
						<option value="KR" {{ ($profile->country == "KR") ? 'selected' : '' }} >Korea, Republic of</option>
						<option value="KW" {{ ($profile->country == "KW") ? 'selected' : '' }} >Kuwait</option>
						<option value="KG" {{ ($profile->country == "KG") ? 'selected' : '' }} >Kyrgyzstan</option>
						<option value="LA" {{ ($profile->country == "LA") ? 'selected' : '' }} >Lao People's Democratic Republic</option>
						<option value="LV" {{ ($profile->country == "LV") ? 'selected' : '' }} >Latvia</option>
						<option value="LB" {{ ($profile->country == "LB") ? 'selected' : '' }} >Lebanon</option>
						<option value="LS" {{ ($profile->country == "LS") ? 'selected' : '' }} >Lesotho</option>
						<option value="LR" {{ ($profile->country == "LR") ? 'selected' : '' }} >Liberia</option>
						<option value="LY" {{ ($profile->country == "LY") ? 'selected' : '' }} >Libya</option>
						<option value="LI" {{ ($profile->country == "LI") ? 'selected' : '' }} >Liechtenstein</option>
						<option value="LT" {{ ($profile->country == "LT") ? 'selected' : '' }} >Lithuania</option>
						<option value="LU" {{ ($profile->country == "LU") ? 'selected' : '' }} >Luxembourg</option>
						<option value="MO" {{ ($profile->country == "MO") ? 'selected' : '' }} >Macao</option>
						<option value="MK" {{ ($profile->country == "MK") ? 'selected' : '' }} >Macedonia, the former Yugoslav Republic of</option>
						<option value="MG" {{ ($profile->country == "MG") ? 'selected' : '' }} >Madagascar</option>
						<option value="MW" {{ ($profile->country == "MW") ? 'selected' : '' }} >Malawi</option>
						<option value="MY" {{ ($profile->country == "MY") ? 'selected' : '' }} >Malaysia</option>
						<option value="MV" {{ ($profile->country == "MV") ? 'selected' : '' }} >Maldives</option>
						<option value="ML" {{ ($profile->country == "ML") ? 'selected' : '' }} >Mali</option>
						<option value="MT" {{ ($profile->country == "MT") ? 'selected' : '' }} >Malta</option>
						<option value="MH" {{ ($profile->country == "MH") ? 'selected' : '' }} >Marshall Islands</option>
						<option value="MQ" {{ ($profile->country == "MQ") ? 'selected' : '' }} >Martinique</option>
						<option value="MR" {{ ($profile->country == "MR") ? 'selected' : '' }} >Mauritania</option>
						<option value="MU" {{ ($profile->country == "MU") ? 'selected' : '' }} >Mauritius</option>
						<option value="YT" {{ ($profile->country == "YT") ? 'selected' : '' }} >Mayotte</option>
						<option value="MX" {{ ($profile->country == "MX") ? 'selected' : '' }} >Mexico</option>
						<option value="FM" {{ ($profile->country == "FM") ? 'selected' : '' }} >Micronesia, Federated States of</option>
						<option value="MD" {{ ($profile->country == "MD") ? 'selected' : '' }} >Moldova, Republic of</option>
						<option value="MC" {{ ($profile->country == "MC") ? 'selected' : '' }} >Monaco</option>
						<option value="MN" {{ ($profile->country == "MN") ? 'selected' : '' }} >Mongolia</option>
						<option value="ME" {{ ($profile->country == "ME") ? 'selected' : '' }} >Montenegro</option>
						<option value="MS" {{ ($profile->country == "MS") ? 'selected' : '' }} >Montserrat</option>
						<option value="MA" {{ ($profile->country == "MA") ? 'selected' : '' }} >Morocco</option>
						<option value="MZ" {{ ($profile->country == "MZ") ? 'selected' : '' }} >Mozambique</option>
						<option value="MM" {{ ($profile->country == "MM") ? 'selected' : '' }} >Myanmar</option>
						<option value="NA" {{ ($profile->country == "NA") ? 'selected' : '' }} >Namibia</option>
						<option value="NR" {{ ($profile->country == "NR") ? 'selected' : '' }} >Nauru</option>
						<option value="NP" {{ ($profile->country == "NP") ? 'selected' : '' }} >Nepal</option>
						<option value="NL" {{ ($profile->country == "NL") ? 'selected' : '' }} >Netherlands</option>
						<option value="NC" {{ ($profile->country == "NC") ? 'selected' : '' }} >New Caledonia</option>
						<option value="NZ" {{ ($profile->country == "NZ") ? 'selected' : '' }} >New Zealand</option>
						<option value="NI" {{ ($profile->country == "NI") ? 'selected' : '' }} >Nicaragua</option>
						<option value="NE" {{ ($profile->country == "NE") ? 'selected' : '' }} >Niger</option>
						<option value="NG" {{ ($profile->country == "NG") ? 'selected' : '' }} >Nigeria</option>
						<option value="NU" {{ ($profile->country == "NU") ? 'selected' : '' }} >Niue</option>
						<option value="NF" {{ ($profile->country == "NF") ? 'selected' : '' }} >Norfolk Island</option>
						<option value="MP" {{ ($profile->country == "MP") ? 'selected' : '' }} >Northern Mariana Islands</option>
						<option value="NO" {{ ($profile->country == "NO") ? 'selected' : '' }} >Norway</option>
						<option value="OM" {{ ($profile->country == "OM") ? 'selected' : '' }} >Oman</option>
						<option value="PK" {{ ($profile->country == "PK") ? 'selected' : '' }} >Pakistan</option>
						<option value="PW" {{ ($profile->country == "PW") ? 'selected' : '' }} >Palau</option>
						<option value="PS" {{ ($profile->country == "PS") ? 'selected' : '' }} >Palestinian Territory, Occupied</option>
						<option value="PA" {{ ($profile->country == "PA") ? 'selected' : '' }} >Panama</option>
						<option value="PG" {{ ($profile->country == "PG") ? 'selected' : '' }} >Papua New Guinea</option>
						<option value="PY" {{ ($profile->country == "PY") ? 'selected' : '' }} >Paraguay</option>
						<option value="PE" {{ ($profile->country == "PE") ? 'selected' : '' }} >Peru</option>
						<option value="PH" {{ ($profile->country == "PH") ? 'selected' : '' }} >Philippines</option>
						<option value="PN" {{ ($profile->country == "PN") ? 'selected' : '' }} >Pitcairn</option>
						<option value="PL" {{ ($profile->country == "PL") ? 'selected' : '' }} >Poland</option>
						<option value="PT" {{ ($profile->country == "PT") ? 'selected' : '' }} >Portugal</option>
						<option value="PR" {{ ($profile->country == "PR") ? 'selected' : '' }} >Puerto Rico</option>
						<option value="QA" {{ ($profile->country == "QA") ? 'selected' : '' }} >Qatar</option>
						<option value="RE" {{ ($profile->country == "RE") ? 'selected' : '' }} >Réunion</option>
						<option value="RO" {{ ($profile->country == "RO") ? 'selected' : '' }} >Romania</option>
						<option value="RU" {{ ($profile->country == "RU") ? 'selected' : '' }} >Russian Federation</option>
						<option value="RW" {{ ($profile->country == "RW") ? 'selected' : '' }} >Rwanda</option>
						<option value="BL" {{ ($profile->country == "BL") ? 'selected' : '' }} >Saint Barthélemy</option>
						<option value="SH" {{ ($profile->country == "SH") ? 'selected' : '' }} >Saint Helena, Ascension and Tristan da Cunha</option>
						<option value="KN" {{ ($profile->country == "KN") ? 'selected' : '' }} >Saint Kitts and Nevis</option>
						<option value="LC" {{ ($profile->country == "LC") ? 'selected' : '' }} >Saint Lucia</option>
						<option value="MF" {{ ($profile->country == "MF") ? 'selected' : '' }} >Saint Martin (French part)</option>
						<option value="PM" {{ ($profile->country == "PM") ? 'selected' : '' }} >Saint Pierre and Miquelon</option>
						<option value="VC" {{ ($profile->country == "VC") ? 'selected' : '' }} >Saint Vincent and the Grenadines</option>
						<option value="WS" {{ ($profile->country == "WS") ? 'selected' : '' }} >Samoa</option>
						<option value="SM" {{ ($profile->country == "SM") ? 'selected' : '' }} >San Marino</option>
						<option value="ST" {{ ($profile->country == "ST") ? 'selected' : '' }} >Sao Tome and Principe</option>
						<option value="SA" {{ ($profile->country == "SA") ? 'selected' : '' }} >Saudi Arabia</option>
						<option value="SN" {{ ($profile->country == "SN") ? 'selected' : '' }} >Senegal</option>
						<option value="RS" {{ ($profile->country == "RS") ? 'selected' : '' }} >Serbia</option>
						<option value="SC" {{ ($profile->country == "SC") ? 'selected' : '' }} >Seychelles</option>
						<option value="SL" {{ ($profile->country == "SL") ? 'selected' : '' }} >Sierra Leone</option>
						<option value="SG" {{ ($profile->country == "SG") ? 'selected' : '' }} >Singapore</option>
						<option value="SX" {{ ($profile->country == "SX") ? 'selected' : '' }} >Sint Maarten (Dutch part)</option>
						<option value="SK" {{ ($profile->country == "SK") ? 'selected' : '' }} >Slovakia</option>
						<option value="SI" {{ ($profile->country == "SI") ? 'selected' : '' }} >Slovenia</option>
						<option value="SB" {{ ($profile->country == "SB") ? 'selected' : '' }} >Solomon Islands</option>
						<option value="SO" {{ ($profile->country == "SO") ? 'selected' : '' }} >Somalia</option>
						<option value="ZA" {{ ($profile->country == "ZA") ? 'selected' : '' }} >South Africa</option>
						<option value="GS" {{ ($profile->country == "GS") ? 'selected' : '' }} >South Georgia and the South Sandwich Islands</option>
						<option value="SS" {{ ($profile->country == "SS") ? 'selected' : '' }} >South Sudan</option>
						<option value="ES" {{ ($profile->country == "ES") ? 'selected' : '' }} >Spain</option>
						<option value="LK" {{ ($profile->country == "LK") ? 'selected' : '' }} >Sri Lanka</option>
						<option value="SD" {{ ($profile->country == "SD") ? 'selected' : '' }} >Sudan</option>
						<option value="SR" {{ ($profile->country == "SR") ? 'selected' : '' }} >Suriname</option>
						<option value="SJ" {{ ($profile->country == "SJ") ? 'selected' : '' }} >Svalbard and Jan Mayen</option>
						<option value="SZ" {{ ($profile->country == "SZ") ? 'selected' : '' }} >Swaziland</option>
						<option value="SE" {{ ($profile->country == "SE") ? 'selected' : '' }} >Sweden</option>
						<option value="CH" {{ ($profile->country == "CH") ? 'selected' : '' }} >Switzerland</option>
						<option value="SY" {{ ($profile->country == "SY") ? 'selected' : '' }} >Syrian Arab Republic</option>
						<option value="TW" {{ ($profile->country == "TW") ? 'selected' : '' }} >Taiwan, Province of China</option>
						<option value="TJ" {{ ($profile->country == "TJ") ? 'selected' : '' }} >Tajikistan</option>
						<option value="TZ" {{ ($profile->country == "TZ") ? 'selected' : '' }} >Tanzania, United Republic of</option>
						<option value="TH" {{ ($profile->country == "TH") ? 'selected' : '' }} >Thailand</option>
						<option value="TL" {{ ($profile->country == "TL") ? 'selected' : '' }} >Timor-Leste</option>
						<option value="TG" {{ ($profile->country == "TG") ? 'selected' : '' }} >Togo</option>
						<option value="TK" {{ ($profile->country == "TK") ? 'selected' : '' }} >Tokelau</option>
						<option value="TO" {{ ($profile->country == "TO") ? 'selected' : '' }} >Tonga</option>
						<option value="TT" {{ ($profile->country == "TT") ? 'selected' : '' }} >Trinidad and Tobago</option>
						<option value="TN" {{ ($profile->country == "TN") ? 'selected' : '' }} >Tunisia</option>
						<option value="TR" {{ ($profile->country == "TR") ? 'selected' : '' }} >Turkey</option>
						<option value="TM" {{ ($profile->country == "TM") ? 'selected' : '' }} >Turkmenistan</option>
						<option value="TC" {{ ($profile->country == "TC") ? 'selected' : '' }} >Turks and Caicos Islands</option>
						<option value="TV" {{ ($profile->country == "TV") ? 'selected' : '' }} >Tuvalu</option>
						<option value="UG" {{ ($profile->country == "UG") ? 'selected' : '' }} >Uganda</option>
						<option value="UA" {{ ($profile->country == "UA") ? 'selected' : '' }} >Ukraine</option>
						<option value="AE" {{ ($profile->country == "AE") ? 'selected' : '' }} >United Arab Emirates</option>
						<option value="GB" {{ ($profile->country == "GB") ? 'selected' : '' }} >United Kingdom</option>
						<option value="US" {{ ($profile->country == "US") ? 'selected' : '' }} >United States</option>
						<option value="UM" {{ ($profile->country == "UM") ? 'selected' : '' }} >United States Minor Outlying Islands</option>
						<option value="UY" {{ ($profile->country == "UY") ? 'selected' : '' }} >Uruguay</option>
						<option value="UZ" {{ ($profile->country == "UZ") ? 'selected' : '' }} >Uzbekistan</option>
						<option value="VU" {{ ($profile->country == "VU") ? 'selected' : '' }} >Vanuatu</option>
						<option value="VE" {{ ($profile->country == "VE") ? 'selected' : '' }} >Venezuela, Bolivarian Republic of</option>
						<option value="VN" {{ ($profile->country == "VN") ? 'selected' : '' }} >Viet Nam</option>
						<option value="VG" {{ ($profile->country == "VG") ? 'selected' : '' }} >Virgin Islands, British</option>
						<option value="VI" {{ ($profile->country == "VI") ? 'selected' : '' }} >Virgin Islands, U.S.</option>
						<option value="WF" {{ ($profile->country == "WF") ? 'selected' : '' }} >Wallis and Futuna</option>
						<option value="EH" {{ ($profile->country == "EH") ? 'selected' : '' }} >Western Sahara</option>
						<option value="YE" {{ ($profile->country == "YE") ? 'selected' : '' }} >Yemen</option>
						<option value="ZM" {{ ($profile->country == "ZM") ? 'selected' : '' }} >Zambia</option>
						<option value="ZW" {{ ($profile->country == "ZW") ? 'selected' : '' }} >Zimbabwe</option>
					</select>
				</div>
				{{-- <div class="form-group">
					<label>Bio</label>
					<textarea class="form-control" id="summary-ckeditor2" name="bio">{{$profile->bio}}</textarea>
					<small class="form-text text-muted">Bio Statement (Your institution, e.g. "Simon Fraser University").</small>
				</div> --}}
      <?php /* ?>
			<div class="form-group">
			  <label>Confirmation Register as : </label>
				 <?php
				 $arr_rule = explode(',',$profile->confirm_reg);
	            $rd = '';
	            $at = '';
	            $rv = '';
	            if (count($arr_rule)!= '0'){
	            	for ($i=0; $i < count($arr_rule); $i++) {
	            	 switch ($arr_rule[$i]) {
	                  case 'reader':
	                    $rd = 'checked'; break;
	                  case 'author':
	                    $at = 'checked'; break;
	                  case 'reviewer':
	                    $rv = 'checked'; break;
	                	}
	            	}
	            }
	          ?>
	        <div class="custom-control custom-checkbox">
			    <input type="checkbox" name="confirm_reg[]" value="reader"  class="custom-control-input" id="defaultUnchecked" {{ $rd }} />
			    <label class="custom-control-label">Reader: Notified by email on publication of an issue of the journal.</label>
			</div>
			<?php */ ?>
			{{-- <div class="custom-control custom-checkbox">
				<input type="checkbox" name="confirm_reg[]" value="author" class="custom-control-input" id="defaultUnchecked" {{ $at }} />
				<label class="custom-control-label">Author: Able to submit items to the journal</label>
			</div> --}}
			{{-- <div class="custom-control custom-checkbox">
				<input type="checkbox" name="confirm_reg[]" value="reviewer" class="custom-control-input" id="defaultUnchecked" {{ $rv }} />
				<label class="custom-control-label">Reviewer: Willing to conduct peer review of submissions to the site.</label>
			</div>
			<label>Identify reviewing interests (substantive areas and research methods):</label>
			<input type="text" name="identify" value="{{$profile->identify}}" class="form-control">
		</div>
		<div class="form-group">
			<label>Upload Image</label>
			<input type="file" name="image" class="form-control" accept="image/*">
		</div> --}}

		<button type="submit" class="btn btn-primary col-lg-12">UPDATE DATA</button>

		<small class="form-text text-muted">* Denotes required field.</small>
	</form>

</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		show_form();
	});

	function show_form(){
		var pekerjaan = $('input[name=category]:checked').val();
		var label = '';
		var unit = '';
		var kerja = '';
		switch (pekerjaan) {
			case 'pns':
				unit = 'Nama Instansi';
				label = 'NIP';
				kerja = 'Unit Kerja';
				$("#unit_kerja").attr('required', ''); 
				$('#div-instansi').show();
				$('#div-no-identitas').show();
				$('#div-kerja').show();
				$('#div-jenjang').hide();
				// $('input[name=jenjang]').prop('required',false);
				$('#div-pendidikan-terakhir').hide();
				$('input[name=pendidikan_terakhir]').removeAttr('required');
			break;
			case 'dosen':
				unit = 'Nama Universitas';
				label = 'NIP';
			break;
			case 'mhs':
				unit = 'Nama Universitas';
				label = 'NIM';
				$("#unit_kerja").removeAttr('required');
				$('#div-instansi').show();
				$('#div-no-identitas').show();
				$('#div-kerja').hide();
				$('#div-jenjang').show();
				// $('input[name=jenjang]').prop('required',true);
				$('#div-pendidikan-terakhir').show();
				$('input[name=pendidikan_terakhir]').attr('required', '');
			break;
			case 'umum':
				unit = 'Nama Instansi';
				label = 'NIK';
				kerja = 'Unit Kerja';
				$("#unit_kerja").attr('required', ''); 
				$('#div-instansi').show();
				$('#div-no-identitas').show();
				$('#div-kerja').show();
			break;
			default:
				unit = '';
				label = '';
				kerja = '';
		}

		$('#no-identitas').html(label);
		$('#kerja').html(kerja);
		$('#instansi').html(unit);
	}

	$('input[name=unit_kerja]').keyup(function(){
		var value = $('input[name=unit_kerja]').val();
		var unitInstansi = $('input[name=unit_instansi]').val();
		var html = '';
		if (unitInstansi.indexOf("Dinas Kesehatan") != -1 || unitInstansi.indexOf("Dinkes") != -1 || unitInstansi.indexOf("dinas kesehatan") != -1 || unitInstansi.indexOf("dinkes") != -1) {
			if (value=='') {
				$('#tempat-kerja').html(html);
			}else {
				$.post("{{ url('api/get_unit') }}",{value:value},function(data){
					if(data.status=='success'){
						for (var i = 0; i < data.unit_kerja.length; i++) {
							html+='<a href="javascript:void(0)" onclick="set_unit(\''+data.unit_kerja[i]+'\')">'+data.unit_kerja[i]+'</a><br>';
						}
						$('#tempat-kerja').html(html);
					}
				});
			}
		}
	});

	function set_unit(unit){
		$('input[name=unit_kerja]').val(unit);
		$('#tempat-kerja').html('');
	}

	 $('input[type=file]').on('change',function (e) {
        var extValidation = new Array(".jpg", ".jpeg");
        var fileExt = e.target.value;
        fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
        if (extValidation.indexOf(fileExt) < 0) {
            swal('Extensi File Tidak Valid !','Upload file bertipe .jpg, .jpeg untuk dapat melakukan upload data...','warning')
            $(this).val("")
            return false;
        }
        else return true;
    })

</script>
@endsection
