@extends('maxmedia.template')

@section('content')
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}"> <img class="img-responsive" src="images/logo_copia.png" width="150" alt="logof - copia"/>
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li ><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/publishers') }}">Publishers</a></li>
                <li><a href="{{ url('/advertiser') }}">Advertisers</a></li>
                <li><a href="{{ url('/about') }}">About</a></li>
                <li class="active"><a href="{{ url('/contact') }}">Register</a></li>
            </ul>
            @include('maxmedia.partials.form-login')
        </div>
    </div>
</nav>
<br>
<br>
<br>
<div class="clearfix"></div>
<div class="section">
    <div class="container">
        <div class="row">
        <div class="col-md-3">
            
        </div>
            <div class="col-md-6">
                @include('maxmedia.partials.errors')
                <h2 class="text-center">Register now</h2>
                <br> 
                <span class="text-center" style=" color: #272822">we will review your application in less than 12 hours </span>
                <div class="section">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <form role="form" action="{{ route('mail.store') }}" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                        <label class="control-label" for="name">Complete Name</label>
                                        <input class="form-control" id="name" name="name" placeholder="Complete Name" type="text" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="last-name">Country</label>
                                        <select class="form-control" id="element_5_6" name="pais" style="width: 560px;"> 
                                            <option value="" selected="selected"></option>
                                                <option value="Afghanistan" >Afghanistan</option>
                                                <option value="Albania" >Albania</option>
                                                <option value="Algeria" >Algeria</option>
                                                <option value="Andorra" >Andorra</option>
                                                <option value="Antigua and Barbuda" >Antigua and Barbuda</option>
                                                <option value="Argentina" >Argentina</option>
                                                <option value="Armenia" >Armenia</option>
                                                <option value="Australia" >Australia</option>
                                                <option value="Austria" >Austria</option>
                                                <option value="Azerbaijan" >Azerbaijan</option>
                                                <option value="Bahamas" >Bahamas</option>
                                                <option value="Bahrain" >Bahrain</option>
                                                <option value="Bangladesh" >Bangladesh</option>
                                                <option value="Barbados" >Barbados</option>
                                                <option value="Belarus" >Belarus</option>
                                                <option value="Belgium" >Belgium</option>
                                                <option value="Belize" >Belize</option>
                                                <option value="Benin" >Benin</option>
                                                <option value="Bhutan" >Bhutan</option>
                                                <option value="Bolivia" >Bolivia</option>
                                                <option value="Bosnia and Herzegovina" >Bosnia and Herzegovina</option>
                                                <option value="Botswana" >Botswana</option>
                                                <option value="Brazil" >Brazil</option>
                                                <option value="Brunei" >Brunei</option>
                                                <option value="Bulgaria" >Bulgaria</option>
                                                <option value="Burkina Faso" >Burkina Faso</option>
                                                <option value="Burundi" >Burundi</option>
                                                <option value="Cambodia" >Cambodia</option>
                                                <option value="Cameroon" >Cameroon</option>
                                                <option value="Canada" >Canada</option>
                                                <option value="Cape Verde" >Cape Verde</option>
                                                <option value="Central African Republic" >Central African Republic</option>
                                                <option value="Chad" >Chad</option>
                                                <option value="Chile" >Chile</option>
                                                <option value="China" >China</option>
                                                <option value="Colombia" >Colombia</option>
                                                <option value="Comoros" >Comoros</option>
                                                <option value="Congo" >Congo</option>
                                                <option value="Cook Islands and Niue" >Cook Islands and Niue</option>
                                                <option value="Costa Rica" >Costa Rica</option>
                                                <option value="Côte d'Ivoire" >Côte d'Ivoire</option>
                                                <option value="Croatia" >Croatia</option>
                                                <option value="Cuba" >Cuba</option>
                                                <option value="Cyprus" >Cyprus</option>
                                                <option value="Czech Republic" >Czech Republic</option>
                                                <option value="Denmark" >Denmark</option>
                                                <option value="Djibouti" >Djibouti</option>
                                                <option value="Dominica" >Dominica</option>
                                                <option value="Dominican Republic" >Dominican Republic</option>
                                                <option value="East Timor" >East Timor</option>
                                                <option value="Ecuador" >Ecuador</option>
                                                <option value="Egypt" >Egypt</option>
                                                <option value="El Salvador" >El Salvador</option>
                                                <option value="Equatorial Guinea" >Equatorial Guinea</option>
                                                <option value="Eritrea" >Eritrea</option>
                                                <option value="Estonia" >Estonia</option>
                                                <option value="Ethiopia" >Ethiopia</option>
                                                <option value="Fiji" >Fiji</option>
                                                <option value="Finland" >Finland</option>
                                                <option value="France" >France</option>
                                                <option value="Gabon" >Gabon</option>
                                                <option value="Gambia" >Gambia</option>
                                                <option value="Georgia" >Georgia</option>
                                                <option value="Germany" >Germany</option>
                                                <option value="Ghana" >Ghana</option>
                                                <option value="Greece" >Greece</option>
                                                <option value="Grenada" >Grenada</option>
                                                <option value="Guatemala" >Guatemala</option>
                                                <option value="Guinea" >Guinea</option>
                                                <option value="Guinea-Bissau" >Guinea-Bissau</option>
                                                <option value="Guyana" >Guyana</option>
                                                <option value="Haiti" >Haiti</option>
                                                <option value="Honduras" >Honduras</option>
                                                <option value="Hong Kong" >Hong Kong</option>
                                                <option value="Hungary" >Hungary</option>
                                                <option value="Iceland" >Iceland</option>
                                                <option value="India" >India</option>
                                                <option value="Indonesia" >Indonesia</option>
                                                <option value="Iran" >Iran</option>
                                                <option value="Iraq" >Iraq</option>
                                                <option value="Ireland" >Ireland</option>
                                                <option value="Israel" >Israel</option>
                                                <option value="Italy" >Italy</option>
                                                <option value="Jamaica" >Jamaica</option>
                                                <option value="Japan" >Japan</option>
                                                <option value="Jordan" >Jordan</option>
                                                <option value="Kazakhstan" >Kazakhstan</option>
                                                <option value="Kenya" >Kenya</option>
                                                <option value="Kiribati" >Kiribati</option>
                                                <option value="North Korea" >North Korea</option>
                                                <option value="South Korea" >South Korea</option>
                                                <option value="Kuwait" >Kuwait</option>
                                                <option value="Kyrgyzstan" >Kyrgyzstan</option>
                                                <option value="Laos" >Laos</option>
                                                <option value="Latvia" >Latvia</option>
                                                <option value="Lebanon" >Lebanon</option>
                                                <option value="Lesotho" >Lesotho</option>
                                                <option value="Liberia" >Liberia</option>
                                                <option value="Libya" >Libya</option>
                                                <option value="Liechtenstein" >Liechtenstein</option>
                                                <option value="Lithuania" >Lithuania</option>
                                                <option value="Luxembourg" >Luxembourg</option>
                                                <option value="Macedonia" >Macedonia</option>
                                                <option value="Madagascar" >Madagascar</option>
                                                <option value="Malawi" >Malawi</option>
                                                <option value="Malaysia" >Malaysia</option>
                                                <option value="Maldives" >Maldives</option>
                                                <option value="Mali" >Mali</option>
                                                <option value="Malta" >Malta</option>
                                                <option value="Marshall Islands" >Marshall Islands</option>
                                                <option value="Mauritania" >Mauritania</option>
                                                <option value="Mauritius" >Mauritius</option>
                                                <option value="Mexico" >Mexico</option>
                                                <option value="Micronesia" >Micronesia</option>
                                                <option value="Moldova" >Moldova</option>
                                                <option value="Monaco" >Monaco</option>
                                                <option value="Mongolia" >Mongolia</option>
                                                <option value="Montenegro" >Montenegro</option>
                                                <option value="Morocco" >Morocco</option>
                                                <option value="Mozambique" >Mozambique</option>
                                                <option value="Myanmar" >Myanmar</option>
                                                <option value="Namibia" >Namibia</option>
                                                <option value="Nauru" >Nauru</option>
                                                <option value="Nepal" >Nepal</option>
                                                <option value="Netherlands" >Netherlands</option>
                                                <option value="New Zealand" >New Zealand</option>
                                                <option value="Nicaragua" >Nicaragua</option>
                                                <option value="Niger" >Niger</option>
                                                <option value="Nigeria" >Nigeria</option>
                                                <option value="Norway" >Norway</option>
                                                <option value="Oman" >Oman</option>
                                                <option value="Pakistan" >Pakistan</option>
                                                <option value="Palau" >Palau</option>
                                                <option value="Panama" >Panama</option>
                                                <option value="Papua New Guinea" >Papua New Guinea</option>
                                                <option value="Paraguay" >Paraguay</option>
                                                <option value="Peru" >Peru</option>
                                                <option value="Philippines" >Philippines</option>
                                                <option value="Poland" >Poland</option>
                                                <option value="Portugal" >Portugal</option>
                                                <option value="Puerto Rico" >Puerto Rico</option>
                                                <option value="Qatar" >Qatar</option>
                                                <option value="Romania" >Romania</option>
                                                <option value="Russia" >Russia</option>
                                                <option value="Rwanda" >Rwanda</option>
                                                <option value="Saint Kitts and Nevis" >Saint Kitts and Nevis</option>
                                                <option value="Saint Lucia" >Saint Lucia</option>
                                                <option value="Saint Vincent and the Grenadines" >Saint Vincent and the Grenadines</option>
                                                <option value="Samoa" >Samoa</option>
                                                <option value="San Marino" >San Marino</option>
                                                <option value="Sao Tome and Principe" >Sao Tome and Principe</option>
                                                <option value="Saudi Arabia" >Saudi Arabia</option>
                                                <option value="Senegal" >Senegal</option>
                                                <option value="Serbia and Montenegro" >Serbia and Montenegro</option>
                                                <option value="Seychelles" >Seychelles</option>
                                                <option value="Sierra Leone" >Sierra Leone</option>
                                                <option value="Singapore" >Singapore</option>
                                                <option value="Slovakia" >Slovakia</option>
                                                <option value="Slovenia" >Slovenia</option>
                                                <option value="Solomon Islands" >Solomon Islands</option>
                                                <option value="Somalia" >Somalia</option>
                                                <option value="South Africa" >South Africa</option>
                                                <option value="Spain" >Spain</option>
                                                <option value="Sri Lanka" >Sri Lanka</option>
                                                <option value="Sudan" >Sudan</option>
                                                <option value="Suriname" >Suriname</option>
                                                <option value="Swaziland" >Swaziland</option>
                                                <option value="Sweden" >Sweden</option>
                                                <option value="Switzerland" >Switzerland</option>
                                                <option value="Syria" >Syria</option>
                                                <option value="Taiwan" >Taiwan</option>
                                                <option value="Tajikistan" >Tajikistan</option>
                                                <option value="Tanzania" >Tanzania</option>
                                                <option value="Thailand" >Thailand</option>
                                                <option value="Togo" >Togo</option>
                                                <option value="Tonga" >Tonga</option>
                                                <option value="Trinidad and Tobago" >Trinidad and Tobago</option>
                                                <option value="Tunisia" >Tunisia</option>
                                                <option value="Turkey" >Turkey</option>
                                                <option value="Turkmenistan" >Turkmenistan</option>
                                                <option value="Tuvalu" >Tuvalu</option>
                                                <option value="Uganda" >Uganda</option>
                                                <option value="Ukraine" >Ukraine</option>
                                                <option value="United Arab Emirates" >United Arab Emirates</option>
                                                <option value="United Kingdom" >United Kingdom</option>
                                                <option value="United States" >United States</option>
                                                <option value="Uruguay" >Uruguay</option>
                                                <option value="Uzbekistan" >Uzbekistan</option>
                                                <option value="Vanuatu" >Vanuatu</option>
                                                <option value="Vatican City" >Vatican City</option>
                                                <option value="Venezuela" >Venezuela</option>
                                                <option value="Vietnam" >Vietnam</option>
                                                <option value="Yemen" >Yemen</option>
                                                <option value="Zambia" >Zambia</option>
                                                <option value="Zimbabwe" >Zimbabwe</option>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="email">Email</label>
                                        <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                                    </div>
                                    <div class="fm-group">
                                        <label class="control-label" for="content">Paypal ID</label>
                                        <input class="form-control" id="paypal" name="paypal" placeholder="" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="control-label" for="">Skype ID</label>
                                        <input class="form-control" id="skype_id" name="skype" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="control-label" for="web_site">Web Site where the ads will be placed</label>
                                        <input class="form-control" id="web_site" name="web_site" value="http://" placeholder="Your Web site" required>
                                    </div>
                                    <div class="form-group">
                                        <br>
                                        <label class="control-label">Accept terms and conditions
                                            <input class="" id="terminos" name="terminos" placeholder="Email" type="radio" required>
                                        </label>
                                    </div>

                                    @if(isset($username))
										<input type="hidden" name="code_referrer" value="{{ $code }}">
										<input type="hidden" name="user_referrer" value="{{ $username }}">
										<input type="hidden" name="user_email_referrer" value="{{ $email }}">
                                    @endif
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <button type="reset" class="btn btn-danger">Cancel</button>
                                    
                                    <p></p>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<br>
<br>
<br>

@include('maxmedia.partials.footer')
@include('maxmedia.partials.notify')
@include('maxmedia.partials.message')


@stop