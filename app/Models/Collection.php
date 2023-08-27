<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Collection extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable=[
        'title',
        'id',
        'target_amount',
        'description',
        'link',
        'created_at'
    ];

    public int $id;
    public string $title='';
    public float $target_amount=0;
    public string $description='';
    public string $link='';
    public \DateTime $created_at;
    public function contributors(): HasMany
    {
        return $this->hasMany(Contributor::class);
    }
}
