@extends('layout')
@section('content')
    <div class="box-column">

        <h2 class="box-column-title">Điền thông tin gửi hàng</h2>
        @foreach ($users as $us)
            <form action="{{ URL::to('/save-checkout') }}" method="POST" class="form-checkout">
                {{ csrf_field() }}
                <input type="hidden" name="id_user" value="{{ Session::get('id_user') }}" class="form-checkout-input">
                <input type="email" name="email" placeholder="Email*" value="{{ $us->email }}"
                    class="form-checkout-input">
                <input type="text" name="name" placeholder="Họ và tên*" value="{{ $us->name }}"
                    class="form-checkout-input">
                <input type="text" name="phone_number" placeholder="Số điện thoại*" value="{{ $us->phone }}"
                    class="form-checkout-input">
                <input type="text" name="address" placeholder="Địa chỉ*" value="{{ $us->address }}"
                    class="form-checkout-input" required>
                <h4 style="text-align: left;color: #555;">Ghi chú gửi hàng</h4>
                <textarea cols="120" rows="10" placeholder="Ghi chú đơn hàng của bạn" style="padding:10px ;" name="notes"
                    style="border-radius: 5px;"></textarea>
                <div class="ok">
                    <input type="submit" value="Order" class="btn" style="float: right; width: 250px;">
                </div>
            </form>
        @endforeach

    </div>
@endsection
