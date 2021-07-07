@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.lesson.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.lessons.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.lesson.fields.id') }}
                        </th>
                        <td>
                            {{ $lesson->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lesson.fields.course') }}
                        </th>
                        <td>
                            {{ $lesson->course->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lesson.fields.title') }}
                        </th>
                        <td>
                            {{ $lesson->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lesson.fields.description') }}
                        </th>
                        <td>
                            {!! $lesson->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lesson.fields.video_link') }}
                        </th>
                        <td>
                            {{ $lesson->video_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lesson.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Lesson::STATUS_SELECT[$lesson->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.lesson.fields.free_lesson') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $lesson->free_lesson ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.lessons.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection