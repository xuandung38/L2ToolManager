@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.key_tool.title_singular') }}: {{ $key->key }}
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-sm-4">
                    <h6 class="mb-3"> {{ trans('global.infomations') }}:</h6>
                    <div><strong>{{ trans('cruds.key_tool.title_singular') }}:</strong> {{ $key->key }}</div>
                    <div><strong>{{ trans('cruds.key_tool.fields.created_at') }}:</strong> {{ $key->created_at }}</div>
                    <div><strong>{{ trans('cruds.key_tool.fields.machine_name') }}:</strong> {{ $key->machine_name }}</div>
                    <div><strong>{{ trans('cruds.key_tool.fields.user') }}:</strong> {{ $key->user->name }}</div>
                    <div><strong>{{ trans('cruds.key_tool.fields.is_active.name') }}:</strong> {{ trans('cruds.key_tool.fields.is_active.'.$key->is_active ) }}</div>
                </div>

                <div class="col-sm-4">
                    <h6 class="mb-3">{{ trans('global.statistics') }}:</h6>
                    <div><strong>Account:</strong> {{ $key->accounts->count() }}</div>
                </div>

            </div>
            @can('accounts_manage')
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
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($key->accounts as $account)
                         <tr>
                             <td></td>
                             <td>{{ $account->id }}</td>
                             <td>{{ $account->name }}</td>
                             <td>{{ $account->server }}</td>
                             <td>{{ $account->planet }}</td>
                             <td>{{ $account->power }}</td>
                             <td>{{ $account->gem }}</td>
                             <td>{{ $account->missions }}</td>
                             <td>{{ $account->map }}</td>
                             <td>{{ $account->login_at }}</td>
                             <td>{{ $account->status }}</td>
                         </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endcan
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

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