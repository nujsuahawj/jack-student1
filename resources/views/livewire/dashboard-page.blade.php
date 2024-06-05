<div class="animate__animated animate__fadeIn">

    <!-- Top of dashboard -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h2">Dashboard</h1>
    </div>

    <!-- Dashboard content row 1 -->
    <div class="row g-5 g-xl-10 mb-2 mb-xl-10">

        <!-- Col 1 -->
        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
            <!-- Top card -->
            <div class="card h-md-50 mb-5 mb-xl-10">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title text-muted mb-3">ການຂາຍທັງໝົດ</h5>
                        <h6 class="display-6">34534</h6>
                    </div>
                    <i class="bi bi-grid text-success" style="font-size: 4rem;"></i>
                </div>
            </div>
            <!-- Button card -->
            <div class="card h-md-50 mb-xl-10">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title text-muted mb-3">ການຂາຍມື້ນີ້</h5>
                        <h6 class="display-6">345</h6>
                    </div>
                    <i class="bi bi-cart-plus text-info" style="font-size: 4rem;"></i>
                </div>
            </div>
            <!-- End card -->
        </div>

        <!-- Col 2 -->
        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5 mb-xl-10">
            <!-- Top card -->
            <div class="card h-md-50 mb-5 mb-xl-10">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title text-muted mb-3">ນຳເຂົ້າທັງໝົດ</h5>
                        <h6 class="display-6">345</h6>
                    </div>
                    <i class="bi bi-cart-check text-primary" style="font-size: 4rem;"></i>
                </div>
            </div>
            <!-- Button card -->
            <div class="card h-md-50 mb-xl-10">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title text-muted mb-3">ລາຍຮັບມື້ນີ້</h5>
                        <h6 class="display-6">345</h6>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-currency-dollar text-warning" viewBox="0 0 16 16">
                        <path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73z" />
                    </svg>
                </div>
            </div>
            <!-- End card -->
        </div>

        <!-- Col 3 -->
        <div class="col-xxl-6">
            <div class="card h-md-100 mb-xl-10">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div class="text-dark">
                        <h5 class="card-title text-muted mb-3">ຈຳນວນເງິນການຂາຍທັງໝົດ</h5>
                        <h6 class="display-6">3454</h6>
                    </div>
                    <i class="bi bi-wallet2 text-success" style="font-size: 8rem;"></i>
                </div>
            </div>
            <!-- End card -->
        </div>

    </div>

    <!-- Dashboard content row 2 -->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">

        <!-- Col 1 -->
        <div class="col-xl-8">
            <div class="card h-md-100">
                <div class="card-body">
                    <h5 class="card-title text-muted mb-3">Top 10 ລາຍການສິນຄ້າຂາຍດີ</h5>
                    <!-- Title -->
                    <table class="table table-responsive table-hover custom-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Users</th>
                                <th scope="col">Auth</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Level</th>
                                <th scope="col">View</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataList as $item)
                            <tr>
                                <th scope="row">345</th>
                                <td>345</td>
                                <td>34</td>
                                <td>
                                    345
                                </td>
                                <td>34534</td>
                                <td><i class="bi bi-arrow-right-short"></i></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End table -->
                </div>
            </div>
        </div>
        <!-- Col 2 -->
        <div class="col-xl-4">
            <div class="card h-md-100">
                <div class="card-body">
                    <h5 class="card-title text-muted mb-3">
                        Top 10 ລາຍການສິນຄ້າໃກ້ໝົດ
                    </h5>
                    <!-- Title -->
                    <table class="table table-responsive table-hover custom-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Users</th>
                                <th scope="col">Money</th>
                                <th scope="col">View</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataList as $item)
                            <tr>
                                <th scope="row">asdf</th>
                                <td>asdf</td>
                                <td>
                                    asdfsd
                                </td>
                                <td><i class="bi bi-arrow-right-short"></i></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End table -->
                </div>
            </div>
        </div>
    </div>

</div>
