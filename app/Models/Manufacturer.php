<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable(['manufacturer'])]
class Manufacturer extends Model
{
    use SoftDeletes;

    /**
     * Attribute casting
     */
    protected function casts(): array
    {
        return [
            'created_at'   => 'datetime',
            'deleted_at'   => 'datetime',
            'updated_at'   => 'datetime',
        ];
    }

    /**
     * Relationships
     */
    public function scanner(): HasMany
    {
        return $this->hasMany(Scanner::class);
    }

    public function kFactor(): HasMany
    {
        return $this->hasMany(Kfactor::class);
    }
}
