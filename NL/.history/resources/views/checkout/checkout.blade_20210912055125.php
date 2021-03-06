<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
        
                <h2 class="title">Điền thông tin gửi hàng</h2>
                @foreach ($users as $us)
                <form action="{{URL::to('/save-checkout')}}" method="POST">
                    {{csrf_field()}}
                    <input type="hidden" name="id_user" value="{{Session::get('id_user')}}">
                    <input type="email" name="email" placeholder="Email*" value="{{$us->email}}">
                    <input type="text" name="name" placeholder="Họ và tên*" value="{{$us->name}}">
                    <input type="text" name="phone_number" placeholder="Số điện thoại*" value="{{$us->phone}}">
                    <input type="text" name="address" placeholder="Địa chỉ*" value="{{$us->address}}" >
                    <h4 style="text-align: left;color: #555;">Ghi chú gửi hàng</h4>
                    <textarea cols="120" rows="10" placeholder="Ghi chú đơn hàng của bạn" style="padding:10px ;" name="notes"></textarea>
                    <div class="ok">
                        <input type="submit" value="Gửi" class="btn" style="float: right; width: 250px;">
                    </div>
                </form>
                @endforeach
        
    </div>

</body>
</html>