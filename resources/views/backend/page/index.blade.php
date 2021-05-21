@extends('backend.layouts.app')

@section('title', __('Manage Pages'))


@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Manage Pages')
        </x-slot>

        <x-slot name="headerActions">
            <x-utils.link
                icon="c-icon cil-plus"
                class="card-header-action"
                :href="route('admin.pages.create')"
                :text="__('Create Page')"
            />
        </x-slot>

        <x-slot name="body">
            <livewire:page.page-table />
        </x-slot>
    </x-backend.card>
@endsection
