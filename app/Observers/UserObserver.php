<?php

namespace App\Observers;

use App\Http\Components\Observer;
use App\Http\Models\User;
use Illuminate\Support\Facades\Auth;

class UserObserver extends Observer
{
    /**
     * Handle the category "saving" event.
     *
     * @param \App\Http\Models\User $model
     * @return void
     */
    public function saving(User $model)
    {
        $model->phone()->relationship_table = $model->table;
        $model->phone()->relationship_id = Auth::user()->id;
    }
}
