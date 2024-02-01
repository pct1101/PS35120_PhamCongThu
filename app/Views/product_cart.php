<div class="container">
    <div class="row mt-5">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Giỏ hàng</h5>
                </div>
                <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                            <th style="width: 100px">Ảnh</th>
                            <th>Sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cart as $pd) : ?>
                        <tr>
                            <td>
                                <img class="w-100" src="<?= APPURL ?>upload/product/<?= $pd['pd_img'] ?>" alt="" />
                            </td>
                            <td><?= $pd['pd_name'] ?></td>
                            <td><?= number_format($pd['pd_price'], 0, ',', '.') ?> VND</td>
                            <td><?= $pd['dt_quantity'] ?></td>
                            <td> <?= number_format($pd['dt_quantity'] * $pd['pd_price'], 0, ',', '.') ?> VND</td>
                            <td>
                                <button type="button" class="btn btn-warning">Xóa</button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="card-footer">Tổng 2 sản phẩm</div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="cart-title">Hóa đơn</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">Tổng tiền:</div>
                        <div class="col-6 text-end">
                            <strong>59.980.000</strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">Giao hàng:</div>
                        <div class="col-6 text-end">
                            <strong>32.000</strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">Khuyễn mãi</div>
                        <div class="col-6 text-end">
                            <input type="text" class="form-control" name="" id="" value="FREESHIP" />
                            <strong>-32.000</strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">Thanh toán:</div>
                        <div class="col-6 text-end">
                            <strong>59.980.000</strong>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary btn-lg w-80 d-block m-3" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Đặt hàng
                </button>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Xác nhận đơn hàng
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="exampleInputName" class="form-label">Họ tên</label>
                            <input type="text" class="form-control" id="exampleInputName"
                                aria-describedby="emailHelp" />
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPhone" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" id="exampleInputPhone"
                                aria-describedby="emailHelp" />
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputAdd" class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" id="exampleInputAdd" aria-describedby="emailHelp" />
                        </div>
                    </form>
                </div>
                <div class="modal-footer m-auto">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Đóng
                    </button>
                    <button type="button" class="btn btn-primary">Xác nhận</button>
                </div>
            </div>
        </div>
    </div>
</div>