<div class="container">
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-end">
                    <a href="<?= APPURL ?>admin/product_add" class="btn btn-warning"> Thêm sản phẩm</a>
                </div>
                <table class="table align-middle mb-0 text-center">
                    <thead>
                        <tr>
                            <th style="width: 100px">Ảnh</th>
                            <th>Sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Nổi bật</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listProduct as $pd) : ?>
                        <tr>
                            <td>
                                <img class="w-100" src="<?= APPURL ?>upload/product/<?= $pd['pd_img'] ?>" alt="" />
                            </td>
                            <td><?= $pd['pd_name'] ?></td>
                            <td>Giá sản phẩm</td>
                            <td><?= number_format($pd['pd_price'], 0, ',', '.') ?> VND</td>
                            <td><?= $pd['pd_status'] ?></td>
                            <td>
                                <a href="" class="btn btn-success">Sửa</a>
                                <a href="<?= APPURL ?>admin/delete_product/<?= $pd['pd_id'] ?>" class="btn btn-warning"
                                    onclick="return confirm('Bạn muốn xóa sản phẩm?')">Xóa</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>