<div>

    <!-- Top of dashboard -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h4 class="animate__animated animate__fadeIn">Users Management</h4>
        <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-outline-primary btn-sm" style="border-radius: 30px;">
            <i class="bi bi-plus-circle"></i>
            &nbsp;ເພີ່ມລາຍການ
        </button>
        <div class="dropdown animate__animated animate__fadeIn">
            <button style="border-radius: 30px;" class="btn btn-outline-info btn-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-check-all"></i>&nbsp;ກ່ອງຂໍ້ມູນຕາມຕົວເລືອກ
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </div>
    </div>

    <!-- Dashboard content row -->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10 animate__animated animate__fadeIn">

        <!-- Column 1 -->
        <div class="col-xl-12">
            <div class="card h-md-100">
                <div class="card-header bg-white">
                    <!-- Search input -->
                    <div class="input-group">
                        <span class="input-group-text" style="border: none;background-color: inherit;color: inherit;" id="search-icon">
                            <i class="bi bi-search"></i>
                        </span>
                        <input class="form-control form-control-dark" type="text" placeholder="ຊອກຫາຂໍ້ມູນ..." aria-label="Search" aria-describedby="search-icon">
                    </div>
                </div>
                <div class="card-body">
                    <!-- Users table -->
                    <table class="table table-responsive table-hover custom-table">
                        <thead>
                            <tr>
                                <th scope="col">Users</th>
                                <th scope="col">Auth</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Status</th>
                                <th scope="col">Level</th>
                                <th scope="col">Win</th>
                                <th scope="col">Close</th>
                                <th scope="col">Balance</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Ad Game</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataList as $item)
                            <tr>
                                <!-- User data -->
                                <td>
                                    qwerqwe
                                </td>
                                <td>
                                    qwer
                                </td>
                                <td>
                                    qwerqer
                                </td>
                                <td>
                                    qwere
                                </td>
                                <td>
                                    qewrqew
                                </td>
                                <td>
                                    qwerqwe
                                </td>
                                <td>
                                    qwer
                                </td>
                                <td>
                                    qewrqwe
                                </td>
                                <td>
                                    qewrqew
                                </td>
                                <td>
                                    qerqew
                                </td>
                                <td>
                                    qwerqew
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Pagination links -->
                    {{-- {{ $userData->links() }} --}}
                    <!-- End of table -->
                </div>
            </div>
            <!-- End of card -->
        </div>
    </div>
    <!-- End of row -->

    <!-- Modal add data -->
    <div wire:ignore.self class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">ເພີ່ມຂໍ້ມູນຜູ້ໃຊ້</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- form add data -->
                    <form wire:submit="_createUserData">
                        <div class="row text-center justify-content-center py-2">
                            <!-- admin -->
                            <div class="col-3 mb-2">
                                <div class="card position-relative">
                                    <!-- admin -->
                                    <img wire:click="_setRole(1)" loading="lazy" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTAMjQfOnVjs8CCD4-gLzDvZ0L6npZIUqTd1Q&s" class="card-img-top" alt="image" wire:loading.attr="disabled">

                                    <!-- Bootstrap Icon -->
                                    @if ($roleId == 1)
                                    <div class="position-absolute top-0 start-0 mt-2 ms-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle text-success" viewBox="0 0 16 16">
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
                                    <img wire:click="_setRole(2)" loading="lazy" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTAMjQfOnVjs8CCD4-gLzDvZ0L6npZIUqTd1Q&s" class="card-img-top" alt="image" wire:loading.attr="disabled">

                                    <!-- Bootstrap Icon -->
                                    @if ($roleId == 2)
                                    <div class="position-absolute top-0 start-0 mt-2 ms-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle text-success" viewBox="0 0 16 16">
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
                                    <img wire:click="_setRole(3)" loading="lazy" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTAMjQfOnVjs8CCD4-gLzDvZ0L6npZIUqTd1Q&s" class="card-img-top" alt="image" wire:loading.attr="disabled">

                                    <!-- Bootstrap Icon -->
                                    @if ($roleId == 3)
                                    <div class="position-absolute top-0 start-0 mt-2 ms-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle text-success" viewBox="0 0 16 16">
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
                                    <img wire:click="_setRole(4)" loading="lazy" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTAMjQfOnVjs8CCD4-gLzDvZ0L6npZIUqTd1Q&s" class="card-img-top" alt="image" wire:loading.attr="disabled">

                                    <!-- Bootstrap Icon -->
                                    @if ($roleId == 4)
                                    <div class="position-absolute top-0 start-0 mt-2 ms-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle text-success" viewBox="0 0 16 16">
                                            <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zM6.56 11.697l-2.93-2.93a.75.75 0 1 1 1.06-1.06l2.124 2.125 4.97-4.97a.75.75 0 1 1 1.06 1.06l-5.5 5.5a.75.75 0 0 1-1.06 0z" />
                                        </svg>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <br />
                        {{-- @if ($categoryId != 0)
                            <small class="form-text text-muted">
                                <div class="text-danger">
                                    @error('moneyc')
                                        {{ $message }}
                        @enderror
                </div>
                </small>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-cash-coin"></i></span>
                    <select wire:model='moneyc' class="form-select">
                        <option selected>ระบุจำนวนคะแนน</option>
                        <option value="10000">10,000 คะแนน</option>
                        <option value="30000">30,000 คะแนน</option>
                        <option value="5000">5,000 คะแนน</option>
                        <option value="100000">100,000 คะแนน</option>
                        <option value="50000">50,000 คะแนน</option>
                    </select>
                </div>
                <br>
                <div class="d-grid mx-auto">
                    <button wire:loading.remove class="btn btn-success" type="submit">สร้างบทสอบ</button>
                    <button wire:loading class="btn btn-success btn-sm" disabled>
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </button>
                </div>
                @endif --}}
                </form>
            </div>
        </div>
    </div>
</div>

</div>
