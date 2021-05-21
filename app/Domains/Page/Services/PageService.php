<?php
namespace App\Domains\Page\Services;

use App\Domains\Page\Events\PageCreated;
use App\Domains\Page\Models\Page;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;

class PageService extends BaseService
{

    /**
     * PageService constructor.
     *
     * @param  Page  $model
     */
    public function __construct(Page $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $data
     * @return Page
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Page
    {
        DB::beginTransaction();

        try {
            $page = $this->model::create($data);
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());

            throw new GeneralException(__('There was a problem creating this page.'));
        }

        event(new PageCreated($page));

        DB::commit();

        return $page;
    }

    /**
     * @param Page $page
     * @param array $data
     * @return Page
     * @throws GeneralException
     * @throws \Throwable
     */
    public function update(Page $page, array $data = []): Page
    {
        DB::beginTransaction();

        try {
            $page->update($data);
        } catch (\Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating this page.'));
        }

        DB::commit();

        return $page->fresh();
    }
}
