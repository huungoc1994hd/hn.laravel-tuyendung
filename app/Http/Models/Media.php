<?php

namespace App\Http\Models;

use App\Http\Components\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * This model of the table "media"
 * @package App\Http\Models
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $alt
 * @property string $link
 * @property string $target
 * @property string $type
 * @property int $order
 * @property string $relationship_table
 * @property int $relationship_id
 * @property int $status
 * @property timestamp $created_at
 * @property timestamp $updated_at
 */
class Media extends Model
{
    use Sluggable;

    public $table = 'media';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'name',
        'image',
        'alt',
        'link',
        'target',
        'type',
        'order',
        'status',
        'relationship_table',
        'relationship_id',
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /**
     * This action converted the status
     * @param $params array
     * @param $this->status (int) or (string)
     * @return 'Hiển thị' => 1 | Ẩn => 1
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
