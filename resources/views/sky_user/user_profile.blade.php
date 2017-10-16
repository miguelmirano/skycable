@extends('layouts.user')


@section('content')
    <head>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css')}}">
    </head>

    <style>
        input {
            text-align: center;
        }
        td {
            text-align: center;
        }
    </style>
    <body style="padding-top: 90px">
        <div class="container" style="width: 100%">
            <div id="accordion" role="tablist" aria-multiselectable="true">
                <div class="card">
                    <div class="card-header collapsed" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="background-color: #000066; color: white">
                        <i class="fa fa-user"></i>  Profile Information
                    </div>
                    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                        <div class="card-block">
                            <div><button class="btn" data-toggle="modal" data-target="#edit_profile"><i class="fa fa-edit"></i></button></div>
                            <div class="row">   
                                <div class="col-lg-3" style="padding-top: 30px; max-width: 100%, height: auto">
                                    @if (Auth::user()->image == NULL) 
                                    <center><img src="{{ asset('qmark.png')}}" class="img-fluid" style="width: 230px; height: 230px; color: white !important; border: solid gray 1px"></a></center>
                                    @else 
                                    <center><img src="{{ Auth::user()->image }}" class="img-fluid" style="width: 230px; height: 230px; color: white !important; border: solid gray 1px"></a></center>
                                    @endif
                                </div>
                                <div class="col-lg-3">
                                    <div style="padding-top: 10px">
                                        <input class="form-control" type="text" value="{{ Auth::user()->firstname }}" id="example-text-input" disabled>
                                        <center><label><small><b>Firstname</b></small></label></center>
                                    </div>
                                    <div style="padding-top: 10px">
                                        <input class="form-control" type="text" value="{{ Auth::user()->sex }}" id="example-text-input" disabled>
                                        <center><label><small><b>Sex</b></small></label></center>
                                    </div>
                                    <div style="padding-top: 10px">
                                        <input class="form-control" type="text" value="{{ Auth::user()->mobilenumber }}" id="example-text-input" disabled>
                                        <center><label><small><b>Mobile Number</b></small></label></center>
                                    </div>
                                    <div style="padding-top: 10px">
                                        <input class="form-control" type="text" value="{{ Auth::user()->idnumber }}" id="example-text-input" disabled>
                                        <center><label><small><b>ID Number</b></small></label></center>
                                    </div>
                                </div>

                                <!-- Add the extra clearfix for only the required viewport -->
                                <div class="clearfix hidden-sm-up"></div>

                                <div class="col-lg-3">
                                    <div style="padding-top: 10px">                     
                                        <input class="form-control" type="text" value="{{ Auth::user()->middlename }}" id="example-text-input" disabled>
                                        <center><label><small><b>Middlename</b></small></label></center>   
                                    </div>
                                    <div style="padding-top: 10px">                            
                                        <input class="form-control" type="text" value="{{ Auth::user()->birthday }}" id="example-text-input" disabled>
                                        <center><label><small><b>Birthday</b></small></label></center>
                                    </div>
                                    <div style="padding-top: 10px">                               
                                        <input class="form-control" type="text" value="{{ Auth::user()->username }}" id="example-text-input" disabled>
                                        <center><label><small><b>Username</b></small></label></center>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div style="padding-top: 10px">
                                        <input class="form-control" type="text" value="{{ Auth::user()->lastname }}" id="example-text-input" disabled>
                                        <center><label><small><b>Lastname</b></small></label></center>
                                    </div>
                                    <div style="padding-top: 10px">
                                        <input class="form-control" type="text" value="{{ Auth::user()->emailaddress }}" id="example-text-input" disabled>
                                        <center><label><small><b>Email Address</b></small></label></center>
                                    </div>
                                    <div style="padding-top: 10px">
                                        <input class="form-control" type="text" value="{{ Auth::user()->position }}" id="example-text-input" disabled>
                                        <center><label><small><b>Position</b></small></label></center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="background-color: #000066; color: white">
                        <i class="fa fa-clock-o"></i>  Schedule Information
                    </div>
                    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="card-block">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td colspan="4"><p style="float: left"><b>Schedule Type:</b>    {{ Auth::user()->schedule_type }}</p></td>
                                        </tr>
                                    </thead>
                                    <thead>
                                        <tr>
                                            <th style="width: 15%; text-align: center">Day</th>
                                            <th style="width: 35%; text-align: center">Shift From</th>
                                            <th style="width: 35%; text-align: center">Shift To</th>
                                            <th style="width: 15%; text-align: center">is Restday</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr style="text-align: center">
                                            <th scope="row" style="text-align: center">Sunday</th>
                                            <td><input class="form-control" type="time" value="13:45:00" id="example-time-input" disabled>
                                            </td>
                                            <td><input class="form-control" type="time" value="13:45:00" id="example-time-input" disabled></td>
                                            <td><div class="form-check disabled">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="" disabled>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr style="text-align: center">
                                            <th scope="row" style="text-align: center">Monday</th>
                                            <td><input class="form-control" type="time" value="13:45:00" id="example-time-input" disabled>
                                            </td>
                                            <td><input class="form-control" type="time" value="13:45:00" id="example-time-input" disabled></td>
                                            <td><div class="form-check disabled">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="" disabled>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr style="text-align: center">
                                            <th scope="row" style="text-align: center">Tuesday</th>
                                            <td><input class="form-control" type="time" value="13:45:00" id="example-time-input" disabled>
                                            </td>
                                            <td><input class="form-control" type="time" value="13:45:00" id="example-time-input" disabled></td>
                                            <td><div class="form-check disabled">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="" disabled>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr style="text-align: center">
                                            <th scope="row" style="text-align: center">Wednesday</th>
                                            <td><input class="form-control" type="time" value="13:45:00" id="example-time-input" disabled>
                                            </td>
                                            <td><input class="form-control" type="time" value="13:45:00" id="example-time-input" disabled></td>
                                            <td><div class="form-check disabled">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="" disabled>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr style="text-align: center">
                                            <th scope="row" style="text-align: center">Thursday</th>
                                            <td><input class="form-control" type="time" value="13:45:00" id="example-time-input" disabled>
                                            </td>
                                            <td><input class="form-control" type="time" value="13:45:00" id="example-time-input" disabled></td>
                                            <td><div class="form-check disabled">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="" disabled>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr style="text-align: center">
                                            <th scope="row" style="text-align: center">Friday</th>
                                            <td><input class="form-control" type="time" value="13:45:00" id="example-time-input" disabled>
                                            </td>
                                            <td><input class="form-control" type="time" value="13:45:00" id="example-time-input" disabled></td>
                                            <td><div class="form-check disabled">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="" disabled>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr style="text-align: center">
                                            <th scope="row" style="text-align: center">Saturday</th>
                                            <td><input class="form-control" type="time" value="13:45:00" id="example-time-input" disabled>
                                            </td>
                                            <td><input class="form-control" type="time" value="13:45:00" id="example-time-input" disabled></td>
                                            <td><div class="form-check disabled">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="" disabled>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header collapsed" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="background-color: #000066; color: white">
                        <i class="fa fa-group"></i>     Team Information
                    </div>
                    <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="card-block">
                            <div class="table-responsive">
                        <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td colspan="4"><p style="float: left"><b>Team Leader:</b>    {{ Auth::user()->team_leader }}</p></td>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr>
                                        <td style="width: 25%"><b>Name</b></td>
                                        <td style="width: 25%"><b>Position</b></td>
                                        <td style="width: 25%"><b>Contact Number</b></td>
                                        <td style="width: 25%"><b>Email Address</b></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Miguel Mirano</td>
                                        <td>Front-End/Back-End Developer</td>
                                        <td>09156582633</td>
                                        <td>miguelmirano@ymail.com</td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="edit_profile" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #000066; color: white">
                        <h5 class="modal-title">Edit Profile</h5>
                    </div>
                    <form>
                        <div class="modal-body">
                            <div style="padding-top: 5px">
                                <input class="form-control" type="text" value="{{ Auth::user()->firstname }}" id="example-text-input">
                                <center><label><small><b>Firstname</b></small></label></center>
                            </div>
                            <div style="padding-top: 5px">                     
                                <input class="form-control" type="text" value="{{ Auth::user()->middlename }}" id="example-text-input">
                                <center><label><small><b>Middlename</b></small></label></center>   
                            </div>
                            <div style="padding-top: 5px">
                                <input class="form-control" type="text" value="{{ Auth::user()->lastname }}" id="example-text-input">
                                <center><label><small><b>Lastname</b></small></label></center>
                            </div>
                            <div style="padding-top: 5px">
                                <select id="sex" type="text" class="form-control" name="sex" required>
                                    <option>{{ Auth::user()->sex }}</option>
                                    @if (Auth::user()->sex == 'Male')
                                    <option value="Female">Female</option>
                                    @else
                                    <option value="Male">Male</option>
                                    @endif
                                </select>
                                <center><label><small><b>Sex</b></small></label></center>
                            </div>
                            <div style="padding-top: 5px">
                                <div class="input-group date" data-provide="datepicker">
                                    <input type="text" id="datepicker" value="{{ Auth::user()->birthday }}" class="form-control" name="date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                </div>
                            <center><small><label><b>Birthday</b></label></small></center>
                            </div>
                            <div style="padding-top: 5px">
                                <input class="form-control" type="text" value="{{ Auth::user()->emailaddress }}" id="example-text-input">
                                <center><label><small><b>Email Address</b></small></label></center>
                            </div>
                            <div style="padding-top: 5px">
                                <input class="form-control" type="text" value="{{ Auth::user()->mobilenumber }}" id="example-text-input">
                                <center><label><small><b>Mobile Number</b></small></label></center>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Apply</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
@endsection
