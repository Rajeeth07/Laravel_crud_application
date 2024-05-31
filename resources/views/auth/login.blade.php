@extends('layouts.app')
        @section('content')
<div class="card">   
<div class="card-body">
    <form action="authenticate" method="post">
        @csrf
        <div class="form-group has-validation">
            <label for="email">Email<input type="text" name="email" required></label>
        </div>
        <div class="form-group has-validation">        
            <label for="password">Password<input type="password" name="password" required></label>
        </div>
        <input type="submit" value="login" class="btn btn-primary btn-xs py-0">
        <a href="/register" class="btn btn-primary btn-xs py-0">Register</a>    
    </form>
</div>
</div>
@endsection