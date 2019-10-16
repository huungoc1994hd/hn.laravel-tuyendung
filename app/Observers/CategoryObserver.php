<?php

namespace App\Observers;

use App\Http\Models\Category;
use App\Http\Components\Observer;

class CategoryObserver extends Observer
{
    /**
     * Handle the category "saving" event.
     *
     * @param \App\Http\Models\Category $model
     * @return void
     */
    public function saving(Category $model)
    {
        $urlPrefix = '';

        switch ($model->type) {
            case 'post':
                $urlPrefix = $model::POST_CATE_SLUG_DEFAULT;
                break;
            case 'recruitment':
                $urlPrefix = $model::RECRUITMENT_CATE_SLUG_DEFAULT;
                break;
        }

        $model->position = json_encode($model->position);
        $model->url = $urlPrefix . '/' . $model->slug;

        if (!$this->_request->has('status')) {
            $model->status = Category::STATUS_HIDDEN;
        }
    }
}
