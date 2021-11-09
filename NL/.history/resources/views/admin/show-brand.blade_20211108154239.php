@extends('admin-layout')
@section('admin-content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                LIỆT KÊ NHÃN HIỆU
            </div>

        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <?php
                $msg = Session::get('msg');
                if ($msg) {
                    echo '<div style="text-align:center;color:green;">' . $msg . '</div>';
                    Session::put('msg', null);
                }
                ?>
                <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>TÊN THƯƠNG HIỆU</th>
                        <th>LOGO</th>
                        <th>TRẠNG THÁI</th>

                        <th>NGÀY THÊM</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all_b as $b)
                        <tr>
                            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                            <td>{{ $b->cate_name }}</td>
                            <td><img src="{{ 'public/uploads/brand/' . $b->cate_images . '' }}" width="150px"></td>
                            <td><span class="text-ellipsis" style="text-align: center;">
                                    <?php
              if($b->cate_active == 0){
            ?>
                                    <a href="{{ URL::to('/unactive-brand=' . $b->id) }}"><span class="fa-style fa fa-circle"
                                            style="color:red;"><span></a>
                                    <?php }else{ ?>
                                    <a href="{{ URL::to('/active-brand=' . $b->id) }}"><span class="fa-style fa fa-circle"
                                            style="color:green;"><span></a>
                                    <?php } ?>
                                </span></td>
                            <td><span class="text-ellipsis">{{ date('d-m-Y', strtotime($b->created_at)) }}</span></td>
                            <td>
                                <a href="{{ URL::to('/edit-brand=' . $b->id) }}" ui-toggle-class="">
                                    <i class="fa fa-pencil-square-o text-success text-active"></i>
                                </a>
                                <a href="{{ URL::to('/delete-brand=' . $b->id) }}" ui-toggle-class=""
                                    onclick="return confirm('Bạn chắc chắn muốn xóa chứ?')">
                                    <i class="fa fa-times text-danger text"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <footer class="panel-footer">
            <div class="row">

                <div class="col-sm-5 text-center">
                    <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                </div>
                <div class="col-sm-7 text-right text-center-xs">
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                        <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                        <li><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                        <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
    </div>
@endsection
