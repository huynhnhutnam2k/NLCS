@extends('layout')
@section('content')
    <main>
        <div class="link">
            <a href="{{ URL::to('/') }}">HOME</a> / <span>
                @foreach ($pro as $p)
                    {{ $p->pro_name }}
                @endforeach
            </span>
        </div>
        <section class="clothes">
            <div class="clothes-image">
                @foreach ($pro as $p)

                    <img src="{{ asset('public/uploads/' . $p->pro_view . '') }}" alt="">
                @endforeach
            </div>
            <div class="clothes-content">
                @foreach ($pro as $p)
                    <form action="{{ URL::to('save-cart') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="clothes-content-other">
                            <h1 class="clothes-content-title">{{ $p->pro_name }}</h1>
                            {{-- <span>SKU: 0011</span> --}}
                            <span>{{ number_format($p->pro_price) . ' VNĐ' }}</span>
                            <input type="hidden" value="{{ $p->id }}" name="pro_id">
                        </div>
                        <div class="clothes-content-quatity">
                            <label for="quatity">Quatity</label>
                            <input type="number" min="1" max="20" value="1" name="qty" class="quatity"
                                style="width: 350px;height: 35px;padding:0 10px">
                            <button class="btn" type="submit" name="add-cart">Thêm vào giỏ hang</button>
                        </div>
                    </form>
                    <div class="clothes-content-accordion">
                        <div class="clothes-content-accordion-header">
                            <span class="bold">Description</span>
                            <i class='bx bx-chevron-down icon'></i>
                        </div>
                        <div class="clothes-content-accordion-content active">
                            <div class="clothes-content-accordion-content-inner">
                                {{ $p->pro_description }}
                                {{-- I'm a product detail. I'm a great place to add more information about your product such as sizing, material, care and cleaning instructions. This is also a great space to write what makes this product special and how your customers can benefit from this item. Buyers like to know what they’re getting before they purchase, so give them as much information as possible so they can buy with confidence and certainty. --}}
                            </div>
                        </div>
                    </div>
                    <div class="clothes-content-accordion">
                        <div class="clothes-content-accordion-header">
                            <span class="bold">Content</span>
                            <i class='bx bx-chevron-down icon'></i>
                        </div>
                        <div class="clothes-content-accordion-content">
                            <div class="clothes-content-accordion-content-inner">
                                {{ $p->pro_content }}
                                {{-- I’m a Return and Refund policy. I’m a great place to let your customers know what to do in case they are dissatisfied with their purchase. Having a straightforward refund or exchange policy is a great way to build trust and reassure your customers that they can buy with confidence. --}}
                            </div>
                        </div>
                    </div>
                @endforeach

        </section>
        <section class="feature">
            <h2 class="feature-title">SẢN PHẨM LIÊN QUAN</h2>
            <div class="feature-list">
                {{-- @yield('content') --}}
                @foreach ($related as $pro)

                    <div class="feature-item">
                        <div class="feature-item-top">
                            <img src="{{ 'public/uploads/' . $pro->pro_view . '' }}" alt="" class="feature-item-image">
                        </div>
                        <div class="feature-item-bottom">
                            <a href="{{ URL::to('product-detail=' . $pro->id) }}"
                                class="feature-item-name">{{ $pro->pro_name }}</a>
                            <h3 class="feature-item-price">{{ number_format($pro->pro_price) . ' VNĐ' }}</h3>
                        </div>
                    </div>
                @endforeach

            </div>
        </section>
    </main>

@endsection
