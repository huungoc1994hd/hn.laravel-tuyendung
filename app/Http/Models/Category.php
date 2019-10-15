<?php

namespace App\Http\Models;

use App\Http\Components\Model;
use Cviebrock\EloquentSluggable\Sluggable;

/**
 * This model of the table "categories"
 * @package App\Http\Models
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $url
 * @property string $type
 * @property int $status
 * @property int $order
 * @property string $position
 * @property int $parent_id
 * @property timestamp $created_at
 * @property timestamp $updated_at
 */
class Category extends Model
{
    const POST_TYPE = 'post';
    const RECRUITMENT_TYPE = 'recruitment';
    const POST_CATE_SLUG_DEFAULT = 'bai-viet';
    const RECRUITMENT_CATE_SLUG_DEFAULT = 'tin-tuyen-dung';

    use Sluggable;

    public $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'name',
        'slug',
        'url',
        'type',
        'status',
        'order',
        'position',
        'parent_id'
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
     * Relationship itself to get all categories
     *
     * @foregnKey $parent_id
     * @primaryKey $id
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children() {
        return $this->hasMany(self::class,'parent_id')
            ->with('children');
    }
}
