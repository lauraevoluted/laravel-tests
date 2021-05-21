@inject('model', '\App\Domains\Page\Models\Page')

@extends('backend.layouts.app')

@section('title', __('Create a Page'))

@section('content')
    <x-forms.post :action="route('admin.pages.store')">
        <x-backend.card>
            <x-slot name="header">
                @lang('Create a Page')
            </x-slot>
            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.pages.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                @include('backend.page.includes.details')
            </x-slot>
            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Create Page')</button>
            </x-slot>
        </x-backend.card>
    </x-forms.post>
@endsection
