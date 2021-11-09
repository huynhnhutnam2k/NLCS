
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
    <!-- -----------------cart item details------------------- -->
        <div class="box">
            <?php 
            if($content->isEmpty()){
            ?>
            <p>Bạn không có sản phẩm nào trong giỏ hàng . Hãy quay lại mua hàng</p>
            <div class="ok">
                <a href="{{URL::to('/')}}"><button class="btn-return">Trở về trang chủ</button></a>
            </div>
            <?php }else{ ?>
                <table>
                        <tr>
                            <th>Sản Phẩm</th>
                            <th>Số Lượng</th>
                            <th>Giá</th>
                        </tr>
                        @foreach ($content as $cart)
                                <tr>
                                    <td>
                                        <div class="cart-info">
                                            <img src="{{'public/uploads/'.$cart->options->image}}" width="150px">
                                            <div>
                                                <p>{{$cart->name}}</p>
                                                {{-- <p><i style="color:red;font-size: 12px;">Size: {{$cart->weight}}</i></p> --}}
                                                <small style="color:red;">{{number_format($cart->price)." VND"}}</small>
                                                
                                                <br>
                                                <a href="{{URL::to('remove-cart='.$cart->rowId)}}">Remove</a>
                                                
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <form action="{{URL::to('/update-cart-qty')}}" method="post" style="display: flex; align-items: center;">
                                            {{csrf_field()}}
                                            <input type="number" value="{{$cart->qty}}" width="50%" name="qty" min="1" max="20">
                                            <input type="hidden" value="{{$cart->rowId}}" name="rowId_cart" class="qty">
                                            <input type="submit" value="Cập nhật" name="number-qty" class="btn" style="float: right;width:150px">
                                        </form>
                                    </td>
                                    <td style="color:red;" >
                                        <?php 
                                        $Subtotal = $cart->price * $cart->qty ;
                                        echo number_format($Subtotal). " VNĐ";
                                        ?>
                                    </td>
                                </tr>
                        @endforeach
                </table>
                <div class="subcart">

                    <div class="total-price">
                        <table>
                            <tr>
                                <td>Tổng</td>
                                <td>{{Cart::subtotal()." VND"}}</td>
                            </tr>
                            <tr>
                                <td>Phí vận chuyễn</td>
                                <td>Miễn phí</td>
                            </tr>
                            <tr>
                                <td>Thành tiền</td>
                                <td>{{Cart::subtotal()." VND"}}</td>
                            </tr>
                        </table>
    
                    </div>
                    <div class="ok">
                        <?php 
                        $id_user = Session::get('id_user');
                        if($id_user!=NULL) {
                        ?>
                        <a href="{{URL::to('checkout')}}"><button class="btn">Thanh Toán</button></a>
                        <?php }else{ ?>
                        <a href="{{URL::to('login-checkout')}}"><button class="btn">Thanh Toán</button></a>
                        <?php } ?>
                    </div>
                    <?php } ?>
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