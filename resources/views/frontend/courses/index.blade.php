@extends('layouts.frontend')
@section('content')
<div class="card">
    <div class="card-header">{{ trans('cruds.course.title_singular') }} {{ trans('global.list') }}</div>
    <div class="card-body">
            @foreach($courses as $key => $course)
           <div class="row">
                <div class="col-md-8 col-sm-6" >
                     <h4>  <a class="" href="{{ route('frontend.courses.show', $course->id) }}">{{ $course->name ?? '' }} </a></h4>   
                </div>
           </div>
            @endforeach

    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection