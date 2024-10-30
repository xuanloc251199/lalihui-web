<?php 

    include './config/connect_db.php';
    include 'header.php';

    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    // Kiểm tra xem có sản phẩm nào với slug đó không
    if ($result && $result->num_rows > 0) {
        $product = $result->fetch_assoc(); // Lấy dữ liệu sản phẩm
        $product_name = $product['prd_name'];
    } else {
        echo "Không tìm thấy sản phẩm.";
        exit;
    }// Gọi file chứa hàm tạo slug

    include './helper/slugify.php';

?>
        <!-- Homepage content start -->
        <main>
            <!-- Hero section start -->
            <section class="hero">
                <div class="container d-xl-flex align-items-start">
                    <div class="hero_about col-xl-6">
                        <div class="hero_header">
                            <h1 class="hero_header-title">Tiểu đề slider</h1>
                            <p class="hero_header-text">
                                Mô tả ngắn: Habitasse platea dictumst quisque sagittis purus sit. Dignissim enim sit amet venenatis. In est ante in nibh
                                mauris cursus mattis. Euismod elementum nisi quis eleifend quam adipiscing
                            </p>
                            <a class="hero_header-btn btn" href="shop.html">Our Products</a>
                        </div>
                        <div class="hero_contacts">
                            <!-- <p class="hero_contacts-text">Our support team is available 24/7 to resolve any product issues</p> -->
                            <span class="hero_contacts-data d-flex flex-column flex-sm-row align-items-center">
                                <span class="icon d-flex align-items-center justify-content-center">
                                    <i class="icon-call"></i>
                                </span>
                                <span class="d-flex flex-column">
                                    <span>Hotline</span>
                                    <a class="link" href="tel:+1234567890">+84-666-888-666</a>
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="hero_promo col-xl-6">
                        <div class="hero_promo-underlay"></div>
                        <div class="hero_promo-underlay--highlight"></div>
                        <div class="hero_slider swiper">
                            <div class="swiper-wrapper">
                                <?php 
                                    // Câu lệnh truy vấn để lấy top 3 sản phẩm dựa trên giá cả
                                    $sql = "SELECT * FROM products ORDER BY price DESC LIMIT 3";
                                    $result = $conn->query($sql);
                                    // Kiểm tra và hiển thị dữ liệu
                                    if ($result->num_rows > 0) {
                                        // Duyệt qua từng dòng dữ liệu và hiển thị
                                        while ($row = $result->fetch_assoc()) { ?>
                                            <div class=" hero_slider-slide d-flex flex-column flex-md-row justify-content-between justify-content-md-start align-items-md-center swiper-slide ">
                                                <div class="hero_slider-slide_media">
                                                    <picture>
                                                        <source data-srcset="./img/products/un-background/<?php echo $row["thumbnail"]; ?>" srcset="./img/products/un-background/<?php echo $row["thumbnail"]; ?>" type="image/webp" />
                                                        <img class="lazy" data-src="./img/products/un-background/<?php echo $row["thumbnail"]; ?>" src="./img/products/un-background/<?php echo $row["thumbnail"]; ?>" alt="media" />
                                                    </picture>
                                                </div>
                                                <div class="hero_slider-slide_main">
                                                    <h2 class="title"><?php echo $row["prd_name"]; ?></h2>
                                                    <p class="text">
                                                        <?php echo $row["detail"]; ?>
                                                    </p>
                                                    <!-- <ul class="list">
                                                        <li class="list-item d-flex align-items-center justify-content-center justify-content-sm-start">
                                                            <span class="icon d-flex align-items-center justify-content-center">
                                                                <i class="icon-check"></i>
                                                            </span>
                                                            Sativa-Dominant
                                                        </li>
                                                        <li class="list-item d-flex align-items-center justify-content-center justify-content-sm-start">
                                                            <span class="icon d-flex align-items-center justify-content-center">
                                                                <i class="icon-check"></i>
                                                            </span>
                                                            THC 110.0-160.0mg/g
                                                        </li>
                                                        <li class="list-item d-flex align-items-center justify-content-center justify-content-sm-start">
                                                            <span class="icon d-flex align-items-center justify-content-center">
                                                                <i class="icon-check"></i>
                                                            </span>
                                                            CBD 0.0-1.0mg/g
                                                        </li>
                                                    </ul> -->
                                                    <a class="btn--underline" href="#">About Product</a>
                                                </div>
                                            </div>                                            
                                        <?php }
                                    } else {
                                        echo "Không có kết quả nào.";
                                    }
                                ?>
                                
                            </div>
                            <div class="hero-pagination swiper-pagination d-sm-flex flex-column"></div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Hero section end -->
            <!-- Featured products section start -->
            <section class="featured section--nopb">
                <div class="container">
                    <div class="featured_header">
                        <h2 class="featured_header-title">Featured Products</h2>
                        <p class="featured_header-text">
                            Suscipit tellus mauris a diam maecenas sed enim ut sem. Turpis egestas maecenas pharetra convallis posuere
                        </p>
                    </div>
                    <div class="products_list d-grid">
                        <?php 
                            $sql = "SELECT * FROM products ORDER BY id LIMIT 6";
                            $result = $conn->query($sql);
                            // Kiểm tra và hiển thị dữ liệu
                            if ($result->num_rows > 0) {
                                // Duyệt qua từng dòng dữ liệu và hiển thị
                                while ($row = $result->fetch_assoc()) { ?>
                                    <div class="products_list-item">
                                        <div class="products_list-item_wrapper d-flex flex-column">
                                            <div class="media">
                                                <a href="product?id=<?php echo $row['id']?>&<?php echo $slug = createSlug($row["prd_name"]); ?>"  rel="noopener norefferer">
                                                    <picture>
                                                        <source data-srcset="./img/products/un-background/<?php echo $row["thumbnail"]; ?>" srcset="./img/products/un-background/<?php echo $row["thumbnail"]; ?>" type="image/webp" />
                                                        <img
                                                            class="lazy preview"
                                                            data-src="./img/products/un-background/<?php echo $row["thumbnail"]; ?>"
                                                            src="./img/products/un-background/<?php echo $row["thumbnail"]; ?>"
                                                            alt="Tangerine Dream"
                                                        />
                                                    </picture>
                                                </a>
                                                <div class="overlay d-flex justify-content-between align-items-start">
                                                    <div class="action d-flex flex-column">
                                                        <!-- <a
                                                            class="action_link d-flex align-items-center justify-content-center"
                                                            href="#"
                                                            data-trigger="compare"
                                                        >
                                                            <i class="icon-compare"></i>
                                                        </a> -->
                                                        <a
                                                            class="action_link d-flex align-items-center justify-content-center"
                                                            href="#"
                                                            data-role="wishlist"
                                                        >
                                                            <i class="icon-heart"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="main d-flex flex-column align-items-center justify-content-between">
                                                <div class="main_rating">
                                                    <ul class="main_rating-stars d-flex align-items-center justify-content-center accent">
                                                        <li class="main_rating-stars_star">
                                                            <i class="icon-star_fill"></i>
                                                        </li>
                                                        <li class="main_rating-stars_star">
                                                            <i class="icon-star_fill"></i>
                                                        </li>
                                                        <li class="main_rating-stars_star">
                                                            <i class="icon-star_fill"></i>
                                                        </li>
                                                        <li class="main_rating-stars_star">
                                                            <i class="icon-star_fill"></i>
                                                        </li>
                                                        <li class="main_rating-stars_star">
                                                            <i class="icon-star_fill"></i>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <a class="main_title" href="product.php" target="_blank" rel="noopener norefferer"><?php echo $row["prd_name"]; ?></a>
                                                <!-- <ul class="main_table d-flex flex-column align-items-center">
                                                    <li class="list-item">
                                                        <span class="property">THC</span>
                                                        <span class="value">117.00-23.00%</span>
                                                    </li>
                                                    <li class="list-item">
                                                        <span class="property">CBD</span>
                                                        <span class="value">0.00-1.00%</span>
                                                    </li>
                                                </ul> -->
                                                <div class="main_price">
                                                    <span class="price"><?php echo number_format($row["price"], 0, ',', '.') . ' VND'; ?></span>
                                                </div>
                                                <a class="btn btn--green" href="#">Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>                                       
                                <?php }
                            } else {
                                echo "Không có kết quả nào.";
                            }
                        ?>
                        
                        <div class="products_list-promo">
                            <span class="overlay"></span>
                            <div class="content">
                                <h3 class="products_list-promo_title">Best Offers for Customers</h3>
                                <p class="products_list-promo_text">
                                    Shop our selection of vape carts, available in a range of strains, sizes, and formats, including
                                    true-to-flower and larger cartridges.
                                </p>
                                <div class="products_list-promo_timer timer d-flex justify-content-center justify-content-sm-start">
                                    <div class="timer_block d-flex flex-column justify-content-center">
                                        <span class="timer_block-number" id="days">25</span>
                                        days
                                    </div>
                                    <div class="timer_block d-flex flex-column justify-content-center">
                                        <span class="timer_block-number" id="hours">13</span>
                                        hours
                                    </div>
                                    <div class="timer_block d-flex flex-column justify-content-center">
                                        <span class="timer_block-number" id="minutes">18</span>
                                        mins
                                    </div>
                                    <div class="timer_block d-flex flex-column justify-content-center">
                                        <span class="timer_block-number" id="seconds">23</span>
                                        secs
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="featured_btn btn" href="shop2.php">All Products</a>
                </div>
            </section>
            <!-- Featured products section end -->
            <!-- About section start -->
            <section class="about section--nopb">
                <div class="container">
                    <div class="about_main d-lg-flex justify-content-between">
                        <div class="about_main-content col-lg-6 col-xl-auto">
                            <h2 class="about_main-content_header">
                                Our knowledgeable team can help you design experiences tailored to your needs by accessing one of the flower
                                selections
                            </h2>
                            <p class="about_main-content_text">
                                Elementum eu facilisis sed odio morbi quis commodo odio. Mauris rhoncus aenean vel elit scelerisque mauris
                                pellentesque. Accumsan sit amet nulla facilisi morbi tempus. Suscipit tellus mauris a diam maecenas sed enim
                                ut sem. Turpis egestas maecenas pharetra convallis posuere
                            </p>
                        </div>
                        <div class="about_main-media">
                            <picture>
                                <source data-srcset="./img/placeholder.jpg" srcset="./img/placeholder.jpg" type="image/webp" />
                                <img class="lazy" data-src="./img/placeholder.jpg" src="./img/placeholder.jpg" alt="media" />
                            </picture>
                        </div>
                    </div>
                    <ul class="about_numbers d-flex flex-wrap">
                        <li class="about_numbers-group col-sm-6 col-lg-3" data-order="1">
                            <div class="wrapper d-flex flex-column align-items-center align-items-sm-start">
                                <span class="countNum number d-flex align-items-center secondary" data-suffix="+" data-value="180">0</span>
                                <p class="number-label">New products to explore. Arcu vitae elementum curabitur vitae nunc sed</p>
                            </div>
                        </li>
                        <li class="about_numbers-group col-sm-6 col-lg-3" data-order="2">
                            <div class="wrapper d-flex flex-column align-items-center align-items-sm-start">
                                <span class="countNum number d-flex align-items-center secondary" data-suffix="X" data-value="3">0</span>
                                <p class="number-label">Quis risus sed vulputate odio ut. Arcu vitae elementum curabitur vitae nunc</p>
                            </div>
                        </li>
                        <li class="about_numbers-group col-sm-6 col-lg-3" data-order="3">
                            <div class="wrapper d-flex flex-column align-items-center align-items-sm-start">
                                <span class="countNum number d-flex align-items-center secondary" data-suffix="%" data-value="100">0</span>
                                <p class="number-label">Mauris a diam maecenas sed enim ut sem curabitur vitae nunc sed</p>
                            </div>
                        </li>
                        <li class="about_numbers-group col-sm-6 col-lg-3" data-order="4">
                            <div class="wrapper d-flex flex-column align-items-center align-items-sm-start">
                                <span class="countNum number d-flex align-items-center secondary" data-suffix="K" data-value="11">0</span>
                                <p class="number-label">Quis risus sed vulputate odio ut. Arcu vitae elementum curabitur vitae nunc</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </section>
            <!-- About section end -->
            <!-- Product section start -->
            <div class="product section">
                <div class="container d-flex flex-column flex-lg-row">
                    <div class="product_media">
                        <picture>
                            <source data-srcset="./img/placeholder.jpg" srcset="./img/placeholder.jpg" type="image/webp" />
                            <img
                                class="lazy"
                                data-src="./img/placeholder.jpg"
                                src="./img/placeholder.jpg"
                                alt="CBD Facial Serum: Anti-Aging + Daily Moisturizer"
                            />
                        </picture>
                    </div>
                    <div class="product_main col-lg-6">
                        <a class="product_main-title" href="product.php" target="_blank" rel="noopener norefferer"
                            >CBD Facial Serum: Anti-Aging + Daily Moisturizer</a
                        >
                        <div class="product_main-rating d-flex align-items-center">
                            <ul class="product_main-rating_stars d-flex align-items-center accent">
                                <li class="star">
                                    <i class="icon-star_fill"></i>
                                </li>
                                <li class="star">
                                    <i class="icon-star_fill"></i>
                                </li>
                                <li class="star">
                                    <i class="icon-star_fill"></i>
                                </li>
                                <li class="star">
                                    <i class="icon-star_fill"></i>
                                </li>
                                <li class="star">
                                    <i class="icon-star_fill"></i>
                                </li>
                            </ul>
                            <a class="product_main-rating_amount" href="#">(12)</a>
                        </div>
                        <p class="product_main-text">
                            Quis risus sed vulputate odio ut. Arcu vitae elementum curabitur vitae nunc sed. Mauris a diam maecenas sed enim
                            ut sem. Non enim praesent elementum facilisis. Sapien nec sagittis aliquam malesuada bibendum arcu vitae
                            elementum
                        </p>
                        <ul class="product_main-list">
                            <li class="list-item d-flex align-items-center">
                                <i class="icon-check icon d-flex align-items-center justify-content-center"></i>
                                Sativa-Dominant
                            </li>
                            <li class="list-item d-flex align-items-center">
                                <i class="icon-check icon d-flex align-items-center justify-content-center"></i>
                                THC 110.0-160.0mg/g
                            </li>
                            <li class="list-item d-flex align-items-center">
                                <i class="icon-check icon d-flex align-items-center justify-content-center"></i>
                                Euismod elementum
                            </li>
                            <li class="list-item d-flex align-items-center">
                                <i class="icon-check icon d-flex align-items-center justify-content-center"></i>
                                CBD 0.0-1.0mg/g
                            </li>
                        </ul>
                        <div class="product_main-action d-flex align-items-center">
                            <span class="price">$7.97</span>
                            <a class="btn" href="#">Add to Cart</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product section end -->
            <!-- Promo info section start -->
            <section class="info section">
                <div class="info_deco">
                    <div class="info_deco-wrapper">
                        <picture>
                            <source data-srcset="./img/placeholder.jpg" srcset="./img/placeholder.jpg" type="image/webp" />
                            <img
                                class="lazy leaf leaf--left"
                                data-src="./img/placeholder.jpg"
                                src="./img/placeholder.jpg"
                                alt="deco"
                            />
                        </picture>
                    </div>
                    <div class="info_deco-wrapper">
                        <picture>
                            <source data-srcset="./img/placeholder.jpg" srcset="./img/placeholder.jpg" type="image/webp" />
                            <img
                                class="lazy leaf leaf--right"
                                data-src="./img/placeholder.jpg"
                                src="./img/placeholder.jpg"
                                alt="deco"
                            />
                        </picture>
                    </div>
                </div>
                <div class="info_highlight">
                    <span class="underlay underlay--left">
                        <span class="underlay_circle underlay_circle--accent"></span>
                    </span>
                    <span class="underlay underlay--right">
                        <span class="underlay_circle underlay_circle--small underlay_circle--green"></span>
                        <span class="underlay_circle underlay_circle--big underlay_circle--green"></span>
                    </span>
                </div>
                <div class="container">
                    <div class="info_content d-flex flex-column align-items-center">
                        
                        <h2 class="info_content-header">
                            Our doctors recommend the best THC to CBD ratio to look for in a marijuana strain and suggest the recommended
                            dosage and route of administration
                        </h2>
                    </div>
                </div>
            </section>
            <!-- Promo info section end  -->
            <!-- Effects section start  -->
            <section class="effects section--nopb">
                <span class="effects_underlay">
                    <span class="effects_underlay-circle effects_underlay-circle--accent"></span>
                    <span class="effects_underlay-circle effects_underlay-circle--green"></span>
                </span>
                <div class="container d-md-flex flex-wrap flex-xxl-nowrap justify-content-between align-items-center">
                    <div class="effects_header d-lg-flex flex-xxl-column col-md-12 col-xxl-auto">
                        <div class="main col-lg-6 col-xl-12">
                            <h2 class="effects_header-title">Therapeutic Effects of Cannabis and Cannabinoids</h2>
                            <p class="effects_header-text">
                                Accumsan sit amet nulla facilisi morbi tempus. Suscipit tellus mauris a diam maecenas sed enim ut sem.
                                Turpis egestas maecenas pharetra convallis posuere
                            </p>
                            <a class="effects_header-btn btn" href="shop.html">Our Products</a>
                        </div>
                        <span class="effects_header-formula col-lg-6 col-xl-12">
                            <svg width="281" height="157" viewBox="0 0 281 157" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M230.627 115.958C230.309 115.76 229.952 115.76 229.635 115.958L208.956 127.805L188.317 115.879C188 115.72 187.643 115.76 187.325 115.918C187.246 115.958 187.166 115.998 187.127 116.077L166.647 127.805L146.484 116.117L146.524 91.8672L125.369 79.6236V56.9591C125.369 56.4044 124.932 55.9685 124.377 55.9685C123.821 55.9685 123.384 56.4044 123.384 56.9591V79.6632L103.143 91.2728L82.98 79.584L83.0197 54.8987L61.9046 42.6551V19.9906C61.9046 19.4359 61.468 19 60.9124 19C60.3567 19 59.9201 19.4359 59.9201 19.9906V42.6551L38.7653 54.8194L38.7256 80.3368L59.9598 92.62L59.9201 115.76H37.6143C37.0587 115.76 36.6221 116.196 36.6221 116.751C36.6221 117.305 37.0587 117.741 37.6143 117.741H59.9598V140.009C59.9598 140.564 60.3964 141 60.9521 141C61.5077 141 61.9443 140.564 61.9443 140.009V116.751C61.9443 116.711 61.9344 116.671 61.9245 116.632C61.9145 116.592 61.9046 116.552 61.9046 116.513L61.9443 92.937L82.1069 81.367L102.23 93.0162L102.19 116.235L95.919 119.841L96.7128 121.664L103.262 117.9L124.337 130.104L124.853 129.787V129.826L145.611 117.939L166.17 129.826C166.488 129.985 166.845 129.985 167.163 129.826L187.921 117.939L208.48 129.826C208.639 129.905 208.797 129.945 208.996 129.945C209.155 129.945 209.353 129.905 209.472 129.826L230.151 117.979L245.59 127.251L246.622 125.547L230.627 115.958ZM40.6614 56.4608L60.6614 45L80.6221 56.5392L80.5827 79.5392L60.5827 91L40.6221 79.4608L40.6614 56.4608ZM123.661 82L103.661 93.4608L103.622 116.461L123.583 128L143.583 116.539L143.622 93.5392L123.661 82Z"
                                    fill="currentColor"
                                />
                                <path
                                    d="M46.3933 12.8228C45.3218 12.2291 44.4487 11.398 43.8534 10.369C43.2581 9.30048 42.9406 8.15276 42.9406 6.84674C42.9406 5.54071 43.2581 4.35342 43.8534 3.32443C44.4487 2.25586 45.3218 1.46433 46.3933 0.870683C47.4649 0.277036 48.6951 0 50.0445 0C51.0366 0 51.9891 0.158306 52.8225 0.514495C53.6956 0.831107 54.41 1.3456 55.0053 1.97883L54.0925 2.88909C53.0209 1.82052 51.7113 1.26645 50.0842 1.26645C49.0126 1.26645 48.0205 1.50391 47.1474 2.0184C46.2743 2.49332 45.5599 3.16612 45.0837 4.0368C44.5678 4.86791 44.3296 5.85732 44.3296 6.88631C44.3296 7.95488 44.5678 8.90471 45.0837 9.73582C45.5996 10.5669 46.2743 11.2397 47.1474 11.7542C48.0205 12.2291 49.0126 12.5062 50.0842 12.5062C51.7113 12.5062 53.0606 11.9521 54.0925 10.8835L55.0053 11.7938C54.41 12.427 53.6956 12.9415 52.8225 13.2581C51.9494 13.6143 51.0366 13.7726 50.0048 13.7726C48.6554 13.6935 47.4649 13.4164 46.3933 12.8228Z"
                                    fill="currentColor"
                                />
                                <path
                                    d="M69.4114 0.0395508V13.5747H67.9827V7.32163H59.4898V13.5747H58.0611V0.0395508H59.4898V6.05518H67.9827V0.0395508H69.4114Z"
                                    fill="currentColor"
                                />
                                <path
                                    d="M77.1502 14.6037C77.6661 15.1182 77.9439 15.7514 77.9439 16.543C77.9439 17.097 77.8249 17.6115 77.5471 18.0469C77.2693 18.4822 76.8724 18.8384 76.3565 19.0759C75.8406 19.3133 75.1659 19.4716 74.4118 19.4716C73.6975 19.4716 73.0228 19.3529 72.3878 19.1154C71.7529 18.878 71.2369 18.6009 70.8798 18.2052L71.356 17.4136C71.6735 17.7302 72.11 18.0073 72.6656 18.2447C73.2213 18.4426 73.7769 18.5614 74.4118 18.5614C75.2056 18.5614 75.8406 18.4031 76.2771 18.0469C76.7137 17.6907 76.9518 17.2158 76.9518 16.6221C76.9518 16.0285 76.7137 15.5535 76.2771 15.1974C75.8406 14.8412 75.1659 14.6829 74.2928 14.6829H73.5784V13.9309L76.2771 10.5273H71.2766V9.61707H77.5868V10.3294L74.8087 13.8122C75.8406 13.8518 76.6343 14.1288 77.1502 14.6037Z"
                                    fill="currentColor"
                                />
                                <path
                                    d="M249.032 141.526C247.96 140.932 247.087 140.101 246.492 139.072C245.896 138.003 245.579 136.856 245.579 135.549C245.579 134.243 245.896 133.056 246.492 132.027C247.087 130.959 247.96 130.167 249.032 129.573C250.103 128.98 251.333 128.703 252.683 128.703C253.675 128.703 254.627 128.861 255.461 129.217C256.334 129.534 257.048 130.048 257.644 130.682L256.731 131.592C255.659 130.523 254.35 129.969 252.723 129.969C251.651 129.969 250.659 130.207 249.786 130.721C248.913 131.196 248.198 131.869 247.722 132.74C247.206 133.571 246.968 134.56 246.968 135.589C246.968 136.658 247.206 137.607 247.722 138.439C248.238 139.27 248.913 139.942 249.786 140.457C250.659 140.932 251.651 141.209 252.723 141.209C254.35 141.209 255.699 140.655 256.731 139.586L257.644 140.497C257.048 141.13 256.334 141.644 255.461 141.961C254.588 142.317 253.675 142.475 252.643 142.475C251.333 142.396 250.143 142.119 249.032 141.526Z"
                                    fill="currentColor"
                                />
                                <path
                                    d="M272.089 128.742V142.277H270.661V136.024H262.168V142.277H260.739V128.742H262.168V134.758H270.661V128.742H272.089Z"
                                    fill="currentColor"
                                />
                                <path
                                    d="M279.828 143.306C280.344 143.821 280.622 144.454 280.622 145.246C280.622 145.8 280.503 146.314 280.225 146.75C279.947 147.185 279.55 147.541 279.035 147.779C278.519 148.016 277.844 148.174 277.09 148.174C276.376 148.174 275.701 148.056 275.066 147.818C274.431 147.581 273.915 147.304 273.558 146.908L274.034 146.116C274.352 146.433 274.788 146.71 275.344 146.948C275.899 147.145 276.455 147.264 277.09 147.264C277.884 147.264 278.519 147.106 278.955 146.75C279.392 146.393 279.63 145.919 279.63 145.325C279.63 144.731 279.392 144.256 278.955 143.9C278.519 143.544 277.844 143.386 276.971 143.386H276.257V142.634L278.955 139.23H273.955V138.32H280.265V139.032L277.487 142.515C278.519 142.555 279.273 142.832 279.828 143.306Z"
                                    fill="currentColor"
                                />
                                <path
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M107.521 47.6388C108.108 48.6905 108.968 49.54 110.024 50.1468C111.119 50.7535 112.332 51.0367 113.622 50.9963C114.952 50.9963 116.164 50.7131 117.22 50.1063C118.276 49.4995 119.136 48.6501 119.723 47.5983C120.309 46.5466 120.622 45.333 120.622 43.9982C120.622 42.6633 120.348 41.4902 119.723 40.398C119.136 39.3462 118.276 38.4968 117.22 37.89C116.125 37.2832 114.952 37 113.622 37C112.292 37 111.119 37.3237 110.024 37.9304C108.968 38.5372 108.108 39.3867 107.521 40.4384C106.935 41.4902 106.622 42.7037 106.622 44.0386C106.622 45.3735 106.935 46.587 107.521 47.6388ZM118.896 46.3275C118.438 47.1796 117.789 47.8381 116.948 48.3029C116.108 48.7677 115.192 49 114.16 49C113.129 49 112.174 48.7677 111.334 48.3029C110.494 47.8381 109.844 47.1796 109.348 46.3275C108.851 45.4754 108.622 44.5458 108.622 43.5C108.622 42.4543 108.851 41.5247 109.348 40.6726C109.844 39.8205 110.494 39.162 111.334 38.6972C112.174 38.2324 113.129 38 114.16 38C115.192 38 116.108 38.2324 116.948 38.6972C117.789 39.162 118.438 39.8205 118.896 40.6726C119.393 41.5247 119.622 42.4543 119.622 43.5C119.622 44.5458 119.355 45.4754 118.896 46.3275Z"
                                    fill="currentColor"
                                />
                                <path
                                    d="M135.529 37.004V50.5392H134.1V44.2861H125.607V50.5392H124.179V37.004H125.607V43.0197H134.1V37.004H135.529Z"
                                    fill="currentColor"
                                />
                                <path
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M65.5215 126.632C66.1081 127.683 66.9684 128.532 68.0243 129.139C69.1193 129.745 70.2925 130.069 71.6221 129.988C72.9517 129.988 74.164 129.705 75.2198 129.098C76.2757 128.492 77.0969 127.683 77.7226 126.592C78.3092 125.541 78.6221 124.328 78.6221 122.994C78.6221 121.66 78.3483 120.487 77.7226 119.396C77.136 118.345 76.2757 117.496 75.2198 116.889C74.1249 116.283 72.9517 116 71.6221 116C70.2925 116 69.1193 116.323 68.0243 116.93C66.9684 117.536 66.1081 118.385 65.5215 119.436C64.9349 120.487 64.6221 121.7 64.6221 123.034C64.6221 124.368 64.9349 125.581 65.5215 126.632ZM76.8964 125.327C76.438 126.18 75.7887 126.838 74.9485 127.303C74.1082 127.768 73.1533 128 72.1603 128C71.129 128 70.1742 127.768 69.3339 127.303C68.4936 126.838 67.8443 126.18 67.3478 125.327C66.8512 124.475 66.6221 123.546 66.6221 122.5C66.6221 121.454 66.8512 120.525 67.3478 119.673C67.8443 118.82 68.4936 118.162 69.3339 117.697C70.1742 117.232 71.129 117 72.1603 117C73.1915 117 74.1082 117.232 74.9485 117.697C75.7887 118.162 76.438 118.82 76.8964 119.673C77.3929 120.525 77.6221 121.454 77.6221 122.5C77.6221 123.546 77.3547 124.475 76.8964 125.327Z"
                                    fill="currentColor"
                                />
                                <path
                                    d="M93.5407 115.84V129.376H92.112V123.123H83.6191V129.376H82.1904V115.84H83.6191V121.856H92.112V115.84H93.5407Z"
                                    fill="currentColor"
                                />
                                <path
                                    d="M11.3503 109.864V123.4H9.92158V117.146H1.42871V123.4H0V109.864H1.42871V115.88H9.92158V109.864H11.3503Z"
                                    fill="currentColor"
                                />
                                <path
                                    d="M19.7241 123.597C20.24 124.072 20.4781 124.706 20.4781 125.458C20.4781 125.972 20.3591 126.447 20.0813 126.882C19.8035 127.318 19.4463 127.634 18.9304 127.872C18.4144 128.109 17.8192 128.228 17.0651 128.228C16.3904 128.228 15.7555 128.109 15.1602 127.911C14.5649 127.674 14.0886 127.397 13.6918 127.041L14.168 126.289C14.4855 126.605 14.8824 126.882 15.3983 127.08C15.9142 127.278 16.4698 127.397 17.0651 127.397C17.8192 127.397 18.4144 127.238 18.851 126.882C19.2875 126.566 19.486 126.091 19.486 125.497C19.486 124.903 19.2875 124.468 18.851 124.152C18.4144 123.835 17.8192 123.677 16.9461 123.677H16.2714V122.964L18.851 119.719H14.0489V118.848H20.0813V119.521L17.4223 122.845C18.4541 122.845 19.2082 123.123 19.7241 123.597Z"
                                    fill="currentColor"
                                />
                                <path
                                    d="M26.0343 122.608C24.9627 122.014 24.0896 121.183 23.4943 120.154C22.899 119.086 22.5815 117.938 22.5815 116.632C22.5815 115.326 22.899 114.139 23.4943 113.11C24.0896 112.041 24.9627 111.25 26.0343 110.656C27.1058 110.062 28.3361 109.785 29.6854 109.785C30.6776 109.785 31.63 109.944 32.4634 110.3C33.3365 110.616 34.0509 111.131 34.6462 111.764L33.7334 112.674C32.6619 111.606 31.3522 111.052 29.7251 111.052C28.6536 111.052 27.6614 111.289 26.7883 111.804C25.9152 112.279 25.2008 112.951 24.7246 113.822C24.2087 114.653 23.9706 115.643 23.9706 116.672C23.9706 117.74 24.2087 118.69 24.7246 119.521C25.2405 120.392 25.9152 121.025 26.7883 121.54C27.6614 122.014 28.6536 122.291 29.7251 122.291C31.3522 122.291 32.7016 121.737 33.7334 120.669L34.6462 121.579C34.0509 122.212 33.3365 122.727 32.4634 123.043C31.5903 123.4 30.6776 123.558 29.6457 123.558C28.3361 123.518 27.1058 123.202 26.0343 122.608Z"
                                    fill="currentColor"
                                />
                                <path
                                    d="M54.41 138.636V152.172H52.9813V145.919H44.4884V152.172H43.0597V138.636H44.4884V144.652H52.9813V138.636H54.41Z"
                                    fill="currentColor"
                                />
                                <path
                                    d="M62.7838 152.37C63.2997 152.844 63.5378 153.478 63.5378 154.23C63.5378 154.744 63.4188 155.219 63.141 155.654C62.8632 156.05 62.506 156.406 61.9901 156.644C61.4741 156.881 60.8788 157 60.1248 157C59.4501 157 58.8152 156.881 58.2199 156.683C57.6246 156.446 57.1483 156.169 56.7515 155.813L57.2277 155.061C57.5452 155.377 57.9421 155.654 58.458 155.852C58.9739 156.05 59.5295 156.169 60.1248 156.169C60.8788 156.169 61.4741 156.011 61.9107 155.654C62.3472 155.338 62.5457 154.863 62.5457 154.269C62.5457 153.676 62.3472 153.24 61.9107 152.924C61.4741 152.607 60.8788 152.449 60.0057 152.449H59.3311V151.736L61.9107 148.491H57.1086V147.62H63.141V148.293L60.482 151.618C61.5138 151.618 62.2679 151.895 62.7838 152.37Z"
                                    fill="currentColor"
                                />
                                <path
                                    d="M69.0939 151.38C68.0224 150.787 67.1493 149.955 66.554 148.926C65.9587 147.858 65.6412 146.71 65.6412 145.404C65.6412 144.098 65.9587 142.911 66.554 141.882C67.1493 140.813 68.0224 140.022 69.0939 139.428C70.1655 138.834 71.3958 138.557 72.7451 138.557C73.7372 138.557 74.6897 138.716 75.5231 139.072C76.3962 139.388 77.1106 139.903 77.7059 140.536L76.7931 141.446C75.7216 140.378 74.4119 139.824 72.7848 139.824C71.7132 139.824 70.7211 140.061 69.848 140.576C68.9749 141.051 68.2605 141.723 67.7843 142.594C67.2684 143.425 67.0303 144.415 67.0303 145.444C67.0303 146.512 67.2684 147.462 67.7843 148.293C68.3002 149.164 68.9749 149.797 69.848 150.312C70.7211 150.787 71.7132 151.064 72.7848 151.064C74.4119 151.064 75.7612 150.509 76.7931 149.441L77.7059 150.351C77.1106 150.984 76.3962 151.499 75.5231 151.816C74.65 152.172 73.7372 152.33 72.7054 152.33C71.3958 152.29 70.1655 151.974 69.0939 151.38Z"
                                    fill="currentColor"
                                />
                            </svg>
                        </span>
                    </div>
                    <div class="effects_media">
                        <picture>
                            <source data-srcset="./img/placeholder.jpg" srcset="./img/placeholder.jpg" type="image/webp" />
                            <img class="lazy" data-src="./img/placeholder.jpg" src="./img/placeholder.jpg" alt="media" />
                        </picture>
                    </div>
                    <ul class="effects_list col-xxl-4">
                        <li
                            class="effects_list-item d-flex flex-column align-items-center flex-sm-row align-items-sm-start"
                            data-aos="fade-up"
                        >
                            <span class="icon d-flex align-items-center justify-content-center">
                                <i class="icon-flash"></i>
                            </span>
                            <div class="wrapper">
                                <h4 class="effects_list-item_header">Relief of chronic pain</h4>
                                <p class="effects_list-item_text">
                                    Feugiat in fermentum posuere urna nec tincidunt praesent semper feugiat pulvinar proin
                                </p>
                            </div>
                        </li>
                        <li
                            class="effects_list-item d-flex flex-column align-items-center flex-sm-row align-items-sm-start"
                            data-aos="fade-up"
                        >
                            <span class="icon d-flex align-items-center justify-content-center">
                                <i class="icon-heartbeat"></i>
                            </span>
                            <div class="wrapper">
                                <h4 class="effects_list-item_header">Fight cancer</h4>
                                <p class="effects_list-item_text">
                                    Feugiat in fermentum posuere urna nec tincidunt praesent semper feugiat pulvinar proin
                                </p>
                            </div>
                        </li>
                        <li
                            class="effects_list-item d-flex flex-column align-items-center flex-sm-row align-items-sm-start"
                            data-aos="fade-up"
                        >
                            <span class="icon d-flex align-items-center justify-content-center">
                                <i class="icon-head"></i>
                            </span>
                            <div class="wrapper">
                                <h4 class="effects_list-item_header">Depression</h4>
                                <p class="effects_list-item_text">
                                    Feugiat in fermentum posuere urna nec tincidunt praesent semper feugiat pulvinar proin
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </section>
            <!-- Effects section end  -->
            <!-- Latest news section start -->
            <section class="latest section">
                <div class="container">
                    <h2 class="latest_header">Latest News</h2>
                    <div class="latest_wrapper d-flex flex-column-reverse flex-lg-row">
                        <div class="latest_promo" data-aos="fade-right">
                            <picture>
                                <source srcset="./img/placeholder.jpg" type="image/webp" />
                                <img class="lazy latest_promo-bg" data-src="./img/placeholder.jpg" src="./img/placeholder.jpg" alt="promo" />
                            </picture>
                            <div class="overlay d-flex d-sm-block flex-column justify-content-center">
                                <h4 class="overlay_header">Buy Marijuana Seeds Online and Get a Gift</h4>
                                <p class="overlay_text">
                                    Feugiat in fermentum posuere urna nec tincidunt praesent semper feugiat pulvinar proin
                                </p>
                            </div>
                        </div>
                        <ul class="latest_list col-lg-7 col-xl-6">
                            <li class="list-item d-flex flex-column flex-sm-row" data-aos="fade-up">
                                <span class="latest_list-preview">
                                    <picture>
                                        <source data-srcset="./img/placeholder.jpg" srcset="./img/placeholder.jpg" type="image/webp" />
                                        <img
                                            class="lazy preview-img"
                                            data-src="./img/placeholder.jpg"
                                            src="./img/placeholder.jpg"
                                            alt="Top 15 Best Strain Of Weed For Anxiety"
                                        />
                                    </picture>
                                </span>
                                <div class="latest_list-main d-sm-flex flex-column justify-content-between flex-grow-1">
                                    <span class="metadata">
                                        <span class="metadata_item d-inline-flex align-items-center">
                                            <i class="icon-calendar_day icon secondary"></i>
                                            September 30, 2024
                                        </span>
                                        <span class="metadata_item d-inline-flex align-items-center">
                                            <i class="icon-comments icon secondary"></i>
                                            <span class="number d-md-none">0</span>
                                            <span class="text d-none d-md-inline">No Comments</span>
                                        </span>
                                    </span>
                                    <a class="title" href="post.php">Top 15 Best Strain Of Weed For Anxiety</a>
                                    <p class="text">
                                        Felis eget velit aliquet sagittis id consectetur. Eleifend donec pretium vulputate sapien nec
                                        sagittis
                                    </p>
                                </div>
                            </li>
                            <li class="list-item d-flex flex-column flex-sm-row" data-aos="fade-up">
                                <span class="latest_list-preview">
                                    <picture>
                                        <source data-srcset="./img/placeholder.jpg" srcset="./img/placeholder.jpg" type="image/webp" />
                                        <img
                                            class="lazy preview-img"
                                            data-src="./img/placeholder.jpg"
                                            src="./img/placeholder.jpg"
                                            alt="Raw Cannabis Seeds Promote Health"
                                        />
                                    </picture>
                                </span>
                                <div class="latest_list-main d-sm-flex flex-column justify-content-between flex-grow-1">
                                    <span class="metadata">
                                        <span class="metadata_item d-inline-flex align-items-center">
                                            <i class="icon-calendar_day icon secondary"></i>
                                            September 30, 2024
                                        </span>
                                        <span class="metadata_item d-inline-flex align-items-center">
                                            <i class="icon-comments icon secondary"></i>
                                            <span class="number d-md-none">0</span>
                                            <span class="text d-none d-md-inline">No Comments</span>
                                        </span>
                                    </span>
                                    <a class="title" href="post.php">Raw Cannabis Seeds Promote Health</a>
                                    <p class="text">
                                        Felis eget velit aliquet sagittis id consectetur. Eleifend donec pretium vulputate sapien nec
                                        sagittis
                                    </p>
                                </div>
                            </li>
                            <li class="list-item d-flex flex-column flex-sm-row" data-aos="fade-up">
                                <span class="latest_list-preview">
                                    <picture>
                                        <source data-srcset="./img/placeholder.jpg" srcset="./img/placeholder.jpg" type="image/webp" />
                                        <img
                                            class="lazy preview-img"
                                            data-src="./img/placeholder.jpg"
                                            src="./img/placeholder.jpg"
                                            alt="How Many Autoflowers In a Tent?"
                                        />
                                    </picture>
                                </span>
                                <div class="latest_list-main d-sm-flex flex-column justify-content-between flex-grow-1">
                                    <span class="metadata">
                                        <span class="metadata_item d-inline-flex align-items-center">
                                            <i class="icon-calendar_day icon secondary"></i>
                                            September 30, 2024
                                        </span>
                                        <span class="metadata_item d-inline-flex align-items-center">
                                            <i class="icon-comments icon secondary"></i>
                                            <span class="number d-md-none">0</span>
                                            <span class="text d-none d-md-inline">No Comments</span>
                                        </span>
                                    </span>
                                    <a class="title" href="post.php">How Many Autoflowers In a Tent?</a>
                                    <p class="text">
                                        Felis eget velit aliquet sagittis id consectetur. Eleifend donec pretium vulputate sapien nec
                                        sagittis
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
            <!-- Latest news section end -->

            <!-- Instagram section start -->
            <section class="instagram">
                <div class="container">
                    <div class="instagram_header">
                        <h2 class="instagram_header-title">Follow Us on Instagram</h2>
                        <p class="instagram_header-text">
                            Accumsan sit amet nulla facilisi morbi tempus. Suscipit tellus mauris a diam maecenas sed enim ut sem
                        </p>
                    </div>
                </div>
                <div class="instagram_slider swiper">
                    <div class="swiper-wrapper">
                        <div class="instagram_slider-slide swiper-slide">
                            <a class="link" href="https://instagram.com" target="_blank" rel="noopener norefferer">
                                <picture>
                                    <source data-srcset="./img/placeholder.jpg" srcset="./img/placeholder.jpg" type="image/webp" />
                                    <img class="lazy" data-src="./img/placeholder.jpg" src="./img/placeholder.jpg" alt="instagram post" />
                                </picture>
                                <span class="overlay d-flex justify-content-center align-items-center">
                                    <i class="icon-instagram"></i>
                                </span>
                            </a>
                        </div>
                        <div class="instagram_slider-slide swiper-slide">
                            <a class="link" href="https://instagram.com" target="_blank" rel="noopener norefferer">
                                <picture>
                                    <source data-srcset="./img/placeholder.jpg" srcset="./img/placeholder.jpg" type="image/webp" />
                                    <img class="lazy" data-src="./img/placeholder.jpg" src="./img/placeholder.jpg" alt="instagram post" />
                                </picture>
                                <span class="overlay d-flex justify-content-center align-items-center">
                                    <i class="icon-instagram"></i>
                                </span>
                            </a>
                        </div>
                        <div class="instagram_slider-slide swiper-slide">
                            <a class="link" href="https://instagram.com" target="_blank" rel="noopener norefferer">
                                <picture>
                                    <source data-srcset="./img/placeholder.jpg" srcset="./img/placeholder.jpg" type="image/webp" />
                                    <img class="lazy" data-src="./img/placeholder.jpg" src="./img/placeholder.jpg" alt="instagram post" />
                                </picture>
                                <span class="overlay d-flex justify-content-center align-items-center">
                                    <i class="icon-instagram"></i>
                                </span>
                            </a>
                        </div>
                        <div class="instagram_slider-slide swiper-slide">
                            <a class="link" href="https://instagram.com" target="_blank" rel="noopener norefferer">
                                <picture>
                                    <source data-srcset="./img/placeholder.jpg" srcset="./img/placeholder.jpg" type="image/webp" />
                                    <img class="lazy" data-src="./img/placeholder.jpg" src="./img/placeholder.jpg" alt="instagram post" />
                                </picture>
                                <span class="overlay d-flex justify-content-center align-items-center">
                                    <i class="icon-instagram"></i>
                                </span>
                            </a>
                        </div>
                        <div class="instagram_slider-slide swiper-slide">
                            <a class="link" href="https://instagram.com" target="_blank" rel="noopener norefferer">
                                <picture>
                                    <source data-srcset="./img/placeholder.jpg" srcset="./img/placeholder.jpg" type="image/webp" />
                                    <img class="lazy" data-src="./img/placeholder.jpg" src="./img/placeholder.jpg" alt="instagram post" />
                                </picture>
                                <span class="overlay d-flex justify-content-center align-items-center">
                                    <i class="icon-instagram"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Instagram section end -->
        </main>
        <!-- Homepage content end -->
        
<?php
    include 'footer.php';
    $conn->close();
?>
