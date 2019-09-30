<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * This model of the table 'option'
 * @package App\Http\Models
 *
 * @property int $id
 * @property string $web_title
 * @property string $logo
 * @property string $favicon
 * @property string $footer
 * @property string $map
 * @property string $keywords
 * @property string $copyright
 * @property string $fb_fanpage
 * @property string $fb_pixel
 * @property string $gg_anatylics
 * @property string $cdn_url
 */
class Option extends Model
{
    public $table = 'option';

    /**
     * The attributes that set created_at and updated_at when save record.
     *
     * @var boolean
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = [
        'web_title',
        'logo',
        'favicon',
        'footer',
        'map',
        'keywords',
        'copyright',
        'fb_fanpage',
        'fb_pixel',
        'gg_anatylics',
        'cdn_url'
    ];

    /**
     * Relationship between option table and phones table
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function phone()
    {
        return $this->hasOne(Phone::class, 'relationship_id', 'id')
            ->where('relationship_table', 'option');
    }

    /**
     * Relationship betwwen option table and emails table
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function email()
    {
        return $this->hasOne(Email::class, 'relationship_id', 'id')
            ->where('relationship_table', 'option');
    }

    /**
     * This action will be called when this model is saving
     */
    public function save(array $options = [])
    {
        $this->phone()->relationship_table = $this->table;
        $this->phone()->relationship_id = $this->id;

        $this->email()->relationship_table = $this->table;
        $this->email()->relationship_id = $this->id;

        return parent::save($options);
    }
}
