<?php

namespace App\Models;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Todo extends Model
{
    use HasFactory;
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];




       protected function name(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Str($value)->ucfirst(),
        );
    }
    public function scopeOrderBy($query) {
    return $query->orderByDesc('created_at');

    // Find all with a read of true or, if there is none, order the collection by id in descending order.
}


}
