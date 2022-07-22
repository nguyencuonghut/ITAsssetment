<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'tag',
        'serial',
        'model_id',
        'status',
        'area_id',
        'purchasing_date',
        'warranty',
        'supplier_id',
        'purchase_cost',
        'employee_id',
        'note'
    ];

    public function model()
    {
        return $this->belongsTo(AssetModel::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function logs()
    {
        return $this->hasMany(ActivityLog::class);
    }
}
