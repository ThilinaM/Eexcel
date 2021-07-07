@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.payment.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.payments.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.payment.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $payment->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.payment.fields.course') }}
                                    </th>
                                    <td>
                                        {{ $payment->course->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.payment.fields.payment_methord') }}
                                    </th>
                                    <td>
                                        {{ $payment->payment_methord->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.payment.fields.bank_details') }}
                                    </th>
                                    <td>
                                        {{ $payment->bank_details->account_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.payment.fields.amout') }}
                                    </th>
                                    <td>
                                        {{ $payment->amout }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.payment.fields.payment_date') }}
                                    </th>
                                    <td>
                                        {{ $payment->payment_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.payment.fields.transtraction_copy') }}
                                    </th>
                                    <td>
                                        @if($payment->transtraction_copy)
                                            <a href="{{ $payment->transtraction_copy->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $payment->transtraction_copy->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.payment.fields.note') }}
                                    </th>
                                    <td>
                                        {{ $payment->note }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.payment.fields.payment_status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Payment::PAYMENT_STATUS_SELECT[$payment->payment_status] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.payments.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection