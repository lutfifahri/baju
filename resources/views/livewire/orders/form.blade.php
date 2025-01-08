<div>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Orders</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" wire:navigate>Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('orders.index') }}" wire:navigate>Orders</a></li>
                    <li class="breadcrumb-item active">{{ $header }}&nbsp;Orders</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Silahkan {{ $header }} data di form</h5>
                            <br>
                            <!-- General Form Elements -->
                            <form wire:submit.prevent="{{ $page_meta['form']['action'] }}" class="row g-3 needs-validation">
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Full&nbsp;Name</label>
                                    <div class="col-sm-10">
                                        <select class="form-control {{ $errors->has('form.users_id') ? 'is-invalid' : '' }}" wire:model="form.users_id">
                                            <option value="">--Pilih--</option>
                                            @forelse ($user as $item)
                                            <option value="{{ $item['id'] }}">{{ $item['full_name'] }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                        @error('form.users_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Order&nbsp;Date</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control {{ $errors->has('form.order_date') ? 'is-invalid' : '' }}" wire:model="form.order_date" placeholder="Tanggal">
                                        @error('form.order_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-10">
                                        <select class="form-control {{ $errors->has('form.status') ? 'is-invalid' : '' }}" wire:model="form.status">
                                            <option value="">--Pilih--</option>
                                            @foreach (['cancelled', 'paid', 'pending', 'shipped'] as $status)
                                            <option value="{{ $status }}">{{ ucfirst($status) }}</option>
                                            @endforeach
                                        </select>
                                        @error('form.status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Total&nbsp;Amount</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control {{ $errors->has('form.total_amount') ? 'is-invalid' : '' }}" wire:model="form.total_amount" placeholder="Total Amount">
                                        @error('form.total_amount')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Payment&nbsp;Status</label>
                                    <div class="col-sm-10">
                                        <select class="form-control {{ $errors->has('form.payment_status') ? 'is-invalid' : '' }}" wire:model="form.payment_status">
                                            <option value="">--Pilih--</option>
                                            @foreach (['unpaid', 'paid'] as $payment_status)
                                            <option value="{{ $payment_status }}">{{ ucfirst($payment_status) }}</option>
                                            @endforeach
                                        </select>
                                        @error('form.payment_status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Payment&nbsp;Method</label>
                                    <div class="col-sm-10">
                                        <select class="form-control {{ $errors->has('form.payment_method') ? 'is-invalid' : '' }}" wire:model="form.payment_method">
                                            <option value="">--Pilih--</option>
                                            @foreach (['cash', 'e-walet'] as $payment_method)
                                            <option value="{{ $payment_method }}">{{ ucfirst($payment_method) }}</option>
                                            @endforeach
                                        </select>
                                        @error('form.payment_method')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                                <br>
                                <h5 class="card-title">Silahkan {{ $header }} data di form Order Items</h5>
                                <div class="row mb-3">
                                    <div class="table-responsive">
                                        <table class="table datatable">
                                            <tr>
                                                <td>Name&nbsp;Product</td>
                                                <td>Stock</td>
                                                <td>Quantity</td>
                                                <td>Price</td>
                                                <td>Sub&nbsp;Total</td>
                                                <td>
                                                    Action
                                                </td>
                                            </tr>
                                            @forelse ($RowOrdersItems as $index => $item)
                                            <tr>
                                                <td>
                                                    <select class="form-control" wire:model="RowOrdersItems.{{ $index }}.product_id" wire:change="changeProduct({{ $index }})">
                                                        <option value="">--Pilih--</option>
                                                        @foreach ($product as $items)
                                                        <option value="{{ $items['id'] }}">{{ ucfirst($items['name']) }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" wire:model="RowOrdersItems.{{ $index }}.stock" readonly>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" wire:model="RowOrdersItems.{{ $index }}.quantity" wire:change="changeQuantity({{ $index }})" placeholder="Quantity">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" x-mask:dynamic="$money($input, '.', ',', 2)" wire:model="RowOrdersItems.{{ $index }}.price" placeholder="Price">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" wire:model="RowOrdersItems.{{ $index }}.subtotal" placeholder="subtotal">
                                                </td>
                                                <td>
                                                    <button class="btn btn-warning" type="button" wire:click="removeRowOrdersItems({{ $index }})">
                                                        <span class="spinner-border spinner-border-sm" role="status" wire:loading wire:target="removeRowOrdersItems({{ $index }})"></span>
                                                        <i class="bi bi-trash" wire.loading.remove wire:target="removeRowOrdersItems({{ $index }})"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td class="small text-muted text-center" colspan="100%">Data not found</td>
                                            </tr>
                                            @endforelse
                                            <tr>
                                                <td colspan="3">
                                                    <button class="btn btn-primary" type="button" wire:click="addRowOrdersItems({{ $index }})">
                                                        <i class="bi bi-plus"></i>
                                                    </button>
                                                </td>
                                                <td></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <br><br><br>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <!-- Tombol Simpan -->
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <!-- Tautan Kembali -->
                                        <a href="{{ route('orders.index') }}" wire:navigate class="btn btn-success"><i class="bi bi-reply-all"></i> Kembali</a>
                                    </div>
                                </div>
                            </form><!-- End General Form Elements -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>