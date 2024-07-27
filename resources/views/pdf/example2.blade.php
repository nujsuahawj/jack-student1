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
                    <th scope="col">product_code</th>
                    <th scope="col">order_price</th>
                    <th scope="col">sale_price</th>
                    <th scope="col">qty</th>
                    <th scope="col">time</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataSend as $item)
                <tr>
                    <!-- User data -->
                    <td>{{ $item->id }}</td>
                    <td>{{ number_format($item->price_order) }} kip</td>
                    <td>{{ number_format($item->price_sale) }} kip</td>
                    <td>{{ $item->qty }} item</td>
                    <td>{{ $item->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
