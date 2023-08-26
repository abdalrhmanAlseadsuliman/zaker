<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Register - SB Admin</title>
  <link href="css/styles.css" rel="stylesheet" />
  <link href="css/myStyle.css" rel="stylesheet" />
  <!-- <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script> -->
  <script src="js/fontawesome.js"></script>
  <style>
        body,
        html {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            background-image: url("./image/a-view-of-the-mosque-2560x1253.jpeg");
            background-size: cover;
            background-repeat: no-repeat;
        }
        </style>
</head>

<body class="bg-primary" dir="rtl">
  <div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
      <main>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-7">
              <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                  <h3 class="text-center font-weight-light my-4 ">
                    إنشاء حساب
                  </h3>
                </div>
                <div class="card-body">
                  <form id="MyRegister">
                    <div class="row mb-3">
                      <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                          <input class="form-control" name="FirstName" id="inputFirstName" type="text" placeholder="Enter your first name" required />
                          <label for="inputFirstName">الاسم الاول</label>
                          <span id="FirstNameError" class="error"></span>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating">
                          <input class="form-control" name="LastName" id="inputLastName" type="text" placeholder="Enter your last name" required />
                          <label for="inputLastName">الاسم الاخير (الكنية)</label>
                          <span id="LastNameError" class="error"></span>

                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                          <select class="form-control formSelect" name="Gender" id="Gender" required>
                            <option selected disabled> الجنس </option>
                            <option value="male"> Male </option>
                            <option value="Fmale"> Fmale </option>
                          </select>
                          <!-- <label for="inputFirstName">  </label> -->
                          <span id="GenderError" class="error"></span>

                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating">
                          <input class="form-control" name="Age" id="inputAge" type="number" placeholder="Enter your Age" required />
                          <label for="inputLastName"> Age </label>
                          <span id="AgeError" class="error"></span>

                        </div>
                      </div>
                    </div>


                    <div class="row mb-3">
                      <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                          <input class="form-control" name="Email" id="inputEmail" type="email" placeholder="name@example.com" required />
                          <label for="inputEmail">البريد الالكتروني</label>
                            <span id="EmailError" class="error"> </span>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0 ">
                          <select name="Nationality" class="form-control formSelect" id="inputSelect" required>
                            <option disabled selected> الجنسية </option>
                            <option value="Jordan">الأردن</option>
                            <option value="United Arab Emirates">
                              الإمارات
                            </option>
                            <option value="Bahrain">البحرين</option>
                            <option value="Algeria">الجزائر</option>
                            <option value="Sudan">السودان</option>
                            <option value="Somalia">الصومال</option>
                            <option value="Iraq">العراق</option>
                            <option value="Kuwait">الكويت</option>
                            <option value="Morocco">المغرب</option>
                            <option value="Saudi Arabia">السعودية</option>
                            <option value="Tunisia">تونس</option>
                            <option value="Comoros">جزر القمر</option>
                            <option value="Djibouti">جيبوتي</option>
                            <option value="Syria">سوريا</option>
                            <option value="Oman">عمان</option>
                            <option value="Palestine">فلسطين</option>
                            <option value="Lebanon">لبنان</option>
                            <option value="Libyan">ليبيا</option>
                            <option value="Egypt">مصر</option>
                            <option value="Mauritania">موريتانيا</option>
                            <option value="Qatar">قطر</option>
                            <option value="Yemen">اليمن</option>

                            <option value="Afghanistan">Afghanistan</option>
                            <option value="Albania">Albania</option>
                            <option value="American Samoa">
                              American Samoa
                            </option>
                            <option value="Andorra">Andorra</option>
                            <option value="Angola">Angola</option>
                            <option value="Anguilla">Anguilla</option>
                            <option value="Antartica">Antarctica</option>
                            <option value="Antigua and Barbuda">
                              Antigua and Barbuda
                            </option>
                            <option value="Argentina">Argentina</option>
                            <option value="Armenia">Armenia</option>
                            <option value="Aruba">Aruba</option>
                            <option value="Australia">Australia</option>
                            <option value="Austria">Austria</option>
                            <option value="Azerbaijan">Azerbaijan</option>
                            <option value="Bahamas">Bahamas</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Barbados">Barbados</option>
                            <option value="Belarus">Belarus</option>
                            <option value="Belgium">Belgium</option>
                            <option value="Belize">Belize</option>
                            <option value="Benin">Benin</option>
                            <option value="Bermuda">Bermuda</option>
                            <option value="Bhutan">Bhutan</option>
                            <option value="Bolivia">Bolivia</option>
                            <option value="Bosnia and Herzegowina">
                              Bosnia and Herzegowina
                            </option>
                            <option value="Botswana">Botswana</option>
                            <option value="Bouvet Island">
                              Bouvet Island
                            </option>
                            <option value="Brazil">Brazil</option>
                            <option value="British Indian Ocean Territory">
                              British Indian Ocean Territory
                            </option>
                            <option value="Brunei Darussalam">
                              Brunei Darussalam
                            </option>
                            <option value="Bulgaria">Bulgaria</option>
                            <option value="Burkina Faso">Burkina Faso</option>
                            <option value="Burundi">Burundi</option>
                            <option value="Cambodia">Cambodia</option>
                            <option value="Cameroon">Cameroon</option>
                            <option value="Canada">Canada</option>
                            <option value="Cape Verde">Cape Verde</option>
                            <option value="Cayman Islands">
                              Cayman Islands
                            </option>
                            <option value="Central African Republic">
                              Central African Republic
                            </option>
                            <option value="Chad">Chad</option>
                            <option value="Chile">Chile</option>
                            <option value="China">China</option>
                            <option value="Christmas Island">
                              Christmas Island
                            </option>
                            <option value="Cocos Islands">
                              Cocos (Keeling) Islands
                            </option>
                            <option value="Colombia">Colombia</option>
                            <option value="Congo">Congo</option>
                            <option value="Congo">
                              Congo, the Democratic Republic of the
                            </option>
                            <option value="Cook Islands">Cook Islands</option>
                            <option value="Costa Rica">Costa Rica</option>
                            <option value="Cota D'Ivoire">
                              Cote d'Ivoire
                            </option>
                            <option value="Croatia">
                              Croatia (Hrvatska)
                            </option>
                            <option value="Cuba">Cuba</option>
                            <option value="Cyprus">Cyprus</option>
                            <option value="Czech Republic">
                              Czech Republic
                            </option>
                            <option value="Denmark">Denmark</option>
                            <option value="Dominica">Dominica</option>
                            <option value="Dominican Republic">
                              Dominican Republic
                            </option>
                            <option value="East Timor">East Timor</option>
                            <option value="Ecuador">Ecuador</option>
                            <option value="El Salvador">El Salvador</option>
                            <option value="Equatorial Guinea">
                              Equatorial Guinea
                            </option>
                            <option value="Eritrea">Eritrea</option>
                            <option value="Estonia">Estonia</option>
                            <option value="Ethiopia">Ethiopia</option>
                            <option value="Falkland Islands">
                              Falkland Islands (Malvinas)
                            </option>
                            <option value="Faroe Islands">
                              Faroe Islands
                            </option>
                            <option value="Fiji">Fiji</option>
                            <option value="Finland">Finland</option>
                            <option value="France">France</option>
                            <option value="France Metropolitan">
                              France, Metropolitan
                            </option>
                            <option value="French Guiana">
                              French Guiana
                            </option>
                            <option value="French Polynesia">
                              French Polynesia
                            </option>
                            <option value="French Southern Territories">
                              French Southern Territories
                            </option>
                            <option value="Gabon">Gabon</option>
                            <option value="Gambia">Gambia</option>
                            <option value="Georgia">Georgia</option>
                            <option value="Germany">Germany</option>
                            <option value="Ghana">Ghana</option>
                            <option value="Gibraltar">Gibraltar</option>
                            <option value="Greece">Greece</option>
                            <option value="Greenland">Greenland</option>
                            <option value="Grenada">Grenada</option>
                            <option value="Guadeloupe">Guadeloupe</option>
                            <option value="Guam">Guam</option>
                            <option value="Guatemala">Guatemala</option>
                            <option value="Guinea">Guinea</option>
                            <option value="Guinea-Bissau">
                              Guinea-Bissau
                            </option>
                            <option value="Guyana">Guyana</option>
                            <option value="Haiti">Haiti</option>
                            <option value="Heard and McDonald Islands">
                              Heard and Mc Donald Islands
                            </option>
                            <option value="Holy See">
                              Holy See (Vatican City State)
                            </option>
                            <option value="Honduras">Honduras</option>
                            <option value="Hong Kong">Hong Kong</option>
                            <option value="Hungary">Hungary</option>
                            <option value="Iceland">Iceland</option>
                            <option value="India">India</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Iran">
                              Iran (Islamic Republic of)
                            </option>
                            <option value="Ireland">Ireland</option>
                            <option value="Italy">Italy</option>
                            <option value="Jamaica">Jamaica</option>
                            <option value="Japan">Japan</option>
                            <option value="Kazakhstan">Kazakhstan</option>
                            <option value="Kenya">Kenya</option>
                            <option value="Kiribati">Kiribati</option>
                            <option value="DemocraticKorea">
                              Korea, Democratic People's Republic of
                            </option>
                            <option value="Korea">Korea, Republic of</option>
                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                            <option value="Lao">Lao</option>
                            <option value="Latvia">Latvia</option>
                            <option value="Lesotho">Lesotho</option>
                            <option value="Liberia">Liberia</option>
                            <option value="Liechtenstein">
                              Liechtenstein
                            </option>
                            <option value="Lithuania">Lithuania</option>
                            <option value="Luxembourg">Luxembourg</option>
                            <option value="Macau">Macau</option>
                            <option value="Macedonia">Macedonia</option>
                            <option value="Madagascar">Madagascar</option>
                            <option value="Malawi">Malawi</option>
                            <option value="Malaysia">Malaysia</option>
                            <option value="Maldives">Maldives</option>
                            <option value="Mali">Mali</option>
                            <option value="Malta">Malta</option>
                            <option value="Marshall Islands">
                              Marshall Islands
                            </option>
                            <option value="Martinique">Martinique</option>
                            <option value="Mauritius">Mauritius</option>
                            <option value="Mayotte">Mayotte</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Micronesia">Micronesia</option>
                            <option value="Moldova">
                              Moldova, Republic of
                            </option>
                            <option value="Monaco">Monaco</option>
                            <option value="Mongolia">Mongolia</option>
                            <option value="Montserrat">Montserrat</option>
                            <option value="Mozambique">Mozambique</option>
                            <option value="Myanmar">Myanmar</option>
                            <option value="Namibia">Namibia</option>
                            <option value="Nauru">Nauru</option>
                            <option value="Nepal">Nepal</option>
                            <option value="Netherlands">Netherlands</option>
                            <option value="Netherlands Antilles">
                              Netherlands Antilles
                            </option>
                            <option value="New Caledonia">
                              New Caledonia
                            </option>
                            <option value="New Zealand">New Zealand</option>
                            <option value="Nicaragua">Nicaragua</option>
                            <option value="Niger">Niger</option>
                            <option value="Nigeria">Nigeria</option>
                            <option value="Niue">Niue</option>
                            <option value="Norfolk Island">
                              Norfolk Island
                            </option>
                            <option value="Northern Mariana Islands">
                              Northern Mariana Islands
                            </option>
                            <option value="Norway">Norway</option>
                            <option value="Pakistan">Pakistan</option>
                            <option value="Palau">Palau</option>
                            <option value="Panama">Panama</option>
                            <option value="Papua New Guinea">
                              Papua New Guinea
                            </option>
                            <option value="Paraguay">Paraguay</option>
                            <option value="Peru">Peru</option>
                            <option value="Philippines">Philippines</option>
                            <option value="Pitcairn">Pitcairn</option>
                            <option value="Poland">Poland</option>
                            <option value="Portugal">Portugal</option>
                            <option value="Puerto Rico">Puerto Rico</option>
                            <option value="Reunion">Reunion</option>
                            <option value="Romania">Romania</option>
                            <option value="Russia">Russian Federation</option>
                            <option value="Rwanda">Rwanda</option>
                            <option value="Saint Kitts and Nevis">
                              Saint Kitts and Nevis
                            </option>
                            <option value="Saint LUCIA">Saint LUCIA</option>
                            <option value="Saint Vincent">
                              Saint Vincent and the Grenadines
                            </option>
                            <option value="Samoa">Samoa</option>
                            <option value="San Marino">San Marino</option>
                            <option value="Sao Tome and Principe">
                              Sao Tome and Principe
                            </option>
                            <option value="Senegal">Senegal</option>
                            <option value="Seychelles">Seychelles</option>
                            <option value="Sierra">Sierra Leone</option>
                            <option value="Singapore">Singapore</option>
                            <option value="Slovakia">Slovakia</option>
                            <option value="Slovenia">Slovenia</option>
                            <option value="Solomon Islands">
                              Solomon Islands
                            </option>
                            <option value="South Africa">South Africa</option>
                            <option value="South Georgia">
                              South Georgia
                            </option>
                            <option value="Span">Spain</option>
                            <option value="SriLanka">Sri Lanka</option>
                            <option value="St. Helena">St. Helena</option>
                            <option value="St. Pierre and Miguelon">
                              St. Pierre and Miquelon
                            </option>
                            <option value="Suriname">Suriname</option>
                            <option value="Svalbard">Svalbard</option>
                            <option value="Swaziland">Swaziland</option>
                            <option value="Sweden">Sweden</option>
                            <option value="Switzerland">Switzerland</option>
                            <option value="Taiwan">Taiwan</option>
                            <option value="Tajikistan">Tajikistan</option>
                            <option value="Tanzania">Tanzania</option>
                            <option value="Thailand">Thailand</option>
                            <option value="Togo">Togo</option>
                            <option value="Tokelau">Tokelau</option>
                            <option value="Tonga">Tonga</option>
                            <option value="Trinidad and Tobago">
                              Trinidad and Tobago
                            </option>
                            <option value="Turkey">Turkey</option>
                            <option value="Turkmenistan">Turkmenistan</option>
                            <option value="Turks and Caicos">
                              Turks and Caicos Islands
                            </option>
                            <option value="Tuvalu">Tuvalu</option>
                            <option value="Uganda">Uganda</option>
                            <option value="Ukraine">Ukraine</option>

                            <option value="United Kingdom">
                              United Kingdom
                            </option>
                            <option value="United States">
                              United States
                            </option>
                            <option value="United States Minor Outlying Islands">
                              United States Minor Outlying Islands
                            </option>
                            <option value="Uruguay">Uruguay</option>
                            <option value="Uzbekistan">Uzbekistan</option>
                            <option value="Vanuatu">Vanuatu</option>
                            <option value="Venezuela">Venezuela</option>
                            <option value="Vietnam">Viet Nam</option>
                            <option value="Virgin Islands (British)">
                              Virgin Islands (British)
                            </option>
                            <option value="Virgin Islands (U.S)">
                              Virgin Islands (U.S.)
                            </option>
                            <option value="Wallis and Futana Islands">
                              Wallis and Futuna Islands
                            </option>
                            <option value="Western Sahara">
                              Western Sahara
                            </option>
                            <option value="Serbia">Serbia</option>
                            <option value="Zambia">Zambia</option>
                            <option value="Zimbabwe">Zimbabwe</option>
                          </select>
                          <!-- <label for="inputSelect" class="nameCountry">الدولة</label> -->
                          <span id="NationalityError" class="error"> </span>

                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                          <input class="form-control" name="Password" id="inputPassword" type="password" placeholder="إنشاء كلمة مرور" required />
                          <label for="inputPassword">Password</label>
                          <span id="PasswordError" class="error">  </span>
                        </div>
                      </div>
                      
                      <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                          <input class="form-control" name="PasswordConfirm" id="inputPasswordConfirm" type="password" placeholder="تأكيد كلمة المرور" required />
                          <label for="inputPasswordConfirm">تأكيد كلمة المرور</label>
                          
                          <span id="PasswordConfirmError" class="error"></span>

                        </div>
                      </div>
                    </div>
                   
                    <div class="row mb-3">
                      
                      
                      <div class="col-md-12">
                        <div class="form-floating text-center mb-3 mb-md-0">
                         
                          
                            <span id="Connection" class="text-center error"></span>

                        </div>
                      </div>
                    </div>
                    <div class="mt-4 mb-0">
                      <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-block" onclick="handleRegistration(event)">
                          إنشاء حساب
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center py-3">
                  <div class="small">
                    <a href="login.php"> لدي حساب؟إذهب لتسجيل الدخول</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
    <div id="layoutAuthentication_footer">
      <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
          <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Your Website 2023</div>
            <div>
              <a href="#">Privacy Policy</a>
              &middot;
              <a href="#">Terms &amp; Conditions</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>
  <script src="js/filejs.js"></script>
</body>

</html>