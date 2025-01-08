<div>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Categories</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Categories</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <a href="{{ route('categories.create') }}" class="btn btn-primary" wire:navigate><i class="bi bi-clipboard-plus"></i></a>
                    <br><br>
                    <div class="card">
                        <div class="card-body">
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($categories as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item['name'] }}</td>
                                        <td>{{ $item['description'] }}</td>
                                        <td>
                                            <a href="{{ route('categories.edit', $item['id']) }}" class="btn btn-primary" wire:navigate><i class="bi bi-journal-bookmark"></i></a>
                                            <button type="button" class="btn btn-danger" wire:click="delete({{ $item->id }})">
                                                <span class="spinner-border spinner-border-sm" role="status" wire:loading wire:target="delete({{ $item->id }})"></span>
                                                <i class="bi bi-trash" wire:loading.remove wire:target="delete({{ $item->id }})"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @empty
                                    <td colspan="4">
                                        <center>Not found</center>
                                    </td>
                                    @endforelse
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
