  <style>
    /* SEPARATOR */
    .separator{
    display:flex;
    align-items: center;
    }

    .separator .line{
    height: 1px;
    flex: 1;
    background-color: #9CA0A4;
    }

    .line {
      height: 0.5px; 
      background-color: #A7A9AC; 
      width: 50%; 
      display: inline-block; 
    }

    h5 {
      font-family: 'SF Pro Display', sans-serif;
      color: #9CA0A4; 
      font-size: 8px; +
    }

   /* LINK */
    a.brand-link {
        color: #DFE3E9; 
        transition: color 0.3s ease; 
    }

    a.brand-link:hover {
        color: #DFE3E9; 
    }

    /* NAVBAR */
    .nav-pills .nav-link {
        font-family: 'SF Pro Display', sans-serif; 
        font-size: 14px;
        color: #FFFFFF;
    }

  </style>

<aside class="main-sidebar shadow bg-body-tertiary rounded" style="background: linear-gradient(to right, #142A48, #142A48);">
    <a href="#" class="brand-link">
      <div class="text-center">
        <span class="brand-text font-weight-dark">WFPS</span>
      </div>
    </a>

    <!-- Sidebar -->
  <div class="sidebar">
             @if (session('user'))
            <strong style="display: none;">{{ session('user')['name'] }} hidden</strong> 
        @else
        @php
            header("Location: " . route('login')); 
            exit();
        @endphp
        @endif
      <!-- Sidebar Menu -->
      
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          @if(Auth::user()->designation == 'Encoder')
           <li class="nav-item">
            <a  href="{{route('dashboard')}}" class="nav-link {{ Route::is('dashboard') ?  : '' }}" wire:navigate>
              <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 24 24" width="20px" fill="#FFFFFF">
                <path d="M0 0h24v24H0V0z" fill="none"/>
                <path d="M19 5v2    h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z"/>
              </svg><p>Dashboard </p>
            </a>
          </li> 
 
          <div class="separator" >
            <div class="line"></div>
                <h5 style="color: #9CA0A4;">APPLICATION</h5>
            <div class="line"></div>
          </div>
        
          <li class="nav-item">
            <a  href="{{route('budget')}}" class="nav-link {{ Route::is('budget') ?  : '' }}" wire:navigate>
              <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 24 24" width="20px" fill="#FFFFFF">
                <path d="M0 0h24v24H0V0z" fill="none"/>
                <path d="M7 15h7v2H7zm0-4h10v2H7zm0-4h10v2H7zm12-4h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-.14 0-.27.01-.4.04-.39.08-.74.28-1.01.55-.18.18-.33.4-.43.64-.1.23-.16.49-.16.77v14c0 .27.06.54.16.78s.25.45.43.64c.27.27.62.47 1.01.55.13.02.26.03.4.03h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7-.25c.41 0 .75.34.75.75s-.34.75-.75.75-.75-.34-.75-.75.34-.75.75-.75zM19 19H5V5h14v14z"/>
             </svg><p>Work and Financial Plan</p>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         
            </a>
          </li>
          <li class="nav-item">
            <a  href="{{route('monitoring')}}" class="nav-link {{ Route::is('monitoring') ?  : '' }}" wire:navigate>
              <img src="{{ asset('images/fol.png') }}" style="width: 20px; height: 20px; margin-right: 9px;">Monitoring
            </a>
          </li>
          <li class="nav-item">
            <a  href="{{route('supplement')}}" class="nav-link {{ Route::is('supplement') ?  : '' }}" wire:navigate>
              <img src="{{ asset('images/fol.png') }}" style="width: 20px; height: 20px; margin-right: 9px;"><p>Supplemental</p>
            </a>
          </li>
          <li class="nav-item">
            <a  href="{{route('augmentation')}}" class="nav-link {{ Route::is('augmentation') ?  : '' }}" wire:navigate>
              <img src="{{ asset('images/fol.png') }}" style="width: 20px; height: 20px; margin-right: 9px;"><p>Augmentation</p>
            </a>
          </li>
          <li class="nav-item">
            <a  href="{{route('histoy-form')}}" class="nav-link {{ Route::is('histoy-form') ?  : '' }}" wire:navigate>
              <img src=      "{{ asset('images/fol.png') }}" style="width: 20px; height: 20px; margin-right: 9px;"><p>History</p>
            </a>
          </li> 
         @endif

         @if(Auth::user()->designation == 'Admin')
         <li class="nav-item">
          <a  href="{{route('dashboard')}}" class="nav-link {{ Route::is('dashboard') ?  : '' }}" wire:navigate>
            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 24 24" width="20px" fill="#FFFFFF">
              <path d="M0 0h24v24H0V0z" fill="none"/>
              <path d="M19 5v2    h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z"/>
            </svg><p>Dashboard </p>
          </a>
        </li> 

        <div class="separator" >
          <div class="line"></div>
              <h5 style="color: #9CA0A4;">APPLICATION</h5>
          <div class="line"></div>
        </div>
      
        <li class="nav-item">
          <a  href="{{route('budget')}}" class="nav-link {{ Route::is('budget') ?  : '' }}" wire:navigate>
            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 24 24" width="20px" fill="#FFFFFF">
              <path d="M0 0h24v24H0V0z" fill="none"/>
              <path d="M7 15h7v2H7zm0-4h10v2H7zm0-4h10v2H7zm12-4h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-.14 0-.27.01-.4.04-.39.08-.74.28-1.01.55-.18.18-.33.4-.43.64-.1.23-.16.49-.16.77v14c0 .27.06.54.16.78s.25.45.43.64c.27.27.62.47 1.01.55.13.02.26.03.4.03h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7-.25c.41 0 .75.34.75.75s-.34.75-.75.75-.75-.34-.75-.75.34-.75.75-.75zM19 19H5V5h14v14z"/>
           </svg><p>Work and Financial Plan</p>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         
          </a>
        </li>
        <li class="nav-item">
          <a  href="{{route('monitoring')}}" class="nav-link {{ Route::is('monitoring') ?  : '' }}" wire:navigate>
            <img src="{{ asset('images/fol.png') }}" style="width: 20px; height: 20px; margin-right: 9px;">Monitoring
          </a>
        </li>
     
        <li class="nav-item">
          <a  href="{{route('histoy-form')}}" class="nav-link {{ Route::is('histoy-form') ?  : '' }}" wire:navigate>
            <img src=      "{{ asset('images/fol.png') }}" style="width: 20px; height: 20px; margin-right: 9px;"><p>History</p>
          </a>
        </li>
       @endif

         @if(Auth::user()->designation == 'Monitoring')
         <li class="nav-item">
          <a  href="{{route('dashboard')}}" class="nav-link {{ Route::is('dashboard') ?  : '' }}" wire:navigate>
            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 24 24" width="20px" fill="#FFFFFF">
              <path d="M0 0h24v24H0V0z" fill="none"/>
              <path d="M19 5v2    h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z"/>
            </svg><p>Dashboard </p>
          </a>
        </li> 

        <div class="separator" >
          <div class="line"></div>
              <h5 style="color: #9CA0A4;">APPLICATION</h5>
          <div class="line"></div>
        </div>
    
        <li class="nav-item">
          <a  href="{{route('monitoring')}}" class="nav-link {{ Route::is('monitoring') ?  : '' }}" wire:navigate>
            <img src="{{ asset('images/fol.png') }}" style="width: 20px; height: 20px; margin-right: 9px;">Monitoring
          </a>
        </li>
        @endif
      
        </ul>
      </nav>
  </div>
</aside>      