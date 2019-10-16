<?php

namespace App\Observers;

use App\Http\Components\Observer;
use App\Http\Models\Posts;
use Illuminate\Support\Facades\Auth;

class PostsObserver extends Observer
{
    /**
     * Handle the category "saving" event.
     *
     * @param \App\Http\Models\Posts $model
     * @return void
     */
    public function saving(Posts $model)
    {
        $model->author_id = Auth::user()->id;
        $model->url = '/tin-tuc/' . $model->slug;
        if (!$this->_request->has('status')) {
            $model->status = Posts::STATUS_HIDDEN;
        }
    }

    /**
     * Handle the category "deleting" event.
     *
     * @param \App\Http\Models\Posts $model
     * @return void
     */
    public function deleting(Posts $model)
    {
        $model->avatar()->delete();
    }
}
