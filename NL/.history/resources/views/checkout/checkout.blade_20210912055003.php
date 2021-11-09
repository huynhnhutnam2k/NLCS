<div class="small-container cart-page">
    <div class="row">
        <div class="col-2">
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
    </div>
</div>
