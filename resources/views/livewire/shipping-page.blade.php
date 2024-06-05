<div>

    <!-- Top of dashboard -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h2">Shipping Check</h1>
        <div class="dropdown">
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
                <div class="card-header">
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

</div>