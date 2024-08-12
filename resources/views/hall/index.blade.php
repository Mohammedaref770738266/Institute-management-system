
@extends('layout')
@section('content')
    <div class="container-fluid">
        <h2 class = "ml-1">halls List</h2>
        <a href="{{route('halls.create')}}"  class="btn btn-primary mb-3 float-right">Create</a>

        <table class="ml-1 table table-striped">
            <thead>
            <tr>
                <th>Hall Number</th>
                <th>Floor Number</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>
            @foreach($halls as $hall)
                <tr>
                    <td>{{$hall->number}}</td>
                    <td>{{$hall->floor}}</td>
                    <td style="width: 190px;">
                        <a href="{{route('halls.edit',$hall)}}">
							<span class="btn  btn-outline-success btn-sm font-1 mx-1">
								<span class="fas fa-wrench "></span> Edit
							</span>
                        </a>
                        <form method="POST" action="{{route('halls.destroy',$hall)}}"
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
        {!! $halls->render() !!}
    </div>
@endsection
