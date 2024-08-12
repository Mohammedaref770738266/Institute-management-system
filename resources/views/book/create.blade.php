
@extends('layout')
@section('content')
    <div class="container-fluid">
        <div class="mx-3">
            <form method="post" action="{{route('books.store')}}" class="">
                @csrf
                <h2>Book Information</h2>
                <div class="mt-4">
                    <div class="form-group" style="width: 35%">
                        <label for="name">Name:</label>
                        <input
                            type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            id="name"
                            value="{{old('name')}}"
                            name="name" >
                    </div>
                    <div class="form-group" style="width: 35%">
                        <label for="price">Price:</label>
                        <input
                            type="text"
                            class="form-control @error('price') is-invalid @enderror"
                            id="price"
                            value="{{old('price')}}"
                            name="price" >
                    </div>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror()
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea type="text"
                                  class="form-control  @error('description') is-invalid @enderror"
                                  id="description"
                                  value="{{old('description')}}"
                                  name="description"
                                  style="height: 100px"
                        ></textarea>
                    </div>
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror()
                    <div class="">
                        <label for="type">Type:</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio"
                                       class="form-check-input"
                                       @checked(old('type')=='book'||old('type')==null )
                                       value="book"
                                       name="type">Book
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio"
                                       class="form-check-input"
                                       @checked(old('type')=='female')
                                       value="story"
                                       name="type">Story
                            </label>
                        </div>
                    </div>
                        <br>
                        <br>
                        <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>
    </div>
@endsection
