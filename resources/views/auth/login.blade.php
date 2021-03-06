@extends('layout')
@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label>Email</label>
            <input name="email"  value="{{ old('email') }}" required 
            class="form-control {{ $errors->has('email')? 'is-invalid': '' }}">
            @if($errors->has('email'))
                <span class="invalid-feedback">
                    {{ $errors->first('email') }}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label>Password</label>
            <input name="password"  required type="password" 
            class="form-control {{ $errors->has('password')? 'is-invalid': '' }}">
            @if($errors->has('password'))
                <span class="invalid-feedback">
                    {{ $errors->first('password') }}
                </span>
            @endif
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="remember"
            value={{ old('remember')? 'checked': '' }}>
            <label class="form-check-label" for="remember">Remember Me</label>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Login</button>
    </form>
@endsection