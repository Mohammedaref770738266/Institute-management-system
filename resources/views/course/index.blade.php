
@extends('layout')
@section('content')
    <div class="container-fluid">
        <h2 class = "ml-1">Courses List</h2>
        <a href="{{route('courses.create')}}"  class="btn btn-primary mb-3 float-right">Create</a>

        <table class="ml-1 table table-striped">
            <thead>
            <tr>
                <th>Order</th>
                <th>Name</th>
                <th>Department</th>
                <th>Book</th>
                <th>Story</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($courses as $course)
                <tr>
                    <td>{{$course->order}}</td>
                    <td>{{$course->name}}</td>
                    <td>{{$course->department->name}}</td>
                    <td>{{$course->book->name}}</td>
                    <td>{{$course->story->name}}</td>
                    <td style="width: 190px;">
                        <a href="{{route('courses.edit',$course)}}">
							<span class="btn  btn-outline-success btn-sm font-1 mx-1">
								<span class="fas fa-wrench "></span> Edit
							</span>
                        </a>
                        <form method="POST" action="{{route('courses.destroy',$course)}}"
                              class="d-inline-block">
                            @csrf
                            @method("DELETE")
                            <button class="btn  btn-outline-danger btn-sm font-1 mx-1"
                                    onclick="var result = confirm('Are you sure of deleting this ?');
                         if(result){}else{event.preventDefault()}">
                                <span class="fas fa-trash "></span> Delete
                            </button>
                        </form>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $courses->render() !!}
    </div>
@endsection
