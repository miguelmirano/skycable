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
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
        <link rel="stylesheet" type="text/css" href="{{ asset('js1/jquery-timepicker/jquery.timepicker.css')}}">
        <script type="text/javascript" src="{{ asset('js1/jquery-timepicker/jquery.timepicker.min.js')}}"></script>
        <link rel='stylesheet' href="{{ asset('js1/fullcalendar-3.4.0/fullcalendar.css')}}" />
        <script src="{{ asset('js1/fullcalendar-3.4.0/lib/jquery.min.js')}}"></script>
        <script src="{{ asset('js1/fullcalendar-3.4.0/lib/moment.min.js')}}"></script>
        <script src="{{ asset('js1/fullcalendar-3.4.0/fullcalendar.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="{{ asset('js/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
        <link rel="stylesheet" href="css/navigation.css">

        <style type="text/css">
            input {
                text-align: center;
            }
            .unread {
                background-color: #e5e5e5;
            }
        </style>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.time').timepicker();
            });
        </script>
    </head>

    <body>

        <nav class="navbar navbar-toggleable-sm fixed-top">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="material-icons">menu</i>
            </button>
            <a class="navbar-brand" href="{{ url('/home') }}">Sky Cable
                <img src="/assets/brand/bootstrap-solid.svg" width="30" height="30" alt="">
            </a>

            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}" style="color:white;">Login</a></li>
                    <li><a href="{{ url('/register') }}" style="color:white;">Register</a></li>
                @else
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell"></i>
                            @if (count(auth()->user()->unreadNotifications) == 0 )
                            </a>
                            @else
                            <span class="badge badge-danger">{{ count(auth()->user()->unreadNotifications) }}</span></a>
                            @endif
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @foreach(auth()->user()->unreadNotifications as $note)
                            <a class="dropdown-item {{ $note->read_at == null ? 'unread' : '' }}">
                                <small>{!! $note->data['data'] !!}</small>
                                <?php $note->markAsRead() ?>
                            </a>
                            @endforeach
                        </div>
                    </li> 
                    <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-calendar-check-o"></i>    My Attendance</a></li>    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-file"></i>  Apply</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" data-toggle="modal" data-target="#leave">Leave</a>
                            <a class="dropdown-item" data-toggle="modal" data-target="#overtime">Overtime</a>
                            <a class="dropdown-item" data-toggle="modal" data-target="#officialbusiness">Official Business</a>
                            <a class="dropdown-item" data-toggle="modal" data-target="#scheduleadjustment"">Schedule Adjustment</a>
                        </div>
                    </li> 
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-calendar"></i>  Calendar</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ url('my_calendar') }}"><i class="fa fa-user"></i>            My Calendar</a>
                            <a class="dropdown-item" href="{{ url('team_calendar') }}"><i class="fa fa-users"></i>           Team Calendar</a>
                            <a class="dropdown-item" href="{{ url('company_calendar') }}"><i class="fa fa-building"></i>        Company Calendar</a>
                        </div>
                    </li>                
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if (Auth::user()->image == NULL) 
                            <img src="{{ asset('qmark.png')}}" class="img-fluid rounded" style="width: 29px; height: 29px; color: white !important;">  {{ Auth::user()->firstname }}</a>
                            @else 
                            <img src="{{ Auth::user()->image }}" class="img-fluid rounded" style="width: 29px; height: 29px; color: white !important;">  {{ Auth::user()->firstname }}</a> 
                            @endif
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ url('/user_profile') }}"><i class="fa fa-user"></i>            My Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i>           Log Out</a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                                </form>
                            </li>
                        </div>
                    </li>
                    <form class="form-inline">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm" placeholder="Search for.." aria-describedby="basic-addon1">
                            <span class="input-group-addon input-sm" id="basic-addon1"><i class="fa fa-search"></i></span>
                        </div>
                    </form>
                @endif
                </ul>
            </div>
        </nav>
         @yield('content')

        <div class="modal fade" id="leave" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #000066; color: white">
                        <h5 class="modal-title">Leave Form</h5>
                    </div>
                    <form>
                        <div class="modal-body">
                            <center><img src="skycraper.png" style="width: 130px; padding-top: 30px"></center>
                            <div class="row" style="padding-top: 40px">
                                <input class="form-control" value="Leave" type="text" readonly hidden name="type">
                                <div class="col-lg-6">
                                    <div class="input-group date" data-provide="datepicker">
                                        <input type="text" id="datepicker" class="form-control" name="date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                    </div>
                                <center><small><label><b>Date Filed</b></label></small></center>
                                </div>
                                <div class="col-lg-6">
                                    <input class="form-control" value="{{Auth::user()->firstname}} {{Auth::user()->middlename}} {{Auth::user()->lastname}}" type="text" readonly>
                                    <center><small><label><b>Employee Name</b></label></small></center>
                                </div>
                            </div>
                            <div class="row" style="padding-top: 10px">
                                <div class="col-lg-4">
                                    <input class="form-control" type="text">
                                    <center><small><label><b>Division</b></label></small></center>
                                </div>
                                <div class="col-lg-4">
                                    <input class="form-control" type="text">
                                    <center><small><label><b>Department</b></label></small></center>
                                </div>
                                <div class="col-lg-4">
                                    <input class="form-control" type="text">
                                    <center><small><label><b>Section</b></label></small></center>
                                </div>
                            </div>
                            <div class="row" style="padding-top: 10px">
                                <div class="col-lg-6">
                                    <input class="form-control" type="text">
                                    <center><small><label><b>Cost Center</b></label></small></center>
                                </div>
                                <div class="col-lg-6">
                                    <select class="form-control" class="form-control" required="true" name="nof">
                                        <option selected></option>
                                        <option value="Vacation Leave">Vacation Leave</option>
                                        <option value="Sick Leave">Sick Leave</option>
                                        <option value="Maternity/Paternity">Maternity/Paternity</option>
                                        <option value="SSS/EC Leave">SSS/EC Leave</option>
                                        <option value="Union Leave">Union Leave</option>
                                        <option value="Bereavement Leave">Bereavement Leave</option>
                                        <option value="Others">Others</option>
                                    </select>
                                    <center><small><label><b>Nature of Leave</b></label></small></center>
                                </div>
                            </div>
                            <div class="row" style="padding-top: 10px">
                                <div class="col-lg-4">
                                    <div class="input-group date" data-provide="datepicker">
                                        <input type="text" id="datepicker" class="form-control" name="date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                    </div>
                                <center><small><label><b>From</b></label></small></center>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-group date" data-provide="datepicker">
                                        <input type="text" id="datepicker" class="form-control" name="date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                    </div>
                                <center><small><label><b>To</b></label></small></center>
                                </div>
                                <div class="col-lg-4">
                                    <input class="form-control" type="text">
                                    <center><small><label><b>No. of Days</b></label></small></center>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Save changes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="overtime" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #000066; color: white">
                        <h5 class="modal-title">Overtime Form</h5>
                    </div>
                    <form>
                        <div class="modal-body">
                            <center><img src="skycraper.png" style="width: 130px; padding-top: 30px"></center>
                            <input class="form-control" type="text" readonly value="Overtime" hidden>
                            <div class="row" style="padding-top: 40px">
                                <div class="col-lg-4">
                                    <input class="form-control" type="text" value="{{Auth::user()->firstname}} {{Auth::user()->middlename}} {{Auth::user()->lastname}}" readonly>
                                    <center><small><label><b>Employee Name</b></label></small></center>
                                </div>
                                <div class="col-lg-4">
                                    <input class="form-control" type="text" value="{{Auth::user()->idnumber}}" readonly>
                                    <center><small><label><b>Employee Number</b></label></small></center>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-group date" data-provide="datepicker">
                                        <input type="text" id="datepicker" class="form-control" name="date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                    </div>
                                <center><small><label><b>Date Filed</b></label></small></center>
                                </div>
                            </div>
                            <div class="row" style="padding-top: 10px">
                                <div class="col-lg-4">
                                    <input class="form-control" type="text">
                                    <center><small><label><b>Section</b></label></small></center>
                                </div>
                                <div class="col-lg-4">
                                    <input class="form-control" type="text">
                                    <center><small><label><b>Position</b></label></small></center>
                                </div>
                                <div class="col-lg-4">
                                    <input class="form-control" type="text">
                                    <center><small><label><b>Department</b></label></small></center>
                                </div>
                            </div>
                            <div class="row" style="padding-top: 10px">
                                <div class="col-lg-4">
                                    <div class="input-group date" data-provide="datepicker">
                                        <input type="text" id="datepicker" class="form-control" name="date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                    </div>
                                <center><small><label><b>Date (Regular Time)</b></label></small></center>
                                </div>
                                <div class="col-lg-4">
                                    <input class="form-control time" type="text">
                                    <center><small><label><b>Time In (Regular Time)</b></label></small></center>
                                </div>
                                <div class="col-lg-4">
                                    <input class="form-control time" type="text">
                                    <center><small><label><b>Time Out (Regular Time)</b></label></small></center>
                                </div>
                            </div>
                            <div class="row" style="padding-top: 10px">
                                <div class="col-lg-4">
                                    <div class="input-group date" data-provide="datepicker">
                                        <input type="text" id="datepicker" class="form-control" name="date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                    </div>
                                <center><small><label><b>Date (Overtime)</b></label></small></center>
                                </div>
                                <div class="col-lg-4">
                                    <input class="form-control time" type="text">
                                    <center><small><label><b>Time In (Overtime)</b></label></small></center>
                                </div>
                                <div class="col-lg-4">
                                    <input class="form-control time" type="text">
                                    <center><small><label><b>Time Out (Overtime)</b></label></small></center>
                                </div>
                            </div>
                            <div style="padding-top: 10px">
                                <textarea class="form-control" type="text"></textarea>
                                <center><small><label><b>Reason</b></label></small></center>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Apply</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form></form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="officialbusiness" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #000066; color: white">
                        <p class="modal-title">Official Business Form</p>
                    </div>
                    <form>
                        <div class="modal-body">
                            <center><img src="skycraper.png" style="width: 130px; padding-top: 30px"></center>
                            <div class="row" style="padding-top: 40px">
                                <div class="col-lg-6">
                                    <input class="form-control" type="text" value="{{Auth::user()->firstname}} {{Auth::user()->middlename}} {{Auth::user()->lastname}}" readonly>
                                    <center><small><label><b>Employee Name</b></label></small></center>
                                </div>
                                <div class="col-lg-6">
                                    <input class="form-control" type="text" value="{{Auth::user()->idnumber}}" readonly>
                                    <center><small><label><b>Employee Number</b></label></small></center>
                                </div>
                            </div>
                            <div class="row" style="padding-top: 10px">
                                <input type="text" class="form-control" value="Official Business" name="type" hidden>
                                <div class="col-lg-6">
                                    <div class="input-group date" data-provide="datepicker">
                                        <input type="text" id="datepicker" class="form-control" name="date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                    </div>
                                <center><small><label><b>Date of OB</b></label></small></center>
                                </div>
                                <div class="col-lg-6">
                                    <input class="form-control time" type="text">
                                    <center><small><label><b>Time</b></label></small></center>
                                </div>
                            </div>
                            <div style="padding-top: 10px">
                                <textarea class="form-control" type="text"></textarea>
                                <center><small><label><b>Reason</b></label></small></center>
                            </div>
                            <div style="padding-top: 10px">
                                <select class="form-control" class="form-control" aria-describedby="basic-addon1" required="true" name="nature_of_leave">
                                    <option selected></option>
                                    <option value="Will go directly to assigned place and will time in/out upon return">Will go directly to assigned place and will time in/out upon return</option>
                                    <option value="Will not return to workplace">Will not return to workplace</option>
                                    <option value="Others">Others</option>
                                </select>
                                <center><small><label><b>Nature of Leave</b></label></small></center>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Apply</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="scheduleadjustment" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #000066; color: white">
                        <p class="modal-title">Schedule Adjustment Form</p>
                    </div>
                    <form>
                        <div class="modal-body">  
                            <center><img src="skycraper.png" style="width: 130px; padding-top: 30px"></center>
                                <input class="form-control" type="text" value="Schedule Adjustment" name="type" readonly hidden>
                            <div style="padding-top: 40px">
                                <input class="form-control" type="text" value="{{Auth::user()->firstname}} {{Auth::user()->middlename}} {{Auth::user()->lastname}}" readonly>
                                <center><small><label><b>Employee Name</b></label></small></center>
                            </div>
                            <div class="row" style="padding-top: 10px">
                                <div class="col-lg-6">
                                    <input class="form-control time" type="text">
                                    <center><small><label><b>Original In</b></label></small></center>
                                </div>
                                <div class="col-lg-6">
                                    <input class="form-control time" type="text">
                                    <center><small><label><b>Original Out</b></label></small></center>
                                </div>
                            </div>
                            <div class="row" style="padding-top: 10px">
                                <div class="col-lg-6">
                                    <input class="form-control time" type="text">
                                    <center><small><label><b>Adjusted In</b></label></small></center>
                                </div>
                                <div class="col-lg-6">
                                    <input class="form-control time" type="text">
                                    <center><small><label><b>Adjusted Out</b></label></small></center>
                                </div>
                            </div>
                            <div style="padding-top: 10px">
                                <textarea class="form-control" type="text"></textarea>
                                <center><small><label><b>Reason</b></label></small></center>
                            </div>  
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Apply</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>