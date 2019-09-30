<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * This model of the table "user_profile"
 * @package App\Http\Models
 *
 * @property int $id
 * @property string $display_name
 * @property string $avatar
 * @property int $gender
 * @property string $address
 * @property int $user_id
 */
class UserProfile extends Model
{
    public $table = 'user_profile';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'display_name', 'avatar', 'gender', 'address', 'user_id'
    ];

    /**
     * The attributes that set created_at and updated_at when save record.
     *
     * @var boolean
     */
    public $timestamps = false;
}
