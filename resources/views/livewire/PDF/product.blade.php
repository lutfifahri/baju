<div>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product List</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 40px;
            }

            header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 20px;
            }

            .lexus-logo {
                width: 100px;
            }

            .deltamas-logo {
                width: 120px;
            }

            h1 {
                text-align: center;
                font-size: 24px;
                margin-top: 0;
            }

            .content {
                line-height: 1.6;
                font-size: 14px;
                text-align: justify;
            }

            .to-re-paragraph {
                margin: 0;
            }

            .footer {
                margin-top: 40px;
                font-size: 12px;
                text-align: center;
            }

            .signature {
                margin-top: 40px;
                font-size: 14px;
            }
        </style>
    </head>

    <body>
        <h1>Product List</h1>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Category</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produk as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['description'] }}</td>
                    <td>{{ number_format((float) preg_replace('/[^0-9\.]/', '', $item['price']), 2, '.', ',') }}</td>
                    <td>{{ $item['stock'] }}</td>
                    <td>{{ $item->Categories->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>

    </html>
</div>
