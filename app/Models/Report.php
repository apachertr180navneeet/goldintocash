<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use HasFactory, SoftDeletes;

    // Specify the table if it doesn't follow Laravel's plural naming convention
    protected $table = 'reports';

    // Mass assignable fields
    protected $fillable = [
        'date',
        'application_no',
        'name',
        'address',
        'phone',
        'city',
        'gold_net_weight',
        'gold_loan_amount',
        'gold_image',
        'silver_net_weight',
        'silver_loan_amount',
        'silver_image',
        'total_loan_amount',
        'settelment_amount',
        'cash_payment',
        'online_payment',
        'status'
    ];

    // Dates (for soft deletes)
    protected $dates = ['deleted_at'];
}
