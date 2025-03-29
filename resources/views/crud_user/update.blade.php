@extends('dashboard')

@section('content')
<div class="container list">
    <div class="box">
        <div class="form-box update">
            <form action="{{ route('user.postUpdateUser') }}" method="POST">
                @csrf
                <h2>Update User</h2>
                <input name="id" type="hidden" value="{{$user->id}}">
                <div class="input-box">
                    <span class="icon"><i class='bx bxs-user'></i></span>
                    <input type="text" name="name" id="name" value="{{ $user->name }}" required>
                    <label>Name</label>
                </div>
                <div class="input-box">
                    <span class="icon"><i class='bx bxs-envelope'></i></span>
                    <input type="email" name="email" id="email" value="{{ $user->email }}" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><i class='bx bxs-phone'></i></span>
                    <input type="text" name="phone" id="phone" value="{{ $user->phone }}" required>
                    <label>Phone</label>
                </div>
                <div class="input-box">
                    <span class="icon"><i class='bx bxs-home'></i></span>
                    <input type="text" name="address" id="address" value="{{ $user->address }}" required>
                    <label>Address</label>
                </div>
                <div class="input-box">
                    <span class="icon"><i class='bx bxs-lock-alt'></i></span>
                    <input type="password" name="password" id="password" required>
                    <label>Password</label>
                </div>
                <button class="btn" type="submit">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection