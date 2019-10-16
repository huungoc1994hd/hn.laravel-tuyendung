<?php

namespace App\Http\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use App\Http\Components\Model;

/**
 * This model of the table "posts"
 * @package App\Http\Models
 *
 * @property int $id
 * @property string $title
 * @property string $title_seo
 * @property string $slug
 * @property string $description
 * @property string $content
 * @property int $author_id
 * @property int $status
 * @property string $target
 * @property string $url
 * @property string $tags
 * @property string $keywords
 * @property int $order
 * @property int $view_count
 * @property int $cate_id
 * @property timestamp $created_at
 * @property timestamp $updated_at
 */
class Posts extends Model
{
    use Sluggable;

    public $table = 'posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'title',
        'title_seo',
        'description',
        'content',
        'status',
        'target',
        'url',
        'tags',
        'keywords',
        'order',
        'cate_id',
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
                'source' => 'title'
            ]
        ];
    }

    /**
     * Relationship one to one from Posts model to Media model
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function avatar()
    {
        return $this->hasOne(Media::class, 'relationship_id', 'id')
            ->where('relationship_table', 'posts');
    }
}
