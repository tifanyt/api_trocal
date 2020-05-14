<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dashboard Trocal - Login</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Quicksand:400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

        <!-- Styles BOOTSTRAP -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <style>
          .container {
            border-radius: 10px;
            box-shadow: 0 5px 15px 3px rgba(101, 91, 255, 0.3);
            background-color: #655bff;
            padding: 40px 90px;
            width: 50%;
            margin: 70px auto 0;
            color: white;
            font-family: 'Open Sans', sans-serif;
          }
          .title {
            width: 25%;
            margin: 0 auto 50px;
            text-align: center;
          }
          .subtitle {
            font-family: 'Quicksand', serif;
            font-weight: bold;
            color: #ffab71;
          }
          .logo {
            max-width: 100%;
          }
          .form-control{
            border-radius: 25px;
          }
          .btn-warning {
            background-color: #ffab71;
            box-shadow: 0 5px 10px 0 rgba(255, 104, 0, 0.2);
            color: white;
            font-family: 'Quicksand', serif;
            font-weight: bold;
            border-color: transparent;
            border-radius: 25px;
            font-size: 18px;
            padding: 10px 12px;
            display: block;
            margin: 50px auto 0;
          }
          .btn-warning:hover {
            background-color: white;
            color: #ffab71;
          }
          .alert-danger {
            border: solid 1px #ffab71;
            color: #d67d40;
          }
        </style>
    </head>
    <body>
      <div class="container">
        <div class="title">
          <img src="/public/logo_text.png" alt="logo" class="logo"/>
          <span class="subtitle">dashboard</span>
        </div>
        <form method="post">
          @csrf <!-- {{ csrf_field() }} -->
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
          </div>
          @if (isset($error))
          <div class="alert alert-danger" role="alert">{{ $error }}</div>
          @endif
          @if (session('error'))
          <div class="alert alert-danger" role="alert">{{ session('error') }}</div>
          @endif
          <button type="submit" class="btn btn-warning">Connexion</button>
        </form>
      </div>
    </body>
</html>
