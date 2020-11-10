<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Movies
 *
 * @property int $id
 * @property int $author_id
 * @property string $title
 * @property string $price
 * @method static Builder|Movies newModelQuery()
 * @method static Builder|Movies newQuery()
 * @method static Builder|Movies query()
 * @method static Builder|Movies whereAuthorId($value)
 * @method static Builder|Movies whereId($value)
 * @method static Builder|Movies wherePrice($value)
 * @method static Builder|Movies whereTitle($value)
 * @mixin Eloquent
 */
class Movies extends Model
{
    use HasFactory;
}
