@extends('layout.main')
@section('content')
<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="row">
	<div class="col-lg-8 col-md-6 col-sm-6 col-lg-offset-2" style="border: 5px solid #f1f1f1;background-color: #EFEFEF;">

		@if (count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif

		<form method="POST" id="formReg" enctype="multipart/form-data" action="{{ route('regis_store') }}" style="margin-top: 20px;">
			{{ csrf_field() }}
			<div class="form-group">
				<label>Nama Pengguna</label>
				<input type="text" name="username" placeholder="Enter Username" required="" value="{{old('username')}}" class="form-control disablecopypaste" onkeypress="return cekAngkaHuruf(event)">
				<small class="form-text text-muted" style="color: red;">Nama Pengguna ini digunakan untuk Login akun anda.</small>
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="password" min="6" required="" placeholder="Enter Password" class="form-control password" disablecopypaste>
				<div id="pass">
					<small class="form-text text-muted" style="color: red;">Password harus lebih dari 6 karakter.</small>
				</div>
			</div>
			<div class="form-group">
				<label>Konfirmasi Password</label>
				<input type="password" name="confirm_password" onkeyup="samePass()" required="" placeholder="Konfirmasi Password" class="form-control confirm_password">
				<small class="form-text text-muted statusPass" style="color: red; font-weight: 900px;">Masukkan kembali password yang sama.</small>
			</div>
			<!-- <div class="g-recaptcha" data-sitekey="6LfNGrUUAAAAADA-Ll4gX8hnHZo1VNfHp9znb5fL"></div> -->
			<!-- {{-- <div class="form-group">
				<label>Salam Pembuka</label>
				<input type="text" name="salutation" value="{{old('salutation')}}" placeholder="tambahkan salam pembuka jika diperlukan" class="form-control">
			</div> --}} -->
			<div class="form-group">
				<label>Nama Depan</label>
				<input type="text" name="first_name" value="{{old('first_name')}}" required="" placeholder="First Name" class="form-control disablecopypaste" onkeypress="return cekAngkaHuruf(event)">
			</div>
			<div class="form-group">
				<label>Nama Tengah</label>
				<input type="text" name="middle_name" value="{{old('middle_name')}}" placeholder="Middle Name" class="form-control disablecopypaste" onkeypress="return cekAngkaHuruf(event)">
			</div>
			<div class="form-group">
				<label>Nama Belakang</label>
				<input type="text" name="last_name" value="{{old('last_name')}}" required="" placeholder="Last Name" class="form-control disablecopypaste" onkeypress="return cekAngkaHuruf(event)">
			</div>
			<div class="form-group">
				<label>Daftar Sebagai Apa : </label>{{-- anas --}}
				{{-- <label class="radio-inline">
					<input type="radio" name="category" value="pns" {{ (old("category")=="pns")? "checked" : "" }} required onclick="show_form()"><b>ASN</b>
				</label> --}}
				<!-- <label class="radio-inline">
					<input type="radio" name="category" value="dosen" {{ (old("category")=="dosen")? "checked" : "" }} onclick="show_form()"><b>Dosen</b>
				</label> -->
				<label class="radio-inline">
					<input type="radio" name="category" value="mhs" {{ (old("category")=="mhs")? "checked" : "" }} onclick="show_form()"><b>Peneliti</b>
				</label>
				<!-- <label class="radio-inline">
					<input type="radio" name="category" value="umum" {{ (old("category")=="umum")? "checked" : "" }} onclick="show_form()"><b>Lainnya</b>
				</label> -->
			</div>


			<div class="form-group" id="div-instansi">
				<label id="instansi"></label>
				<input type="text" id="unit_instansi" name="unit_instansi" value="{{old('unit_instansi')}}" class="form-control disablecopypaste" required onkeypress="return cekAngkaHuruf(event)">
				<div id="tempat-instansi">

				</div>
			</div>
			<div class="form-group" id="div-kerja">
				<label id="kerja"></label>
				<input type="text" id="unit_kerja" name="unit_kerja" value="{{old('unit_kerja')}}" class="form-control disablecopypaste" required onkeypress="return cekAngkaHuruf(event)">
				<div id="tempat-kerja">

				</div>
			</div>
			<div class="form-group" id="div-no-identitas">
				<label id="no-identitas"></label>
				<input type="text" name="no_identitas" maxlength="18" value="{{old('no_identitas')}}" class="form-control disablecopypaste" required onkeypress="return cekAngka(event)">
			</div>

			{{-- <div class="form-group" id="div-jenjang">
				<label>Jenjang</label>
				<select class="form-control" name="jenjang" id="exampleFormControlSelect1">
					<option value="">-- Pilih Jenjang --</option>
					<option value="D1" @if (old('jenjang') == "D1") {{ 'selected' }} @endif >D1</option>
					<option value="D2" @if (old('jenjang') == "D2") {{ 'selected' }} @endif >D2</option>
					<option value="D3" @if (old('jenjang') == "D3") {{ 'selected' }} @endif >D3</option>
					<option value="S1" @if (old('jenjang') == "S1") {{ 'selected' }} @endif >S1</option>
					<option value="S2" @if (old('jenjang') == "S2") {{ 'selected' }} @endif >S2</option>
					<option value="S3" @if (old('jenjang') == "S3") {{ 'selected' }} @endif >S3</option>
				</select>
			</div> --}}

			{{-- <div class="form-group" id="div-pendidikan-terakhir">
				<label>Nama Jurusan</label>
				<input type="text" name="pendidikan_terakhir" value="{{old('pendidikan_terakhir')}}" placeholder="Nama Jurusan" class="form-control disablecopypaste" required onkeypress="return cekAngkaHuruf(event)">
			</div> --}}

			<div class="form-group" id="div-pangkat-golongan">
				<label>Pangkat Golongan</label>
				<input type="text" name="pangkat_golongan" value="{{old('pangkat_golongan')}}" placeholder="Pangkat Golongan" class="form-control disablecopypaste" required onkeypress="return cekAngkaHuruf(event)">
			</div>

			<div class="form-group" id="div-jabatan">
				<label>Jabatan</label>
				<input type="text" name="jabatan" value="{{old('jabatan')}}" placeholder="Jabatan" class="form-control disablecopypaste" required onkeypress="return cekAngkaHuruf(event)">
			</div>

			<div class="form-group">
				<label>Jenis Kelamin</label>
				<select class="form-control" name="gender" id="exampleFormControlSelect1" required>
					<option value="male" @if (old('gener') == "male") {{ 'selected' }} @endif >Laki-laki</option>
					<option value="female" @if (old('gener') == "female") {{ 'selected' }} @endif >Perempuan</option>
				</select>
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="text" name="email" value="{{old('email')}}" required="" placeholder="Email" class="form-control" onkeypress="return cekAngkaHuruf(event)">
				<small class="form-text text-muted" style="color: red;">Gunakan Email aktif.</small>
			</div>
			<div class="form-group">
				<label>Nomor Telepon</label>
				<input type="number" name="phone" value="{{old('phone')}}" placeholder="Phone" class="form-control disablecopypaste" onkeypress="return cekAngka(event)">
			</div>
			<div class="form-group">
				<label>Alamat</label>
				<textarea class="form-control disablecopypaste" value="" id="summary-ckeditor" name="mailing_ads" required onkeypress="return cekAngkaHuruf(event)">{{old('mailing_ads')}}</textarea>
			</div>
			<!-- {{-- <div class="form-group">
				<label>Nomor Telepon</label>
				<input type="text" name="phone" value="{{old('phone')}}" placeholder="Phone" class="form-control">
			</div> --}} -->
			<div class="form-group">
				<label>Asal Negara</label>
				<select class="form-control" name="country">
					<option value="AF" @if (old('country') == "AF") {{ 'selected' }} @endif >Afghanistan</option>
					<option value="AX" @if (old('country') == "AX") {{ 'selected' }} @endif >Åland Islands</option>
					<option value="AL" @if (old('country') == "AL") {{ 'selected' }} @endif >Albania</option>
					<option value="DZ" @if (old('country') == "DZ") {{ 'selected' }} @endif >Algeria</option>
					<option value="AS" @if (old('country') == "AS") {{ 'selected' }} @endif >American Samoa</option>
					<option value="AD" @if (old('country') == "AD") {{ 'selected' }} @endif >Andorra</option>
					<option value="AO" @if (old('country') == "AO") {{ 'selected' }} @endif >Angola</option>
					<option value="AI" @if (old('country') == "AI") {{ 'selected' }} @endif >Anguilla</option>
					<option value="AQ" @if (old('country') == "AQ") {{ 'selected' }} @endif >Antarctica</option>
					<option value="AG" @if (old('country') == "AG") {{ 'selected' }} @endif >Antigua and Barbuda</option>
					<option value="AR" @if (old('country') == "AR") {{ 'selected' }} @endif >Argentina</option>
					<option value="AM" @if (old('country') == "AM") {{ 'selected' }} @endif >Armenia</option>
					<option value="AW" @if (old('country') == "AW") {{ 'selected' }} @endif >Aruba</option>
					<option value="AU" @if (old('country') == "AU") {{ 'selected' }} @endif >Australia</option>
					<option value="AT" @if (old('country') == "AT") {{ 'selected' }} @endif >Austria</option>
					<option value="AZ" @if (old('country') == "AZ") {{ 'selected' }} @endif >Azerbaijan</option>
					<option value="BS" @if (old('country') == "BS") {{ 'selected' }} @endif >Bahamas</option>
					<option value="BH" @if (old('country') == "BH") {{ 'selected' }} @endif >Bahrain</option>
					<option value="BD" @if (old('country') == "BD") {{ 'selected' }} @endif >Bangladesh</option>
					<option value="BB" @if (old('country') == "BB") {{ 'selected' }} @endif >Barbados</option>
					<option value="BY" @if (old('country') == "BY") {{ 'selected' }} @endif >Belarus</option>
					<option value="BE" @if (old('country') == "BE") {{ 'selected' }} @endif >Belgium</option>
					<option value="BZ" @if (old('country') == "BZ") {{ 'selected' }} @endif >Belize</option>
					<option value="BJ" @if (old('country') == "BJ") {{ 'selected' }} @endif >Benin</option>
					<option value="BM" @if (old('country') == "BM") {{ 'selected' }} @endif >Bermuda</option>
					<option value="BT" @if (old('country') == "BT") {{ 'selected' }} @endif >Bhutan</option>
					<option value="BO" @if (old('country') == "BO") {{ 'selected' }} @endif >Bolivia, Plurinational State of</option>
					<option value="BQ" @if (old('country') == "BQ") {{ 'selected' }} @endif >Bonaire, Sint Eustatius and Saba</option>
					<option value="BA" @if (old('country') == "BA") {{ 'selected' }} @endif >Bosnia and Herzegovina</option>
					<option value="BW" @if (old('country') == "BW") {{ 'selected' }} @endif >Botswana</option>
					<option value="BV" @if (old('country') == "BV") {{ 'selected' }} @endif >Bouvet Island</option>
					<option value="BR" @if (old('country') == "BR") {{ 'selected' }} @endif >Brazil</option>
					<option value="IO" @if (old('country') == "IO") {{ 'selected' }} @endif >British Indian Ocean Territory</option>
					<option value="BN" @if (old('country') == "BN") {{ 'selected' }} @endif >Brunei Darussalam</option>
					<option value="BG" @if (old('country') == "BG") {{ 'selected' }} @endif >Bulgaria</option>
					<option value="BF" @if (old('country') == "BF") {{ 'selected' }} @endif >Burkina Faso</option>
					<option value="BI" @if (old('country') == "BI") {{ 'selected' }} @endif >Burundi</option>
					<option value="KH" @if (old('country') == "KH") {{ 'selected' }} @endif >Cambodia</option>
					<option value="CM" @if (old('country') == "CM") {{ 'selected' }} @endif >Cameroon</option>
					<option value="CA" @if (old('country') == "CA") {{ 'selected' }} @endif >Canada</option>
					<option value="CV" @if (old('country') == "CV") {{ 'selected' }} @endif >Cape Verde</option>
					<option value="KY" @if (old('country') == "KY") {{ 'selected' }} @endif >Cayman Islands</option>
					<option value="CF" @if (old('country') == "CF") {{ 'selected' }} @endif >Central African Republic</option>
					<option value="TD" @if (old('country') == "TD") {{ 'selected' }} @endif >Chad</option>
					<option value="CL" @if (old('country') == "CL") {{ 'selected' }} @endif >Chile</option>
					<option value="CN" @if (old('country') == "CN") {{ 'selected' }} @endif >China</option>
					<option value="CX" @if (old('country') == "CX") {{ 'selected' }} @endif >Christmas Island</option>
					<option value="CC" @if (old('country') == "CC") {{ 'selected' }} @endif >Cocos (Keeling) Islands</option>
					<option value="CO" @if (old('country') == "CO") {{ 'selected' }} @endif >Colombia</option>
					<option value="KM" @if (old('country') == "KM") {{ 'selected' }} @endif >Comoros</option>
					<option value="CG" @if (old('country') == "CG") {{ 'selected' }} @endif >Congo</option>
					<option value="CD" @if (old('country') == "CD") {{ 'selected' }} @endif >Congo, the Democratic Republic of the</option>
					<option value="CK" @if (old('country') == "CK") {{ 'selected' }} @endif >Cook Islands</option>
					<option value="CR" @if (old('country') == "CR") {{ 'selected' }} @endif >Costa Rica</option>
					<option value="CI" @if (old('country') == "CI") {{ 'selected' }} @endif >Côte d'Ivoire</option>
					<option value="HR" @if (old('country') == "HR") {{ 'selected' }} @endif >Croatia</option>
					<option value="CU" @if (old('country') == "CU") {{ 'selected' }} @endif >Cuba</option>
					<option value="CW" @if (old('country') == "CW") {{ 'selected' }} @endif >Curaçao</option>
					<option value="CY" @if (old('country') == "CY") {{ 'selected' }} @endif >Cyprus</option>
					<option value="CZ" @if (old('country') == "CZ") {{ 'selected' }} @endif >Czech Republic</option>
					<option value="DK" @if (old('country') == "DK") {{ 'selected' }} @endif >Denmark</option>
					<option value="DJ" @if (old('country') == "DJ") {{ 'selected' }} @endif >Djibouti</option>
					<option value="DM" @if (old('country') == "DM") {{ 'selected' }} @endif >Dominica</option>
					<option value="DO" @if (old('country') == "DO") {{ 'selected' }} @endif >Dominican Republic</option>
					<option value="EC" @if (old('country') == "EC") {{ 'selected' }} @endif >Ecuador</option>
					<option value="EG" @if (old('country') == "EG") {{ 'selected' }} @endif >Egypt</option>
					<option value="SV" @if (old('country') == "SV") {{ 'selected' }} @endif >El Salvador</option>
					<option value="GQ" @if (old('country') == "GQ") {{ 'selected' }} @endif >Equatorial Guinea</option>
					<option value="ER" @if (old('country') == "ER") {{ 'selected' }} @endif >Eritrea</option>
					<option value="EE" @if (old('country') == "EE") {{ 'selected' }} @endif >Estonia</option>
					<option value="ET" @if (old('country') == "ET") {{ 'selected' }} @endif >Ethiopia</option>
					<option value="FK" @if (old('country') == "FK") {{ 'selected' }} @endif >Falkland Islands (Malvinas)</option>
					<option value="FO" @if (old('country') == "FO") {{ 'selected' }} @endif >Faroe Islands</option>
					<option value="FJ" @if (old('country') == "FJ") {{ 'selected' }} @endif >Fiji</option>
					<option value="FI" @if (old('country') == "FI") {{ 'selected' }} @endif >Finland</option>
					<option value="FR" @if (old('country') == "FR") {{ 'selected' }} @endif >France</option>
					<option value="GF" @if (old('country') == "GF") {{ 'selected' }} @endif >French Guiana</option>
					<option value="PF" @if (old('country') == "PF") {{ 'selected' }} @endif >French Polynesia</option>
					<option value="TF" @if (old('country') == "TF") {{ 'selected' }} @endif >French Southern Territories</option>
					<option value="GA" @if (old('country') == "GA") {{ 'selected' }} @endif >Gabon</option>
					<option value="GM" @if (old('country') == "GM") {{ 'selected' }} @endif >Gambia</option>
					<option value="GE" @if (old('country') == "GE") {{ 'selected' }} @endif >Georgia</option>
					<option value="DE" @if (old('country') == "DE") {{ 'selected' }} @endif >Germany</option>
					<option value="GH" @if (old('country') == "GH") {{ 'selected' }} @endif >Ghana</option>
					<option value="GI" @if (old('country') == "GI") {{ 'selected' }} @endif >Gibraltar</option>
					<option value="GR" @if (old('country') == "GR") {{ 'selected' }} @endif >Greece</option>
					<option value="GL" @if (old('country') == "GL") {{ 'selected' }} @endif >Greenland</option>
					<option value="GD" @if (old('country') == "GD") {{ 'selected' }} @endif >Grenada</option>
					<option value="GP" @if (old('country') == "GP") {{ 'selected' }} @endif >Guadeloupe</option>
					<option value="GU" @if (old('country') == "GU") {{ 'selected' }} @endif >Guam</option>
					<option value="GT" @if (old('country') == "GT") {{ 'selected' }} @endif >Guatemala</option>
					<option value="GG" @if (old('country') == "GG") {{ 'selected' }} @endif >Guernsey</option>
					<option value="GN" @if (old('country') == "GN") {{ 'selected' }} @endif >Guinea</option>
					<option value="GW" @if (old('country') == "GW") {{ 'selected' }} @endif >Guinea-Bissau</option>
					<option value="GY" @if (old('country') == "GY") {{ 'selected' }} @endif >Guyana</option>
					<option value="HT" @if (old('country') == "HT") {{ 'selected' }} @endif >Haiti</option>
					<option value="HM" @if (old('country') == "HM") {{ 'selected' }} @endif >Heard Island and McDonald Islands</option>
					<option value="VA" @if (old('country') == "VA") {{ 'selected' }} @endif >Holy See (Vatican City State)</option>
					<option value="HN" @if (old('country') == "HN") {{ 'selected' }} @endif >Honduras</option>
					<option value="HK" @if (old('country') == "HK") {{ 'selected' }} @endif >Hong Kong</option>
					<option value="HU" @if (old('country') == "HU") {{ 'selected' }} @endif >Hungary</option>
					<option value="IS" @if (old('country') == "IS") {{ 'selected' }} @endif >Iceland</option>
					<option value="IN" @if (old('country') == "IN") {{ 'selected' }} @endif >India</option>
					<option value="ID" @if (old('country') == "ID") {{ 'selected' }} @endif >Indonesia</option>
					<option value="IR" @if (old('country') == "IR") {{ 'selected' }} @endif >Iran, Islamic Republic of</option>
					<option value="IQ" @if (old('country') == "IQ") {{ 'selected' }} @endif >Iraq</option>
					<option value="IE" @if (old('country') == "IE") {{ 'selected' }} @endif >Ireland</option>
					<option value="IM" @if (old('country') == "IM") {{ 'selected' }} @endif >Isle of Man</option>
					<option value="IL" @if (old('country') == "IL") {{ 'selected' }} @endif >Israel</option>
					<option value="IT" @if (old('country') == "IT") {{ 'selected' }} @endif >Italy</option>
					<option value="JM" @if (old('country') == "JM") {{ 'selected' }} @endif >Jamaica</option>
					<option value="JP" @if (old('country') == "JP") {{ 'selected' }} @endif >Japan</option>
					<option value="JE" @if (old('country') == "JE") {{ 'selected' }} @endif >Jersey</option>
					<option value="JO" @if (old('country') == "JO") {{ 'selected' }} @endif >Jordan</option>
					<option value="KZ" @if (old('country') == "KZ") {{ 'selected' }} @endif >Kazakhstan</option>
					<option value="KE" @if (old('country') == "KE") {{ 'selected' }} @endif >Kenya</option>
					<option value="KI" @if (old('country') == "KI") {{ 'selected' }} @endif >Kiribati</option>
					<option value="KP" @if (old('country') == "KP") {{ 'selected' }} @endif >Korea, Democratic People's Republic of</option>
					<option value="KR" @if (old('country') == "KR") {{ 'selected' }} @endif >Korea, Republic of</option>
					<option value="KW" @if (old('country') == "KW") {{ 'selected' }} @endif >Kuwait</option>
					<option value="KG" @if (old('country') == "KG") {{ 'selected' }} @endif >Kyrgyzstan</option>
					<option value="LA" @if (old('country') == "LA") {{ 'selected' }} @endif >Lao People's Democratic Republic</option>
					<option value="LV" @if (old('country') == "LV") {{ 'selected' }} @endif >Latvia</option>
					<option value="LB" @if (old('country') == "LB") {{ 'selected' }} @endif >Lebanon</option>
					<option value="LS" @if (old('country') == "LS") {{ 'selected' }} @endif >Lesotho</option>
					<option value="LR" @if (old('country') == "LR") {{ 'selected' }} @endif >Liberia</option>
					<option value="LY" @if (old('country') == "LY") {{ 'selected' }} @endif >Libya</option>
					<option value="LI" @if (old('country') == "LI") {{ 'selected' }} @endif >Liechtenstein</option>
					<option value="LT" @if (old('country') == "LT") {{ 'selected' }} @endif >Lithuania</option>
					<option value="LU" @if (old('country') == "LU") {{ 'selected' }} @endif >Luxembourg</option>
					<option value="MO" @if (old('country') == "MO") {{ 'selected' }} @endif >Macao</option>
					<option value="MK" @if (old('country') == "MK") {{ 'selected' }} @endif >Macedonia, the former Yugoslav Republic of</option>
					<option value="MG" @if (old('country') == "MG") {{ 'selected' }} @endif >Madagascar</option>
					<option value="MW" @if (old('country') == "MW") {{ 'selected' }} @endif >Malawi</option>
					<option value="MY" @if (old('country') == "MY") {{ 'selected' }} @endif >Malaysia</option>
					<option value="MV" @if (old('country') == "MV") {{ 'selected' }} @endif >Maldives</option>
					<option value="ML" @if (old('country') == "ML") {{ 'selected' }} @endif >Mali</option>
					<option value="MT" @if (old('country') == "MT") {{ 'selected' }} @endif >Malta</option>
					<option value="MH" @if (old('country') == "MH") {{ 'selected' }} @endif >Marshall Islands</option>
					<option value="MQ" @if (old('country') == "MQ") {{ 'selected' }} @endif >Martinique</option>
					<option value="MR" @if (old('country') == "MR") {{ 'selected' }} @endif >Mauritania</option>
					<option value="MU" @if (old('country') == "MU") {{ 'selected' }} @endif >Mauritius</option>
					<option value="YT" @if (old('country') == "YT") {{ 'selected' }} @endif >Mayotte</option>
					<option value="MX" @if (old('country') == "MX") {{ 'selected' }} @endif >Mexico</option>
					<option value="FM" @if (old('country') == "FM") {{ 'selected' }} @endif >Micronesia, Federated States of</option>
					<option value="MD" @if (old('country') == "MD") {{ 'selected' }} @endif >Moldova, Republic of</option>
					<option value="MC" @if (old('country') == "MC") {{ 'selected' }} @endif >Monaco</option>
					<option value="MN" @if (old('country') == "MN") {{ 'selected' }} @endif >Mongolia</option>
					<option value="ME" @if (old('country') == "ME") {{ 'selected' }} @endif >Montenegro</option>
					<option value="MS" @if (old('country') == "MS") {{ 'selected' }} @endif >Montserrat</option>
					<option value="MA" @if (old('country') == "MA") {{ 'selected' }} @endif >Morocco</option>
					<option value="MZ" @if (old('country') == "MZ") {{ 'selected' }} @endif >Mozambique</option>
					<option value="MM" @if (old('country') == "MM") {{ 'selected' }} @endif >Myanmar</option>
					<option value="NA" @if (old('country') == "NA") {{ 'selected' }} @endif >Namibia</option>
					<option value="NR" @if (old('country') == "NR") {{ 'selected' }} @endif >Nauru</option>
					<option value="NP" @if (old('country') == "NP") {{ 'selected' }} @endif >Nepal</option>
					<option value="NL" @if (old('country') == "NL") {{ 'selected' }} @endif >Netherlands</option>
					<option value="NC" @if (old('country') == "NC") {{ 'selected' }} @endif >New Caledonia</option>
					<option value="NZ" @if (old('country') == "NZ") {{ 'selected' }} @endif >New Zealand</option>
					<option value="NI" @if (old('country') == "NI") {{ 'selected' }} @endif >Nicaragua</option>
					<option value="NE" @if (old('country') == "NE") {{ 'selected' }} @endif >Niger</option>
					<option value="NG" @if (old('country') == "NG") {{ 'selected' }} @endif >Nigeria</option>
					<option value="NU" @if (old('country') == "NU") {{ 'selected' }} @endif >Niue</option>
					<option value="NF" @if (old('country') == "NF") {{ 'selected' }} @endif >Norfolk Island</option>
					<option value="MP" @if (old('country') == "MP") {{ 'selected' }} @endif >Northern Mariana Islands</option>
					<option value="NO" @if (old('country') == "NO") {{ 'selected' }} @endif >Norway</option>
					<option value="OM" @if (old('country') == "OM") {{ 'selected' }} @endif >Oman</option>
					<option value="PK" @if (old('country') == "PK") {{ 'selected' }} @endif >Pakistan</option>
					<option value="PW" @if (old('country') == "PW") {{ 'selected' }} @endif >Palau</option>
					<option value="PS" @if (old('country') == "PS") {{ 'selected' }} @endif >Palestinian Territory, Occupied</option>
					<option value="PA" @if (old('country') == "PA") {{ 'selected' }} @endif >Panama</option>
					<option value="PG" @if (old('country') == "PG") {{ 'selected' }} @endif >Papua New Guinea</option>
					<option value="PY" @if (old('country') == "PY") {{ 'selected' }} @endif >Paraguay</option>
					<option value="PE" @if (old('country') == "PE") {{ 'selected' }} @endif >Peru</option>
					<option value="PH" @if (old('country') == "PH") {{ 'selected' }} @endif >Philippines</option>
					<option value="PN" @if (old('country') == "PN") {{ 'selected' }} @endif >Pitcairn</option>
					<option value="PL" @if (old('country') == "PL") {{ 'selected' }} @endif >Poland</option>
					<option value="PT" @if (old('country') == "PT") {{ 'selected' }} @endif >Portugal</option>
					<option value="PR" @if (old('country') == "PR") {{ 'selected' }} @endif >Puerto Rico</option>
					<option value="QA" @if (old('country') == "QA") {{ 'selected' }} @endif >Qatar</option>
					<option value="RE" @if (old('country') == "RE") {{ 'selected' }} @endif >Réunion</option>
					<option value="RO" @if (old('country') == "RO") {{ 'selected' }} @endif >Romania</option>
					<option value="RU" @if (old('country') == "RU") {{ 'selected' }} @endif >Russian Federation</option>
					<option value="RW" @if (old('country') == "RW") {{ 'selected' }} @endif >Rwanda</option>
					<option value="BL" @if (old('country') == "BL") {{ 'selected' }} @endif >Saint Barthélemy</option>
					<option value="SH" @if (old('country') == "SH") {{ 'selected' }} @endif >Saint Helena, Ascension and Tristan da Cunha</option>
					<option value="KN" @if (old('country') == "KN") {{ 'selected' }} @endif >Saint Kitts and Nevis</option>
					<option value="LC" @if (old('country') == "LC") {{ 'selected' }} @endif >Saint Lucia</option>
					<option value="MF" @if (old('country') == "MF") {{ 'selected' }} @endif >Saint Martin (French part)</option>
					<option value="PM" @if (old('country') == "PM") {{ 'selected' }} @endif >Saint Pierre and Miquelon</option>
					<option value="VC" @if (old('country') == "VC") {{ 'selected' }} @endif >Saint Vincent and the Grenadines</option>
					<option value="WS" @if (old('country') == "WS") {{ 'selected' }} @endif >Samoa</option>
					<option value="SM" @if (old('country') == "SM") {{ 'selected' }} @endif >San Marino</option>
					<option value="ST" @if (old('country') == "ST") {{ 'selected' }} @endif >Sao Tome and Principe</option>
					<option value="SA" @if (old('country') == "SA") {{ 'selected' }} @endif >Saudi Arabia</option>
					<option value="SN" @if (old('country') == "SN") {{ 'selected' }} @endif >Senegal</option>
					<option value="RS" @if (old('country') == "RS") {{ 'selected' }} @endif >Serbia</option>
					<option value="SC" @if (old('country') == "SC") {{ 'selected' }} @endif >Seychelles</option>
					<option value="SL" @if (old('country') == "SL") {{ 'selected' }} @endif >Sierra Leone</option>
					<option value="SG" @if (old('country') == "SG") {{ 'selected' }} @endif >Singapore</option>
					<option value="SX" @if (old('country') == "SX") {{ 'selected' }} @endif >Sint Maarten (Dutch part)</option>
					<option value="SK" @if (old('country') == "SK") {{ 'selected' }} @endif >Slovakia</option>
					<option value="SI" @if (old('country') == "SI") {{ 'selected' }} @endif >Slovenia</option>
					<option value="SB" @if (old('country') == "SB") {{ 'selected' }} @endif >Solomon Islands</option>
					<option value="SO" @if (old('country') == "SO") {{ 'selected' }} @endif >Somalia</option>
					<option value="ZA" @if (old('country') == "ZA") {{ 'selected' }} @endif >South Africa</option>
					<option value="GS" @if (old('country') == "GS") {{ 'selected' }} @endif >South Georgia and the South Sandwich Islands</option>
					<option value="SS" @if (old('country') == "SS") {{ 'selected' }} @endif >South Sudan</option>
					<option value="ES" @if (old('country') == "ES") {{ 'selected' }} @endif >Spain</option>
					<option value="LK" @if (old('country') == "LK") {{ 'selected' }} @endif >Sri Lanka</option>
					<option value="SD" @if (old('country') == "SD") {{ 'selected' }} @endif >Sudan</option>
					<option value="SR" @if (old('country') == "SR") {{ 'selected' }} @endif >Suriname</option>
					<option value="SJ" @if (old('country') == "SJ") {{ 'selected' }} @endif >Svalbard and Jan Mayen</option>
					<option value="SZ" @if (old('country') == "SZ") {{ 'selected' }} @endif >Swaziland</option>
					<option value="SE" @if (old('country') == "SE") {{ 'selected' }} @endif >Sweden</option>
					<option value="CH" @if (old('country') == "CH") {{ 'selected' }} @endif >Switzerland</option>
					<option value="SY" @if (old('country') == "SY") {{ 'selected' }} @endif >Syrian Arab Republic</option>
					<option value="TW" @if (old('country') == "TW") {{ 'selected' }} @endif >Taiwan, Province of China</option>
					<option value="TJ" @if (old('country') == "TJ") {{ 'selected' }} @endif >Tajikistan</option>
					<option value="TZ" @if (old('country') == "TZ") {{ 'selected' }} @endif >Tanzania, United Republic of</option>
					<option value="TH" @if (old('country') == "TH") {{ 'selected' }} @endif >Thailand</option>
					<option value="TL" @if (old('country') == "TL") {{ 'selected' }} @endif >Timor-Leste</option>
					<option value="TG" @if (old('country') == "TG") {{ 'selected' }} @endif >Togo</option>
					<option value="TK" @if (old('country') == "TK") {{ 'selected' }} @endif >Tokelau</option>
					<option value="TO" @if (old('country') == "TO") {{ 'selected' }} @endif >Tonga</option>
					<option value="TT" @if (old('country') == "TT") {{ 'selected' }} @endif >Trinidad and Tobago</option>
					<option value="TN" @if (old('country') == "TN") {{ 'selected' }} @endif >Tunisia</option>
					<option value="TR" @if (old('country') == "TR") {{ 'selected' }} @endif >Turkey</option>
					<option value="TM" @if (old('country') == "TM") {{ 'selected' }} @endif >Turkmenistan</option>
					<option value="TC" @if (old('country') == "TC") {{ 'selected' }} @endif >Turks and Caicos Islands</option>
					<option value="TV" @if (old('country') == "TV") {{ 'selected' }} @endif >Tuvalu</option>
					<option value="UG" @if (old('country') == "UG") {{ 'selected' }} @endif >Uganda</option>
					<option value="UA" @if (old('country') == "UA") {{ 'selected' }} @endif >Ukraine</option>
					<option value="AE" @if (old('country') == "AE") {{ 'selected' }} @endif >United Arab Emirates</option>
					<option value="GB" @if (old('country') == "GB") {{ 'selected' }} @endif >United Kingdom</option>
					<option value="US" @if (old('country') == "US") {{ 'selected' }} @endif >United States</option>
					<option value="UM" @if (old('country') == "UM") {{ 'selected' }} @endif >United States Minor Outlying Islands</option>
					<option value="UY" @if (old('country') == "UY") {{ 'selected' }} @endif >Uruguay</option>
					<option value="UZ" @if (old('country') == "UZ") {{ 'selected' }} @endif >Uzbekistan</option>
					<option value="VU" @if (old('country') == "VU") {{ 'selected' }} @endif >Vanuatu</option>
					<option value="VE" @if (old('country') == "VE") {{ 'selected' }} @endif >Venezuela, Bolivarian Republic of</option>
					<option value="VN" @if (old('country') == "VN") {{ 'selected' }} @endif >Viet Nam</option>
					<option value="VG" @if (old('country') == "VG") {{ 'selected' }} @endif >Virgin Islands, British</option>
					<option value="VI" @if (old('country') == "VI") {{ 'selected' }} @endif >Virgin Islands, U.S.</option>
					<option value="WF" @if (old('country') == "WF") {{ 'selected' }} @endif >Wallis and Futuna</option>
					<option value="EH" @if (old('country') == "EH") {{ 'selected' }} @endif >Western Sahara</option>
					<option value="YE" @if (old('country') == "YE") {{ 'selected' }} @endif >Yemen</option>
					<option value="ZM" @if (old('country') == "ZM") {{ 'selected' }} @endif >Zambia</option>
					<option value="ZW" @if (old('country') == "ZW") {{ 'selected' }} @endif >Zimbabwe</option>
				</select>
			</div>
			{{-- <div class="form-group">
				<label>BIO</label>
				<textarea class="form-control" id="summary-ckeditor2" name="bio" value="{{old('bio')}}"></textarea>
				<small class="form-text text-muted">Tentang Diri anda.</small>
			</div> --}}
			<div class="form-group">
				<label>Konfirmasi Pendaftaran anda sebagai : </label>
				<div class="custom-control custom-checkbox">
					<input type="checkbox" name="confirm_reg[]" value="email" class="custom-control-input" id="defaultUnchecked">
					<label class="custom-control-label" for="defaultUnchecked">Send me a confirmation email including my username and password.</label>
				</div>
				{{-- <div class="custom-control custom-checkbox">
					<input type="checkbox" name="confirm_reg[]" value="Peneliti"  class="custom-control-input" id="defaultUnchecked">
					<label class="custom-control-label">User Peneliti</label>
				</div> --}}

				{{-- <div class="custom-control custom-checkbox">
					<input type="checkbox" name="confirm_reg[]" value="Reviewer" class="custom-control-input" id="defaultUnchecked">
					<label class="custom-control-label">Reviewer</label>
				</div> --}}

				{{-- <label>Identify reviewing interests (substantive areas and research methods):</label>
					<input type="text" name="identify" value="{{old('identify')}}" class="form-control" placeholder="Input here"> --}}
				</div>

				<button type="submit" class="btn btn-primary col-lg-6 col-lg-offset-0">REGISTER</button>
				<button type="submit" class="btn btn-danger col-lg-6 col-lg-offset-0">CANCEL</button>

				{{-- <small class="form-text text-muted" style="color: red;">* Denotes required field.</small> --}}
			</form>

		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript">

	$(document).ready(function(){
		$('input[name="category"]').trigger('click')//anas
		$('#div-instansi').hide();
		$('#div-kerja').hide();
		$('#div-no-identitas').hide();
		$('#div-jenjang').hide();
		$('#div-jurusan').hide();
		$('#div-pangkat-golongan').hide();
		$('#div-jabatan').hide();
		show_form();
    
      $('input.disablecopypaste').bind('copy paste', function (e) {
         e.preventDefault();
      });
      $('textarea.disablecopypaste').bind('copy paste', function (e) {
         e.preventDefault();
      });
	
	});	 

	 function cekAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57) || charCode == 32 || charCode == 46 || charCode == 64)
        return false;
      return true;
    }
 
    function cekAngkaHuruf(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
      if ((charCode >= 65 && charCode <= 90) || (charCode >= 97 && charCode <= 122) || (charCode >= 48 && charCode <= 57) || (charCode == 44 || charCode == 46)  || charCode == 32 || charCode == 45 || charCode == 47 || charCode == 64){
        return true;
      }else{
        return false;
      }
    }

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
				$('#div-pangkat-golongan').show();
				$('input[name=pangkat_golongan]').attr('required', '');
				$('#div-jabatan').show();
				$('input[name=jabatan]').attr('required', '');
			break;
			case 'mhs':
				unit = 'Nama Universitas/Instansi';
				label = 'NIM/NIDN/NIP';
				$("#unit_kerja").removeAttr('required');
				$('#div-instansi').show();
				$('#div-no-identitas').show();
				$('#div-kerja').hide();
				$('#div-jenjang').show();
				// $('input[name=jenjang]').prop('required',true);
				$('#div-pendidikan-terakhir').show();
				$('input[name=pendidikan_terakhir]').attr('required', '');
				$('#div-pangkat-golongan').hide();
				$('input[name=pangkat_golongan]').removeAttr('required');
				$('#div-jabatan').hide();
				$('input[name=jabatan]').removeAttr('required');
			break;
			// case 'dosen':
			// 	unit = 'Nama Universitas';
			// 	label = 'NIP';
			// break;
			// case 'umum':
			// 	unit = 'Nama Instansi';
			// 	label = 'NIK';
			// 	kerja = 'Unit Kerja';
			// 	$("#unit_kerja").attr('required', ''); 
			// 	$('#div-instansi').show();
			// 	$('#div-no-identitas').show();
			// 	$('#div-kerja').show();
			// break;
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

	$(".btn-refresh").click(function(){
		$.ajax({
			type:'GET',
			url:'/refresh_captcha',
			success:function(data){
				$(".captcha span").html(data.captcha);
			}
		});
	});

	function samePass() {
		var password = $('.password').val();
		var confirm_password = $('.confirm_password').val();

		if (password == confirm_password) {
			$('.statusPass').html('');
		}else{
			$('.statusPass').html('the password must be same.');
		}
	}

	$('input[name=password]').keyup(function(){
		samePass();
		var value = $('input[name=password]').val();	
		if (value.length >= 6) {
			$('#pass').hide();
		}else {
			$('#pass').show();
		}
	});
</script>
@endsection
