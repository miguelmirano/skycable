@extends('layouts.admin')


@section('content')
    <head>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css')}}">
    </head>

    <body style="padding-top: 90px">
        <div class="card-deck">
            <div class="col-lg-4">
                <div class="card" style="height: 520px;">
                    <div class="card-header" style="background-color: #000066; color: white"><i class="fa fa-bell-o"></i>       Noticeboard<i class="fa fa-building-o"  data-toggle="modal" data-target="#company_notice" style="float: right; padding-top: 4px"></i><i class="fa fa-users"  data-toggle="modal" data-target="#team_notice" style="float: right;  padding-right: 10px; padding-top: 4px"></i></div>
                    <div class="card-block" style="overflow: auto; height: 250px">
                        @if (count($notices) === 0)
                            <small><p class="text-center">No Notice for Company!</p></small>
                            <div class="dropdown-divider"></div>
                        @else
                        <small><b><p class="text-center">For Company</p></b></small>
                        <div class="dropdown-divider"></div>
                        @foreach($notices as $notice)
                        <blockquote class="card-blockquote"><i class="fa fa-trash pull-right"></i>
                            <small>
                                <b>{{$notice['team_leader']}}</b>     {{$notice['created_at']}}
                            <br><b>Subject:</b> {{$notice['subject']}}
                            <br><b>Description:</b> {{$notice['description']}}
                            </small>
                        </blockquote>
                        <div class="dropdown-divider"></div>    
                        @endforeach
                        @endif
                    </div>
                        <div class="card-block" style="overflow: auto; height: 250px">
                        @if (count($post) === 0)
                            <small><p class="text-center">No Notice for Team!</p></small>
                            <div class="dropdown-divider"></div>
                        @else
                        <small><b><p class="text-center">For Team</p></b></small>
                        <div class="dropdown-divider"></div>
                        @foreach($post as $posts)
                        <blockquote class="card-blockquote" style="color:"><i class="fa fa-trash pull-right"></i>
                            <small>
                                <b>{{$posts['team_leader']}}</b>     {{$posts['created_at']}}
                            <br><b>Subject:</b> {{$posts['subject']}}
                            <br><b>Description:</b> {{$posts['description']}}
                            </small>
                        </blockquote>
                        <div class="dropdown-divider"></div>
                        @endforeach
                        @endif
                    </div>
                    <div class="card-footer">
                        <center><small><b><i class="fa fa-info-circle"></i>   User Level:</b>    {{ Auth::user()->userlevel }}</small></center>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card" style="height: 520px;">
                    <div class="card-header" style="background-color: #000066; color: white"><i class="fa fa-users"></i>        Team Attendance</div>
                    <div class="card-block" style="overflow: auto">
                        <blockquote class="card-blockquote">
                            <small>
                                <b>Name:</b>     Xander Ford
                            <br><b>Time In:</b> 2017-10-14 14:50:39
                            <br><b>Position:</b>        Boyfriend ni Boss J
                            </small>
                        </blockquote>
                        <div class="dropdown-divider"></div>
                    </div>
                    <div class="card-footer">
                        <center><small><b>Team Leader:</b>      {{ Auth::user()->team_leader }}</small></center>
                    </div>
                </div>
            </div>

            <div class="col-lg-4    ">
                <div class="card" style="height: 520px;">
                    <div class="card-header" style="background-color: #000066; color: white"><i class="fa fa-pencil-square-o"></i>      Requests<a class="pull-right" href="#" style="color: white; text-decoration: none !important"><i class="fa fa-user-circle-o""></i>    Validate Users</a></div>
                    <div class="card-block" style="overflow: auto">
                        @foreach($leave as $leaves)
                        <blockquote class="card-blockquote"><i class="fa fa-trash pull-right"></i><i class="fa fa-eye pull-right"></i>
                            <small><b>{{ $leaves['employee_name']}}</b> {{ $leaves['date_filed']}}     
                            <br><b>Status:</b>
                            <br><b>Apply for:</b>     {{ $leaves['type']}}
                            </small>
                        </blockquote>
                        <div class="dropdown-divider"></div>  
                        @endforeach
                    </div>
                    <div class="card-footer">
                        <small><div id="clockbox" class="text-center"></div></small>
                        <script type="text/javascript">
                            tday=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
                            tmonth=new Array("January","February","March","April","May","June","July","August","September","October","November","December");

                            function GetClock(){
                            var d=new Date();
                            var nday=d.getDay(),nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getFullYear();

                            document.getElementById('clockbox').innerHTML=""+tday[nday]+", "+tmonth[nmonth]+" "+ndate+", "+nyear+""; 
                            }

                            window.onload=function(){
                            GetClock();
                            setInterval(GetClock,1000);
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="team_notice" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #000066; color: white">
                        <p class="modal-title">for Team</p>
                    </div>
                    <form method="POST" action="{{ url('notice') }}">
                        <div class="modal-body">
                            <div style="padding-top: 5px">
                                <input class="form-control" type="text" id="author" value="{{ Auth::user()->team_leader }}" name="team_leader" readonly>
                                <center><label><small><b>Author</b></small></label></center>
                            </div>
                            <div style="padding-top: 5px">                     
                                <input class="form-control" type="text" name="subject">
                                <center><label><small><b>Subject</b></small></label></center>   
                            </div>
                            <div style="padding-top: 5px">
                                <textarea class="form-control" type="text" id="example-text-input" name="description" rows="5"></textarea>
                                <center><label><small><b>Description</b></small></label></center>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="company_notice" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #000066; color: white">
                        <p class="modal-title">for Company</p>
                    </div>
                    <form method="POST" action="{{ url('company_notice') }}">
                        <div class="modal-body">
                            <div style="padding-top: 5px">
                                <input class="form-control" type="text" id="author" value="{{ Auth::user()->team_leader }}" name="team_leader" readonly>
                                <center><label><small><b>Author</b></small></label></center>
                            </div>
                            <div style="padding-top: 5px">                     
                                <input class="form-control" type="text" name="subject">
                                <center><label><small><b>Subject</b></small></label></center>   
                            </div>
                            <div style="padding-top: 5px">
                                <textarea class="form-control" type="text" id="example-text-input" name="description" rows="5"></textarea>
                                <center><label><small><b>Description</b></small></label></center>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </body>
@endsection
