<div>

    <!-- Top of dashboard -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <div class="text-start">
            <h4>ຈັດການຂໍ້ມູນລູກຄ້າ</h4>
        </div>

        <div class="text-none">
            <div class="row gx-2 gy-2 mb-2">
                <div class="col-4">
                    <div class="dropdown">
                        <button style="border-radius: 30px;" class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-funnel"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#" wire:click='_funnel(0)'>ທັງໝົດ</a></li>
                            <li><a class="dropdown-item" href="#" wire:click='_funnel(0)'>active</a></li>
                            <li><a class="dropdown-item" href="#" wire:click='_funnel(1)'>inactive</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-8">
                    <a href="/customers/create" wire:navigate class="btn btn-primary" style="border-radius: 30px;">
                        <i class="bi bi-plus-circle"></i>
                        &nbsp;ເພີ່ມ <span>ລູກຄ້າ</span>
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
                                <th scope="col">ຜູ້ໃຊ້</th>
                                <th scope="col">ສະຖານະ</th>
                                <th scope="col">ເບີໂທ</th>
                                <th scope="col">ທີ່ຢູ່</th>
                                <th scope="col">ເວລາເພີ່ມ</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="animate__animated animate__fadeIn">
                            @foreach ($userDataList as $item)
                            <tr>
                                <!-- User data -->
                                <td>
                                    <img loading="lazy" src="{{ $item->avatar }}" class="img-thumbnail" alt="user" width="50" height="auto">
                                    &nbsp; {{ $item->name }}
                                </td>
                                <td>
                                    @if($item->status == 1)
                                    <span class="badge bg-success">Active</span>
                                    @else
                                    <span class="badge bg-danger">Inactive</span>
                                    @endif
                                <td>
                                    {{ $item->phone }}
                                </td>
                                <td>
                                    {{ $item->village }}, {{ $item->district }}, {{ $item->city }}
                                </td>
                                <td>
                                    <span class="text-primary">{{ $item->created_at->format('H:s,d/m/Y') }}</span>
                                </td>
                                <td>
                                    <a href="/customers/edite/{{ $item->id }}" wire:navigate style="text-decoration: none; color: inherit;">
                                        <i class="bi bi-pencil-square text-primary" style="cursor: pointer;"></i>
                                    </a>
                                    &nbsp;&nbsp;&nbsp;
                                    <a href="#" wire:click="confirmClick({{ $item->id }})" wire:confirm="ທ່ານແນ່ໃຈບໍ່ວ່າຕ້ອງການລົບຂໍ້ມູນນີ້?" style="text-decoration: none; color: inherit;">
                                        <i class="bi bi-trash text-danger" style="cursor: pointer;"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Pagination links -->
                    {{ $userDataList->links() }}
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
