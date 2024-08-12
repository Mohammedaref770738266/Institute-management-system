
@extends('layout')
@section('content')
    <div class="container-fluid">
        <div class="mx-3">
            <form method="post" action="{{route('halls.store')}}" class="">
                @csrf
                <h2>Hall Information</h2>
                <div class="mt-4">
                    <div class="form-group" style="width: 35%">
                        <label for="number">Number:</label>
                        <input
                            type="text"
                            class="form-control @error('number') is-invalid @enderror"
                            id="number"
                            value="{{old('number')}}"
                            name="number" >
                    </div>
                    <div class="form-group" style="width: 35%">
                        <label for="floor">Floor:</label>
                        <input
                            type="text"
                            class="form-control @error('floor') is-invalid @enderror"
                            id="floor"
                            value="{{old('floor')}}"
                            name="floor" >
                    </div>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror()
                </div>

                    <br>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
@endsection
