@extends('layouts.app')
    @section('content')
<div class="card">
    <form action="/store" method="post">
    @csrf
    <div class="form-group has-validation">
        <label>Name<input type="text" name="name" required></label>
    </div>
    <div class="form-group has-validation">
        <label>Email<input type="text" name="email" required></label>
    </div>
    <div class="form-group has-validation">
        <label>Password<input type="password" name="password" required></label>
    </div>
    <div class="form-group has-validation">
        <label>Confirm Password<input type="password" name="password_confirmation" required></label>
    </div> 
    <input type="submit" value="Register" class="btn btn-primary btn-xs py-0">
    <a href="login" class="btn btn-primary btn-xs py-0">Cancel</a>
    </form>
    </div>
    @endsection