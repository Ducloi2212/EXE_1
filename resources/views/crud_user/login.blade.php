@extends('dashboard')

@section('content')
<div class="container">
    <div class="content">
        <div class="text-sci">
            <h2>Welcome!</h2><br><span>To Our New Website </span>
        </div>
    </div>

    <div class="logreg-box">
        <div class="form-box login">
            <form method="POST" action="{{ route('user.authUser') }}">
                @csrf
                <h2>Sign In</h2>
                <div class="input-box">
                    <span class="icon"><i class='bx bxs-envelope'></i></span>
                    <input type="email" name="email" id="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><i class='bx bxs-lock-alt'></i></span>
                    <input type="password" name="password" id="password" required>
                    <label>Password</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox">Remember me</label>
                    <a href="#">Forgot password?</a>
                </div>
                <div>
                    @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                    @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                </div>
                <button class="btn" type="submit">Sign In</button>
                <div class="login-register">
                    <p>Don't have an account? <a href="#" class="register-link">Sign Up</a></p>
                </div>
            </form>
        </div>

        <div class="form-box register">
            <div class="regis">
                <form action="{{ route('user.postUser') }}" method="POST">
                    @csrf
                    <h2>Sign Up</h2>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-user'></i></span>
                        <input type="text" name="name" id="name" required>
                        <label>Name</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-envelope'></i></span>
                        <input type="email" name="email" id="email" required>
                        <label>Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-phone'></i></span>
                        <input type="text" name="phone" id="phone" required>
                        <label>Phone</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-home'></i></span>
                        <input type="text" name="address" id="address" required>
                        <label>Address</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-lock-alt'></i></span>
                        <input type="password" name="password" id="password" required>
                        <label>Password</label>
                    </div>
                    <div>
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                        @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                        @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <button class="btn" type="submit">Sign Up</button>
                    <div class="login-register">
                        <p>Already have an account? <a href="#" class="login-link">Sign In</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection