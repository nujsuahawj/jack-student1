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
                    <input wire:model.live='searchc' type="text" class="form-control" style="border: none;" placeholder="ລູກຄ້າ..." aria-label="User Input" aria-describedby="user-icon add-button">
                    <button wire:click="newrouteU" wire:confirm="Are you sure you want to delete this post?" class="btn btn-primary" type="button" id="add-button"><i class="bi bi-person-plus"></i>&nbsp;ເພີ່ມ</button>
                </div>

                <!-- result list -->
                @foreach ($customer as $item)
                <div wire:click="setU('{{ $item->name }}','{{ $item->phone }}')" class="list border-bottom" style="margin-left: 2rem;">
                    <div class="d-flex flex-column ml-3" style="cursor: pointer;">
                        <span>
                            {{ $item->name }}
                            <small>
                                {{ $item->phone }}
                            </small>
                        </span>
                    </div>
                </div>
                @endforeach
                @if ($setUName)
                <div class="list border-bottom" style="margin-left: 2rem;">
                    <div class="d-flex flex-column ml-3">
                        <span>
                            {{ $setUName }}
                            <small>
                                {{ $setUPhone }}
                            </small>
                        </span>
                    </div>
                </div>
                @endif
            </div>
            <!-- conten and button -->
            <div class="card h-100" style="margin-top: 0.5rem;">
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">ສິນຄ້າ</th>
                            <th scope="col">ຈຳນວນ</th>
                            <th scope="col">ລາຄາ</th>
                            <th scope="col">ລາຄາລວມ</th>
                        </tr>
                    </thead>
                    <tbody class="animate__animated animate__fadeIn">
                        <!-- Loop through withdraw money data -->
                        @if ($allSaleLog && $allSaleLog->count() > 0)

                        @foreach ($allSaleLog as $item)
                        <tr>
                            <!-- User information -->
                            <td>
                                {{ $productsShow->where('id',$item->p_id)->first()->name }}
                            </td>
                            <td>
                                <div class="text-end">
                                    <div class="input-group input-group-sm">
                                        <button class="btn btn-white" type="button" id="subtract-button"><i class="bi bi-dash"></i></button>
                                        <input type="number" value="{{ $item->p_qty }}" style="max-width: 60px;border: none;" class="form-control text-center" aria-label="User Input" aria-describedby="subtract-button add-button">
                                        <button class="btn btn-white" type="button" id="add-button"><i class="bi bi-plus"></i></button>
                                    </div>
                                </div>
                            </td>
                            <td>
                                {{ number_format($productsShow->where('id',$item->p_id)->first()->price_sale) }} ₭
                            </td>
                            <td>
                                {{ number_format($item->p_qty * $productsShow->where('id',$item->p_id)->first()->price_sale) }} ₭
                                <i wire:click='_removeSaleLog({{ $item->p_id }})' class="bi bi-trash text-danger" style="cursor: pointer;"></i>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="4" class="text-center">
                                <br><br><br>ຍັງບໍ່ມີຂໍ້ມູນ<br><br><br> <br><br><br> <br><br><br> <br><br><br>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>

                <!-- button submit -->
                <div class="row gx-2 gy-2">
                    <div class="col-6">
                        <div class="input-group" style="margin-left: 0.5rem;margin-top: 0.5rem;">
                            <input type="text" class="form-control" placeholder="ສ່ວນຫຼຸດ..." aria-label="User Input" aria-describedby="user-icon add-button">
                            <span class="input-group-text bg-white" id="user-icon">
                                <i class="bi bi-percent"></i>
                            </span>
                        </div>
                        <div class="input-group" style="margin-left: 0.5rem;margin-top: 0.5rem;">
                            <input type="text" class="form-control" placeholder="ມູນຄ່າເພີ່ມ..." aria-label="User Input" aria-describedby="user-icon add-button">
                            <span class="input-group-text bg-white" id="user-icon">
                                <i class="bi bi-currency-dollar"></i>
                            </span>
                        </div>
                        <div class="input-group" style="margin-left: 0.5rem;margin-top: 0.5rem;">
                            <select wire:model='setPayType' id="inputState" class="form-select">
                                <option selected>ເລືອກ...</option>
                                <option value="cash">ເງິນສົດ</option>
                                <option value="bcel">ເງິນໂອນ</option>
                            </select>
                            <span class="input-group-text bg-white" id="user-icon">
                                <i class="bi bi-credit-card"></i>
                            </span>
                        </div>
                    </div>
                    <div class="col-6 text-end">
                        <p>ຈຳນວນລາຍການ:&nbsp;<b><i>{{ $totalQty }}&nbsp;item</i></b>&nbsp;</p>
                        <p>ລວມທັງໝົດ:&nbsp;<b><i>{{ $totalPrice }}&nbsp;₭</i></b>&nbsp;</p>
                        <p>ເປັນເງິນ:&nbsp;<b><i>{{ $totalPrice }}&nbsp;₭</i></b>&nbsp;</p>
                    </div>
                    <div class="col-6 text-center justify-center">
                        <button wire:click="_cancelSale" wire:confirm="Are you sure you want to delete this post?" type="button" class="btn btn-light">ຍົກເລີກ</button>
                    </div>
                    <div class="col-6 text-center justify-center">
                        <button wire:click='_saveSaleLog' type="button" class="btn btn-primary">ຂາຍ && print</button>
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
                            <input wire:model.live='search' type="text" class="form-control" style="border: none;" placeholder="ສິນຄ້າ..." aria-label="User Input" aria-describedby="user-icon add-button">
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
                        <button class="btn btn-danger" type="button" wire:click="newroute" wire:confirm="Are you sure you want to delete this post?">
                            <i class="bi bi-pie-chart"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="card h-100" style="margin-top: 0.5rem;">
                <div class="gx-2 gy-2 d-flex pt-2" style="margin-left: 0.5rem;">
                    @if ($category == 0)
                    <button wire:click='_funnel(0)' type="button" class="btn btn-primary">ທັງໝົດ</button>
                    @foreach ($categories as $item)
                    <button wire:click="_funnel('{{ $item->name }}')" type="button" class="btn btn-light" style="margin-left: 0.5rem;">{{ $item->name }}</button>
                    @endforeach
                    @else
                    <button wire:click='_funnel(0)' type="button" class="btn btn-light">ທັງໝົດ</button>
                    <button wire:click="_funnel('{{ $category }}')" type="button" class="btn btn-primary" style="margin-left: 0.5rem;">{{ $category }}</button>
                    @endif
                </div>
                <div class="row gx-1 gy-1 d-flex pt-2 text-center justify-center">
                    @foreach ($products as $item)
                    <div class="col-2">
                        <div class="card h-100 bg-light" style="margin-left: 0.8rem;" wire:click='_addSaleLog({{ $item->id }})'>
                            <img src="{{ $item->img }}" width="80" height="auto" class="card-img-top animate__animated animate__fadeIn" alt="image">
                            <div class="card-body">
                                <p class="card-text">{{ $item->name }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>

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
