@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.bankDetail.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.bank-details.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="account_name">{{ trans('cruds.bankDetail.fields.account_name') }}</label>
                            <input class="form-control" type="text" name="account_name" id="account_name" value="{{ old('account_name', '') }}" required>
                            @if($errors->has('account_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('account_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.bankDetail.fields.account_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="account_no">{{ trans('cruds.bankDetail.fields.account_no') }}</label>
                            <input class="form-control" type="text" name="account_no" id="account_no" value="{{ old('account_no', '') }}" required>
                            @if($errors->has('account_no'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('account_no') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.bankDetail.fields.account_no_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="bank_name">{{ trans('cruds.bankDetail.fields.bank_name') }}</label>
                            <input class="form-control" type="text" name="bank_name" id="bank_name" value="{{ old('bank_name', '') }}">
                            @if($errors->has('bank_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('bank_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.bankDetail.fields.bank_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="branch">{{ trans('cruds.bankDetail.fields.branch') }}</label>
                            <input class="form-control" type="text" name="branch" id="branch" value="{{ old('branch', '') }}">
                            @if($errors->has('branch'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('branch') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.bankDetail.fields.branch_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection