{{-- {{dd($student)}} --}}



{{-- @foreach ($student as $getstudent )
    {{$getstudent->name}}<br>
    {{$getstudent->email}}<br>
    {{$getstudent->phone}}<br>
@endforeach --}}


@extends('layout.main')
@section('title','get students')

@section('content')
    <h1>Student list</h1>
    <div class="alert alert-success">saved</div>


    <a href="{{url('savestudent')}}" class="btn btn-primary">Add new student</a>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Status</th>
          <th scope="col">Phone</th>
          <th scope="col">Created at</th>
          <th scope="col">Updated at</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($student as $getstudent )
        <tr>
          <th scope="row"> {{$getstudent->id}}</th>
          <td> {{$getstudent->name}}</td>
          <td> {{$getstudent->phone}}</td>
          <td> {{$getstudent->email}}</td>
          <td> {{$getstudent->getStatus()}}</td>
          <td> {{$getstudent->created_at->format('Y-F-d')}}</td>
          <td> {{$getstudent->updated_at->diffForHumans()}}</td>

          <td> 
            <div>
              <a href="{{url('editstudent/'. $getstudent->id)}}" class="btn btn-primary">Edit</a>
              <a href="{{url('students.view', [$getstudent->id])}}" class="btn btn-primary">Get details</a>
              <form action="{{url("deletestudent/". $getstudent->id)}}" method="POST">
                @csrf
                @method('delete')
              <button type="submit" class="btn btn-danger"> Delete</button>
              </form>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    {{-- {{ $getstudent->links() }} --}}

   @endsection