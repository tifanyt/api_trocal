<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dashboard Trocal</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Quicksand:400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

        <!-- Styles BOOTSTRAP -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <style>
          .hidden {
            display: none;
          }
          .full-height {
            min-height: 100vh;
          }
          .sidebar {
            background-color: #655bff;
            font-size: 18px;
          }
          .logo {
            width: 100%;
            margin-top: 30px;
          }
          .subtitle {
            font-family: 'Quicksand', serif;
            font-weight: bold;
            color: #ffab71;
            margin-bottom: 50px;
          }
          .nav {
            padding: 0 20px;
          }
          .nav-item {
            font-family: 'Open Sans', sans-serif;
            margin: 5px 0;
          }
          .nav-item a {
            color: #ffffff;
          }
          .nav-item a:hover {
            text-decoration: none;
            font-weight: bold;
          }
          .active {
            position: relative;
          }
          .active::before {
            content: " ";
            background-color: #ffab71;
            width: 10px;
            height: 25px;
            position: absolute;
            top:0;
            left: -35px;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
          }
          .btn {
            color: white;
            font-family: 'Quicksand', serif;
            font-weight: bold;
            border-color: transparent;
            border-radius: 25px;
            font-size: 18px;
            cursor: pointer;
          }
          .btn-warning {
            background-color: #ffab71;
            box-shadow: 0 5px 10px 0 rgba(255, 104, 0, 0.2);
          }
          .btn-warning:hover {
            background-color: white;
            color: #ffab71;
          }
          .logout {
            margin-left: 20px;
            padding: 5px 15px;
          }
          .btn-secondary {
            background-color: #b1b1b1;
            box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.2);
          }
          .btn-secondary:hover {
            color: #b1b1b1;
            background-color: white;
          }
          .btn-primary {
            background-color: #655bff;
            box-shadow: 0 5px 10px 0 rgba(101, 91, 255, 0.3);
            color: white;
          }
          .btn-primary:hover {
            color: #655bff;
            background-color: white;
          }
          .buttons {
            margin-top: 50px;
          }
          h3 {
            font-family: 'Open Sans', sans-serif;
            font-size: 34px;
            font-weight: 800;
            color: #655bff;
            margin-bottom: 30px;
          }
          .col-8 {
            font-size: 20px;
            padding: 30px 50px;
            font-family: 'Open Sans', sans-serif;
          }
          .col-10 {
            font-size: 20px;
            padding: 30px 50px;
            font-family: 'Open Sans', sans-serif;
          }
          .form-control {
            border-radius: 25px;
            background-color: #f2f2f2;
            border: 0;
          }
          .alert-danger {
            border: solid 1px #ffab71;
            background-color: rgba(255, 104, 0, 0.2);
            color: #d67d40;
          }
          .objectPhoto {
            position: relative;
          }
          .btn-delete{
            position: absolute;
            top: 10px;
            right: 10px;
            z-index: 1;
            background-color: #655bff;
            width: 30px;
            height: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
          }
          .btn-delete:hover {
            color: white;
          }
          .action-block {
            display: flex;
            align-items: baseline;
            margin-bottom: 50px;
          }
          h6 {
            margin-left: 30px;
            font-family: 'Open Sans', sans-serif;
            font-size: 20px;
            font-weight: 800;
            color: #655bff;
          }
          .heading {
            background-color: #655bff;
            color: white;
          }
          .violetRow {
            border-bottom: 1px solid #655bff;
          }
          .smallbtn {
            border-radius: 6px;
          }
          .home {
            padding: 50px;
          }
          .cards{
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            margin-top: 110px;
            font-family: 'Open Sans', sans-serif;
          }
          .card{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-radius: 7px;
            box-shadow: 0 5px 15px 3px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-bottom: 30px;
          }
          .resource-icon{
            width: 60px;
            height: auto;
          }
          .number {
            font-size: 84px;
            font-weight: 800;
            text-align: center;
            color: #655bff;
          }
          .resource {
            font-size: 30px;
            font-weight: 800;
            text-align: center;
            color: #ffab71;
            margin-bottom: 20px;
          }
          .block {
            display: flex;
            flex-direction: column;
            width: 30%;
          }
          .btn-home {
            width: 80%;
            margin: 0 auto;
          }
        </style>
    </head>
    <body>
      <div class="container-fluid">
        <div class="row">
          <div class="full-height col-2 text-light sidebar">
            <nav class="navbar navbar-dark">
              <img class="logo" src="/public/logo_text.png" />
              <span class="subtitle">Dashboard</span>
              @php
                $url = url()->current();
                $isHome = !strpos($url, 'objects') && !strpos($url, 'transactions') && !strpos($url, 'users');
              @endphp
            </nav>
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="{{ $isHome ? 'active' : '' }}" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="{{ strpos($url, 'objects') === false ? '' : 'active' }}" href="/objects">Objects</a>
              </li>
              <li class="nav-item">
                <a class="{{ strpos($url, 'transactions') === false ? '' : 'active' }}" href="{{ route('dash-transactions.index') }}">Transactions</a>
              </li>
              <li class="nav-item">
                <a class="{{ strpos($url, 'users') === false ? '' : 'active' }}" href="{{ route('dash-users.index') }}">Users</a>
              </li>
            </ul>
              <a href="/logout" class="btn btn-warning mt-5 logout">Logout</a>
          </div>
          @yield('content')
        </div>
      </div>

<script type="text/javascript">

</script>
    </body>
</html>
