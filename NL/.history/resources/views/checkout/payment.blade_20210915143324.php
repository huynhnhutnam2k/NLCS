
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
        <div class="box">
            <?php 
            if($content->isEmpty()){
            ?>
            <p>B???n kh??ng c?? s???n ph???m n??o trong gi??? h??ng . H??y quay l???i mua h??ng</p>
            <div class="ok">
                <a href="{{URL::to('/')}}"><button class="btn-return">Tr??? v??? trang ch???</button></a>
            </div>
            <?php }else{ ?>
                <table style="width:850px">
                        <tr>
                            <th>S???n Ph???m</th>
                            <th>S??? L?????ng</th>
                            <th>Gi??</th>
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
                                        <form action="{{URL::to('/update-cart-qty')}}" method="post" style="display: flex; align-items: center;justify-content:space-around">
                                            {{csrf_field()}}
                                            <input type="number" value="{{$cart->qty}}" width="50%" name="qty" min="1" max="20" style="width:50px;height:35px">
                                            <input type="hidden" value="{{$cart->rowId}}" name="rowId_cart" class="qty">
                                            <input type="submit" value="C???p nh???t" name="number-qty" class="btn" style="float: right;width:150px;height:35px">
                                        </form>
                                    </td>
                                    <td style="color:red;" >
                                        <?php 
                                        $Subtotal = $cart->price * $cart->qty ;
                                        echo number_format($Subtotal). " VN??";
                                        ?>
                                    </td>
                                </tr>
                        @endforeach
                </table>
                <div class="subcart">

                    <div class="total-price">
                        <table>
                            <tr>
                                <td>T???ng</td>
                                <td>{{Cart::subtotal()." VND"}}</td>
                            </tr>
                            <tr>
                                <td>Ph?? v???n chuy???n</td>
                                <td>Mi???n ph??</td>
                            </tr>
                            <tr>
                                <td>Th??nh ti???n</td>
                                <td>{{Cart::subtotal()." VND"}}</td>
                            </tr>
                        </table>
    
                    </div>
                    <div class="ok">
                        <?php 
                        $id_user = Session::get('id_user');
                        if($id_user!=NULL) {
                        ?>
                        <a href="{{URL::to('checkout')}}"><button class="btn">Thanh To??n</button></a>
                        <?php }else{ ?>
                        <a href="{{URL::to('login-checkout')}}"><button class="btn">Thanh To??n</button></a>
                        <?php } ?>
                    </div>
                    <?php } ?>
                </div>
                {{-- <form method="POST" action="{{URL::to('/order')}}">
                    {{csrf_field()}}
                    <div class="small-container payment">
                        <span>
                            <input type="hidden" name="user_id" value="{{Session::get('id_user')}}">
                            <label>
                                <input type="radio" value="B???ng ti???n m???t" name="checkbox_payment"> Nh???n ti???n m???t <i class="fas fa-money-bill-alt"></i>
                            </label>
                        </span>
                               <span>
                            <label>
                                <input type="radio" value="B???ng th??? ATM" name="checkbox_payment"> B???ng th??? ATM <i class="far fa-credit-card"></i>
                            </label>
                        </span>
                               <span>
                            <label>
                                <input type="radio" value="Paypal" name="checkbox_payment"> Paypal <i class="fab fa-cc-paypal"></i>
                            </label>
                        </span>
                        <div class="ok">
                            <input type="submit" value="?????t h??ng" class="btn" style="float: right; width: 250px;">
                        </div>
                    </div>
                </form> --}}
        </div>
    </main>
   
    <footer class="footer">
        <div class="footer-logo">
            <h2>BSneaker</h2>
            <hr>
            <p>Hotline: 0357 998 668</p>
        </div>
        <div class="footer-pay">
            <h2>Li??n h??? v?? thanh to??n</h2>
            <hr>
            <p>Hotline: 035 799 8668</p>
            <a href="#">Website: BSneakers.vn</a>
            <p>????NG K?? NH???N TH??NG TIN KHUY???N M???I QUA EMAIL</p>
            <div class="footer-email">
                <input type="email" placeholder="Nh???p email c???a b???n" class="footer-input">
                <button class="btn-email">????ng k??</button>
            </div>
        </div>
        <div class="footer-support">
            <h2>H??? tr??? kh??ch h??ng</h2>
            <hr>
            <ul class="footer-support-list">
                <li class="footer-support-item">
                    <a href="#">Ch??nh s??ch ?????i tr??? h??ng</a>
                </li>
                <li class="footer-support-item">
                    <a href="#">H?????ng d???n mua h??ng</a>
                </li>
                <li class="footer-support-item">
                    <a href="#"></a>S?? ????? ch??? ???????ng</a>
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