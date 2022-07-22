<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'old_employee_id',
        'new_employee_id',
        'asset_id',
        'status',
    ];

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function old_employee()
    {
        return $this->belongsTo(Employee::class, 'old_employee_id', 'id');
    }

    public function new_employee()
    {
        return $this->belongsTo(Employee::class, 'new_employee_id', 'id');
    }
}
