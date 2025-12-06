<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GoldLoan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'gold_loans';

    protected $fillable = [
        'date',
        'bank_branch',
        'name',
        'gold_net_weight',
        'mobile_no',
        'family_mobile_no',
        'address',
        'city',
        'gold_loan_amount',
        'aadhar_card',
        'pan_card',
        'gold_loan_slip',
        'branch',
        'branch_user',
        'status',
        'bank_account_number',
        'addhar_card_number',
    ];

    protected $casts = [
        'date' => 'date',
        'gold_net_weight' => 'decimal:2',
        'gold_loan_amount' => 'decimal:2',
    ];
}
