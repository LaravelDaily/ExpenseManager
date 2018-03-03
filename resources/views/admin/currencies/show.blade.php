@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.currency.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.currency.fields.title')</th>
                            <td field-key='title'>{{ $currency->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.currency.fields.symbol')</th>
                            <td field-key='symbol'>{{ $currency->symbol }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.currency.fields.money-format')</th>
                            <td field-key='money_format'>{{ $currency->money_format_thousands }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.currency.fields.money-format')</th>
                            <td field-key='money_format'>{{ $currency->money_format_decimal }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.currency.fields.created-by')</th>
                            <td field-key='created_by'>{{ $currency->created_by->name or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.currencies.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
