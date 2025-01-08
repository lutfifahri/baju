<div>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Product</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" wire:navigate>Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('products.index') }}" wire:navigate>Product</a></li>
                    <li class="breadcrumb-item active">{{ $header }}&nbsp;Product</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Silahkan Tambah data di form</h5>
                            <!-- General Form Elements -->
                            <form wire:submit.prevent="{{ $page_meta['form']['action'] }}" class="row g-3 needs-validation">
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control {{ $errors->has('form.name') ? 'is-invalid' : '' }}" wire:model="form.name" placeholder="Enter your name" autocomplete="off">
                                        @error('form.name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <!-- Textarea untuk Deskripsi -->
                                        <textarea class="form-control {{ $errors->has('form.description') ? 'is-invalid' : '' }}" style="height: 100px" wire:model="form.description">
                                        </textarea>
                                        <!-- Menampilkan Error Jika Ada -->
                                        @error('form.description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Price</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control {{ $errors->has('form.price') ? 'is-invalid' : '' }}" x-mask:dynamic="$money($input, '.', ',', 2)" wire:model="form.price">
                                        @error('form.price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Stock</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control {{ $errors->has('form.stock') ? 'is-invalid' : '' }}" wire:model="form.stock">
                                        @error('form.stock')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Categories</label>
                                    <div class="col-sm-10">
                                        <select class="form-control {{ $errors->has('form.category_id') ? 'is-invalid' : '' }}" wire:model="form.category_id">
                                            <option value="">--Pilih--</option>
                                            @forelse ($categories as $item)
                                            <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                        @error('form.category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Gambar</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control {{ $errors->has('form.image') ? 'is-invalid' : '' }}" wire:model="form.image">
                                        @error('form.image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <br>
                                        @if (is_string($form->image))
                                        <img src="{{ asset('storage/' . $form->image) }}" alt="Gambar Lama" width="200" height="200">
                                        @elseif ($form->image)
                                        {{-- Tampilkan gambar baru jika sedang diunggah --}}
                                        <img src="{{ $form->image->temporaryUrl() }}" alt="Gambar Baru" width="200" height="200">
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <!-- Tombol Simpan -->
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <!-- Tautan Kembali -->
                                        <a href="{{ route('products.index') }}" wire:navigate class="btn btn-success"><i class="bi bi-reply-all"></i> Kembali</a>
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
