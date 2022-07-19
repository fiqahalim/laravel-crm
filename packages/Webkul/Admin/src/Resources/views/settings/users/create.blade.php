@extends('admin::layouts.master')

@section('page_title')
    {{ __('admin::app.settings.users.create-title') }}
@stop

@section('content-wrapper')
    <div class="content full-page adjacent-center">
        {!! view_render_event('admin.settings.users.create.header.before') !!}

        <div class="page-header">
            
            {{ Breadcrumbs::render('settings.users.create') }}

            <div class="page-title">
                <h1>{{ __('admin::app.settings.users.create-title') }}</h1>
            </div>
        </div>

        {!! view_render_event('admin.settings.users.create.header.after') !!}
    </div>
@stop
