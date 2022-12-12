<?php

namespace App\Http\Livewire;

use LaravelViews\Views\TableView;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Spots;

class SpotsTableView extends TableView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = Spots::class;

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            'name',
            'id_pays'
        ];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row($model): array
    {
        return [
            $model->name,
            $model->id_pays,
        ];
    }
}
