
@extends('layout')
@section('content')
    <div class="container-fluid">
        <h2 class = "ml-1">Departments List</h2>
        <a href="{{route('departments.create')}}"  class="btn btn-primary mb-3 float-right">Create</a>

        <table class="ml-1 table table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>
            @foreach($departments as $department)
                <tr>
                    <td>{{$department->name}}</td>
                    <td>{{$department->description}}</td>
                    <td style="width: 190px;">
                        <a href="{{route('departments.edit',$department)}}">
							<span class="btn  btn-outline-success btn-sm font-1 mx-1">
								<span class="fas fa-wrench "></span> Edit
							</span>
                        </a>
                        <form method="POST" action="{{route('departments.destroy',$department)}}"
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
        {!! $departments->render() !!}
    </div>
@endsection
