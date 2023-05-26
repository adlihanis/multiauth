<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hall Reservation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<div class="container">

<nav class="navbar navbar-expand-lg bg-transparent navbar-light p-0">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><b>SAPPHIRE</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item ">
                    <a class="nav-link active" aria-current="page" href="#">Location</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Package</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Gallery</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#feedb">Feedback</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#contactus">Contact Us</a>
                </li> -->
            </ul>
            <ul class="navbar-nav">
            
            <li class="nav-item dropdown">
              <button class="btn bg-transparent btn-lg border" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-list"></i>  |  <i class="bi bi-person-circle"></i>
              </button>
              
              <ul class="dropdown-menu dropdown-menu-end mt-2" aria-labelledby="navbarDropdownMenuLink">
                <!-- <li><a class="dropdown-item" href="{{url('/register')}}">Register</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{url('/login')}}">Login</a></li>
                <li><hr class="dropdown-divider"></li> -->
                <li><a class="dropdown-item" href="#">Dashboard</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                <a class="dropdown-item" href="#">
                                {{ __('Profile') }}
                </a>
            
                </li>
                <li><hr class="dropdown-divider"></li>

                <li>
                    <form method="POST" action="#">
                                @csrf

                                <a class="dropdown-item" href="{#"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </a>
                    </form>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
</nav>
</div>    

  @if($errors->any())
    @foreach($errors->all() as $error)
      <div class="alert alert-warning" role="alert">
        {{$error}}
      </div>
    @endforeach
  @endif
  
  @yield('content')

</body>
</html>