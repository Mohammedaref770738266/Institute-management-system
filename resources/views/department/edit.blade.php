
@extends('layout')
@section('content')
    <div class="container-fluid">
        <div class="mx-3">
            <form method="post" action="{{route('departments.update',$department)}}" class="">
                @csrf
                @method('PUT')

                <h2>Department Information</h2>
                <div class="mt-4">
                    <div class="form-group" style="width: 35%">
                        <label for="name">Name:</label>
                        <input
                            type="text"
                            class="form-control @error('name') is-invalid @enderror"
                            id="name"
                            value="{{old('name',$department)}}"
                            name="name" >
                    </div>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror()
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea type="text"
                                  class="form-control  @error('description') is-invalid @enderror"
                                  id="description"
                                  value="{{old('description',$department->description)}}"
                                  name="description"
                                  style="height: 100px"
                        >{{$department->description}}</textarea>
                    </div>
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror()
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
