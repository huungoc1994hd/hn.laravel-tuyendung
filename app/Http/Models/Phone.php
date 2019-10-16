<?php

namespace App\Http\Models;

use App\Http\Components\Model;

/**
 * This model of the table "phones"
 * @package App\Http\Models
 *
 * @property int $id
 * @property string $area_code
 * @property blob $phone
 * @property string $relationship_table
 * @property int $relationship_id
 * @property timestamp $created_at
 * @property timestamp $updated_at
 */
class Phone extends Model
{
    const VIETNAMESE_AREA_CODE = '(+84)';

    public $table = 'phones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'area_code', 'phone', 'relationship_table', 'relationship_id'
    ];
}
