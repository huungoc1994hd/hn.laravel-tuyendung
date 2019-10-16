<?php

namespace App\Http\Components;

use Illuminate\Http\Request;

/**
 * Base class for Observer
 * @package App\Http\Components
 */
class Observer
{
    public function __construct(Request $request)
    {
        $this->_request = $request;
    }
}
