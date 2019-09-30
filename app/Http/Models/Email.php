<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * This model of the table "emails"
 * @package App\Http\Models
 *
 * @property int $id
 * @property blob $email
 * @property string $relationship_table
 * @property int $relationship_id
 * @property timestamp $created_at
 * @property timestamp $updated_at
 */
class Email extends Model
{
    public $table = 'emails';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = ['email', 'relationship_table', 'relationship_id'];
}
