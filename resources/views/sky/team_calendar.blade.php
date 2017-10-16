@extends('layouts.admin')

@section('content')
	<head>
		<script type="text/javascript">

        $(document).ready(function() {

            $('#calendar').fullCalendar({
                displayEventTime: true,
                editable: true,
                droppable: true,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay,listWeek'
                },
                views: {
                    listWeek: { buttonText: 'list week' }
                },
                nowIndicator: true,
                dayClick: function(date, jsEvent, view) {
                    create_event(date);
                }

            });

            function create_event(date) {
                $('#modal').modal('toggle');
                $('#date').text(moment(date).format('dddd | MMMM D, YYYY'));
                $('#start_time, #end_time').timepicker();

                $('#save').unbind('click');
                
                $('#save').click(function() {

                    var form = document.getElementById("needs-validation");
                    if (form.checkValidity() == false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add("was-validated");

                    var event_name = $('#event_name').val();
                    var start_time = $('#start_time').val();
                    var end_time = $('#end_time').val();

                    var this_date = moment(date);

                    var start_moment = moment(start_time, "h:mma");
                    var start_parsed = moment().set({
                        'year': this_date.year(),
                        'month': this_date.month(),
                        'date': this_date.date(),
                        'hour': start_moment.hours(),
                        'minute': start_moment.minutes()
                    });

                    var end_moment = moment(end_time, "h:mma");
                    var end_parsed = moment().set({
                        'year': this_date.year(),
                        'month': this_date.month(),
                        'date': this_date.date(),
                        'hour': end_moment.hours(),
                        'minute': end_moment.minutes()
                    });
                        $.ajax({
                            method: 'POST',
                            processData: false,
                            contentType: false,
                            headers:{'X-CSRF-Token': $('input[name="_token"]').val()},
                            data: new FormData($("#needs-validation")[0]),
                            success: function(data){
                              console.log(data);
                              location.reload();
                            },
                        });        
                	});
            	}
        	});

    	</script>
	</head>

	<body style="padding-top: 90px">
		<div class="container" style="width: 100%">
			<div class="row">
			    <div class="col-lg-4">
		            <div class="card" style="height: 480px;">
		                <div class="card-header text-center" style="background-color: #000066; color: white"><i class="fa fa-sticky-note-o"></i>       List of Events</div>
		                <div class="card-block" style="overflow: auto">
		                    <blockquote class="card-blockquote"><i class="fa fa-trash pull-right"></i>
		                        <small>
		                            <b>Miguel Mirano</b>     10/14/2017
		                        <br><b>Subject:</b> Notice!
		                        <br><b>Description:</b> Puyat ng puyat!
		                        </small>
		                    </blockquote>
		                    <div class="dropdown-divider"></div>
		                    <blockquote class="card-blockquote"><i class="fa fa-trash pull-right"></i>
		                        <small>
		                            <b>Miguel Mirano</b>     10/14/2017
		                        <br><b>Subject:</b> Notice!
		                        <br><b>Description:</b> Puyat ng puyat!
		                        </small>
		                    </blockquote>
		                    <div class="dropdown-divider"></div>
		                    <blockquote class="card-blockquote"><i class="fa fa-trash pull-right"></i>
		                        <small>
		                            <b>Miguel Mirano</b>     10/14/2017
		                        <br><b>Subject:</b> Notice!
		                        <br><b>Description:</b> Puyat ng puyat!
		                        </small>
		                    </blockquote>
		                    <div class="dropdown-divider"></div>
		                    <blockquote class="card-blockquote"><i class="fa fa-trash pull-right"></i>
		                        <small>
		                            <b>Miguel Mirano</b>     10/14/2017
		                        <br><b>Subject:</b> Notice!
		                        <br><b>Description:</b> Puyat ng puyat!
		                        </small>
		                    </blockquote>
		                    <div class="dropdown-divider"></div>
		                </div>
		                <div class="card-footer">
		                    <center><small><b><i class="fa fa-info-circle"></i>   User Level:</b>    Administrator</small></center>
		                </div>
		            </div>
		        </div>
				<div class="col-lg-8" id="calendar" style="width: 700px; margin: auto;""></div>
			</div>
		</div>
	</body>
@endsection