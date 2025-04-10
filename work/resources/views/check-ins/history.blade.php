<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check-in History | Employee Check-in System</title>
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

        .history-container {
            background: white;
            border: 2px solid #000;
            padding: 40px;
            width: 90%;
            max-width: 1000px;
            box-shadow: 10px 10px 0 #000;
            text-align: center;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 30px;
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

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin: 20px 0;
        }

        table,
        th,
        td {
            border: 2px solid #000;
        }

        th {
            background-color: #ffcc00;
            padding: 12px;
            text-align: center;
            font-weight: bold;
        }

        td {
            padding: 10px;
            text-align: center;
            background-color: #fff;
        }

        tr:nth-child(even) td {
            background-color: #f9f9f9;
        }

        .text-success {
            color: #4caf50;
            font-weight: bold;
        }

        .text-danger {
            color: #f44336;
            font-weight: bold;
        }

        .text-warning {
            color: #ff9800;
            font-weight: bold;
        }

        .mt-4 {
            margin-top: 30px;
        }

        .pagination {
            display: flex;
            justify-content: center;
            list-style: none;
            padding: 0;
            margin: 20px 0;
        }

        .pagination li {
            margin: 0 5px;
        }

        .pagination a,
        .pagination span {
            display: block;
            padding: 8px 12px;
            border: 2px solid #000;
            box-shadow: 2px 2px 0 #000;
            background-color: #fff;
            text-decoration: none;
            color: #000;
        }

        .pagination .active span {
            background-color: #ffcc00;
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

            .history-container {
                width: 95%;
                padding: 20px;
            }

            th,
            td {
                padding: 8px 5px;
                font-size: 14px;
            }

            table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
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
        <div class="history-container">
            <h1>Check-in History</h1>

            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Clock In</th>
                            <th>11:00 Check-in</th>
                            <th>13:00 Check-in</th>
                            <th>16:00 Check-in</th>
                            <th>Clock Out</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($checkIns as $checkIn)
                            <tr>
                                <td>{{ $checkIn->date }}</td>
                                <td>{{ $checkIn->clock_in_time }}</td>
                                <td>
                                    @if($checkIn->check_in_11)
                                        <span class="text-success">{{ $checkIn->check_in_11 }}</span>
                                    @elseif($checkIn->check_in_11_status === 'missed')
                                        <span class="text-danger">Missed</span>
                                    @else
                                        <span class="text-warning">Pending</span>
                                    @endif
                                </td>
                                <td>
                                    @if($checkIn->check_in_13)
                                        <span class="text-success">{{ $checkIn->check_in_13 }}</span>
                                    @elseif($checkIn->check_in_13_status === 'missed')
                                        <span class="text-danger">Missed</span>
                                    @else
                                        <span class="text-warning">Pending</span>
                                    @endif
                                </td>
                                <td>
                                    @if($checkIn->check_in_16)
                                        <span class="text-success">{{ $checkIn->check_in_16 }}</span>
                                    @elseif($checkIn->check_in_16_status === 'missed')
                                        <span class="text-danger">Missed</span>
                                    @else
                                        <span class="text-warning">Pending</span>
                                    @endif
                                </td>
                                <td>
                                    @if($checkIn->clock_out_time)
                                        <span class="text-success">{{ $checkIn->clock_out_time }}</span>
                                    @else
                                        <span class="text-warning">Not clocked out</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $checkIns->links() }}
            </div>
        </div>
    </div>
</body>

</html>