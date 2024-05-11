@extends('layout.main')

@section('title','edit student')

@section('content')
        <h1>Edit Student</h1>
        <a href="{{url('getallstudent')}}" class="btn btn-info">Back</a>

        <form method="POST" action="{{url('editstudentsavedb/'. $student->id)}}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Student name</label>
                <input value="{{$student->name}}" type="text" class="form-control" id="name" name="name" aria-describedby="">    
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Student phone</label>
                <input value="{{$student->phone}}" type="text" class="form-control" id="phone" name="phone" aria-describedby="">    
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Student email</label>
                <input value="{{$student->email}}" type="email" class="form-control" id="email" name="email" aria-describedby="">    
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
        </form>

        @endsection