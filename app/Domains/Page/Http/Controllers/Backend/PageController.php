<?php
namespace App\Domains\Page\Http\Controllers\Backend;

use App\Domains\Page\Http\Requests\EditPageRequest;
use App\Domains\Page\Http\Requests\StorePageRequest;
use App\Domains\Page\Http\Requests\UpdatePageRequest;
use App\Domains\Page\Services\PageService;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Domains\Page\Models\Page;
use Throwable;

class PageController extends Controller
{
    /**
     * @var PageService
     */
    public PageService $pageService;

    /**
     * PageController constructor.
     *
     * @param PageService $pageService
     */
    public function __construct(PageService $pageService)
    {
        $this->pageService = $pageService;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        return view('backend.page.index');
    }

    /**
     * @return mixed
     */
    public function create(): View
    {
        $page = new Page();

        return view('backend.page.create')
            ->withPage($page);
    }

    /**
     * @param StorePageRequest $request
     * @return mixed
     * @throws Throwable
     */
    public function store(StorePageRequest $request): RedirectResponse
    {
        $data = $this->pageService->store($request->validated());

        return redirect()
            ->route('admin.pages.edit', $data)
            ->withFlashSuccess(__('The page was successfully created.'));
    }

    /**
     * @param  EditPageRequest  $request
     * @param  Page  $page
     *
     * @return mixed
     */
    public function edit(EditPageRequest $request, Page $page): View
    {
        return view('backend.page.edit')
            ->withPage($page);
    }

    /**
     * @param  UpdatePageRequest  $request
     * @param  Page  $page
     * @return mixed
     * @throws Throwable
     */
    public function update(UpdatePageRequest $request, Page $page): RedirectResponse
    {
        $this->pageService->update($page, $request->validated());

        return redirect()
            ->route('admin.pages.edit', ['page' => $page])
            ->withFlashSuccess(__('The page was successfully updated.'));
    }
}
