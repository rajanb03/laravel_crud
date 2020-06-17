<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/products">
       <i class="fas fa-home"></i>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>


      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

        <li class="{{Request::is('api/products') || Request::is('products/create') ? 'active' : ''}}">
              <a class="nav-link" href="/api/products">Products</a>
        </li>

        <li class="{{Request::is('api/category') || Request::is('category/create') ? 'active' : ''}}">
            <a class="nav-link" href="/api/category">Category</a>
        </li>

         <li class="{{Request::is('login') || Request::is('login') ? 'active' : ''}}">
           
           @if(Auth::check())
              <li>
                <a href="{{ route('logout')}}" class="nav-link" onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                               {{ __('Logout') }}<br>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  
                </form>
              </li>
           @else
            <a class="nav-link" href="{{ route('login') }}">Login</a>
           <li class="{{Request::is('register') || Request::is('register') ? 'active' : ''}}">
              <a class="nav-link" href="register">Register</a>
          </li>
           @endif

        </li>


        </ul>
    </div>
</nav>