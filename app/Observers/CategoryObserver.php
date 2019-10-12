<?php

namespace App\Observers;

use App\Http\Models\Category;

class CategoryObserver
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

        $model->url = $urlPrefix . '/' . $model->slug;
    }
}
