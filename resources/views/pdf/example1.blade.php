<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 100%;
            margin: 0 auto;
            text-align: center;
        }

        .title {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .date {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="title">{{ $title }}</div>
        <div class="date">{{ $date }}</div>
        <table>
            <thead>
                <tr>
                    <th scope="col">code</th>
                    <th scope="col">qty</th>
                    <th scope="col">total</th>
                    <th scope="col">status</th>
                    <th scope="col">time</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataSend as $item)
                <tr>
                    <!-- User data -->
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->total_qty }} item</td>
                    <td>{{ number_format($item->total_price) }} kip</td>
                    <td>
                        @if ($item->status == 1)
                        <span class="badge bg-warning">pending</span>
                        @elseif ($item->status == 2)
                        <span class="badge bg-success">success</span>
                        @else
                        <span class="badge bg-danger">cancel</span>
                        @endif
                    </td>
                    <td>{{ $item->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>