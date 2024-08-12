
@extends('layout')
@section('content')
    <div class="container-fluid">
        <h2 class = "ml-1">terms List</h2>
        <a href="{{route('terms.create')}}"  class="btn btn-primary mb-3 float-right">Create</a>

        <table class="ml-1 table table-striped">
            <thead>
            <tr>
                <th>Number</th>
                <th>Starting Date</th>
                <th>Finishing Date</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($terms as $term)
                <tr>
                    <td>{{$term->id}}</td>
                    <td>{{$term->starting_date}}</td>
                    <td>{{$term->finishing_date}}</td>
                    <td style="width: 190px;">
                        <a href="{{route('terms.edit',$term)}}">
							<span class="btn  btn-outline-success btn-sm font-1 mx-1">
								<span class="fas fa-wrench "></span> Edit
							</span>
                        </a>
                        <form method="POST" action="{{route('terms.destroy',$term)}}"
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
        {!! $terms->render() !!}
    </div>
@endsection
