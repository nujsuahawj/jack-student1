<div>

    <!-- Top of dashboard -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">

        <div class="text-start">
            <h4>ຈັດການຂໍ້ມູນການສັ່ງຊື້+ນຳເຂົ້າ</h4>
        </div>
        <div class="text-none">
            <div class="row gx-2 gy-2 mb-2">
                <div class="col-3">
                    <div class="dropdown">
                        <button style="border-radius: 30px;" class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-funnel"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#" wire:click='_funnel(0)'>ທັງໝົດ</a></li>
                            @foreach ($supplier as $item)
                            <li><a class="dropdown-item" href="#" wire:click='_funnel({{ $item->name }})'>{{ $item->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-3">
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
                <div class="col-6">
                    <a href="/orders/create" wire:navigate class="btn btn-primary" style="border-radius: 30px;">
                        <i class="bi bi-plus-circle"></i>
                        &nbsp;ເພີ່ມ <span>ສິນຄ້າ</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Dashboard content row -->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">

        <!-- Column 1 -->
        <div class="col-xl-12">
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
                    <!-- Users table -->
                    <table class="table table-responsive table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ລະຫັດ</th>
                                <th scope="col">ຜູ້ສະໜອງ</th>
                                <th scope="col">ສະຖານະ</th>
                                <th scope="col">ຈຳນວນ</th>
                                <th scope="col">ເປັນເງິນ</th>
                                <th scope="col">ຜູ້ສັ່ງຊື້</th>
                                <th scope="col">ເວລາເພີ່ມ</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="animate__animated animate__fadeIn">
                            @foreach ($orderLog as $item)
                            <tr>
                                <td>
                                    {{ $item->id }}
                                </td>
                                <td>
                                    {{ $item->supplier }}
                                </td>
                                <td>
                                    @if ($item->status == 1)
                                    <span class="badge bg-warning">ລໍຖ້າ</span>
                                    @elseif ($item->status == 2)
                                    <span class="badge bg-success">ສຳເລັດ</span>
                                    @else
                                    <span class="badge bg-danger">ຍົກເລີກ</span>
                                    @endif
                                </td>
                                <td>
                                    {{ number_format($item->total_qty) }} item
                                </td>
                                <td>
                                    {{ number_format($item->total_price) }} ₭
                                </td>
                                <td>
                                    {{ $item->created_by }}
                                </td>
                                <td>
                                    <span class="text-primary">{{ $item->created_at }}</span>
                                </td>
                                <td>
                                    <a href="#" wire:navigate style="text-decoration: none; color: inherit;">
                                        <i class="bi bi-pencil-square text-primary" style="cursor: pointer;"></i>
                                    </a>
                                    &nbsp;&nbsp;&nbsp;
                                    <a href="#" wire:click="confirmClick" wire:confirm="ທ່ານແນ່ໃຈບໍ່ວ່າຕ້ອງການຍົກເລີກການສັ່ງຊື້ນີ້?" style="text-decoration: none; color: inherit;">
                                        <i class="bi bi-trash text-danger" style="cursor: pointer;"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Pagination links -->
                    {{ $orderLog->links() }}
                    <!-- End of table -->
                </div>
            </div>
            <!-- End of card -->
        </div>
    </div>
    <!-- End of row -->

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
