@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.account.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <div class="table-responsive-sm">
                    <table class="table table-bordered table-striped table-hover datatable datatable-User">
                        <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th class="center">{{ trans('cruds.account.fields.id') }}</th>
                            <th>{{ trans('cruds.account.fields.name') }}</th>
                            <th>{{ trans('cruds.account.fields.server') }}</th>
                            <th class="center">{{ trans('cruds.account.fields.planet') }}</th>
                            <th class="right">{{ trans('cruds.account.fields.power') }}</th>
                            <th class="right">{{ trans('cruds.account.fields.gem') }}</th>
                            <th class="right">{{ trans('cruds.account.fields.missions') }}</th>
                            <th class="right">{{ trans('cruds.account.fields.map') }}</th>
                            <th class="right">{{ trans('cruds.account.fields.login_at') }}</th>
                            <th class="right">{{ trans('cruds.account.fields.status') }}</th>
                            <th class="right">{{ trans('global.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($accounts as $account)

                        <tr data-entry-id="{{ $account->id }}">
                          <td>

                            </td>
                            <td>{{ $account->id }}</td>
                            <td>{{ $account->name }}</td>
                            <td>{{ $account->server }}</td>
                            <td>{{ $account->planet }}</td>
                            <td>{{ $account->power }}</td>
                            <td>{{ $account->gem }}</td>
                            <td>{{ $account->missions }}</td>
                            <td>{{ $account->map }}</td>
                            <td>{{ $account->login_at }}</td>
                            <td>{{ trans('cruds.account.fields.status_name.'. $account->status) }}</td>
                            <td>
                                @can('accounts_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.accounts.edit', $account->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('accounts_delete')
                                    <form action="{{ route('admin.accounts.destroy', $account->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@endsection
@section('scripts')
    @parent
    <script>
        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('accounts_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.accounts.mass_destroy') }}",
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
                order: [[ 1, 'desc' ]],
                pageLength: 100,
            });
            $('.datatable-User:not(.ajaxTable)').DataTable({ buttons: dtButtons })
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })

    </script>
@endsection