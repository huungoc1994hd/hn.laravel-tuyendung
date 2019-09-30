<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

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
     * This action will be called when this model is saving
     */
    public function save(array $options = [])
    {
        $this->order = 0;

        return parent::save($options);
    }

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
}
