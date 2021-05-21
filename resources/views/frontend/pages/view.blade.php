@extends('frontend.layouts.app')

@section('title', $page->title)
@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <x-frontend.card>
                    <x-slot name="header">
                        {{ $page->title }}
                    </x-slot>

                    <x-slot name="body">
                        {{ $page->content }}
                    </x-slot>
                </x-frontend.card>
            </div>
        </div>
    </div>
@endsection
