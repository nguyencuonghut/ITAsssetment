<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'code'
    ];

    public function asset_models()
    {
        return $this->hasMany(AssetModel::class);
    }
}
