<div>
    <body class="hold-transition login-page">
        <div class="login-box">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="card">

                <div class="card-body login-card-body">
                    <div class="login-logo">
                        <img src="{{asset('images/logo.png')}}" alt="iOksi" class="brand-image" height="100px;">
                    </div>
                    <p class="login-box-msg">Work Financial Plan System</p>
           
                    <form wire:submit.prevent="login">
                    
                        <div class="input-group mb-3">
                            <input type="email" wire:model.lazy="email" class="form-control"
                            placeholder="Email Address">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" wire:model.lazy="password"
                                class="form-control" placeholder="Password">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>

                       

                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>                
                </form>


                    <div class="dropdown-divider m-4"></div>
                    <div class="text-center text-xs m-2">
                        <div><strong>Powered and Manage by</strong></div>
                        <div>Management Information System Division</div>
                        <div>Copyright © 2023 All rights reserved</div>
                        <img src="{{ asset('/images/MIS.png')}}" alt="..." width="10%" height="10%">
                    </div>
                </div>
            </div>
        </div>
    </body>
</div>