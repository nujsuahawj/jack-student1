<div>

    <!-- Top of dashboard -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <div class="text-start">
            <h4>ເພີ່ມຂໍ້ມູນສິນຄ້າ</h4>
        </div>

        <div class="text-end">
            <a href="/products" wire:navigate class="btn btn-outline-primary" style="border-radius: 30px;">
                <i class="bi bi-chevron-compact-left"></i>
                ກັບຄືນ
            </a>
        </div>
    </div>

    <!-- Dashboard content row -->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <!-- Column 1 -->
        <div class="col-xl-12">
            <div class="card h-md-100">
                <div class="card-body">

                    <form class="row g-3" wire:submit="_createProduct">
                        <div class="col-6">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="inputName" class="form-label">ສິນຄ້າ <sub class="text-danger">*@error('name'){{ $message }}@enderror</sub></label>
                                    <input wire:model='name' type="text" class="form-control" id="inputName" placeholder="ຊື່ລາຍການສິນຄ້າ">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPrice" class="form-label">ລາຄາຊື້ <sub class="text-danger">*@error('price_order'){{ $message }}@enderror</sub></label>
                                    <input wire:model='price_order' type="number" class="form-control" id="inputPrice" placeholder="ລາຄາສິນຄ້າ">
                                </div>
                                <div class="col-md-4">
                                    <label for="inputQty" class="form-label">ລາຄາຂາຍ <sub class="text-danger">*@error('price_sale'){{ $message }}@enderror</sub></label>
                                    <input wire:model='price_sale' type="number" class="form-control" id="inputQty">
                                </div>
                                <div class="col-md-4">
                                    <label for="inputQty" class="form-label">ຈຳນວນ Stock <sub class="text-danger">*@error('qty'){{ $message }}@enderror</sub></label>
                                    <input wire:model='qty' type="number" class="form-control" id="inputQty">
                                </div>
                                <div class="col-md-4">
                                    <label for="inputState" class="form-label">ປະເພດສິນຄ້າ <sub class="text-danger">*@error('category_name'){{ $message }}@enderror</sub></label>
                                    <select wire:model='category_name' id="inputState" class="form-select">
                                        <option selected>ເລືອກ...</option>
                                        @foreach ($categories as $item)
                                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="input" class="form-label">ລາຍລະອຽດ <sub class="text-danger">*@error('description'){{ $message }}@enderror</sub></label>
                                    <textarea wire:model='description' class="form-control" aria-label="With textarea" placeholder="ລາຍການ..." rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 pt-4"><br><br>
                            <div class="text-center">
                                <h4>ຮູບພາບສິນຄ້າ</h4>
                            </div>
                            <div class="drop-container mb-3 pt-4"><br><br><br><br><br><br>
                                <label for="formFile" class="form-label">
                                    <small class="form-text text-muted">
                                        <div class="text-danger">
                                            @error('img')
                                            {{ $message }}
                                            @enderror
                                        </div>
                                    </small>
                                    ຮູບພາບຜູ້ໃຊ້
                                </label>
                                <span class="drop-title">ເລືອກຮູບ</span>
                                <input wire:model='img' type="file" accept="image/*" class="file-input form-control" />
                            </div>
                        </div><br>
                        <div class="col-12"><br><br><br><br>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary" style="border-radius: 30px;">ເພີ່ມຂໍ້ມູນ</button>
                            </div>
                        </div>
                    </form>

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
