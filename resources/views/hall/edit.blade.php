
@extends('layout')
@section('content')
    <div class="container-fluid">
        <div class="mx-3">
            <form method="post" action="{{route('halls.update',$hall)}}" class="">
                @csrf
                @method('PUT')
                <h2>Hall Information</h2>
                <div class="mt-4">
                    <div class="form-group" style="width: 35%">
                        <label for="number">Number:</label>
                        <input
                            type="number"
                            class="form-control @error('number') is-invalid @enderror"
                            id="number"
                            value="{{old('number',$hall)}}"
                            name="number" >
                    </div>
                    <div class="form-group" style="width: 35%">
                        <label for="floor">Floor:</label>
                        <input
                            type="number"
                            class="form-control @error('floor') is-invalid @enderror"
                            id="floor"
                            value="{{old('floor',$hall)}}"
                            name="floor" >
                    </div>
                </div>
                    <br>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
