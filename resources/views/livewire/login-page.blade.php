<div>
    <!-- Admin Login Form -->
    <form wire:submit="_checkLoginAdmin">
        <div class="text-center">
            <img class="mb-4" src="https://infypos-demo.nyc3.digitaloceanspaces.com/settings/337/logo-80.png" alt="logo" width="72" height="57">
        </div>
        <h1 class="h3 mb-3 fw-normal text-center">ເຂົ້າສູ່ລະບົບ!</h1>

        <!-- Error Messages -->
        <small class="form-text text-muted">
            <div class="text-danger">
                @error('phone')
                {{ $message }}
                @enderror
            </div>
        </small>
        <small class="form-text text-muted">
            <div class="text-danger">
                @error('password')
                {{ $message }}
                @enderror
            </div>
        </small>

        <!-- Phone Number Input -->
        <div class="form-floating">
            <input wire:model='phone' type="tel" class="form-control" placeholder="ເບີໂທ" />
            <label for="floatingInput">ເບີໂທ</label>
        </div>

        <!-- Password Input -->
        <div class="form-floating">
            <input wire:model='password' type="password" class="form-control" placeholder="ລະຫັດ" />
            <label for="floatingPassword">ລະຫັດ</label>
        </div>

        <!-- Submit Button -->
        <button class="w-100 btn btn-lg btn-primary" type="submit">
            Login!
        </button>
    </form>
    <!-- End Admin Login Form -->
</div>
