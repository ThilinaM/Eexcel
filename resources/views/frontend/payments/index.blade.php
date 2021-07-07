@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('payment_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.payments.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.payment.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.payment.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Payment">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.payment.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.payment.fields.course') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.payment.fields.payment_methord') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.payment.fields.bank_details') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.bankDetail.fields.account_no') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.bankDetail.fields.bank_name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.bankDetail.fields.branch') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.payment.fields.amout') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.payment.fields.payment_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.payment.fields.transtraction_copy') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.payment.fields.note') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.payment.fields.payment_status') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($payments as $key => $payment)
                                    <tr data-entry-id="{{ $payment->id }}">
                                        <td>
                                            {{ $payment->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $payment->course->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $payment->payment_methord->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $payment->bank_details->account_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $payment->bank_details->account_no ?? '' }}
                                        </td>
                                        <td>
                                            {{ $payment->bank_details->bank_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $payment->bank_details->branch ?? '' }}
                                        </td>
                                        <td>
                                            {{ $payment->amout ?? '' }}
                                        </td>
                                        <td>
                                            {{ $payment->payment_date ?? '' }}
                                        </td>
                                        <td>
                                            @if($payment->transtraction_copy)
                                                <a href="{{ $payment->transtraction_copy->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $payment->transtraction_copy->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $payment->note ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Payment::PAYMENT_STATUS_SELECT[$payment->payment_status] ?? '' }}
                                        </td>
                                        <td>
                                            @can('payment_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.payments.show', $payment->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('payment_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.payments.edit', $payment->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('payment_delete')
                                                <form action="{{ route('frontend.payments.destroy', $payment->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('payment_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.payments.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Payment:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection