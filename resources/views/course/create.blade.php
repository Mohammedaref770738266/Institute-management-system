
@extends('layout')
@section('content')
    <div class="container-fluid">
        <div class="mx-3">
            <form method="post" action="{{route('courses.store')}}" class="">
                @csrf
                <h2>course Information</h2>
                <div class="mt-4 row">
                    <div class="form-group col-lg-3 col-md-4" style="width: 35%">
                        <label for="name">Name:</label>
                        <input
                            type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            id="name"
                            value="{{old('name')}}"
                            name="name" >
                    </div>
                    <div class="form-group col-lg-3 col-md-4">
                        <label for="sel1">Department list:</label>
                        <select class="form-control" name="department_id" id="department_id">
                            <option>
                                Select
                            </option>
                            @foreach($departments as $department)
                                <option value="{{$department->id}}">{{$department->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-lg-3 col-md-4">
                        <label for="sel1">Book list:</label>
                        <select class="form-control" name="book_id" id="book_id">
                            <option>
                                Select
                            </option>
                            @foreach($books as $book)
                                @if($book->type == 'book')
                                    <option value="{{$book->id}}">{{$book->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-lg-3 col-md-4">
                        <label for="sel1">Story list:</label>
                        <select class="form-control" name="story_id" id="story_id">
                            <option>
                                Select
                              </option>
                            @foreach($books as $book)
                                @if($book->type == 'story')
                                    <option value="{{$book->id}}">{{$book->name}}</option>
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
                            value="{{old('description')}}"
                            name="description" >
                    </div>
                    <div class="form-group col-lg-3 col-md-4" style="width: 35%">
                        <label for="price">Price:</label>
                        <input
                            type="number"
                            class="form-control @error('price') is-invalid @enderror"
                            id="price"
                            value="{{old('price')}}"
                            name="price" >
                    </div>
                    <br>
                    <br>
                    <br>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
    </div>
@endsection
