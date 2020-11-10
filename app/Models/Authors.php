<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Authors
 *
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @method static Builder|Authors newModelQuery()
 * @method static Builder|Authors newQuery()
 * @method static Builder|Authors query()
 * @method static Builder|Authors whereFirstname($value)
 * @method static Builder|Authors whereId($value)
 * @method static Builder|Authors whereLastname($value)
 * @mixin Eloquent
 */
class Authors extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['firstname', 'lastname'];
}

