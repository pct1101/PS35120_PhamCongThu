<main id="main">
    <section class="biosec container flex banner">
        <div class="bio">
            <h4>Xin chào!</h4>
            <h1>
                <div>
                    <span class="multi-text">Titanium</span>
                    <span class="blink"></span>
                </div>
            </h1>
            <p>
                "iPhone 15, Iphone 15 Pro là bước tiến đột phá tiếp theo của Apple với
                thiết kế tinh tế, công nghệ hiện đại và tính năng độc đáo, hứa hẹn
                mang đến trải nghiệm người dùng vô song trong thế giới di động."
            </p>
            <div class="bio-follow">
                <div class="follow">
                    <h4>Xem thêm</h4>
                </div>
            </div>
        </div>
        <div class="bioimg">
            <img src="<?= APPURL ?>upload/product/iphone-15-pro-max-gold-thumbtz-650x650.png" alt="" />
        </div>
    </section>
    <section class="container hottopics flex p-t-5">
        <div class="topics">
            <h3>Flash Safe</h3>
            <p>Đừng bỏ lỡ các sản phẩm của chúng tôi!</p>
            <div class="lrbtn">
                <button class="btn-fs leftbtn">
                    <i class="fa-solid fa-arrow-left"></i>
                </button>
                <button class="btn-fs rightbtn">
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>
        </div>
        <div class="hotcards flex">
            <?php foreach ($pd_FlashSale as $product) : ?>
                <div class="hcard">
                    <a href="">
                        <img src="<?= APPURL ?>upload/product/<?= $product['pd_img'] ?>" alt="" />
                        <div class="hdetails">
                            <div class="hdetail">
                                <h4><?= $product['pd_name'] ?></h4>
                                <p><?= number_format($product['pd_price'], 0, ',', '.') ?></p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <section class="container body-card-sale p-t-5 p-b-5">
        <div class="container-card-sale">
            <?php foreach ($listProduct as $pd) : ?>
                <div class="card-sale">
                    <div class="imgBx">
                        <img src="<?= APPURL ?>upload/product/<?= $pd['pd_img'] ?>" />
                    </div>
                    <div class="contentBx">
                        <h2 class="h2-txt"><?= $pd['pd_name'] ?></h2>
                        <h5><?= number_format($pd['pd_price'], 0, ',', '.') ?> VND</h5>
                        <a href="<?= APPURL ?>product/addToCart/<?= $pd['pd_id'] ?>" class="btn-buynow">Buy Now</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</main>