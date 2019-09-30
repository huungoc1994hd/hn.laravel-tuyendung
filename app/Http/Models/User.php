<?php

namespace App\Http\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

/**
 * This model of the table "users"
 * @package App\Http\Models
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property int $status
 * @property timestamp $last_login
 * @property timestamp $created_at
 * @property timestamp $updated_at
 */
class User extends Authenticatable
{
    public $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'last_login', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Relationship one to one from User model to Phone model
     */
    public function phone()
    {
        return $this->hasOne(Phone::class, 'relationship_id', 'id')
            ->where('relationship_table', 'users');
    }

    /**
     * Relationship one to one from User model to UserProfile model
     */
    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }

    /**
     * This action will be called when this model is saving
     */
    public function save(array $options = [])
    {
        $this->phone()->relationship_table = $this->table;
        $this->phone()->relationship_id = Auth::user()->id;

        return parent::save($options);
    }
}
