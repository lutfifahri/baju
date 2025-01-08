<div>
    <div align='center'>
        <img class="img-fluid" src="{{ asset('assets/img/ecommerce.png') }}" alt="" width="250">
    </div>
    <br>
    <div class="card mb-3">
        <div class="card-body">
            <div class="col-12">
                <div class="mb-3 text-center">
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3 text-center">
                    <h5>{{ $page_meta['title'] }}</h5>
                </div>
            </div>

            <form wire:submit.prevent="{{ $page_meta['form']['action'] }}" class="row g-3 needs-validation">
                <div class="col-12">
                    <label for="yourEmail" class="form-label"><span class="text-danger">*</span> Email</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input class="form-control {{ $errors->has('form.email') ? 'is-invalid' : '' }}" type="email" wire:model="form.email" placeholder="Enter your email" autocomplete="off">
                        @error('form.email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <label for="yourPassword" class="form-label"><span class="text-danger">*</span> Password</label>
                    <input class="form-control {{ $errors->has('form.password') ? 'is-invalid' : '' }}" type="password" wire:model="form.password" placeholder="Enter your password" autocomplete="off">
                    @error('form.password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" id="checkRemember" type="checkbox" wire:model="form.remember">
                    <label class="form-check-label" for="checkRemember">Check me out</label>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Login</button>
                </div>
            </form>

        </div>
    </div>
</div>