@extends('layouts.app')
    @section('content')
        <div class="card">
            <div class="card-body">  
                    <h1>Confirm Delete</h1>
                    <h4>Are you sure you want to delete <b>{{$employee->name}}</b> information?</h4>
                    <div class="d-flex">
                            <form action="{{route('employee.destroy',$employee->id)}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-xs py-1 mx-1">Delete</button>
                            </form>
                                <a href="{{route('welcome')}}" class="btn btn-primary btn-xs py-1 mx-1">Cancel</a>
                    </div>
            </div>
        </div>
    @endsection
            