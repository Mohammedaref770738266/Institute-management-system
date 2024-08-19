
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
            @foreach($term_courses as $term_Course)
                <tr>
                    <td>{{$term_Course->term_id}}</td>
                    @foreach($courses as $course)
                        @if($course->id == $term_Course->course_id)
                            <td>{{$course->name}}</td>
                        @endif
                    @endforeach
                    <td>{{$term_Course->teacher->full_name_ar}}</td>
                    <td>{{$term_Course->hall->number}} - {{$term_Course->hall->floor}}</td>
                    <td>{{$term_Course->period->strating_time}}</td>
                    <td>{{$term_Course->price}}</td>
                    <td style="width: 190px;">
                        <a href="{{route('term_courses.edit',$term_Course)}}">
							<span class="btn  btn-outline-success btn-sm font-1 mx-1">
								<span class="fas fa-wrench "></span> Edit
							</span>
                        </a>
                        <form method="POST" action="{{route('term_courses.destroy',$term_Course)}}"
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
        {!! $term_courses->render() !!}
    </div>
@endsection
