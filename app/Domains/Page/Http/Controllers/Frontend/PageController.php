<?php
namespace App\Domains\Page\Http\Controllers\Frontend;

use App\Domains\Page\Http\Requests\ViewPageRequest;
use App\Domains\Page\Models\Page;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * @param ViewPageRequest $request
     * @param Page $page
     * @return mixed
     */
    public function view(ViewPageRequest $request, Page $page)
    {
        return view('frontend.pages.view')
            ->withPage($page);
    }
}
