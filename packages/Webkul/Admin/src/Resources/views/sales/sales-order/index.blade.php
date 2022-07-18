@extends('admin::layouts.master')

@section('page_title')
    {{ __('admin::app.sales.title') }}
@stop

@section('content-wrapper')
    <div class="content full-page">
        <table-component data-src="{{ route('admin.sales-order.index') }}">
            <template v-slot:table-header>
                <h1>
                    {!! view_render_event('admin.sales.index.header.before') !!}

                    {{ Breadcrumbs::render('sales-order') }}

                    {{ __('admin::app.sales.sales-order.title') }}

                    {!! view_render_event('admin.sales-order.index.header.after') !!}
                </h1>
            </template>

            @if (bouncer()->hasPermission('sales-order.create'))
                <template v-slot:table-action>
                    <a href="{{ route('admin.sales-order.create') }}" class="btn btn-md btn-primary">{{ __('admin::app.sales.sales-order.create-title') }}</a>
                </template>
            @endif
        <table-component>
    </div>
@stop
