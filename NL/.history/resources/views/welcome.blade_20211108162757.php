@extends('layout');
@section('content')
    <main>
        <section class="hero">
            <img src="{{{'https://images.unsplash.com/photo-1523527692532-b7811d223c53?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=774&q=80'}}}" alt="">
        </section> 
        <section class="feature">
            <h2 class="feature-title">SẢN PHẨM MỚI</h2>
            <div class="feature-list">
                {{-- @yield('content') --}}
                @foreach ($pro_new as $new)
                    
                    <div class="feature-item">
                        <div class="feature-item-top">
                            <img src="{{"public/uploads/".$new->pro_view.""}}" alt="" class="feature-item-image">
                        </div>
                        <div class="feature-item-bottom">
                            <a href="{{URL::to('product-detail='.$new->id)}}" class="feature-item-name">{{$new->pro_name}}</a>
                            <h3 class="feature-item-price">{{number_format($new->pro_price)." VNĐ"}}</h3>
                        </div>
                    </div>
                @endforeach

            </div>
        </section>
        <section class="feature">
            <h2 class="feature-title">SẢN PHẨM HOT</h2>
            <div class="feature-list">
                {{-- @yield('content') --}}
                @foreach ($pro_hot as $hot)
                    
                    <div class="feature-item">
                        <div class="feature-item-top">
                            <img src="{{"public/uploads/".$hot->pro_view.""}}" alt="" class="feature-item-image">
                        </div>
                        <div class="feature-item-bottom">
                            <a href="{{URL::to('product-detail='.$hot->id)}}" class="feature-item-name">{{$hot->pro_name}}</a>
                            <h3 class="feature-item-price">{{number_format($hot->pro_price)." VNĐ"}}</h3>
                        </div>
                    </div>
                @endforeach             

            </div>
        </section>
        <section class="layout">
            <img src="{{asset('public/frontend/image/layout1.jpeg')}}" alt="" class="layout-items">
            <img src="{{asset('public/frontend/image/layout2.jpeg')}}" alt="" class="layout-items">
            <img src="{{asset('public/frontend/image/layout3.jpeg')}}" alt="" class="layout-items">
            <img src="{{asset('public/frontend/image/layout4.jpeg')}}" alt="" class="layout-items">
            <img src="{{asset('public/frontend/image/layout5.jpeg')}}" alt="" class="layout-items">
            <img src="{{asset('public/frontend/image/layout6.jpeg')}}" alt="" class="layout-items">
        </section>
    </main>

@endsection
