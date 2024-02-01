<form action="" method="POST" enctype="multipart/form-data">
    <div id="top" class="sa-app__body">
        <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
            <div class="container">
                <div class="py-5">
                    <div class="row g-4 align-items-center">
                        <div class="col">
                            <h1 class="h3 m-0">Thêm sản phẩm</h1>
                        </div>
                        <div class="col-auto d-flex">
                            <button type="submit" name="submit" value="submit" class="btn btn-primary">Xác
                                nhận</button>
                        </div>
                    </div>
                </div>
                <div class="sa-entity-layout"
                    data-sa-container-query='{"780":"sa-entity-layout--size--md","980":"sa-entity-layout--size--lg"}'>
                    <div class="sa-entity-layout__body">
                        <div class="sa-entity-layout__main">
                            <div class="card">
                                <div class="card-body p-5">
                                    <div class="mb-5">
                                        <h2 class="mb-0 fs-exact-18">Thông tin sản phẩm</h2>
                                    </div>
                                    <div class="mb-4">
                                        <label for="name" class="form-label">Tên sản phẩm</label>
                                        <input type="text" class="form-control" id="name" name="name" />
                                    </div>
                                    <div class="mb-5">
                                        <h2 class="mb-0 fs-exact-18">Giá sản phẩm</h2>
                                    </div>
                                    <div class="row g-4">
                                        <div class="col">
                                            <label for="price" class="form-label">Giá gốc</label>
                                            <input type="number" class="form-control" id="price" name="price" />
                                        </div>
                                    </div>
                                    <!-- <div class="card-body p-5">
                                        <label for="img" class="form-label">Chọn hình ảnh sản phẩm</label>
                                        <div class="mt-n5">
                                            <img id="image" src="" alt="" class="w-100">
                                            <input type="file" class="form-controller" id="img" name="img" onchange="chooseFile(this)">
                                        </div>
                                    </div> -->
                                    <div class="mb-5">
                                        <h2 class="mb-0 fs-exact-18">Tình trạng sản phẩm</h2>
                                    </div>
                                    <div class="row g-4">
                                        <div class="col">
                                            <label for="quantity" class="form-label">Số lượng sản phẩm</label>
                                            <input type="number" class="form-control" id="quantity" name="quantity" />
                                        </div>
                                        <div class="col">
                                            <label for="status" class="form-label">Nổi bật</label>
                                            <select class="sa-select2 form-select" name="status">
                                                <option value="normal">Normal</option>
                                                <option value="new">New</option>
                                                <option value="hot">Hot</option>
                                                <option value="flashsale">Flash Sale</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</form>