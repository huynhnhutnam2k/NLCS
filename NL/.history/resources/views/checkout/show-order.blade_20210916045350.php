@extends('layout')
@section('content')
<div class="box-column cart-page">
    
            <h2 class="title">Đơn hàng của bạn</h2>
            <div>
                <?php 
                if($ur_order->isEmpty()){
                ?>
                <p>Bạn chưa có đơn hàng nào</p>
                <?php }else{ ?>
                <table>
                    @foreach ($ur_order as $rs)
                        <tr>
                            <td>Mã hóa đơn: </td>
                            <td>{{$rs->oder_detail_id}}</td>
                        </tr>
                        <tr>
                            <td>Tên khách hàng: </td>
                            <td>{{$rs->name}}</td>
                        </tr>
                        <tr>
                            <td>Tên sản phẩm: </td>
                            <td>{{$rs->pro_name}}</td>
                        </tr>
                        <tr>
                            <td>Số lượng: </td>
                            <td>{{$rs->od_pro_qty}}</td>
                        </tr>
                        <tr>
                            <td>Giá: </td>
                            <td>{{number_format($rs->od_pro_price,)." VNĐ"}}</td>
                        </tr>
                        <tr>
                            <td>Địa chỉ giao hàng: </td>
                            <td>{{$rs->tr_address}}</td>
                        </tr>
                        <tr>
                            <td>Phí vận chuyển:</td>
                            <td>Miễn phí</td>
                        </tr>
                        <tr>
                            <td>Tổng tiền phải chi trả: </td>
                            <td>
                                <?php
                                    $total = $rs->od_pro_qty *$rs->od_pro_price ;
                                    echo number_format($total)." VNĐ"; 
                                ?>
                            </td>
                        </tr>
                    @endforeach
                <p>Cảm ơn bạn đã đặt hàng chúng tôi sẽ liên hệ với bạn sớm nhất!</p>
                </table>
                <?php } ?>

            </div>

            <div style="float: right;" class="ok">
                <a href="{{URL::to('/index')}}"><button class="btn">Trở về trang chủ</button></a>
            </div>
  
</div>

@endsection
