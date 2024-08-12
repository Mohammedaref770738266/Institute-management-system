
@extends('layout')
@section('content')
    <div class="container-fluid">
        <h2 class = "ml-1">Term Courses List</h2>
        <a href="{{route('term_courses.create')}}"  class="btn btn-primary mt-5 mb-3 float-right">Create</a>
        <div class="form-group col-lg-3 col-md-4 mt-3">
            <label for="usr">Filter:</label>
            <input type="text" class="form-control" id="usr">
        </div>
        <table class="ml-1 table table-striped">
            <thead>
            <tr>
                <th>Term</th>
                <th>Course</th>
                <th>Teacher</th>
                <th>Hall</th>
                <th>Period</th>
                <th>price</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
{{--            {{$combinedArray = array_combine($term_courses, $data)}}--}}
            @foreach($term_courses as $term_course)
                <tr>
                    <td>{{$term_course->term->id}}</td>
{{--                    @foreach($term->courses as $course)--}}
                        <td>{{$term_course->course->name}}</td>
{{--                    @endforeach--}}
                    <td>{{$term_course->teacher->full_name_ar}}</td>
                    <td>{{$term_course->hall->number}} - {{$term_course->hall->floor}}</td>
                    <td>{{$term_course->period->strating_time}}</td>
                    <td>{{$term_course->price}}</td>
                    <td style="width: 190px;">
                        <a href="{{route('term_courses.edit',$term_course)}}">
							<span class="btn  btn-outline-success btn-sm font-1 mx-1">
								<span class="fas fa-wrench "></span> Edit
							</span>
                        </a>
                        <form method="POST" action="{{route('term_courses.destroy',$term_course)}}"
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
{{--        {!! $term->render() !!}--}}
    </div>
@endsection
