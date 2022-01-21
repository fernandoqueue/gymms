<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.js"></script>
    <style>
        body {
            font-family: 'Nunito';
            background: #f7fafc;
        }
        #calendar-container{
        width: 100%;
    }
    #calendar{
        padding: 10px;
        width: 100%;
        height: 550px;
        border:2px solid black;
    }
    </style>
    
</head>
<body>
    <div class="my-5 pt-5">
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-column">
                    <div>
                        <u>Time Block :</u>
                    </div>

                    <div>
                        1) 9:00 AM- 5:00 PM
                    </div>

                    <div>
                        2) 7:00 PM - 11:00PM
                    </div>
                </div>
                <div>
                    Service Time: 30Minutes
                </div>
            </div>
            <div class="col-12 pt-2 mx-2">
                <div id="calendar"></div>    
            </div>            
            <div class="col-12">
                <div class="d-flex justify-content-center flex-column align-items-center">
                    @foreach($availableSlots as $availableSlot)
                    <div style="margin-top:1.5rem">
                        <span style="background-color:green;padding:10px;border-radius:30px">
                            {{ $availableSlot->format('g:i A') }}
                        </span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'listWeek',
          events: @json($events)
        });
        calendar.render();
      });
    </script>
</body>
</html>
