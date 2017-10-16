<!DOCTYPE html>
    <html lang="en">    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">     
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>    
        <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
    </head>
    
    <body>
        <div class="container">
            <div class="form">
                @if(Session::has('message'))
                    <div class="alert alert-success"> {{Session::get('message')}}</div>
                @endif
                <div class="thumbnail"><img src="skycraper.png" style="width: 70px; padding-top: 10px;"></div>
                @if (Route::has('login'))
                    <div style="padding-top: 70px;">
                        @if (Auth::check())
                            <a href="{{ url('/home') }}">
                                <button type="button" class="btn">Home</button>
                           </a>
                        @else
                            <button type="button" class="btn" data-toggle="modal" data-target="#login">Log-In</button>   
                            <button type="button" class="btn" data-toggle="modal" data-target="#signup">Sign-up</button>    
                        @endif
                    </div>
                 @endif
            </div>
        </div>

        <div class="modal fade" id="login">
            <div class="modal-dialog modal-sm" role="document"> 
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #000066; color: white">
                        <h5 class="modal-title">Login</h5>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                                {{ csrf_field() }}

                            <center><img src="skycraper.png" style="width: 130px; padding-top: 30px"></center>
                            <div class="{{ $errors->has('username') ? ' has-error' : '' }}">
                                <div class="input-group" style="padding-top: 70px">
                                    <span class="input-group-btn">
                                         <button class="btn btn-default" type="button"><i class="fa fa-user"></i></button>
                                    </span> 
                                    <input id="username" type="text" class="form-control" value="{{ old('username') }}" name="username" placeholder="Enter Username.." required autofocus>
                                </div>
                                <div>
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                                </div>
                            </div>
                            <div class="input-group" style="padding-top: 10px"> 
                                <span class="input-group-btn">
                                     <button class="btn btn-default" type="button"><i class="fa fa-lock"></i></button>
                                </span>                                           
                                <input id="password" type="password" class="form-control pwd" name="password" required placeholder="Enter Password..">
                                <span class="input-group-btn">
                                     <button class="btn btn-default reveal" type="button"><i class="fa fa-eye"></i></button>
                                </span>
                                <script type="text/javascript">
                                    $(".reveal").on('click',function() {
                                    var $pwd = $(".pwd");
                                    if ($pwd.attr('type') === 'password') {
                                        $pwd.attr('type', 'text');
                                    } else {
                                        $pwd.attr('type', 'password');
                                    }
                                    });     
                                </script>
                            </div>
                            <div class="checkbox" style="padding-top: 10px">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}>   <small>Remember Me</small>
                                </label>
                            </div>
                            <div style="padding-top: 30px">
                                <center>
                                    <div>
                                        <button type="submit" class="btn btn-primary">Login</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                    <a class="btn btn-link" href="{{ url('/password/reset') }}"><p><small>Forgot Your Password?</small></p></a>
                                </center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="signup">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #000066; color: white">Sign Up
                    </div>
                    <div class="modal-body">
                        <center><img src="skycraper.png" style="width: 130px; padding-top: 30px"></center>
                        <form id="regForm" method="POST" action="{{ url('/register') }}" name="form">
                            <div class="tab">
                                <div style="padding-top: 40px;"><center><small><p><b>Personal Information</b></p></small></center></div>
                                <div class="{{ $errors->has('firstname') ? ' has-error' : '' }}">
                                    <div class="input-group">
                                        <span class="input-group-addon"><small>First Name</small></span>
                                        <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" required autofocus>
                                    </div>
                                    <div>
                                    @if ($errors->has('firstname'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('firstname') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                </div>
                                <div class="{{ $errors->has('middlename') ? ' has-error' : '' }}" style="padding-top: 10px;">
                                    <div class="input-group">
                                        <span class="input-group-addon"><small>Middle Name</small></span>
                                        <input id="middlename" type="text" class="form-control" name="middlename" value="{{ old('middlename') }}" required autofocus>
                                    </div>
                                    <div>
                                    @if ($errors->has('middlename'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('middlename') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                </div>
                                <div class="{{ $errors->has('lastname') ? ' has-error' : '' }}" style="padding-top: 10px;">
                                    <div class="input-group">
                                        <span class="input-group-addon"><small>Last Name</small></span>
                                        <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required  onblur="
                                    if(document.form.username.value=='' && document.form.firstname.value!='' && document.form.middlename.value!='' && document.form.lastname.value!='')
                                {
                                    var username = document.form.firstname.value.substr(0,1) + document.form.middlename.value.substr(0,1) + document.form.lastname.value.substr(0,49);
                                        username = username.replace(/\s+/g, '');
                                        username = username.replace(/\'+/g, '');
                                        username = username.replace(/-+/g, '');
                                        username = username.toLowerCase();
                                        document.form.username.value = username; 
                                }" >
                                    </div>
                                    <div>
                                        @if ($errors->has('lastname'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('lastname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="{{ $errors->has('sex') ? ' has-error' : '' }}" style="padding-top: 10px;">
                                    <div class="input-group">
                                        <span class="input-group-addon"><small>Sex</small></span>
                                            <select id="sex" type="text" class="form-control" name="sex" value="{{ old('sex') }}" required>
                                                <option selected></option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                    </div>
                                    <div>
                                    @if ($errors->has('sex'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('sex') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                </div>
                                <div class="{{ $errors->has('birthday') ? ' has-error' : '' }}" style="padding-top: 10px;">
                                    <div class="input-group date" data-provide="datepicker">
                                        <span class="input-group-addon"><small>Birthday</small></span>
                                        <input id="birthday" type="text" class="form-control" name="birthday" value="{{ old('birthday') }}" required>
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                    </div>
                                    <div>
                                    @if ($errors->has('birthday'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('birthday') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                </div>
                                <div class="{{ $errors->has('mobilenumber') ? ' has-error' : '' }}">
                                    <div class="input-group" style="padding-top: 10px;">
                                        <span class="input-group-addon"><small>Mobile Number</small></span>
                                        <input id="mobilenumber" type="number" class="form-control" name="mobilenumber" required autofocus>
                                    </div>
                                    <div>
                                    @if ($errors->has('mobilenumber'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('mobilenumber') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                </div>
                                <div class="{{ $errors->has('emailaddress') ? ' has-error' : '' }}">
                                    <div class="input-group" style="padding-top: 10px;">
                                        <span class="input-group-addon"><small>Email Address</small></span>
                                        <input id="emailaddress" type="text" class="form-control" name="emailaddress" required autofocus>
                                    </div>
                                    <div>
                                    @if ($errors->has('emailaddress'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('emailaddress') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                </div>
                            </div>

                            <div class="tab"> 
                                <div style="padding-top: 40px;"><center><small><p><b>Login Information</b></p></small></center></div>
                                <div class="{{ $errors->has('username') ? ' has-error' : '' }}">
                                    <div class="input-group">
                                        <span for="username" class="input-group-addon"><small>Username</small></span>
                                        <input readonly id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required>
                                    </div>
                                    <div>
                                        @if ($errors->has('username'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="{{ $errors->has('password') ? ' has-error' : '' }}">                           
                                    <div class="input-group" style="padding-top: 10px;">
                                        <span class="input-group-addon"><small>Password</small></span>
                                        <input id="password" type="password" class="form-control" name="password" required autofocus>
                                    </div>    
                                    <div>
                                        <small id="passwordHelpInline" class="text-muted">
                                            <center>Must be 8-20 characters long.</center>
                                        </small>
                                    </div>  
                                    <div>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                </div>
                                <div class="input-group" style="padding-top: 10px;">
                                    <span class="input-group-addon"><small>Confirm Password</small></span>
                                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autofocus>
                                </div>
                                <div class="{{ $errors->has('userlevel') ? ' has-error' : '' }}">
                                    <div class="input-group" style="padding-top: 10px;">
                                        <span class="input-group-addon"><small>User Level</small></span>
                                        <input id="userlevel" readonly value="User" type="text" class="form-control" name="userlevel" required autofocus>
                                    </div>
                                    <div>
                                    @if ($errors->has('userlevel'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('userlevel') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                </div>
                                <div class="{{ $errors->has('idnumber') ? ' has-error' : '' }}">
                                    <div class="input-group" style="padding-top: 10px;">
                                        <span class="input-group-addon"><small>ID Number</small></span>
                                        <input id="idnumber" type="text" class="form-control" name="idnumber" required autofocus>
                                    </div>
                                    <div>
                                    @if ($errors->has('idnumber'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('idnumber') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                </div>
                            </div>

                            <div style="overflow:auto;"></div>
                            <div style="float:right;"></div>
                            {{ csrf_field() }}
                        </form>
                    </div>
                    <div class="modal-footer">
                        <div style="float:right;">
                            <button type="button" id="prevBtn" class="btn btn-default" onclick="nextPrev(-1)">Previous</button>
                            <button type="button" id="nextBtn" class="btn btn-default" onclick="nextPrev(1)">Next</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            var currentTab = 0;
            showTab(currentTab);

            function showTab(n) {
              var x = document.getElementsByClassName("tab");
              x[n].style.display = "block";
              if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
              } else {
                document.getElementById("prevBtn").style.display = "inline";
              }
              if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
              } else {
                document.getElementById("nextBtn").innerHTML = "Next";
              }
            }

            function nextPrev(n) {
              var x = document.getElementsByClassName("tab");
              if (n == 1 && !validateForm()) return false;
              x[currentTab].style.display = "none";
              currentTab = currentTab + n;
              if (currentTab >= x.length) {
                document.getElementById("regForm").submit();
              }
              showTab(currentTab);
            }

            function validateForm() {
              var x, y, i, valid = true;
              x = document.getElementsByClassName("tab");
              y = x[currentTab].getElementsByTagName("input");
              for (i = 0; i < y.length; i++) {
                if (y[i].value == "") {
                  y[i].className += " invalid";
                  valid = false;
                }
              }
              return valid;
            }
        </script>
    </body>
</html>
