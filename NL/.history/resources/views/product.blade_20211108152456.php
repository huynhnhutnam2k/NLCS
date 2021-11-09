@extends('layout')
@section('content')
    <main class="box">
        <section class="filter">
            <div class="category">
                <h2 class="category-title">Category</h2>
                <ul class="category-list">
                    @foreach ($categories as $cate)

                        <li class="category-item"><a href="{{ URL::to('brand=' . $cate->id . '') }}">{{ $cate->cate_name }}</a>
                        </li>
                    @endforeach

                </ul>
            </div>
            <div class="price">
                <h2 class="price-title">Price</h2>

                <ul class="price-list">
                    <input type="checkbox">
                    <li class="price-item"><a href="#">0 - 500k</a></li>
                </ul>
                <ul class="price-list">
                    <input type="checkbox">
                    <li class="price-item"><a href="#">500k - 1m</a></li>
                </ul>
                <ul class="price-list">
                    <input type="checkbox">
                    <li class="price-item"><a href="#">1m - 2m</a></li>
                </ul>
                <ul class="price-list">
                    <input type="checkbox">
                    <li class="price-item"><a href="#">2m tro len</a></li>
                </ul>
            </div>
        </section>
        <section class="feature-product">
            <div class="feature-product-list">
                @foreach ($pro as $p)


                    <div class="feature-item" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
                        <div class="feature-item-top">
                            <img src="{{ 'public/uploads/' . $p->pro_view . '' }}" alt="" class="feature-item-image">
                        </div>
                        <div class="feature-item-bottom">
                            <a href="{{ URL::to('product-detail=' . $p->id) }}"
                                class="feature-item-name">{{ $p->pro_name }}</a>
                            <h3 class="feature-item-price">{{ number_format($p->pro_price) . ' VNĐ' }}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </main>

@endsection
