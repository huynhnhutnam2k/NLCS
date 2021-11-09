@extends('layout')
@section('content')
    <main class="box">
        {{-- <a href="/" class="path">Trang chu</a> / <span>Dang ky</span> --}}
     {{-- <a href="/" class="path">Trang chu</a> / <span>Dang ky</span> --}}
     <section class="register">
      <h2 class=register-title>Dang nhap</h2>
      <form method="POST" class="form" action="{{URL::to('/login')}}">
          {{{ csrf_field() }}}
          <input type="email" class="form-input" name="user_email" placeholder="Email" autocomplete='off'>
          <input type="password" class="form-input" name="user_password" placeholder="Password" autocomplete='off'>
          
          <button class="btn-register">Dang nhap</button>
      </form>
  </section>
  <section class="register">
      <h2 class=register-title>Dang ky</h2>
      <form method="POST" class="form" action="{{URL::to('/add-user')}}">
          {{ csrf_field() }}
          <input type="text" class="form-input" name="user_name" placeholder="Tai khoan" autocomplete='off'>
          <input type="text" class="form-input" name="user_email" placeholder="Email" autocomplete='off'>
          <input type="text" class="form-input" name="user_phone" placeholder="SDT" autocomplete='off'>
          <input type="password" class="form-input" name="user_password" placeholder="Password" autocomplete='off'>
          <button class="btn-register">Dang ky</button>
      </form>
  </section>
    </main>
@endsection