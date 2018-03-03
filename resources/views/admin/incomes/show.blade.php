@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.income.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.income.fields.income-category')</th>
                            <td field-key='income_category'>{{ $income->income_category->name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.income.fields.entry-date')</th>
                            <td field-key='entry_date'>{{ $income->entry_date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.income.fields.amount')</th>
                            <td field-key='amount'>{{ $income->income_currency->symbol . ' ' . number_format($income->amount, 2, $income->income_currency->money_format_decimal, $income->income_currency->money_format_thousands) }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.income.fields.created-by')</th>
                            <td field-key='created_by'>{{ $income->created_by->name or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.incomes.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
