<div>
    <!-- Admin Login Form -->
    <form action="#">
        <div class="text-center">
            <img class="mb-4" src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="logo" width="72" height="57">
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
            <input type="tel" class="form-control" placeholder="ເບີໂທ" />
            <label for="floatingInput">ເບີໂທ</label>
        </div>

        <!-- Password Input -->
        <div class="form-floating">
            <input type="password" class="form-control" placeholder="ລະຫັດ" />
            <label for="floatingPassword">ລະຫັດ</label>
        </div>

        <!-- Submit Button -->
        <button class="w-100 btn btn-lg btn-primary" type="submit">
            Login!
        </button>
    </form>
    <!-- End Admin Login Form -->
</div>
