@extends('welcome')
@section('header')
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
                <li class="header-bottom-item"><a href="#">Trang chu</a></li>
                <li class="header-bottom-item"><a href="#">MLB</a></li>
                <li class="header-bottom-item"><a href="#">ADIDAS</a></li>
                <li class="header-bottom-item"><a href="#">VAN</a></li>
                <li class="header-bottom-item"><a href="#">CONVERSE</a></li>
            </ul>
        </div>
    </header>

@endsection