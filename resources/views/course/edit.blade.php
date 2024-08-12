
@extends('layout')
@section('content')
    <div class="container-fluid">
        <div class="mx-3">
            <form method="post" action="{{route('courses.update',$course)}}" class="">
                @csrf
                @method('PUT')
                <h2>Course Information</h2>
                <div class="mt-4 row">
                    <div class="form-group col-lg-3 col-md-4" style="width: 35%">
                        <label for="name">Name:</label>
                        <input
                            type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            id="name"
                            value="{{old('name',$course)}}"
                            name="name" >
                    </div>
                    <div class="form-group col-lg-3 col-md-4">
                        <label for="sel1">Department list:</label>
                        <select class="form-control" name="department_id" id="department_id">
                            @foreach($departments as $department)
                                <option value="{{$department->id}}" @if($course->department_id == $department->id) selected @endif >{{$department->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-lg-3 col-md-4">
                        <label for="sel1">Book list:</label>
                        <select class="form-control" name="book_id" id="book_id">
                            @foreach($books as $book)
                                @if($book->type == 'book')
                                    <option value="{{$book->id}}" @if($course->book_id == $book->id) selected @endif >{{$book->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-lg-3 col-md-4">
                        <label for="sel1">Story list:</label>
                        <select class="form-control" name="story_id" id="story_id">
                            @foreach($books as $book)
                                @if($book->type == 'story')
                                    <option value="{{$book->id}}" @if($course->story_id == $book->id) selected @endif >{{$book->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-lg-3 col-md-4" style="width: 35%">
                        <label for="description">Description:</label>
                        <input
                            type="text"
                            class="form-control @error('description') is-invalid @enderror"
                            id="description"
                            value="{{old('description',$course)}}"
                            name="description" >
                    </div>
                    <div class="form-group col-lg-3 col-md-4" style="width: 35%">
                        <label for="price">Price:</label>
                        <input
                            type="number"
                            class="form-control @error('price') is-invalid @enderror"
                            id="price"
                            value="{{old('price',$course)}}"
                            name="price" >
                    </div>
                    <input style="display: none" type="number" name="id" value="{{old('id',$course->id)}}">
                    <br>
                    <br>
                    <br>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
    </div>


@endsection
