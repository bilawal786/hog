@extends('admin.layouts.app')
@section('content')
    <div class="page-wrapper" style="min-height: 385px;">
        <div class="container-fluid">
            <!-- Title -->
            <div class="row heading-bg">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h5 class="txt-dark">Schedule</h5>
                </div>
                <!-- Breadcrumb -->
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li><a href=""><span>Schedule</span></a></li>
                    </ol>
                </div>
                <!-- /Breadcrumb -->
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default card-view">

                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12" style="height: 700px">
                                        <div id='calendar'></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <footer class="footer container-fluid pl-30 pr-30">
                <div class="row">
                    <div class="col-sm-12">
                        <p>2022 &copy; HOG</p>
                    </div>
                </div>
            </footer>
            <!-- /Footer -->
        </div>
    </div>
@endsection
@push('style')
    <link href="{{asset('./css/main.min.css')}}" rel='stylesheet' />
    <style>
        #calendar-container {
            position: relative;
            height: 100%;
        }
        .fc-header-toolbar {
            /*
            the calendar will be butting up against the edges,
            but let's scoot in the header's buttons
            */
            padding-top: 1em;
            padding-left: 1em;
            padding-right: 1em;
        }
    </style>
@endpush
@push('script')
    <script src="{{asset('./js/main.min.js')}}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                expandRows: true,
                slotMinTime: '00:00',
                slotMaxTime: '24:00',
                headerToolbar: {
                    left: 'prev,next',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },
                initialView: 'timeGridDay',
                initialDate: '{{Carbon\Carbon::now()}}',
                navLinks: true, // can click day/week names to navigate views
                editable: false,
                selectable: true,
                nowIndicator: true,
                dayMaxEvents: true, // allow "more" link when too many events
                events: [
                        @foreach($today as $data)
                            {
                                title: '{{$data->driver->first_name.' '.$data->driver->last_name}}',
                                start: '{{$data->start_date->format("Y-m-d").'T'.$data->start_date->format("H:i:s")}}',
                                end: '{{$data->end_date->format("Y-m-d").'T'.$data->end_date->format("H:i:s")}}',
                            },
                        @endforeach
                ]
            });
            calendar.render();
        });
    </script>
{{--    <script src="{{ mix('js/admin/admin_drivers.js') }}" type="text/javascript"></script>--}}
@endpush
