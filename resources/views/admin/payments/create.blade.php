@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.payment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.payments.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="course_id">{{ trans('cruds.payment.fields.course') }}</label>
                <select class="form-control select2 {{ $errors->has('course') ? 'is-invalid' : '' }}" name="course_id" id="course_id">
                    @foreach($courses as $id => $entry)
                        <option value="{{ $id }}" {{ old('course_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('course'))
                    <div class="invalid-feedback">
                        {{ $errors->first('course') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.course_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="payment_methord_id">{{ trans('cruds.payment.fields.payment_methord') }}</label>
                <select class="form-control select2 {{ $errors->has('payment_methord') ? 'is-invalid' : '' }}" name="payment_methord_id" id="payment_methord_id" required>
                    @foreach($payment_methords as $id => $entry)
                        <option value="{{ $id }}" {{ old('payment_methord_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('payment_methord'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_methord') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.payment_methord_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bank_details_id">{{ trans('cruds.payment.fields.bank_details') }}</label>
                <select class="form-control select2 {{ $errors->has('bank_details') ? 'is-invalid' : '' }}" name="bank_details_id" id="bank_details_id">
                    @foreach($bank_details as $id => $entry)
                        <option value="{{ $id }}" {{ old('bank_details_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('bank_details'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bank_details') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.bank_details_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="amout">{{ trans('cruds.payment.fields.amout') }}</label>
                <input class="form-control {{ $errors->has('amout') ? 'is-invalid' : '' }}" type="number" name="amout" id="amout" value="{{ old('amout', '') }}" step="0.01">
                @if($errors->has('amout'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amout') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.amout_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payment_date">{{ trans('cruds.payment.fields.payment_date') }}</label>
                <input class="form-control date {{ $errors->has('payment_date') ? 'is-invalid' : '' }}" type="text" name="payment_date" id="payment_date" value="{{ old('payment_date') }}">
                @if($errors->has('payment_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.payment_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="transtraction_copy">{{ trans('cruds.payment.fields.transtraction_copy') }}</label>
                <div class="needsclick dropzone {{ $errors->has('transtraction_copy') ? 'is-invalid' : '' }}" id="transtraction_copy-dropzone">
                </div>
                @if($errors->has('transtraction_copy'))
                    <div class="invalid-feedback">
                        {{ $errors->first('transtraction_copy') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.transtraction_copy_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="note">{{ trans('cruds.payment.fields.note') }}</label>
                <textarea class="form-control {{ $errors->has('note') ? 'is-invalid' : '' }}" name="note" id="note">{{ old('note') }}</textarea>
                @if($errors->has('note'))
                    <div class="invalid-feedback">
                        {{ $errors->first('note') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.note_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.payment.fields.payment_status') }}</label>
                <select class="form-control {{ $errors->has('payment_status') ? 'is-invalid' : '' }}" name="payment_status" id="payment_status">
                    <option value disabled {{ old('payment_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Payment::PAYMENT_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('payment_status', 'Pending') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('payment_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.payment_status_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    Dropzone.options.transtractionCopyDropzone = {
    url: '{{ route('admin.payments.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="transtraction_copy"]').remove()
      $('form').append('<input type="hidden" name="transtraction_copy" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="transtraction_copy"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($payment) && $payment->transtraction_copy)
      var file = {!! json_encode($payment->transtraction_copy) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="transtraction_copy" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection