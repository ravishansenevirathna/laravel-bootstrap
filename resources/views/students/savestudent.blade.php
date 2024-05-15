@extends('layout.main')

@section('title','save student')

@section('content')
        <h1>Add Student</h1>
        <a href="{{url('getallstudent')}}" class="btn btn-info">Back</a>

        <form method="POST" action="{{url('savestudenttothedb')}}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Student name</label>
                <input value="{{old('name')}}" type="text" class="@error('name') is-invalid @enderror form-control" id="name" name="name" aria-describedby=""> 
                @error('name')
                    <div class="color-red text-sm">{{$message}}</div>
                @enderror   
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Student phone</label>
                <input type="text" class="form-control" id="phone" name="phone" aria-describedby="">    
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Student email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="">    
            </div>
            
            <button type="submit" class="btn btn-primary">Save</button>
        </form>

        @endsection