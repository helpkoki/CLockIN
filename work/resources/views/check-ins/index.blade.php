<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Check-in System</title>
    <style>
        body {
            font-family: "Comic Sans MS", sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }

        .navbar {
            background-color: white;
            border-bottom: 2px solid #000;
            box-shadow: 0 4px 0 #000;
            padding: 10px 0;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        .nav-logo {
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
            color: #000;
        }

        .nav-links {
            display: flex;
            align-items: center;
        }

        .nav-link,
        .nav-link-button {
            margin-left: 20px;
            text-decoration: none;
            color: #000;
            padding: 8px 12px;
            border: 2px solid #000;
            background-color: #ffcc00;
            box-shadow: 3px 3px 0 #000;
            font-size: 16px;
            cursor: pointer;
            display: inline-block;
            font-family: "Comic Sans MS", sans-serif;
        }

        .nav-link:hover,
        .nav-link-button:hover {
            background-color: #ffeb3b;
        }

        .nav-link.active {
            background-color: #ff9800;
        }

        .nav-link-form {
            margin: 0;
            padding: 0;
        }

        .main-content {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        .checkin-container {
            background: white;
            border: 2px solid #000;
            padding: 40px;
            width: 80%;
            max-width: 800px;
            box-shadow: 10px 10px 0 #000;
            text-align: center;
        }

        h1,
        h4 {
            font-size: 28px;
            margin-bottom: 30px;
        }

        .input-group {
            margin-bottom: 20px;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 16px;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 2px solid #000;
            box-shadow: 3px 3px 0 #000;
            font-size: 14px;
        }

        button,
        .btn {
            background-color: #ffcc00;
            border: 2px solid #000;
            padding: 12px;
            margin: 5px;
            cursor: pointer;
            box-shadow: 3px 3px 0 #000;
            font-size: 16px;
            text-decoration: none;
            color: #000;
            display: inline-block;
        }

        button:hover,
        .btn:hover {
            background-color: #ffeb3b;
        }

        .btn-primary {
            background-color: #4a9ff5;
        }

        .btn-success {
            background-color: #4caf50;
        }

        .btn-danger {
            background-color: #ff6b6b;
        }

        .btn-danger:hover {
            background-color: #ff8787;
        }

        .btn-info {
            background-color: #2196f3;
        }

        .btn-secondary {
            background-color: #9e9e9e;
        }

        .alert {
            padding: 10px;
            margin-bottom: 15px;
            border: 2px solid #000;
            box-shadow: 3px 3px 0 #000;
        }

        .alert-success {
            background-color: #dff0d8;
            color: #3c763d;
        }

        .alert-danger {
            background-color: #f2dede;
            color: #a94442;
        }

        .alert-info {
            background-color: #d9edf7;
            color: #31708f;
        }

        .alert-warning {
            background-color: #fcf8e3;
            color: #8a6d3b;
        }

        .card {
            border: 2px solid #000;
            margin-bottom: 20px;
            box-shadow: 3px 3px 0 #000;
        }

        .card-header {
            background-color: #f0f0f0;
            padding: 10px;
            border-bottom: 2px solid #000;
            font-weight: bold;
        }

        .card-body {
            padding: 15px;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -10px;
        }

        .col-md-4 {
            flex: 0 0 calc(33.333% - 20px);
            margin: 0 10px;
        }

        .text-success {
            color: #4caf50;
        }

        .text-danger {
            color: #f44336;
        }

        .text-warning {
            color: #ff9800;
        }

        .mt-4 {
            margin-top: 30px;
        }

        .mb-4 {
            margin-bottom: 30px;
        }

        @media (max-width: 768px) {
            .nav-container {
                flex-direction: column;
                padding: 10px;
            }

            .nav-links {
                margin-top: 15px;
                flex-wrap: wrap;
                justify-content: center;
            }

            .nav-link,
            .nav-link-button {
                margin: 5px;
            }

            .col-md-4 {
                flex: 0 0 100%;
                margin-bottom: 15px;
            }

            .checkin-container {
                width: 95%;
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="nav-container">
            <a href="{{ route('check-ins.index') }}" class="nav-logo">Employee Check-in System</a>
            <div class="nav-links">
                <a href="{{ route('check-ins.index') }}"
                    class="nav-link {{ request()->routeIs('check-ins.index') ? 'active' : '' }}">Dashboard</a>
                <a href="{{ route('check-ins.history') }}"
                    class="nav-link {{ request()->routeIs('check-ins.history') ? 'active' : '' }}">History</a>
                <form method="POST" action="{{ route('logout') }}" class="nav-link-form">
                    @csrf
                    <button type="submit" class="nav-link-button">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="main-content">
        <div class="checkin-container">
            <h1>Employee Check-in Dashboard</h1>

            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            <div class="text-center mb-4">
                <h4>Current Date: {{ date('Y-m-d') }}</h4>
                <h4>Current Time: <span id="current-time">{{ $currentTime }}</span></h4>
            </div>

            @if (!$checkIn)
                <div class="text-center">
                    <form action="{{ route('check-ins.clock-in') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Clock In</button>
                    </form>
                </div>
            @else
                    <div class="alert alert-info">
                        <strong>Clocked in at:</strong> {{ $checkIn->clock_in_time }}
                        @if($checkIn->clock_out_time)
                            <br>
                            <strong>Clocked out at:</strong> {{ $checkIn->clock_out_time }}
                        @endif
                    </div>

                    @if(!$checkIn->clock_out_time)
                            <div class="row mt-4">
                                @foreach(['11', '13', '16'] as $period)
                                        <div class="col-md-4">
                                            <div class="card mb-3">
                                                <div class="card-header">
                                                    Check-in at {{ $period }}:00
                                                </div>
                                                <div class="card-body text-center">
                                                    @php
                                                        $statusField = "check_in_{$period}_status";
                                                        $timeField = "check_in_{$period}";
                                                        $windowStart = $checkInTimes[$period]['start'];
                                                        $windowEnd = $checkInTimes[$period]['end'];
                                                        $isCurrentWindow = $currentTime >= $windowStart && $currentTime <= $windowEnd;
                                                    @endphp

                                                    @if($checkIn->$statusField === 'completed')
                                                        <div class="alert alert-success mb-2">
                                                            <strong>Completed at:</strong> {{ $checkIn->$timeField }}
                                                        </div>
                                                    @elseif($checkIn->$statusField === 'missed')
                                                        <div class="alert alert-danger mb-2">
                                                            <strong>Missed</strong>
                                                        </div>
                                                    @else
                                                        <div class="alert alert-warning mb-2">
                                                            <strong>Pending</strong>
                                                        </div>

                                                        @if($isCurrentWindow)
                                                            <form action="{{ route('check-ins.check-in', $period) }}" method="POST">
                                                                @csrf
                                                                <button type="submit" class="btn btn-success">Check In Now</button>
                                                            </form>
                                                        @else
                                                            <button class="btn btn-secondary" disabled>
                                                                Window: {{ $windowStart }} - {{ $windowEnd }}
                                                            </button>
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                @endforeach
                            </div>

                            @php
                                // Calculate if all check-ins are completed or passed
                                $allCompleted = true;
                                $currentTimePassed16 = $currentTime > $checkInTimes['16']['end'];

                                foreach (['11', '13', '16'] as $period) {
                                    $statusField = "check_in_{$period}_status";
                                    if ($checkIn->$statusField === 'pending') {
                                        $allCompleted = false;
                                    }
                                }

                                // Show clock out if all check-ins are done or if time is past 16:10
                                $canClockOut = $allCompleted || $currentTimePassed16;
                            @endphp

                            @if($canClockOut)
                                <div class="text-center mt-4">
                                    <form action="{{ route('check-ins.clock-out') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Clock Out</button>
                                    </form>
                                </div>
                            @endif
                    @endif
            @endif
        </div>
    </div>

    <script>
        // Update the current time every second
        setInterval(function () {
            var now = new Date();
            var hours = now.getHours().toString().padStart(2, '0');
            var minutes = now.getMinutes().toString().padStart(2, '0');
            document.getElementById('current-time').textContent = hours + ':' + minutes;
        }, 1000);
    </script>
</body>

</html>