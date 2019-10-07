<?php

namespace App\Http\Components;

use Illuminate\Database\Eloquent\Model as BaseModel;

/**
 * Class Model is parent Model
 * @package App\Http\Components
 *
 * @author Huu Ngoc Developer
 * @date 08/10/2019
 */
class Model extends BaseModel
{
    /**
     * Defines hidden status
     */
    const STATUS_HIDDEN = 0;

    /**
     * Defines show status
     */
    const STATUS_SHOW = 1;

    /**
     * Defines target "blank"
     */
    const TARGET_BLANK = '_blank';

    /**
     * Defines target "self"
     */
    const TARGET_SELF = '_self';
}
