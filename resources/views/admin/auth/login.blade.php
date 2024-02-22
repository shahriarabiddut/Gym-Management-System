<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link rel="icon" type="image/x-icon" href="{{ asset($SiteOption[1]->value) }}" />
    <meta name="author" content="">

    <title> Admin Login | @isset($SiteOption)
        {{ $SiteOption[0]->value }}
    @endisset </title>
    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}" />
		<link rel="stylesheet" href="{{ asset('css/bootstrap-responsive.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/matrix-style.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/matrix-login.css')}}" />
    <link href="{{ asset('font-awesome/css/fontawesome.css')}}" rel="stylesheet" />
    <link href="{{ asset('font-awesome/css/all.css')}}" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

</head>

<body>
    
  <div id="loginbox">
      @error('email')
      <div style=" color: white; background-color: red; padding: 2%; font-size: large; " class="text-bold bg-danger text-center text-white p-2">{{ $message }}</div>
      @enderror
      @error('password')
      <div style=" color: white; background-color: red; padding: 2%; font-size: large; " class="text-bold bg-danger text-center text-white p-2">{{ $message }}</div>
      @enderror            
      <form id="loginform" method="POST" class="form-vertical" action="{{ route('admin.adminlogin') }}">
        @csrf
      <div class="control-group normal_text"> <h3><img src="{{ asset('image/logo.png')}}" alt="Logo" /></h3></div>
          <div class="control-group">
              <div class="controls">
                  <div class="main_input_box">
                      <span class="add-on bg_lg"><i class="fas fa-user-circle"></i></span><input type="text" name="email" placeholder="Email" required/>
                  </div>
              </div>
          </div>
          <div class="control-group">
              <div class="controls">
                  <div class="main_input_box">
                      <span class="add-on bg_ly"><i class="fas fa-lock"></i></span><input type="password" name="password" placeholder="Password" required />
                  </div>
              </div>
          </div>
          <div class="form-actions center">
              <!-- <span class="pull-right"><a type="submit" href="index.html" class="btn btn-success" /> Login</a></span> -->
              <!-- <input type="submit" class="button" title="Log In" name="login" value="Admin Login"></input> -->
              <button type="submit" class="btn btn-block btn-large btn-info" title="Log In" name="login" value="Admin Login">Admin Login</button>
          </div>
      </form>
      
  </div>
  
  <script src="{{ asset('js/jquery.min.js')}}"></script>  
  <script src="{{ asset('js/matrix.login.js')}}"></script> 
  <script src="{{ asset('js/bootstrap.min.js')}}"></script> 
<script src="{{ asset('js/matrix.js')}}"></script>
</body>

</html>
