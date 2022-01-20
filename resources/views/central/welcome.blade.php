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

    <style>
        body {
            font-family: 'Nunito';
            background: #f7fafc;
        }
    </style>
</head>
<body>
    <div class="container-fluid fixed-top p-4">
        <div class="col-12">
            <div class="d-flex justify-content-end">
                @if (Route::has('central.login'))
                    <div class="">
                        @auth('admin')
                            <a href="{{ url('/dashboard') }}" class="text-muted">Dashboard</a>
                        @else
                            <a href="{{ route('central.login') }}" class="text-muted">Log in</a>

                            @if (Route::has('central.register'))
                                <a href="{{ route('central.register') }}" class="ms-4 text-muted">Register</a>
                            @endif
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="container-fluid my-5 pt-5 px-5">
        <div class="row">
            <div class="col-12 d-flex">
                <div class="me-5">
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
                <div class="me-5">
                    <div>
                        <u>Appointments</u>
                    </div>

                    <div>
                        1) 09:30 AM - 09:45 AM
                    </div>

                    <div>
                        2) 10:00 AM - 10:30 AM
                    </div>
                    
                    <div>
                        3) 10:30 AM - 11:15 AM
                    </div>

                    <div>
                        4) 08:30 PM - 09:15 PM
                    </div>
                    <div>
                        5) 09:30 PM - 10:45 PM
                    </div>
                </div>
                <div>
                    Service Time: 30Minutes
                </div>
            </div>
            <div class="col-12">
                <div class="d-flex justify-content-center flex-column align-items-center">
                    @foreach($availableSlots as $availableSlot)
                    <div style="margin-top:1.5rem">
                        <span style="background-color:green;padding:10px;border-radius:30px">
                            {{ $availableSlot }}
                        </span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>
</html>
