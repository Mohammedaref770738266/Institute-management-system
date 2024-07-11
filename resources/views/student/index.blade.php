
@extends('layout')
@section('content')
<div class="container-fluid">
    <h2 class = "ml-1">Students List</h2>
    <a href="{{route('students.create')}}"  class="btn btn-primary mb-3 float-right">create</a>

    <table class="ml-1 table table-striped">
        <thead>
        <tr>
            <th>Arabic Name</th>
            <th>English Name</th>
            <th>Gender</th>
            <th>Phone Number</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
        <tr>
            <td>{{$student->full_name_ar}}</td>
            <td>{{$student->full_name_en}}</td>
            <td>{{$student->gender}}</td>
            <td>{{$student->phone_number}}</td>
            <td style="width: 190px;">
                <a href="{{route('students.edit',$student)}}">
							<span class="btn  btn-outline-success btn-sm font-1 mx-1">
								<span class="fas fa-wrench "></span> Edit
							</span>
                </a>
                <form method="POST" action="{{route('students.destroy',$student)}}"
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
    {!! $students->render() !!}
</div>
@endsection
