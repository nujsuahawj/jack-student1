<div>
    <!-- Top of dashboard -->
    <div class="pt-3 pb-2 mb-3">
        <div class="text-center">
            <!-- text -->
            <h6 class="pt-4">
                ເລືອກລາຍງານຂໍ້ມູນ
            </h6>
            <!-- dropdown -->
            <div class="d-flex justify-content-center" style="margin-top: 0.5rem;">
                <div class="input-group" style="max-width: 400px;">
                    <select wire:model.live='setTypeReport' id="inputState" class="form-select">
                        <option selected value="salse">ລາຍງານການຂາຍ...</option>
                        <option value="order">ລາຍງານການສັ່ງຊື້+ນຳເຂົ້າ</option>
                        <option value="product">ລາຍງານສິນຄ້າ</option>
                        <option value="payment">ລາຍງານການຊຳລະ</option>
                    </select>
                </div>
            </div>
            <!-- card -->
            <div class="row gx-2 gy-2">
                <div class="col-3">
                    <div class="card h-100" style="margin-top: 0.5rem;">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title text-muted mb-3">ລາຍການຂາຍ</h5>
                                <h6 class="display-6 animate__animated animate__fadeIn">43</h6>
                            </div>
                            <i class="bi bi-grid text-success" style="font-size: 4rem;"></i>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card h-100" style="margin-top: 0.5rem;">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title text-muted mb-3">ລາຍການສັ່ງຊື້</h5>
                                <h6 class="display-6 animate__animated animate__fadeIn">43</h6>
                            </div>
                            <i class="bi bi-cart-plus text-info" style="font-size: 4rem;"></i>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card h-100" style="margin-top: 0.5rem;">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title text-muted mb-3">ລາຍການສິນຄ້າ</h5>
                                <h6 class="display-6 animate__animated animate__fadeIn">43</h6>
                            </div>
                            <i class="bi bi-list-task text-success" style="font-size: 4rem;"></i>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card h-100" style="margin-top: 0.5rem;">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title text-muted mb-3">ການຊຳລະເງິນ</h5>
                                <h6 class="display-6 animate__animated animate__fadeIn">43</h6>
                            </div>
                            <i class="bi bi-wallet2 text-warning" style="font-size: 4rem;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Dashboard content row salse -->
    @if ($setTypeReport == 'salse' || $setTypeReport == 'payment' || $setTypeReport == null)
        <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">

                <div class="text-start">
                    <h4>ລາຍງານການຂາຍ</h4>
                </div>
                <div class="text-none">
                    <div class="row gx-2 gy-2 mb-2">
                        <div class="col-4">
                            <div class="dropdown">
                                <button style="border-radius: 30px;" class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-calendar4-week"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">ທັງໝົດ</a></li>
                                <li><a class="dropdown-item" href="#">ມື້ນີ້</a></li>
                                <li><a class="dropdown-item" href="#">ອາທິດນີ້</a></li>
                                <li><a class="dropdown-item" href="#">ເດືອນນີ້</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-8">
                            <a wire:click='generateSalePDF' href="#" class="btn btn-primary" style="border-radius: 30px;">
                                <i class="bi bi-file-spreadsheet"></i>
                                &nbsp;Export<span>...</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column 1 -->
            <div class="col-xl-12">
                <div class="card h-md-100">
                    <div class="card-header bg-white">
                        <!-- Search input -->
                        <div class="input-group">
                            <span class="input-group-text" style="border: none;background-color: inherit;color: inherit;" id="search-icon">
                                <i class="bi bi-search"></i>
                            </span>
                            <input wire:model.live='searchSale' class="form-control form-control-dark" type="text" placeholder="ຊອກຫາຂໍ້ມູນ..." aria-label="Search" aria-describedby="search-icon">
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Users table -->
                        <table class="table table-responsive table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ລະຫັດ</th>
                                    <th scope="col">ຂາຍໂດຍ</th>
                                    <th scope="col">ຈຳນວນ</th>
                                    <th scope="col">ເປັນເງິນ</th>
                                    <th scope="col">ລູກຄ້າ</th>
                                    <th scope="col">ຮູບແບບຊຳລະ</th>
                                    <th scope="col">ເວລາເພີ່ມ</th>
                                </tr>
                            </thead>
                            <tbody class="animate__animated animate__fadeIn">
                                @foreach ($salse as $item)
                                <tr>
                                    <!-- User data -->
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->created_by }}</td>
                                    <td>{{ $item->total_qty }} item</td>
                                    <td>{{ number_format($item->total_price) }} ₭</td>
                                    <td>{{ $item->customer_name }} <sub>ເບີໂທ:{{ $item->customer_phone }}</sub></td>
                                    <td>
                                        @if ($item->payment == 'cash')
                                        <span class="badge bg-success">ເງິນສົດ</span>
                                        @else
                                        <span class="badge bg-warning">ເງິນໂອນ</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Pagination links -->
                        {{ $salse->links() }}
                        <!-- End of table -->
                    </div>
                </div>
                <!-- End of card -->
            </div>
        </div>
    @endif

    <!-- Dashboard content row order -->
    @if ($setTypeReport == 'order')
        <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">

                <div class="text-start">
                    <h4>ລາຍງານການສັ່ງຊື້+ນຳເຂົ້າ</h4>
                </div>
                <div class="text-none">
                    <div class="row gx-2 gy-2 mb-2">
                        <div class="col-4">
                            <div class="dropdown">
                                <button style="border-radius: 30px;" class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-calendar4-week"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">ທັງໝົດ</a></li>
                                <li><a class="dropdown-item" href="#">ມື້ນີ້</a></li>
                                <li><a class="dropdown-item" href="#">ອາທິດນີ້</a></li>
                                <li><a class="dropdown-item" href="#">ເດືອນນີ້</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-8">
                            <a wire:click='generateOrderPDF' href="#" class="btn btn-primary" style="border-radius: 30px;">
                                <i class="bi bi-file-spreadsheet"></i>
                                &nbsp;Export<span>...</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column 1 -->
            <div class="col-xl-12">
                <div class="card h-md-100">
                    <div class="card-header bg-white">
                        <!-- Search input -->
                        <div class="input-group">
                            <span class="input-group-text" style="border: none;background-color: inherit;color: inherit;" id="search-icon">
                                <i class="bi bi-search"></i>
                            </span>
                            <input wire:model.live='searchOrder' class="form-control form-control-dark" type="text" placeholder="ຊອກຫາຂໍ້ມູນ..." aria-label="Search" aria-describedby="search-icon">
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Users table -->
                        <table class="table table-responsive table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ລະຫັດ</th>
                                    <th scope="col">ສັ່ງໂດຍ</th>
                                    <th scope="col">ຈຳນວນ</th>
                                    <th scope="col">ເປັນເງິນ</th>
                                    <th scope="col">ຜູ້ສະໜອງ</th>
                                    <th scope="col">ສະຖານະ</th>
                                    <th scope="col">ເວລາເພີ່ມ</th>
                                </tr>
                            </thead>
                            <tbody class="animate__animated animate__fadeIn">
                                @foreach ($orders as $item)
                                <tr>
                                    <!-- User data -->
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->created_by }}</td>
                                    <td>{{ $item->total_qty }} item</td>
                                    <td>{{ number_format($item->total_price) }} ₭</td>
                                    <td>{{ $item->supplier }} <sub>ເບີໂທ:{{ $users->where('name',$item->supplier)->first()->phone }}</sub></td>
                                    <td>
                                        @if ($item->status == 1)
                                        <span class="badge bg-warning">ລໍຖ້າ</span>
                                        @elseif ($item->status == 2)
                                        <span class="badge bg-success">ສຳເລັດ</span>
                                        @else
                                        <span class="badge bg-danger">ຍົກເລີກ</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Pagination links -->
                        {{ $orders->links() }}
                        <!-- End of table -->
                    </div>
                </div>
                <!-- End of card -->
            </div>
        </div>
    @endif

    <!-- Dashboard content row product -->
    @if ($setTypeReport == 'product')
        <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">

                <div class="text-start">
                    <h4>ລາຍງານສິນຄ້າ</h4>
                </div>
                <div class="text-none">
                    <div class="row gx-2 gy-2 mb-2">
                        <div class="col-4">
                            <div class="dropdown">
                                <button style="border-radius: 30px;" class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-calendar4-week"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="#">ທັງໝົດ</a></li>
                                <li><a class="dropdown-item" href="#">ມື້ນີ້</a></li>
                                <li><a class="dropdown-item" href="#">ອາທິດນີ້</a></li>
                                <li><a class="dropdown-item" href="#">ເດືອນນີ້</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-8">
                            <a wire:click='generateProductPDF' href="#" class="btn btn-primary" style="border-radius: 30px;">
                                <i class="bi bi-file-spreadsheet"></i>
                                &nbsp;Export<span>...</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column 1 -->
            <div class="col-xl-12">
                <div class="card h-md-100">
                    <div class="card-header bg-white">
                        <!-- Search input -->
                        <div class="input-group">
                            <span class="input-group-text" style="border: none;background-color: inherit;color: inherit;" id="search-icon">
                                <i class="bi bi-search"></i>
                            </span>
                            <input wire:model.live='searchProduct' class="form-control form-control-dark" type="text" placeholder="ຊອກຫາຂໍ້ມູນ..." aria-label="Search" aria-describedby="search-icon">
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Users table -->
                        <table class="table table-responsive table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ລະຫັດ</th>
                                    <th scope="col">ສິນຄ້າ</th>
                                    <th scope="col">ປະເພດ</th>
                                    <th scope="col">ລາຄາຊື້</th>
                                    <th scope="col">ລາຄາຂາຍ</th>
                                    <th scope="col">ຈຳນວນ</th>
                                    <th scope="col">ເວລາເພີ່ມ</th>
                                </tr>
                            </thead>
                            <tbody class="animate__animated animate__fadeIn">
                                @foreach ($products as $item)
                                <tr>
                                    <!-- User data -->
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->category_name }}</td>
                                    <td>{{ number_format($item->price_order) }} ₭</td>
                                    <td>{{ number_format($item->price_sale) }} ₭</td>
                                    <td>{{ $item->qty }} item</td>
                                    <td>{{ $item->created_at }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Pagination links -->
                        {{ $products->links() }}
                        <!-- End of table -->
                    </div>
                </div>
                <!-- End of card -->
            </div>
        </div>
    @endif

</div>
