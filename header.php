<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Home | Lalihui</title>
    <link rel="stylesheet preload" as="style" href="css/preload.min.css" />
    <link rel="stylesheet preload" as="style" href="css/libs.min.css" />
    <link rel="stylesheet" href="css/index.min.css" />
</head>
<body>
    <header class="header d-flex flex-wrap align-items-center" data-page="home" data-overlay="true">
        <div class="container d-flex flex-wrap flex-xl-nowrap align-items-center justify-content-between">
            <a class="brand header_logo d-flex align-items-center" href="index.php">
                <img src="./img/logo.png">
            </a>
            <nav class="header_nav">
                <ul class="header_nav-list">
                    <li class="header_nav-list_item nav-item">
                        <a class="nav-link d-inline-flex align-items-center" href="index.php">
                            Trang Chủ
                        </a>
                    </li>
                    <li class="header_nav-list_item dropdown nav-item">
                        <a class="nav-link d-inline-flex align-items-center" href="shop2.php">
                            Sản phẩm
                        </a>
                    </li>
                    <li class="header_nav-list_item dropdown nav-item">
                        <a class="nav-link d-inline-flex align-items-center" href="news.php">
                            Bài viết
                        </a>
                    </li>
                    <li class="header_nav-list_item dropdown nav-item">
                        <a class="nav-link d-inline-flex align-items-center" href="about.php">
                            Giới thiệu
                        </a>
                    </li> 
                    <li class="header_nav-list_item dropdown nav-item">
                        <a class="nav-link d-inline-flex align-items-center" href="contacts.php">
                            Liên hệ
                        </a>
                    </li>
                </ul>
            </nav>
            <span class="header_trigger d-inline-flex d-xl-none flex-column justify-content-between">
                <span class="line line--short"></span>
                <span class="line line"></span>
                <span class="line line--short"></span>
                <span class="line line"></span>
            </span>
            <div class="header_user d-flex justify-content-end align-items-center">
                <form class="header_user-search" action="#" method="get" data-type="searchForm">
                    <input class="header_user-search_field field required" type="text" placeholder="Search..." />
                    <button
                        class="header_user-search_btn header_user-action d-inline-flex align-items-center justify-content-center"
                        type="submit"
                        data-trigger="search"
                    >
                        <i class="icon-search"></i>
                    </button>
                </form>
                <a class="header_user-action d-inline-flex align-items-center justify-content-center" href="wishlist.php">
                    <i class="icon-heart"></i>
                </a>
                <a
                    class="header_user-action d-inline-flex align-items-center justify-content-center"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#cartOffcanvas"
                    aria-controls="cartOffcanvas"
                >
                    <i class="icon-basket"></i>
                </a>
            </div>
        </div>
    </header>
