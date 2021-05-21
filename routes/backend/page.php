<?php

use App\Domains\Page\Http\Controllers\Backend\PageController;
use Tabuna\Breadcrumbs\Trail;
use App\Domains\Page\Models\Page;

Route::group(
    [
        'prefix' => 'pages',
        'as' => 'pages.',
    ],
    function () {
        Route::get('/', [PageController::class, 'index'])
            ->name('index')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.dashboard')
                    ->push(__('Pages'), route('admin.pages.index'));
            });

        // Create, routed at /admin/pages/create
        Route::get('/create', [PageController::class, 'create'])
            ->name('create')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.pages.index')
                    ->push(__('Create a Page'), route('admin.pages.create'));
            });

        Route::post('/', [PageController::class, 'store'])
            ->name('store');

        // Edit, routed at /admin/pages/{page}/edit
        Route::group(['prefix' => '{page}'], function () {
            Route::get('edit', [PageController::class, 'edit'])
                ->name('edit')
                ->breadcrumbs(function (Trail $trail, Page $page) {
                    $trail->parent('admin.pages.index', $page)
                        ->push(__($page->title), route('admin.pages.edit', $page));
                });

            Route::patch('/', [PageController::class, 'update'])->name('update');
        });
    }
);
