<div>

    <!-- Top of dashboard -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h4>
            ຈັດການຂໍ້ມູນການສັ່ງຊື້ແລະນຳເຂົ້າ
        </h4>
    </div>

    <!-- Dashboard content row -->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">

        <!-- Column 1 -->
        <div class="col-xl-4">
            <div class="card h-md-100">
                <div class="card-header bg-white">
                    <!-- Search input -->
                    <div class="input-group">
                        <span class="input-group-text" style="border: none;background-color: inherit;color: inherit;" id="search-icon">
                            <i class="bi bi-search"></i>
                        </span>
                        <input wire:model.live='search' class="form-control form-control-dark" type="text" placeholder="ຊອກຫາຂໍ້ມູນ..." aria-label="Search" aria-describedby="search-icon">
                    </div>
                </div>
                <div class="card-body">
                    <!-- Table for withdraw money data -->
                    <table class="table table-responsive table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ສິນຄ້າ</th>
                                <th scope="col">ລາຄາ</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="animate__animated animate__fadeIn">
                            <!-- Loop through withdraw money data -->
                            @foreach ($dataList as $item)
                            <tr>
                                <!-- User information -->
                                <td>
                                    {{ $item->id }}
                                </td>
                                <td>
                                    {{ number_format($item->price_order) }} ₭
                                </td>
                                <td class="text-center justify-center">
                                    <i class="bi bi-cart4 text-primary" style="cursor: pointer;"></i>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Pagination links -->
                    {{ $dataList->links() }}
                    <!-- End of table -->
                </div>
            </div>
            <!-- End of card -->
        </div>

        <!-- Column 2 -->
        <div class="col-xl-8">
            <!-- Display payment confirmation if transaction ID exists -->
            <div class="card h-md-100">
                <div class="card-body">
                    <div class="text-center">
                        <h5 class="card-title">
                            <!-- Display form to add data -->
                            <p>
                                ລາຍລະອຽດການສັ່ງຊື້ສິນຄ້າ
                            </p>
                        </h5>
                        <table class="table table-responsive table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ສິນຄ້າ</th>
                                    <th scope="col">ລາຄາ</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col">ຈຳນວນ</th>
                                    <th scope="col">ລາຄາລວມ</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody class="animate__animated animate__fadeIn">
                                <tr>
                                    <!-- User information -->
                                    <td>
                                        345345345
                                    </td>
                                    <td>
                                        3453434534534
                                    </td>
                                    <td>
                                        10
                                    </td>
                                    <td>
                                        <div class="text-end">
                                            <div class="input-group input-group-sm">
                                                <button class="btn btn-primary" type="button" id="subtract-button"><i class="bi bi-dash"></i></button>
                                                <input type="number" value="10" style="max-width: 60px;" class="form-control text-center" aria-label="User Input" aria-describedby="subtract-button add-button">
                                                <button class="btn btn-primary" type="button" id="add-button"><i class="bi bi-plus"></i></button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        345345345345
                                    </td>
                                    <td>
                                        <i class="bi bi-trash text-danger" style="cursor: pointer;"></i>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End of card -->
        </div>

    </div>
    <!-- End of dashboard content row -->

</div>
