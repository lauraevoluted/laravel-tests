<?php
namespace App\Domains\Page\Events;

use App\Domains\Page\Models\Page;
use Illuminate\Queue\SerializesModels;

class PageCreated
{
    use SerializesModels;

    /**
     * @var Page
     */
    public Page $page;

    /**
     * PageCreated constructor.
     *
     * @param Page $page
     */
    public function __construct(Page $page)
    {
        $this->page = $page;
    }
}
