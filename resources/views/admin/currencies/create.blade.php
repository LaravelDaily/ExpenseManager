@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.currency.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.currencies.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title', trans('quickadmin.currency.fields.title').'', ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('symbol', trans('quickadmin.currency.fields.symbol').'', ['class' => 'control-label']) !!}
                    {!! Form::text('symbol', old('symbol'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('symbol'))
                        <p class="help-block">
                            {{ $errors->first('symbol') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('money_format_thousands', 'Money format for thousands' .'', ['class' => 'control-label']) !!}
                    {!! Form::text('money_format_thousands', old('money_format_thousands'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('money_format_thousands'))
                        <p class="help-block">
                            {{ $errors->first('money_format_thousands') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('money_format_decimal', trans('quickadmin.currency.fields.money-format-decimal').'', ['class' => 'control-label']) !!}
                    {!! Form::text('money_format_decimal', old('money_format_decimal'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('money_format_decimal'))
                        <p class="help-block">
                            {{ $errors->first('money_format_decimal') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

