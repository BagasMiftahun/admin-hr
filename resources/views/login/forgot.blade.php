<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Reset Password</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="{{ asset('image/favicon.ico') }}" type="image/x-icon"/>

    <!-- Fonts and icons -->
    <script src="../assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Lato:300,400,700,900"]},
            custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/atlantis.min.css') }}">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">

    <style type="text/css">
        .login {
  background: #efefee; }
  .login .wrapper.wrapper-login {
    display: flex;
    justify-content: center;
    align-items: center;
    height: unset;
    padding: 15px; }
    .login .wrapper.wrapper-login .container-login, .login .wrapper.wrapper-login .container-signup {
      width: 400px;
      padding: 60px 25px;
      border-radius: 5px; }
      .login .wrapper.wrapper-login .container-login:not(.container-transparent), .login .wrapper.wrapper-login .container-signup:not(.container-transparent) {
        background: #ffffff;
        -webkit-box-shadow: 0 0.75rem 1.5rem rgba(18, 38, 63, 0.03);
        -moz-box-shadow: 0 0.75rem 1.5rem rgba(18, 38, 63, 0.03);
        box-shadow: 0 0.75rem 1.5rem rgba(18, 38, 63, 0.03);
        border: 1px solid #ebecec; }
      .login .wrapper.wrapper-login .container-login h3, .login .wrapper.wrapper-login .container-signup h3 {
        font-size: 19px;
        font-weight: 600;
        margin-bottom: 25px; }
      .login .wrapper.wrapper-login .container-login .form-sub, .login .wrapper.wrapper-login .container-signup .form-sub {
        align-items: center;
        justify-content: space-between;
        padding: 8px 10px; }
      .login .wrapper.wrapper-login .container-login .btn-login, .login .wrapper.wrapper-login .container-signup .btn-login {
        padding: 15px 0;
        width: 135px; }
      .login .wrapper.wrapper-login .container-login .form-action, .login .wrapper.wrapper-login .container-signup .form-action {
        text-align: center;
        padding: 25px 10px 0; }
      .login .wrapper.wrapper-login .container-login .form-action-d-flex, .login .wrapper.wrapper-login .container-signup .form-action-d-flex {
        display: flex;
        align-items: center;
        justify-content: space-between; }
      .login .wrapper.wrapper-login .container-login .login-account, .login .wrapper.wrapper-login .container-signup .login-account {
        padding-top: 10px;
        text-align: center; }
    .login .wrapper.wrapper-login .container-signup .form-action {
      display: flex;
      justify-content: center; }
  .login .wrapper.wrapper-login-full {
    justify-content: unset;
    align-items: unset;
    padding: 0 !important; }
  .login .login-aside {
    padding: 25px; }
    .login .login-aside .title {
      font-size: 36px; }
    .login .login-aside .subtitle {
      font-size: 18px; }
  .login .show-password {
    position: absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 20px;
    cursor: pointer; }
  .login .custom-control-label {
    white-space: nowrap; }

@media screen and (max-width: 576px) {
  .form-action-d-flex {
    flex-direction: column;
    align-items: start !important; }

  .login .wrapper-login-full {
    flex-direction: column; }
  .login .login-aside {
    width: 100% !important; }
    .login .login-aside .title {
      font-size: 24px; }
    .login .login-aside .subtitle {
      font-size: 16px; } }
@media screen and (max-width: 399px) {
  .wrapper-login {
    padding: 15px !important; }

  .container-login {
    width: 100% !important;
    padding: 60px 15px !important; } }
    </style>
</head>
<body class="login">
  @include('sweetalert::alert')
	<div class="wrapper wrapper-login">
		<div class="container container-login animated fadeIn">
			<h3 class="text-center">Reset Password</h3>
      <form action="{{ url('password-reset/'.Request::segment(2)) }}" method="POST">
      @csrf
      @method('patch')
        <div class="login-form">
          <div class="form-group">
            <label class="placeholder"><b>Password</b></label>
            <input name="password" placeholder="Masukkan password baru" type="password" class="form-control">
            @if($errors->has('password'))
              <p class="text-danger">{{ $errors->first('password') }}</p>
            @endif
          </div>
          <div class="form-group">
            <label for="password" class="placeholder"><b>Konfirmasi Password</b></label>
            <div class="position-relative">
              <input id="password" name="confirm_password" placeholder="Konfirmasi password" type="password" class="form-control">
              @if($errors->has('confirm_password'))
                <p class="text-danger">{{ $errors->first('confirm_password') }}</p>
              @endif
            </div>
          </div>
          <div class="form-group form-action-d-flex mb-3">
            <button type="submit" class="btn btn-primary col-md-12 float-right mt-3 mt-sm-0 fw-bold">Simpan</button>
          </div>
        </div>
     </form>
		</div>
	</div>
</body>
</html>
