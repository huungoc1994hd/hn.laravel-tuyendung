<?php

namespace App\Observers;

use App\Http\Components\Observer;
use App\Http\Models\Media;

class MediaObserver extends Observer
{
    /**
     * Handle the category "saving" event.
     *
     * @param \App\Http\Models\Media $model
     * @return void
     */
    public function saving(Media $model)
    {
        if (!$this->_request->has('status')) {
            $model->status = Media::STATUS_HIDDEN;
        }

        if (!$this->_request->has('target')) {
            $model->target = Media::TARGET_SELF;
        }
    }
}
