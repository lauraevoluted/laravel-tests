<?php

use App\Domains\Page\Http\Controllers\Frontend\PageController;

// View a page, routed at /page/{slug}
Route::group(['prefix' => 'page', 'as' => 'pages.'], function () {
    Route::get('{page}', [PageController::class, 'view'])->name('view');
});
