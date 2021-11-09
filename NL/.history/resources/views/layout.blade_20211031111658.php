<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('public/frontend/css/app.css') }}">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
        crossorigin="anonymous" />
    <style>
        /* width */
        ::-webkit-scrollbar {
            width: 10px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px grey;
            border-radius: 10px;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: gray;

            border-radius: 10px;
        }

    </style>
</head>

<body>
    <header class="header">
        <div class="header-top">
            <div class="header-top-left">SALE UP TO 50%</div>
            <div class="header-top-right">
                <ul class="header-top-list">
                    {{-- <li class="header-top-item"><a href="#">Tin tuc</a></li> --}}
                    <li class="header-top-item"><a href="{{ URL::to('/') }}">Trang chủ</a></li>
                    <li class="header-top-item"><a href="{{ URL::to('/product') }}">Sản phẩm</a></li>
                    <li class="header-top-item"><a href="{{ URL::to('/show-cart') }}">Giỏ hàng</a></li>
                    <?php 
                                $user_id = Session::get('id_user');
                                if ($user_id ==NULL) {
                                 ?>
                    <li><a href="{{ URL::to('login-checkout') }}" class="header-top-item">Đăng nhấp</a></li>
                    </li>
                    <?php }else{ ?>
                    <li><a href="{{ URL::to('logout-checkout') }}" class="header-top-item">Hi
                            <?= Session::get('name_user') ?>, Đang xuat</a></li>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="header-main">
            <a href="{{ URL::to('/') }}" class="header-logo">B Sneaker</a>
            <form action="{{ URL::to('/search') }}" method="POST">
                {{ csrf_field() }}
                <div class="header-search">
                    <input type="text" class="header-search-input" placeholder="Search here.." name="search"
                        autocomplete='off'>
                    <button class="btn-search" type="submit"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <div class="header-hotline">Hotline: 035 799 8668</div>
        </div>
        <div class="header-bottom">
            <ul class="header-bottom-list">
                {{-- <li class="header-bottom-item"><a href="/">Trang chu</a></li> --}}
                {{-- <li class="header-bottom-item"><a href="{{URL::to('product')}}">Product</a></li> --}}
                @foreach ($categories as $cate)
                    <li class="header-bottom-item"><a
                            href="{{ URL::to('/brand=' . $cate->id) }}">{{ $cate->cate_name }}</a></li>
                @endforeach
            </ul>
        </div>
    </header>
    @yield('content');

    <footer class="footer">
        <div class="footer-logo">
            <h2>BSneaker</h2>
            <hr>
            <p>Hotline: 0357 998 668</p>
        </div>
        <div class="footer-pay">
            <h2>Liên hệ và thanh toán</h2>
            <hr>
            <p>Hotline: 035 799 8668</p>
            <a href="#">Website: BSneakers.vn</a>
            <p>ĐĂNG KÝ NHẬN THÔNG TIN KHUYẾN MẠI QUA EMAIL</p>
            <div class="footer-email">
                <input type="email" placeholder="Nhập email của bạn" class="footer-input">
                <button class="btn-email">Đăng ký</button>
            </div>
        </div>
        <div class="footer-support">
            <h2>Hỗ trợ khách hàng</h2>
            <hr>
            <ul class="footer-support-list">
                <li class="footer-support-item">
                    <a href="#">Chính sách đổi trả hàng</a>
                </li>
                <li class="footer-support-item">
                    <a href="#">Hướng dẫn mua hàng</a>
                </li>
                <li class="footer-support-item">
                    <a href="#"></a>Sơ đồ chỉ đường</a>
                </li>
            </ul>
        </div>
        <div class="footer-fanpage">
            <h2>Fanpage</h2>
            <hr>
            <a href="#"><img src="img/fanpage.jpg" alt=""></a>
            <div class="footer-fanpage-other">
                <a href="#"><i class='bx bxl-facebook'></i></a>
                <a href="#"><i class='bx bxl-instagram'></i></a>
            </div>
        </div>
    </footer>
    <script src="{{ asset('public/frontend/js/app.js') }}"></script>
</body>

</html>
