<div>

    <!-- Top of dashboard -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h4>
            ຈັດການຂໍ້ມູນປະເພດສິນຄ້າ
        </h4>
    </div>

    <!-- Dashboard content row -->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">

        <!-- Column 1 -->
        <div class="col-xl-4">
            <!-- Display payment confirmation if transaction ID exists -->
            <div class="card h-md-100">
                <div class="card-body">
                    <div class="text-center">
                        <h5 class="card-title">
                            <!-- Display form to add data -->
                            <p>
                                ເພີ່ມປະເພດສິນຄ້າ
                            </p>
                        </h5>
                        <!-- form add data -->
                        <form wire:submit="_addCategory">
                            <!-- user id input -->
                            <small class="form-text text-muted">
                                <div class="text-danger">
                                    @error('category')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </small>
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-white"><i class="bi bi-list"></i></span>
                                <textarea wire:model='category' class="form-control" aria-label="With textarea" placeholder="ລາຍການ..."></textarea>
                            </div>
                            <br />
                            <!-- submit button -->
                            <div class="d-grid mx-auto">
                                <button wire:loading.attr="disabled" class="btn btn-primary" type="submit">ເພີ່ມລາຍການ</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End of card -->
        </div>

        <!-- Column 2 -->
        <div class="col-xl-8">
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
                                <th scope="col">ປະເພດສິນຄ້າ</th>
                                <th scope="col">ຈຳນວນສິນຄ້າ</th>
                                <th scope="col">ສະຖານະ</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="animate__animated animate__fadeIn">
                            <!-- Loop through withdraw money data -->
                            @foreach ($categoryList as $item)
                            <tr>
                                <td>
                                    {{ $item->name }}
                                </td>
                                <td>
                                    {{ $allProducts->where('category_name', $item->name)->count() }}
                                </td>
                                <td>
                                    @if ($item->status == 1)
                                    <span class="badge bg-success">Active</span>
                                    @else
                                    <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <i wire:click='_editeCategory({{ $item->id }})' class="bi bi-pencil-square text-primary" style="cursor: pointer;"></i>
                                    &nbsp;&nbsp;&nbsp;
                                    <a href="#" wire:click="confirmClick({{ $item->id }})" wire:confirm="ທ່ານແນ່ໃຈບໍ່ວ່າຕ້ອງການລົບຂໍ້ມູນນີ້?" style="text-decoration: none; color: inherit;">
                                        <i class="bi bi-trash text-danger"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Pagination links -->
                    {{ $categoryList->links() }}
                    <!-- End of table -->
                </div>
            </div>
            <!-- End of card -->
        </div>

    </div>
    <!-- End of dashboard content row -->

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
