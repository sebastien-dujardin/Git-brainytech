<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Calendrier</title>
        {!! Html::style('css/app.css') !!}
        {!! Html::style('vendor/seguce92/fullcalendar/fullcalendar.min.css') !!}
    </head>
    <body>
        <div class="container">
            <div id="calendar"></div>
        </div>
    </body>
    {!! Html::script('js/app.js') !!}
    {!! Html::script('vendor/seguce92/fullcalendar/lib/jquery.min.js') !!}
    {!! Html::script('vendor/seguce92/fullcalendar/lib/moment.min.js') !!}
    {!! Html::script('vendor/seguce92/fullcalendar/fullcalendar.min.js') !!}
    <script>
    var BASEURL = "{{url('/')}}";
    $(document).ready(function() {

    $('#calendar').fullCalendar({
    header: {
    left: 'prev,next today',
    center: 'title',
    right: 'month,basicWeek,basicDay'
    },
    navLinks: true, // can click day/week names to navigate views
    editable: true,
    eventLimit: true, // allow "more" link when too many events
    events: BASEURL + '/events'
    });

    });

    </script>
</html>
