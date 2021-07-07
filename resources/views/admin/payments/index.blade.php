@extends('layouts.admin')
@section('content')
@can('payment_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.payments.create') }}">
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
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Payment">
            <thead>
                <tr>
                    <th width="10">

                    </th>
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
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('payment_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.payments.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.payments.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'course_name', name: 'course.name' },
{ data: 'payment_methord_name', name: 'payment_methord.name' },
{ data: 'bank_details_account_name', name: 'bank_details.account_name' },
{ data: 'bank_details.account_no', name: 'bank_details.account_no' },
{ data: 'bank_details.bank_name', name: 'bank_details.bank_name' },
{ data: 'bank_details.branch', name: 'bank_details.branch' },
{ data: 'amout', name: 'amout' },
{ data: 'payment_date', name: 'payment_date' },
{ data: 'transtraction_copy', name: 'transtraction_copy', sortable: false, searchable: false },
{ data: 'note', name: 'note' },
{ data: 'payment_status', name: 'payment_status' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Payment').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection