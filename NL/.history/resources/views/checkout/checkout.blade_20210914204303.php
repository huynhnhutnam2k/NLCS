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
    <div class="box">
        
                <h2 class="title">??i???n th??ng tin g???i h??ng</h2>
                @foreach ($users as $us)
                <form action="{{URL::to('/save-checkout')}}" method="POST" class="form-checkout">
                    {{csrf_field()}}
                    <input type="hidden" name="id_user" value="{{Session::get('id_user')}}" class="form-checkout-input">
                    <input type="email" name="email" placeholder="Email*" value="{{$us->email}}"  class="form-checkout-input">
                    <input type="text" name="name" placeholder="H??? v?? t??n*" value="{{$us->name}}" class="form-checkout-input">
                    <input type="text" name="phone_number" placeholder="S??? ??i???n tho???i*" value="{{$us->phone}}" class="form-checkout-input">
                    <input type="text" name="address" placeholder="?????a ch???*" value="{{$us->address}}"  class="form-checkout-input">
                    <h4 style="text-align: left;color: #555;">Ghi ch?? g???i h??ng</h4>
                    <textarea cols="120" rows="10" placeholder="Ghi ch?? ????n h??ng c???a b???n" style="padding:10px ;" name="notes"></textarea>
                    <div class="ok">
                        <input type="submit" value="G???i" class="btn" style="float: right; width: 250px;">
                    </div>
                </form>
                @endforeach
        
    </div>
     
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