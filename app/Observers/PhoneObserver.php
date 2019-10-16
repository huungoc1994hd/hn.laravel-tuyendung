<?php

namespace App\Observers;

use App\Http\Components\Observer;
use App\Http\Models\Phone;

class PhoneObserver extends Observer
{
    /**
     * Handle the category "saving" event.
     *
     * @param \App\Http\Models\Phone $model
     * @return void
     */
    public function saving(Phone $model)
    {
        $model->area_code = Phone::VIETNAMESE_AREA_CODE;
    }
}
