<div>

    <!-- Top of dashboard -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <div class="text-start">
            <h4>
                ແກ້ໄຂຂໍ້ມູນການສັ່ງຊື້
            </h4>
        </div>
        <div class="text-end">
            <a href="/orders" wire:navigate class="btn btn-outline-primary" style="border-radius: 30px;">
                <i class="bi bi-chevron-compact-left"></i>
                ກັບຄືນ
            </a>
        </div>
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
                            <tr wire:click='_addOrderLog({{ $item->id }})'>
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
                        <table class="table table-responsive">
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
                                @foreach ($orderLog as $item)
                                <tr>
                                    <!-- User information -->
                                    <td>
                                        {{ $showProductPrice->where('id',$item->p_id)->first()->name }}
                                        <br>
                                        <small class="badge bg-success">code:{{ $item->p_id }}</small>
                                    </td>
                                    <td>
                                        {{ number_format($showProductPrice->where('id',$item->p_id)->first()->price_order) }} ₭
                                    </td>
                                    <td>
                                        {{ number_format($showProductPrice->where('id',$item->p_id)->first()->qty) }} item
                                    </td>
                                    <td>
                                        <div class="text-end">
                                            <div class="input-group input-group-sm">
                                                <button wire:click='_plusMinus(0,{{ $item->p_id }})' class="btn btn-primary" type="button" id="subtract-button"><i class="bi bi-dash"></i></button>
                                                <input type="number" value="{{ $item->p_qty }}" style="max-width: 60px;" class="form-control text-center" aria-label="User Input" aria-describedby="subtract-button add-button">
                                                <button wire:click='_plusMinus(1,{{ $item->p_id }})' class="btn btn-primary" type="button" id="add-button"><i class="bi bi-plus"></i></button>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        {{ number_format($showProductPrice->where('id',$item->p_id)->first()->price_order * $item->p_qty) }} ₭
                                    </td>
                                    <td>
                                        <i wire:click='_removeProduct({{ $item->p_id }})' class="bi bi-trash text-danger" style="cursor: pointer;"></i>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- button submit -->
                        @if ($orderLog && $orderLog->count() > 0)
                        <div class="row gx-2 gy-2 animate__animated animate__fadeIn">
                            <div class="col-6">
                                <div class="input-group" style="margin-left: 0.5rem;margin-top: 0.5rem;">
                                    <label for="inputState" class="form-label"><sub class="text-danger">@error('category_name'){{ $message }}@enderror</sub></label>
                                    <select wire:model='supplierSet' id="inputState" class="form-select">
                                        <option selected>ເລືອກ...</option>
                                        @foreach ($supplier as $item)
                                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="input-group-text bg-white" id="user-icon">
                                        <i class="bi bi-people"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-6 text-end">
                                <p>ຈຳນວນລາຍການ:&nbsp;<b><i>{{ $totalQty }}&nbsp;item</i></b>&nbsp;</p>
                                <p>ເປັນເງິນທັງໝົດ:&nbsp;<b><i>{{ $totalPrice }}&nbsp;ກີບ</i></b>&nbsp;</p>
                            </div>
                            <div class="col-12 text-end">
                                <button wire:click='_doneOrder(3)' class="btn btn-light" style="border-radius: 30px;">ຍົກເລີກ</button>
                                <button wire:click='_doneOrder(2)' class="btn btn-primary" style="border-radius: 30px;">ສົ່ງສຳເລັດ</button>
                            </div>
                        </div>
                        @else
                        <div class="text-center pt-4">
                            <p>ກະລຸນາເພີ່ມສິນຄ້າກ່ອນ</p>
                            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                        </div>
                        @endif

                    </div>
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
