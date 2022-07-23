<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetAudit extends Model
{
    use HasFactory;

    protected $fillable = [
        'request_time',
        'confirmation_time',
        'asset_id',
        'employee_id',
        'result',
        'token'
    ];

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
