
@extends('layout')
@section('content')
    <div class="container-fluid">
        <div class="mx-3">
{{--            <script>console.log({{$term_Course->id}})</script>--}}
            <form method="post" action="{{route('term_courses.update',$term_Course->id)}}" class="">
                @csrf
                @method('PUT')
                <h2>Course Information</h2>

                <div class="mt-4 row">
                    <div>
                        <input
                            hidden="hidden"
                            type="text"
                            id="id"
                            value="{{old('id',$term_Course->id)}}"
                            name="id" >
                    </div>
                    <div class="form-group col-lg-3 col-md-4">
                        <label for="course_id">Course List:</label>
                        <select class="form-control" name="course_id" id="course_id">
                            <option>
                                Select
                            </option>
                            @foreach($courses as $course)
                                <option @if($course->id == $term_Course->course_id) selected @endif value="{{$course->id}}">{{$course->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-lg-3 col-md-4">
                        <label for="teacher_id">Teachers list:</label>
                        <select class="form-control" name="teacher_id" id="teacher_id">
                            <option>
                                Select
                            </option>
                            @foreach($teachers as $teacher)
                                <option @if($teacher->id == $term_Course->teacher_id) selected @endif value="{{$teacher->id}}">{{$teacher->full_name_ar}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-lg-3 col-md-4">
                        <label for="period_id">Periods list:</label>
                        <select class="form-control" name="period_id" id="period_id">
                            <option>
                                Select
                            </option>
                            @foreach($periods as $period)
                                <option @if($period->id == $term_Course->period_id) selected @endif value="{{$period->id}}">{{$period->strating_time}} - {{$period->finishing_time}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-lg-3 col-md-4">
                        <label for="hall_id">Halls list:</label>
                        <select class="form-control" name="hall_id" id="hall_id">
                            <option>
                                Select
                            </option>
                            @foreach($halls as $hall)
                                <option @if($hall->id == $term_Course->hall_id) selected @endif value="{{$hall->id}}">{{$hall->number}} - {{$hall->floor}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-lg-3 col-md-4" style="width: 35%">
                        <label for="price">Price:</label>
                        <input
                            type="number"
                            class="form-control @error('price') is-invalid @enderror"
                            id="price"
                            value="{{old('price',$term_Course->price)}}"
                            name="price" >
                    </div>
                    <div class="form-group col-lg-3 col-md-4" style="width: 35%">
                        <label for="description">Maximum Number of Student:</label>
                        <input
                            type="text"
                            class="form-control @error('maxmum_num') is-invalid @enderror"
                            id="maxmum_num"
                            value="{{old('maxmum_num',$term_Course->maxmum_num)}}"
                            name="maxmum_num" >
                    </div>
                    <div class="form-group col-lg-3 col-md-4" style="width: 35%">
                        <label for="minimum_num">Minimum Number of Student:</label>
                        <input
                            type="text"
                            class="form-control @error('minimum_num') is-invalid @enderror"
                            id="minimum_num"
                            value="{{old('minimum_num',$term_Course->minimum_num)}}"
                            name="minimum_num" >
                    </div><br>
                    <br>
                    <br>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
    </div>


@endsection
