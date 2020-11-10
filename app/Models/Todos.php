<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Todos
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $done
 * @property string $text
 * @method static Builder|Todos newModelQuery()
 * @method static Builder|Todos newQuery()
 * @method static Builder|Todos query()
 * @method static Builder|Todos whereCreatedAt($value)
 * @method static Builder|Todos whereDone($value)
 * @method static Builder|Todos whereId($value)
 * @method static Builder|Todos whereText($value)
 * @method static Builder|Todos whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Todos extends Model
{
    use HasFactory;
    protected $fillable = ['done', 'text'];
    protected $appends = ['erledigt'];

    public function getErledigtAttribute()
        {
            if($this->done){
                return 'yes';
            } else {
                return 'no';
            }
        }
}
