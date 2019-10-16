<?php

namespace App\Observers;

use App\Http\Components\Observer;
use App\Http\Models\Option;

class OptionObserver extends Observer
{
    /**
     * Handle the category "saving" event.
     *
     * @param \App\Http\Models\Option $model
     * @return void
     */
    public function saving(Option $model)
    {
        $model->phone()->relationship_table = $model->table;
        $model->phone()->relationship_id = $model->id;

        $model->email()->relationship_table = $model->table;
        $model->email()->relationship_id = $model->id;
    }
}
