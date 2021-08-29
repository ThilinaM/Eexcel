@extends('layouts.frontend')
@section('content')
<div class="card">
        <div class="card-header">
                {{ $course->name }}
                
            </div>
            <div class="card-body">
                    {!! $course->description !!}
            </div>
            <div class="card-footer">
                    <div class="pull-right">
                            <a class="btn btn-default" href="{{ route('frontend.courses.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
            </div>
</div>
@endsection