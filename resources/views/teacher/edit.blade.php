
@extends('layout')
@section('content')
    <div class="container-fluid">
        <div class="mx-3">
            <form method="post" action="{{route('teachers.update',$teacher)}}" class="">
                @csrf
                @method('PUT')
                <h2>teacher Information</h2>
                <div class="row">
                    <div class="form-group col-lg-3 col-md-4">
                        <label for="name_ar">Arabic Name:</label>
                        <input type="text" class="form-control @error('name_ar') is-invalid @enderror " id="name_ar" value="{{old('name_ar',$teacher->full_name_ar)}}" name="name_ar" >
                    </div>
                    {{--                @error('name_ar')--}}
                    {{--                    <div class="alert alert-danger">{{ $message }}</div>--}}
                    {{--                @enderror()--}}
                    <div class="form-group col-lg-3 col-md-4">
                        <label for="name_en">English Name:</label>
                        <input type="text" class="form-control @error('name_en') is-invalid @enderror " id="name_en" value="{{old('name_en',$teacher->full_name_en)}}" name="name_en" >
                    </div>
                    <div class="form-group col-lg-3 col-md-4">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" value="{{old('address',$teacher->address)}}" name="address" >
                    </div>
                    <div class="form-group col-lg-3 col-md-4">
                        <label for="phone">Phone Number:</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{old('phone',$teacher->phone_number)}}" name="phone" >
                    </div>
                    <div class="form-group col-lg-3 col-md-4">
                        <label for="birth_p">Birth Place:</label>
                        <input type="text" class="form-control @error('birth_p') is-invalid @enderror" id="birth_p" value="{{old('birth_p',$teacher->birth_place)}}" name="birth_p" >
                    </div>
                    <div class="form-group col-lg-3 col-md-4">
                        <label for="birth_d">Birth Day:</label>
                        <input type="date" class="form-control @error('birth_d') is-invalid @enderror" id="birth_d" value="{{old('birth_d',$teacher->birth_day)}}" name="birth_d" >
                    </div>
                    <div class="form-group col-lg-3 col-md-4">
                        <label for="qualification">Qualification:</label>
                        <input type="text" class="form-control @error('qualification') is-invalid @enderror" id="qualification" value="{{old('qualification',$teacher->qualification)}}" name="qualification" >
                    </div>
                    <div class="form-group col-lg-3 col-md-4">
                        <label for="salary">Salary:</label>
                        <input type="text" class="form-control @error('salary') is-invalid @enderror" id="salary" value="{{old('salary',$teacher->salary)}}" name="salary" >
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <label for="gender">Gender:</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" @if($teacher->gender === 'Male') checked @endif  value="male" name="gender">Male
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" @if($teacher->gender === 'Female') checked @endif  value="female" name="gender">Female
                            </label>
                        </div>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" @if($teacher->status)checked @endif name="status">Status
                        </label>
                    </div>
                </div>
                <br>
                <br>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a class="btn btn-danger" href="{{route('teachers.index')}}">cancel</a>
            </form>
        </div>
    </div>
@endsection
