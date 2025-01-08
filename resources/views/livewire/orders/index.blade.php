<div>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Orders</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Orders</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <a href="{{ route('orders.create') }}" class="btn btn-primary" wire:navigate><i class="bi bi-clipboard-plus"></i></a>
                    <br><br>
                    <div class="card">
                        <div class="card-body">
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Full&nbsp;Name</th>
                                        <th scope="col">Order&nbsp;Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Total&nbsp;Amount</th>
                                        <th scope="col">Payment&nbsp;Status</th>
                                        <th scope="col">Payment&nbsp;method</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                @foreach ($orders as $item)
                                <tbody>
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->users->full_name }}</td>
                                        <td>{{ $item['order_date'] }}</td>
                                        <td>{{ $item['status'] }}</td>
                                        <td>{{ $item['total_amount'] }}</td>
                                        <td>{{ $item['payment_status'] }}</td>
                                        <td>{{ $item['payment_method'] }}</td>
                                        <td>
                                            &nbsp;
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>