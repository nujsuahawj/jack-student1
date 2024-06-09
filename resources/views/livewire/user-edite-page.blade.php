<div>

    <!-- Top of dashboard -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <div class="text-start">
            <h4>ແກ້ໄຂຂໍ້ມູນຜູ້ໃຊ້</h4>
        </div>

        <div class="text-end">
            <a href="/users" wire:navigate class="btn btn-outline-primary" style="border-radius: 30px;">
                <i class="bi bi-chevron-compact-left"></i>
                ກັບຄືນ
            </a>
        </div>
    </div>

    <!-- Dashboard content row -->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <!-- Column 1 -->
        <div class="col-xl-12">
            <div class="card h-md-100">
                <div class="card-body">
                    <form wire:submit="_updateUserData">
                        <div class="row text-center justify-content-center py-2">
                            <!-- admin -->
                            <div class="col-3 mb-2">
                                <div class="card position-relative">
                                    <!-- admin -->
                                    <img wire:click="_setRole(1)" loading="lazy" src="http://127.0.0.1:8000/store-img/ad.png" class="card-img-top" alt="image" wire:loading.attr="disabled">

                                    <!-- Bootstrap Icon -->
                                    @if ($roleId == 1)
                                    <div class="position-absolute top-0 start-0 mt-2 ms-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle text-primary" viewBox="0 0 16 16">
                                            <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zM6.56 11.697l-2.93-2.93a.75.75 0 1 1 1.06-1.06l2.124 2.125 4.97-4.97a.75.75 0 1 1 1.06 1.06l-5.5 5.5a.75.75 0 0 1-1.06 0z" />
                                        </svg>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <!-- employee -->
                            <div class="col-3 mb-2">
                                <div class="card position-relative">
                                    <!-- employee -->
                                    <img wire:click="_setRole(2)" loading="lazy" src="http://127.0.0.1:8000/store-img/em.png" class="card-img-top" alt="image" wire:loading.attr="disabled">

                                    <!-- Bootstrap Icon -->
                                    @if ($roleId == 2)
                                    <div class="position-absolute top-0 start-0 mt-2 ms-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle text-primary" viewBox="0 0 16 16">
                                            <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zM6.56 11.697l-2.93-2.93a.75.75 0 1 1 1.06-1.06l2.124 2.125 4.97-4.97a.75.75 0 1 1 1.06 1.06l-5.5 5.5a.75.75 0 0 1-1.06 0z" />
                                        </svg>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <!-- supplier -->
                            <div class="col-3 mb-2">
                                <div class="card position-relative">
                                    <!-- supplier -->
                                    <img wire:click="_setRole(3)" loading="lazy" src="http://127.0.0.1:8000/store-img/sp.png" class="card-img-top" alt="image" wire:loading.attr="disabled">

                                    <!-- Bootstrap Icon -->
                                    @if ($roleId == 3)
                                    <div class="position-absolute top-0 start-0 mt-2 ms-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle text-primary" viewBox="0 0 16 16">
                                            <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zM6.56 11.697l-2.93-2.93a.75.75 0 1 1 1.06-1.06l2.124 2.125 4.97-4.97a.75.75 0 1 1 1.06 1.06l-5.5 5.5a.75.75 0 0 1-1.06 0z" />
                                        </svg>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <!-- customer -->
                            <div class="col-3 mb-2">
                                <div class="card position-relative">
                                    <!-- customer -->
                                    <img wire:click="_setRole(4)" loading="lazy" src="http://127.0.0.1:8000/store-img/cm.png" class="card-img-top" alt="image" wire:loading.attr="disabled">

                                    <!-- Bootstrap Icon -->
                                    @if ($roleId == 4)
                                    <div class="position-absolute top-0 start-0 mt-2 ms-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle text-primary" viewBox="0 0 16 16">
                                            <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zM6.56 11.697l-2.93-2.93a.75.75 0 1 1 1.06-1.06l2.124 2.125 4.97-4.97a.75.75 0 1 1 1.06 1.06l-5.5 5.5a.75.75 0 0 1-1.06 0z" />
                                        </svg>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <br />
                        @if ($roleId != 0)
                        <small class="form-text text-muted">
                            <div class="text-danger">
                                @error('addName')
                                {{ $message }}
                                @enderror
                            </div>
                        </small>
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-white"><i class="bi bi-person-add"></i></span>
                            <input wire:model="addName" type="text" class="form-control" placeholder="ຊື່ຜູ້ໃຊ້" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <small class="form-text text-muted">
                            <div class="text-danger">
                                @error('addPhone')
                                {{ $message }}
                                @enderror
                            </div>
                        </small>
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-white"><i class="bi bi-telephone"></i></span>
                            <input wire:model="addPhone" type="tel" class="form-control" placeholder="ເບີໂທ" aria-label="Userphone" aria-describedby="basic-addon1">
                        </div>
                        @if ($roleId == 1 || $roleId == 2)
                        <small class="form-text text-muted">
                            <div class="text-danger">
                                @error('addPassword')
                                {{ $message }}
                                @enderror
                            </div>
                        </small>
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-white"><i class="bi bi-lock"></i></span>
                            <input wire:model="addPassword" type="password" class="form-control" placeholder="ລະຫັັດຜ່ານ" aria-label="Userphone" aria-describedby="basic-addon1">
                        </div>
                        @endif
                        <!-- Avatar -->
                        <div class="drop-container mb-3">
                            <label for="formFile" class="form-label">
                                <small class="form-text text-muted">
                                    <div class="text-danger">
                                        @error('Addavatar')
                                        {{ $message }}
                                        @enderror
                                    </div>
                                </small>
                                ຮູບພາບຜູ້ໃຊ້
                            </label>
                            <span class="drop-title">ເລືອກຮູບ</span>
                            <input wire:model='Addavatar' type="file" accept="image/*" class="file-input form-control" />
                        </div>
                        <br>
                        <div class="d-grid mx-auto">
                            <button wire:loading.attr="disabled" class="btn btn-primary" type="submit">ເພີ່ມຂໍ້ມູນ</button>
                        </div>
                        @else
                        <br><br><br><br><br><br><br><br><br><br><br><br>
                        <br><br><br><br><br><br>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!--script -->
<script>
    // Sound effect
    var audioTrue = new Audio('https://hmong56.online/public/store-img/audio-true.mp3');
    var audioFalse = new Audio('https://hmong56.online/public/store-img/audio-false.mp3');
    // Alert success
    window.addEventListener('success', event => {
        // dispay sound true
        audioTrue.play();
    });
    // Alert error
    window.addEventListener('error', event => {
        // dispay sound false
        audioFalse.play();
    });

</script>
