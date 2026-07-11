<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuickEnquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'city',
        'gold_net_weight',
        'gold_loan_amount',
    ];
}
