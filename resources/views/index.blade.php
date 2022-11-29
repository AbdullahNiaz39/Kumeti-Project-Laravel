<!DOCTYPE html>
<html lang="en">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <title>Kumeti</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="" />
      <meta name="keywords" content="">
      <meta name="author" content="" />
      <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="{{asset('admin/css/bootstrap.min.css')}}">
      <link type="text/css" rel="stylesheet" href="{{asset('admin/css/font-awesome.min.css')}}" />
      <link rel="stylesheet" type="text/css" href="{{asset('admin/css/font-awesome-n.min.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('admin/css/style.css')}}">

   </head>
   <body class="login_img">
    <div class="container">
      <div class="row">
         <div class=" login_page_box">

          <h3 class="text-center">KUMETI</h3>
            <p class="text-center">Sign in to get in touch</p>
          <form action="{{route('log_auth')}}" method="POST">
            @csrf
              <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="email" class="form-control" name="email" placeholder="Username or Email Adress " required>
              </div>
              <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input type="password" class="form-control"  placeholder="Password" name="password" required>
              </div>

            <button type="submit" class="btn btn-purple btn-block">Sign in</button>
            @if (session()->has('error'))
            <div  style="margin-top:20px;" class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        </form>
        </div>
        </div>
    </div>
      <script src="{{asset('admin/js/jquery.min.js')}}"></script>
      <script src="{{asset('admin/js/custom.js')}}"></script>
   </body>
</html>
