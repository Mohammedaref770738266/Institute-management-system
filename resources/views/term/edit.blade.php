
@extends('layout')
@section('content')
    <div class="container-fluid">
        <div class="mx-3">
            <form method="post" action="{{route('terms.update',$term)}}" class="">
                @csrf
                <h2>Term Information</h2>
                <div class="mt-4">
                    <div class="form-group" style="width: 35%">
                        <label for="starting_date">Starting Date:</label>
                        <input
                            type="date"
                            class="form-control @error('starting_date') is-invalid @enderror"
                            id="starting_date"
                            value="{{old('starting_date',$term)}}"
                            name="starting_date" >
                    </div>
                    <div class="form-group" style="width: 35%">
                        <label for="finishing_date">Finishing Date:</label>
                        <input
                            type="date"
                            class="form-control @error('finishing_date') is-invalid @enderror"
                            id="finishing_date"
                            value="{{old('finishing_date',$term)}}"
                            name="finishing_date" >
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" @if($term->finished)checked @endif name="finished">Finished
                        </label>
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
