
@extends('layout')
@section('content')
    <div class="container-fluid">
        <h2 class = "ml-1">Periods List</h2>
        <a href="{{route('periods.create')}}"  class="btn btn-primary mb-3 float-right">Create</a>
        <button href="" id="format" onclick="convertbetweensystems()" class="btn btn-primary mb-3 float-right mr-2">Change Format</button>

        <table class="ml-1 table table-striped">
            <thead>
            <tr>
                <th>Number</th>
                <th>Starting Time</th>
                <th>Finishing Time</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($periods as $period)
                <tr>
                    <td>{{$period->id}}</td>
                    <td class="strating_time">{{$period->strating_time}}</td>
                    <td class="finishing_time">{{$period->finishing_time}}</td>
                    <td style="width: 190px;">
                        <a href="{{route('periods.edit',$period)}}">
							<span class="btn  btn-outline-success btn-sm font-1 mx-1">
								<span class="fas fa-wrench "></span> Edit
							</span>
                        </a>
                        <form method="POST" action="{{route('periods.destroy',$period)}}"
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
        {!! $periods->render() !!}
    </div>
    <script type="text/javascript">

        function convertbetweensystems(strarting)
        {
            strarting = document.getElementsByClassName('strating_time').textContent;
            strarting = strarting.split(' ');
            if (strarting[1] ==='PM')
            {
                strarting.pop();
                strarting = strarting.join().split(':');
                strarting[0] = (parseInt(strarting[0])+12).toString();
                strarting.push("00");
                strarting= strarting.join(":");
                document.getElementsByClassName('strating_time').textContent = strarting;
            }
            else if (strarting[1] ==='AM')
            {
                strarting.pop();
                strarting.push("00");
                strarting= strarting.join(":");

                document.getElementsByClassName('strating_time').textContent = strarting;

            }
            else
            {
                strarting = strarting.join().split(':');
                var hour = strarting[0];
                var minute = strarting[1];
                var format = hour>=12 ? 'PM':'AM';
                hour = hour%12;
                hour = hour === 0 ? 12 : hour;
                var time = hour + ':' + minute + ' ' + format;
                document.getElementsByClassName('strating_time').textContent = time;
            }

            /////////////////// finishing

        }

    </script>
@endsection
