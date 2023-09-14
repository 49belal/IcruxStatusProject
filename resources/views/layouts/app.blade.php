<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

</head>
<style>
html {
    height: 100%;

}
body {
    height: 100%;

}
.container {
    height: 100%;
    position: absolute;
   margin-left: 1px;
   margin-right: 1px;
   padding-left: 1px;
    background-color: #f5f5f5;
}
form {
    padding-top: 10px;
    font-size: 14px;
    margin-top: 30px;
}
.card-title {
font-weight: 300;
 }
.btn {
    font-size: 14px;
    margin-top: 20px;
}
.login-form {
    width: 330px;
    margin: 20px;
}
.sign-up {
    text-align: center;
    padding: 20px 0 0;
}
.alert {
    margin-bottom: -30px;
    font-size: 13px;
    margin-top: 20px;
}
.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">

                        <button class="status inProgresss" style="margin-top:0.5px; margin-left:1px;background-color:#1795ce;" onclick="history.go(-1);">Back </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


                <a class="navbar-brand" >
                    {{-- {{ 'Icrux System' }} --}}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>



                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else
                            <li class="dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}

                                </a>

                                <div class="dropdown-content" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('azure.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Sign Out') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
                <a class="navbar-brand"  href="/" >
                    <img src="{{url('/images/icruxlogo.png')}}" height="50" width="160" style="margin-bottom:3%; margin-right:1px"></img>
                </a>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
