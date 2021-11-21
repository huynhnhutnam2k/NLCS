@extends('layout');
@section('content')
    <main>
        <section class="hero">
            <img src="{{{'https://scontent.fsgn2-5.fna.fbcdn.net/v/t1.15752-9/254738160_491850595535700_211938108314932272_n.jpg?_nc_cat=104&ccb=1-5&_nc_sid=ae9488&_nc_ohc=i_d3tnJLNokAX8ILR_N&_nc_ht=scontent.fsgn2-5.fna&oh=702e6c21c0ec39712863c2b10eb8e162&oe=61B012ED'}}}" alt="" style="width:100%">
        </section> 
        <section class="feature" style="background-color: white">
            <h2 class="feature-title">SẢN PHẨM MỚI</h2>
            <div class="feature-list">
                {{-- @yield('content') --}}
                @foreach ($pro_new as $new)
                    
                    <div class="feature-item" >
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
        <section class="feature" style="background-color: white">
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
