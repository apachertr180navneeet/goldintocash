<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'location',
        'branchId',
        'status',
    ];

    // Define relationship with BranchUser
    public function branchUsers()
    {
        return $this->hasMany(BranchUser::class, 'branch_id', 'id');
    }
}
