@inject('model', '\App\Domains\Page\Models\Page')

@extends('backend.layouts.app')

@section('title', __('Edit a Page'))

@section('content')
    <x-forms.patch :action="route('admin.pages.update', ['page' => $page])">
        <x-backend.card>
            <x-slot name="header">
                @lang('Edit a Page')
            </x-slot>
            <x-slot name="headerActions">
                <x-utils.link class="card-header-action" :href="route('admin.pages.index')" :text="__('Cancel')" />
            </x-slot>

            <x-slot name="body">
                @include('backend.page.includes.details')
            </x-slot>
            <x-slot name="footer">
                <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Save Page')</button>
                <a
                    class="btn btn-sm btn-secondary"
                   href="{{ route('frontend.pages.view', ['page' => $page]) }}"
                   target="_blank"
                >
                    <i class="fas fa-eye"></i>
                    @lang('View')
                </a>
            </x-slot>
        </x-backend.card>
    </x-forms.patch>
@endsection
