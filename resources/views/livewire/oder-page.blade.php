<div class="animate__animated animate__fadeIn">

    <!-- Top of dashboard -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 animate__animated animate__fadeIn">
        <h1 class="h2">
            Purchases Products
        </h1>
    </div>

    <!-- Dashboard content row -->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">

        <!-- Column 1 -->
        <div class="col-xl-8">
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
                    <!-- Table for withdraw money data -->
                    <table class="table table-responsive table-hover custom-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Users</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Status</th>
                                <th scope="col">Delete</th>
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
                                    <td>
                                        adsfasd
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Pagination links -->
                    {{-- {{ $lockUserData->links() }} --}}
                    <!-- End of table -->
                </div>
            </div>
            <!-- End of card -->
        </div>

        <!-- Column 2 -->
        <div class="col-xl-4">
            <!-- Display payment confirmation if transaction ID exists -->
            <div class="card h-md-100">
                <div class="card-body">
                    <div class="text-center">
                        <h5 class="card-title">
                            <!-- Display form to add data -->
                            <p>
                                Add user to lock
                            </p>
                        </h5>
                        <!-- form add data -->
                        <form wire:submit="_addData">
                            <!-- user id input -->
                            <small class="form-text text-muted">
                                <div class="text-danger">
                                    @error('uid')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </small>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="bi bi-shield-lock"></i></span>
                                <input wire:model='uid' type="number" class="form-control" placeholder="user id" />
                            </div>
                            <br />
                            <!-- submit button -->
                            <div class="d-grid mx-auto">
                                <button wire:loading.attr="disabled" class="btn btn-success" type="submit">Add Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End of card -->
        </div>

    </div>
    <!-- End of dashboard content row -->

</div>
