<?php

namespace App\Http\Livewire\Page;

use App\Http\Livewire\Backend\TableComponent;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Domains\Page\Models\Page;

class PageTable extends TableComponent
{

    public function columns(): array
    {
        return [
            Column::make(__('ID'), 'id')
                ->searchable()
                ->sortable(),
            Column::make(__('Title'))
                ->searchable()
                ->sortable()
                ->addClass('w-75'),
            Column::make(__('Actions'))
                ->format(
                    function ($value, $column, $row) {
                        return view('backend.page.includes.actions',
                            [
                                'page' => $row
                            ]
                        );
                    }
                ),
        ];
    }

    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return Page::query();
    }
}
