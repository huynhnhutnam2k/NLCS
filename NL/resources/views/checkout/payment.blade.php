
@extends('layout')
@section('content')
    <main>

        @php
        $content = Cart::content();
        @endphp
    <!-- -----------------cart item details------------------- -->
    <div class="small-container cart-page">
        <h2 class="title">Xem lại giỏ hàng và chọn hình thức thanh toán</h2>
        <table>
                <tr>
                    <th>Sản Phẩm</th>
                    <th>Số Lượng</th>
                    <th>Giá</th>
                </tr>
                @foreach ($content as $cart)
                        <tr>
                            <td>
                                <div class="cart-info">
                                    <img src="{{'public/uploads/'.$cart->options->image}}" width="150px">
                                    <div>
                                        <p>{{$cart->name}}</p>
                                        <small style="color:red;">{{number_format($cart->price)." VND"}}</small>
                                        
                                        <br>
                                        <a href="{{URL::to('remove-cart='.$cart->rowId)}}">Remove</a>
                                        
                                    </div>
                                </div>
                            </td>
                            <td>
                                <form action="{{URL::to('/update-cart-qty')}}" method="post" style="display: flex; align-items: center;justify-content:space-around">
                                    {{csrf_field()}}
                                <input type="number" value="{{$cart->qty}}" width="50%" name="qty" min="1" max="20" style="width: 350px">
                                <input type="hidden" value="{{$cart->rowId}}" name="rowId_cart" class="qty">
                                <input type="submit" value="Cập nhật" name="number-qty" class="btn" style="float: right;width:200px">
                                </form>
                            </td>
                            <td style="color:red;" >
                                <?php 
                                $Subtotal = $cart->price * $cart->qty ;
                                echo number_format($Subtotal). " VNĐ";
                                ?>
                            </td>
                        </tr>
                @endforeach
        </table>

        <div class="total-price">
            <table>
                <tr>
                    <td>Tổng</td>
                    <td>{{Cart::subtotal()." VND"}}</td>
                </tr>
                <tr>
                    <td>Phí vận chuyễn</td>
                    <td>Miễn phí</td>
                </tr>
                <tr>
                    <td>Thành tiền</td>
                    <td>{{Cart::subtotal()." VND"}}</td>
                </tr>
            </table>

        </div>
        <form method="POST" action="{{URL::to('/order')}}">
            {{csrf_field()}}
            <div class="small-container payment">
                <span>
                    <input type="hidden" name="user_id" value="{{Session::get('id_user')}}">
                    <label>
                        <input type="radio" value="Bằng tiền mặt" name="checkbox_payment"> Nhận tiền mặt <i class="fas fa-money-bill-alt"></i>
                    </label>
                </span>
                       <span>
                    <label>
                        <input type="radio" value="Bằng thẻ ATM" name="checkbox_payment"> Bằng thẻ ATM <i class="far fa-credit-card"></i>
                    </label>
                </span>
                       <span>
                    <label>
                        <input type="radio" value="Paypal" name="checkbox_payment"> Paypal <i class="fab fa-cc-paypal"></i>
                    </label>
                </span>
                <div class="ok">
                    <input type="submit" value="Đặt hàng" class="btn" style="float: right; width: 250px;">
                </div>
            </div>
        </form>
    </div>
    </main>
@endsection