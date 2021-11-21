@extends('layout')
@section('content')
    <main class="box">
        {{-- <a href="/" class="path">Trang chu</a> / <span>Dang ky</span> --}}
     {{-- <a href="/" class="path">Trang chu</a> / <span>Dang ky</span> --}}
     <section class="register">
      <h2 class=register-title>ĐĂNG NHẬP</h2>
      <form method="POST" class="form" action="{{URL::to('/login')}}" style="position: relative;">
          {{{ csrf_field() }}}
          <input type="email" class="form-input" name="user_email" placeholder="Email" autocomplete='off'>
          <input type="password" class="form-input" name="user_password" placeholder="Password" autocomplete='off'>
          <a href="/forgot-password" style="color: black;position: relative;left:-100px">Quên mật khẩu</a>
          <button class="btn-register">ĐĂNG NHẬP</button>
      </form>
  </section>
  <section class="register">
      <h2 class=register-title>ĐĂNG KÝ</h2>
      <form method="POST" class="form" action="{{URL::to('/add-user')}}">
          {{ csrf_field() }}
          <input type="text" class="form-input" name="user_name" placeholder="Tên tài khoản" autocomplete='off'>
          <input type="email" class="form-input" name="user_email" placeholder="Email" autocomplete='off'>
          <input type="text" class="form-input" name="user_phone" placeholder="SDT" autocomplete='off'>
          <input type="password" class="form-input" name="user_password" placeholder="Password" autocomplete='off'>
          <button class="btn-register">ĐĂNG KÝ</button>
      </form>
  </section>
    </main>
@endsection