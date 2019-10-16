<?php

namespace App\Http\Components;

use Illuminate\Database\Eloquent\Model as BaseModel;
use Symfony\Component\HttpKernel\Exception\HttpException;

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

    /**
     * This action converted the status
     * @param $params array
     * @param $this->status (int) or (string)
     * @return 'Hiển thị' => 1 | Ẩn => 0
     */
    public function statusConvert($params = [])
    {
        if (!is_array($params)) {
            throw new HttpException(500, 'The input parameter must be an array');
        }

        $statusCode = (int)$this->status;

        $formatDefault = [
            'hiddenText' => 'Ẩn',
            'hiddenClass' => 'label label-danger',
            'showText' => 'Hiển thị',
            'showClass' => 'label label-green',
        ];

        if (!empty($params)) {
            $formatDefault = $params;
        }

        $convertData = [
            self::STATUS_HIDDEN => "
                <label class='{$formatDefault['hiddenClass']}'>{$formatDefault['hiddenText']}</label>
            ",
            self::STATUS_SHOW => "
                <label class='{$formatDefault['showClass']}'>{$formatDefault['showText']}</label>
            "
        ];


        if (empty($convertData[$statusCode])) {
            return '';
        }

        return $convertData[$statusCode];
    }
}
