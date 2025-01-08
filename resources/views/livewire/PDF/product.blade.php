<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRODUCT LIST</title>
    <style>
        body {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            font-size: 12px;
            margin: 20px;
        }

        .container {
            width: 99%;
            border: 1px solid #000;
            padding: 10px;
        }

        .header {
            text-align: left;
            margin-bottom: 10px;
        }

        .header p {
            margin: 0;
        }

        .header .title {
            text-decoration: none;
        }

        .header .flex {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        table th,
        table td {
            text-align: left;
            padding: 5px;
        }

        table th {
            text-align: center;
            background-color: #f2f2f2;
        }

        .signature {
            width: 100%;
            text-align: center;
            margin-top: 20px;
        }

        .signature td {
            height: 50px;
        }

        .footer {
            text-align: left;
            margin-top: 10px;
            font-size: 12px;
        }

        /* Garis luar tebal, garis dalam tipis */
        .tab {
            border: 1px solid #000;
        }

        .style2 {
            text-align: left;
            margin-top: 10px;
            font-size: 12px;
            font-family: "Courier New", Courier, monospace;
        }

        .style26 {
            font-family: "Courier New", Courier, monospace
        }

        .style27 {
            font-size: 24px
        }
    </style>
</head>

<body>
    <table class="tab">
        <tr>
            <td width="94%" height="86" class="style26">
                <div align="center" class="style27">PRODUCT LIST</div>
            </td>
        </tr>
    </table>
    <table border="1" class="tab">
        <thead>
            <tr>
                <th class="style26">No</th>
                <th class="style26">NAME PRODUCT</th>
                <th class="style26">DESCRIPTION</th>
                <th class="style26">PRICE</th>
                <th class="style26">STOCK</th>
                <th class="style26">CATEGORI</th>
                <th class="style26">KODE SKU </th>
                <th class="style26">PRODUCT</th>
            </tr>
        </thead>
        @php
        $totalStock = 0;
        @endphp
        @foreach ($produk as $item)
        <tbody>
            <tr>
                <td class="style26" style="text-align: center;">{{ $loop->iteration }}</td>
                <td class="style26" style="text-align: center;">{{ $item['name'] }}</td>
                <td class="style26" style="text-align: center;">{{ $item['description'] }}</td>
                <td class="style26" style="text-align: center;">{{ "Rp ." . number_format((float) preg_replace('/[^0-9\.]/', '', $item['price']), 2, '.', ',') }}</td>
                <td class="style26" style="text-align: center;">{{ $item['stock'] }}</td>
                <td class="style26" style="text-align: center;">{{ $item->Categories->name }}</td>
                <td class="style26" style="text-align: center;">{{ $item['sku'] }}</td>
                <td class="style26" style="text-align: center;"><img src="{{ public_path('storage/' . $item['image']) }}" width="50" height="50" class="rounded-circle"> </td>
            </tr>
            @php
            $totalStock += $item['stock'];
            @endphp
            @endforeach
            <tr>
                <td height="27" colspan="4" class="style26" style="text-align: center;">Total&nbsp;Stock</td>
                <td class="style26" style="text-align: center;">{{ $totalStock }}</td>
                <td colspan="3" class="style26" style="text-align: center;">&nbsp;</td>
            </tr>
        </tbody>

    </table>
    <p class="style2">
        <strong>Date</strong> :
    </p>
</body>

</html>