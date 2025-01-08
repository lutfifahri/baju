<div>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Product</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" wire:navigate>Home</a></li>
                    <li class="breadcrumb-item active">Product</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <a href="{{ route('products.create') }}" class="btn btn-primary" wire:navigate><i class="bi bi-clipboard-plus"></i></a>
                    <button class="btn btn-success" wire:click="print">
                        <span class="spinner-border spinner-border-sm me-2" role="status" wire:loading wire:target="print"></span>
                        <i class="bi bi-printer" wire:loading.remove wire:target="print"></i>
                    </button>
                    <br><br>
                    <div class="card">
                        <div class="card-body">
                            <!-- Table with stripped rows -->
                            <div class="table-responsive">
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Stock</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($products as $item)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $item['name'] }}</td>
                                            <td>{{ number_format((float) preg_replace('/[^0-9\.]/', '', $item['price']), 2, '.', ',') }}</td>
                                            <td>{{ $item['stock'] }}</td>
                                            <td>{{ $item->Categories->name }}</td>
                                            <td>
                                                <img src="{{ asset('storage/' . $item['image']) }}" width="50" height="50" class="rounded-circle">
                                            </td>
                                            <td>
                                                <a href="{{ route('products.edit', $item['id']) }}" class="btn btn-primary" wire:navigate><i class="bi bi-journal-bookmark"></i></a>
                                                <button type="button" class="btn btn-danger" wire:click="delete({{ $item->id }})">
                                                    <span class="spinner-border spinner-border-sm" role="status" wire:loading wire:target="delete({{ $item->id }})"></span>
                                                    <i class="bi bi-trash" wire:loading.remove wire:target="delete({{ $item->id }})"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @empty
                                        <td colspan="7">
                                            <center>Not found</center>
                                        </td>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
