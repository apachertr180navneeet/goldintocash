<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BranchUser extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'username',
        'mobile',
        'branch_id',
        'status',
    ];

    // Relation to Branch
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
    
}
