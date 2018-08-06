@extends('layouts.app')
@section('content')

<div class="container">
      <h1>{{$title}}</h1>
      @if(count($services) > 0)
            <ul class="list-group">
                  @foreach($services as $service)     <!--foreach loops through 'services' in the array-->
                        <li class="list-group-item">{{$service}}</li>         <!--list out array content-->
                  @endforeach                         <!--end the loop at the end of array-->
            </ul>
       @endif                                         <!--end the if conditional statement-->

</div>
@endsection