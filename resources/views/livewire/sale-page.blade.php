<div class="pt-2">

    <div class="row gx-2 gy-2">

        <!-- row left -->
        <div class="col-4 col-sm-4 col-md-4">
            <div class="card">
                <!-- sear input -->
                <div class="input-group">
                    <span class="input-group-text bg-white" style="border: none;" id="user-icon">
                        <i class="bi bi-list-ul"></i>
                    </span>
                    <input type="text" class="form-control" style="border: none;" placeholder="ລູກຄ້າ..." aria-label="User Input" aria-describedby="user-icon add-button">
                    <button class="btn btn-primary" type="button" id="add-button"><i class="bi bi-person-plus"></i>&nbsp;ເພີ່ມ</button>
                </div>

                <!-- result list -->
                  {{-- <div class="list border-bottom">
                    <i class="fa fa-fire"></i>
                    <div class="d-flex flex-column ml-3">
                      <span>Client communication policy</span>
                      <small>#politics - may - @max</small>
                    </div>
                  </div> --}}
            </div>
            <!-- conten and button -->
            <div class="card h-100" style="margin-top: 0.5rem;">
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">QTY</th>
                            <th scope="col">Price</th>
                            <th scope="col">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Loop through withdraw money data -->
                        @foreach ($dataList as $item)
                            <tr>
                                <!-- User information -->
                                <td>
                                    35345
                                </td>
                                <td>
                                    sdfasdf
                                </td>
                                <td>
                                    adfads
                                </td>
                                <td>
                                    adfasd
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- button submit -->
                <div class="row gx-2 gy-2">
                    <div class="col-6">
                        <div class="input-group" style="margin-left: 0.5rem;margin-top: 0.5rem;">
                            <input type="text" class="form-control" placeholder="tax..." aria-label="User Input" aria-describedby="user-icon add-button">
                            <span class="input-group-text bg-white" id="user-icon">
                                <i class="bi bi-percent"></i>
                            </span>
                        </div>
                        <div class="input-group" style="margin-left: 0.5rem;margin-top: 0.5rem;">
                            <input type="text" class="form-control" placeholder="tax..." aria-label="User Input" aria-describedby="user-icon add-button">
                            <span class="input-group-text bg-white" id="user-icon">
                                <i class="bi bi-currency-dollar"></i>
                            </span>
                        </div>
                    </div>
                    <div class="col-6 text-end">
                        <p>Total QTY:12&nbsp;</p>
                        <p>Subtotal:12&nbsp;</p>
                        <p>Total:12&nbsp;</p>
                    </div>
                    <div class="col-6 text-center justify-center">
                        <button type="button" class="btn btn-warning">Primary</button>
                    </div>
                    <div class="col-6 text-center justify-center">
                        <button type="button" class="btn btn-primary">Primary</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- row right -->
        <div class="col-8 col-sm-8 col-md-8">
            <div class="row gx-2 gy-2">
                <!-- sear input -->
                <div class="col-10 col-sm-10 col-md-10">
                    <div class="card">
                        <div class="input-group">
                            <span class="input-group-text bg-white" style="border: none;" id="user-icon">
                                <i class="bi bi-search"></i>
                            </span>
                            <input type="text" class="form-control" style="border: none;" placeholder="ສິນຄ້າ..." aria-label="User Input" aria-describedby="user-icon add-button">
                        </div>
                    </div>
                </div>
                <!-- pending list -->
                <div class="col-1 col-sm-1 col-md-1">
                    <div class="card h-100">
                        <button class="btn btn-info" type="button" id="add-button"><i class="bi bi-list-task"></i></button>
                    </div>
                </div>
                <!-- button go to the dashdashboard -->
                <div class="col-1 col-sm-1 col-md-1">
                    <div class="card h-100">
                        <button class="btn btn-danger" type="button" wire:click="delete" wire:confirm="Are you sure you want to delete this post?">
                            <i class="bi bi-pie-chart"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="card h-100" style="margin-top: 0.5rem;">
                <div class="gx-2 gy-2 d-flex pt-2" style="margin-left: 0.5rem;">
                    <button type="button" class="btn btn-primary">Primary</button>
                    <button type="button" class="btn btn-light" style="margin-left: 0.5rem;">Primary</button>
                    <button type="button" class="btn btn-light" style="margin-left: 0.5rem;">Primary</button>
                    <button type="button" class="btn btn-light" style="margin-left: 0.5rem;">Primary</button>
                    <button type="button" class="btn btn-light" style="margin-left: 0.5rem;">Primary</button>
                    <button type="button" class="btn btn-light" style="margin-left: 0.5rem;">Primary</button>
                    <button type="button" class="btn btn-light" style="margin-left: 0.5rem;">Primary</button>
                    <button type="button" class="btn btn-light" style="margin-left: 0.5rem;">Primary</button>
                    <button type="button" class="btn btn-light" style="margin-left: 0.5rem;">Primary</button>
                    <button type="button" class="btn btn-light" style="margin-left: 0.5rem;">Primary</button>
                </div>
                <div class="row gx-2 gy-2 d-flex pt-2" style="margin-left: 0.5rem;">
                    @foreach ($listData as $data)
                        <div class="col-2 col-sm-2 col-md-2 bg-light">
                            <img src="https://blog.aspose.com/pdf/find-and-replace-text-in-pdf-files-using-cpp/images/Find-and-Replace-Text-in-PDF.jpg" class="card-img-top" alt="image">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">card's content.</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>

</div>
