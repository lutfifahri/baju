<div>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Categories</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" wire:navigate>Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}" wire:navigate>Categories</a></li>
                    <li class="breadcrumb-item active">{{ $header }}&nbsp;Categories</li>
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
                                    <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control {{ $errors->has('form.name') ? 'is-invalid' : '' }}" wire:model="form.name" placeholder="Enter your name" autocomplete="off">
                                        @error('form.name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control {{ $errors->has('form.description') ? 'is-invalid' : '' }}" wire:model="form.description" placeholder="Enter your Description" autocomplete="off">
                                        @error('form.description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <!-- Tombol Simpan -->
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <!-- Tautan Kembali -->
                                        <a href="{{ route('categories.index') }}" wire:navigate class="btn btn-success"><i class="bi bi-reply-all"></i> Kembali</a>
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