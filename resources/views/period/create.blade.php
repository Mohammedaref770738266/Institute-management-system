
@extends('layout')
@section('content')
    <div class="container-fluid">
        <div class="mx-3">
            <form method="post" action="{{route('periods.store')}}" class="">
                @csrf
                <h2>Period Information</h2>
                <div class="mt-4">
                    <div class="form-group" style="width: 35%">
                        <label for="strating_time">Starting Time:</label>
                        <input
                            type="time"
                            class="form-control @error('strating_time') is-invalid @enderror"
                            id="strating_time"
                            value="{{old('strating_time')}}"
                            name="strating_time" >
                    </div>
                    <div class="form-group" style="width: 35%">
                        <label for="finishing_time">Finishing Time:</label>
                        <input
                            type="time"
                            class="form-control @error('finishing_time') is-invalid @enderror"
                            id="finishing_time"
                            value="{{old('finishing_time')}}"
                            name="finishing_time" >
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
