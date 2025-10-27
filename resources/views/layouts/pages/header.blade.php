<nav class="main-header navbar navbar-expand navbar-white navbar-light" >
  {{-- <nav class="main-header navbar navbar-expand navbar-light bg-success" > --}}

    <style>
      .text {
          font-family: 'SF Pro Display', sans-serif;
          color: #555; /* Replace with your desired text color */
          font-size: 13px; /* Replace with your desired font size */
      }

 

    </style> 
  

    <ul class="navbar-nav ml-auto" > 
      {{-- @if (session('user'))
      <p class="text text-center">
        <strong>{{ session('user')['name'] }}</strong><br> {{$designation}}
    </p>
  @endif --}}
  @if (session('user'))
    <p class="text text-center">
        <strong>{{ Auth::user('user')['name'] }}</strong><br>  {{ Auth::user('user')['designation'] }}
    </p>
  @endif
     
      <div class="btn-group dropstart">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <img src="{{ asset('images/new.png') }}" style="width: 30px; height: 30px; margin-right: 9px;">
          
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#useraccount" title="NEW ACCOUNT">New Account</a></li>
              <div class="dropdown-divider"></div>
              <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logout" title="Logout">Logout</a></li>
                <div class="dropdown-divider"></div>        
          </ul>  
      </div>     
    </ul>
  </nav>