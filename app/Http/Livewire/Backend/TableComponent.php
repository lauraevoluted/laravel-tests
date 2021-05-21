<?php

namespace App\Http\Livewire\Backend;

use Rappasoft\LaravelLivewireTables\DataTableComponent as LivewireTableComponent;

abstract class TableComponent extends LivewireTableComponent
{

    /**
     * The theme for the pagination views to use. Changed from the default of
     * "tailwind" to use the bootstrap 4 views.
     *
     * @var string.
     */
    public $paginationTheme = 'bootstrap';

    /**
     * Include a button on the search bar to clear the current search term.
     * Changed from the default of "false" to always include the button.
     *
     * @var bool.
     */
    public $clearSearchButton = true;
}
