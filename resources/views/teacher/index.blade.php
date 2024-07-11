
@extends('layout')
@section('content')
    <div class="container-fluid">
        <h2 class = "ml-1">teachers List</h2>
        <a href="{{route('teachers.create')}}"  class="btn btn-primary mb-3 float-right">create</a>

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
            @foreach($teachers as $teacher)
                <tr>
                    <td>{{$teacher->full_name_ar}}</td>
                    <td>{{$teacher->full_name_en}}</td>
                    <td>{{$teacher->gender}}</td>
                    <td>{{$teacher->phone_number}}</td>
                    <td style="width: 190px;">
                        <a href="{{route('teachers.edit',$teacher)}}">
							<span class="btn  btn-outline-success btn-sm font-1 mx-1">
								<span class="fas fa-wrench "></span> Edit
							</span>
                        </a>
                        <form method="POST" action="{{route('teachers.destroy',$teacher)}}"
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
        {!! $teachers->render() !!}
    </div>
@endsection
