<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contributor extends Model
{
    use HasFactory;
    public $timestamps = false;
public int $id;
public int $collection_id;
public string $user_name;
public float $amount;
    public function collection(): BelongsTo
    {
        return $this->belongsTo(Collection::class, 'id','collection_id');
    }
}
