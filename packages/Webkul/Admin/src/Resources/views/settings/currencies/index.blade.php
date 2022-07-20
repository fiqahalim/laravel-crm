@extends('admin::layouts.master')

@section('page_title')
    {{ __('admin::app.currencies.title') }}
@stop

@section('content-wrapper')
    <div class="content full-page">
        <table-component data-src="{{ route('admin.settings.currencies.index') }}">
            <template v-slot:table-header>
                <h1>
                    {!! view_render_event('admin.settings.currencies.index.header.before') !!}

                    {{ Breadcrumbs::render('settings.currencies') }}

                    {{ __('admin::app.currencies.title') }}

                    {!! view_render_event('admin.settings.currencies.index.header.after') !!}
                </h1>
            </template>

            @if (bouncer()->hasPermission('settings.other_settings.tags.create'))
                <template v-slot:table-action>
                    <button class="btn btn-md btn-primary" @click="openModal('addTagModal')">{{ __('admin::app.currencies.create-title') }}</button>
                </template>
            @endif
        <table-component>
    </div>

    <form action="{{ route('admin.settings.currencies.store') }}" method="POST" @submit.prevent="onSubmit">
        <modal id="addTagModal" :is-open="modalIds.addTagModal">
            <h3 slot="header-title">{{ __('admin::app.currencies.create-title') }}</h3>

            <div slot="header-actions">
                {!! view_render_event('admin.settings.currencies.create.form_buttons.before') !!}

                <button class="btn btn-sm btn-secondary-outline" @click="closeModal('addTagModal')">{{ __('admin::app.currencies.cancel') }}</button>

                <button type="submit" class="btn btn-sm btn-primary">{{ __('admin::app.currencies.save-btn-title') }}</button>

                {!! view_render_event('admin.settings.currencies.create.form_buttons.after') !!}
            </div>

            <div slot="body">
                {!! view_render_event('admin.settings.currencies.create.form_controls.before') !!}

                @csrf()

                <div class="form-group" :class="[errors.has('currency_name') ? 'has-error' : '']">
                    <label class="required">
                        {{ __('admin::app.currencies.currency-name') }}
                    </label>

                    <input
                        type="text"
                        name="currency_name"
                        class="control"
                        placeholder="{{ __('admin::app.currencies.currency-name') }}"
                        v-validate="'required'"
                        data-vv-as="{{ __('admin::app.currencies.currency-name') }}"
                    />

                    <span class="control-error" v-if="errors.has('currency_name')">
                        @{{ errors.first('currency_name') }}
                    </span>
                </div>

                <div class="form-group">
                    <label>{{ __('admin::app.settings.tags.color') }}</label>

                    <div class="color-list">
                        <span class="color-item">
                            <input type="radio" id="337CFF" name="color" value="#337CFF">
                            <label for="337CFF" style="background: #337CFF;"></label>
                        </span>

                        <span class="color-item">
                            <input type="radio" id="FEBF00" name="color" value="#FEBF00">
                            <label for="FEBF00" style="background: #FEBF00;"></label>
                        </span>

                        <span class="color-item">
                            <input type="radio" id="E5549F" name="color" value="#E5549F">
                            <label for="E5549F" style="background: #E5549F;"></label>
                        </span>

                        <span class="color-item">
                            <input type="radio" id="27B6BB" name="color" value="#27B6BB">
                            <label for="27B6BB" style="background: #27B6BB;"></label>
                        </span>

                        <span class="color-item">
                            <input type="radio" id="FB8A3F" name="color" value="#FB8A3F">
                            <label for="FB8A3F" style="background: #FB8A3F;"></label>
                        </span>

                        <span class="color-item">
                            <input type="radio" id="43AF52" name="color" value="#43AF52">
                            <label for="43AF52" style="background: #43AF52;"></label>
                        </span>
                    </div>
                </div>

                {!! view_render_event('admin.settings.tags.create.form_controls.after') !!}
            </div>
        </modal>
    </form>
@stop
