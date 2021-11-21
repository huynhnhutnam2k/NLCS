@extends('layout')
@section('content')
    <main>

        <section class="feature">
            <h2 class="feature-title">DANH SÁCH SẢN PHẨM TÌM THẤY</h2>
            <div class="feature-list" style="min-height: 300px">
                {{-- @yield('content') --}}
                @foreach ($pro as $p)


                    <div class="feature-item">
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
