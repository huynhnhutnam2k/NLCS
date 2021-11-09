
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('public/frontend/css/app.css')}}">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <header class="header">
        <div class="header-top">
            <div class="header-top-left">SALE UP TO 50%</div>
            <div class="header-top-right">
                <ul class="header-top-list">
                    <li class="header-top-item"><a href="#">Tin tuc</a></li>
                    <li class="header-top-item"><a href="#">Lien he</a></li>
                    <li class="header-top-item"><a href="{{URL::to('/register')}}">Dang ky</a></li>
                    <li class="header-top-item"><a href="{{URL::to('/login')}}">Dang nhap</a></li>
                    <li class="header-top-item"><a href="{{URL::to('/cart')}}">Gio hang</a></li>
                </ul>
            </div>
        </div>
        <div class="header-main">
            <a href="{{URL::to('/')}}" class="header-logo">B Sneaker</a>
            <div class="header-search">
                <input type="text" class="header-search-input" placeholder="Search here..">
                <button class="btn-search"><i class='bx bx-search'></i></button>
            </div>
            <div class="header-hotline">Hotline: 035 799 8668</div>
        </div>
        <div class="header-bottom">
            <ul class="header-bottom-list">
                <li class="header-bottom-item"><a href="{{URL::to('/')}}">Trang chu</a></li>
                <li class="header-bottom-item"><a href="{{URL::to('product')}}">Product</a></li>
                @foreach ($categories as $cate)
                    <li class="header-bottom-item"><a href="{{URL::to('/brand='.$cate->id)}}">{{$cate->cate_name}}</a></li>
                @endforeach
            </ul>
        </div>
    </header>
    <main>
        @php
            $content = Cart::content();
        @endphp
        <section class="cart">
            <div class="cart-product">
                <h2 class="cart-title">My cart</h2>
                <?php
                if($content->isEmpty()){
                    ?>
                   <p>Bạn không có sản phẩm nào trong giỏ hàng . Hãy quay lại mua hàng</p>
                   <div class="ok">
                       <a href="{{URL::to('index')}}"><button class="btn">Trở về trang chủ</button></a>
                   </div>
                <?php }else{ ?>
                <div class="cart-product-content">
                    <div class="cart-product-image">
                        <img src="./img/product.jpeg" alt="">
                    </div>
                    <div class="cart-product-content-detail">
                        <h2>I'm product</h2>
                        <span class="cart-product-price">$15 </span>
                    </div>
                    <input type="number" placeholder="1" class="input" style="width: 50px;">
                    <div class="cart-product-total">$15</div>
                    <div class="remove"><i class='bx bx-x'></i></div>
                </div>
            </div>
            <div class="cart-checkout">
                <h2 class="cart-title">Order Summary</h2>
                <p>Subtotal <span>$15</span></p>
                <p>Shipping <span>Free</span></p>
                <p>Total <span>$15</span></p>
                <button class="btn" style="width:280px">Checkout</button>
            </div>
        </section>
        <div class="accordion ">
            <div class="accordion-header">
                <i class='bx bx-purchase-tag-alt' ></i>
                <span>
                    Enter your promo code
                </span>
            </div>
            <div class="accordion-content">
                <div class="accordion-content-inner">
                    <input type="text" class="accordion-input" style="width: 200px;">
                    <button class="btn" style="background-color: white;color: black;width: 100px; border: 1px solid;">Apply</button>
                </div>
            </div>
        </div>
        <div class="accordion ">
            <div class="accordion-header">
                <i class='bx bx-notepad' ></i>
                <span>
                    Enter Your Address
                </span>
                
            </div>
            <div class="accordion-content">
                <div class="accordion-content-inner">
                    <input type="text" class="accordion-input" placeholder="Enter your address">
                    <input type="text" class="accordion-input" placeholder="Email">
                    <input type="text" class="accordion-input" placeholder="Ho ten ">
                    <input type="text" class="accordion-input" placeholder="SDT">
                </div>
            </div>
        </div>
    </main>
   
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
                <a href="#"><i class='bx bxl-facebook' ></i></a>
                <a href="#"><i class='bx bxl-instagram'></i></a>
            </div>
        </div>
    </footer>
</body>
</html>