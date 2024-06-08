<div>

    <!-- Top of dashboard -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <div class="text-start">
            <h4>
                ຂໍ້ມູນລາຍລະອຽດການສັ່ງຊື້
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
        <!-- Column 2 -->
        <div class="col-xl-12">
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
                                    <th scope="col">ຮູບພາບ</th>
                                    <th scope="col">ສິນຄ້າ</th>
                                    <th scope="col">ລາຄາ</th>
                                    <th scope="col">ຈຳນວນ</th>
                                    <th scope="col">ລາຄາລວມ</th>
                                </tr>
                            </thead>
                            <tbody class="animate__animated animate__fadeIn">
                                @foreach ($orderLog as $item)
                                <tr>
                                    <!-- User information -->
                                    <td>
                                        <img loading="lazy" src="{{ $showProductPrice->where('id',$item->p_id)->first()->img }}" class="img-thumbnail" alt="user" width="50" height="auto">
                                    </td>
                                    <td>
                                        {{ $showProductPrice->where('id',$item->p_id)->first()->name }}
                                        <br>
                                        <small class="badge bg-success">code:{{ $item->p_id }}</small>
                                    </td>
                                    <td>
                                        {{ number_format($showProductPrice->where('id',$item->p_id)->first()->price_order) }} ₭
                                    </td>
                                    <td>
                                        {{ number_format($item->p_qty) }} item
                                    </td>
                                    <td>
                                        {{ number_format($showProductPrice->where('id',$item->p_id)->first()->price_order * $item->p_qty) }} ₭
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table><br><br><br>
                        <!-- button submit -->
                        @if ($orderLog && $orderLog->count() > 0)
                        <div class="row gx-2 gy-2 animate__animated animate__fadeIn">
                            <div class="col-6">
                                <p>ຜູ້ສະໜອງ:&nbsp;<b><i>{{ $supplier }}</i></b></p>
                                <p>ຜູ້ສັ່ງຊື້+ນຳເຂົ້າ:&nbsp;<b><i>{{ $created_by }}</i></b></p>
                            </div>
                            <div class="col-6 text-end">
                                <p>ວັນທີສັ່ງຊື້:&nbsp;<b><i>{{ $createAt }}</i></b></p>
                                <p>ວັນທີຈັດການ:&nbsp;<b><i>{{ $updateAt }}</i></b></p>
                                <p>ຈຳນວນລາຍການ:&nbsp;<b><i>{{ $totalQty }}&nbsp;item</i></b>&nbsp;</p>
                                <p>ເປັນເງິນທັງໝົດ:&nbsp;<b><i>{{ $totalPrice }}&nbsp;ກີບ</i></b>&nbsp;</p>
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

</div>
