<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gold_loans', function (Blueprint $table) {
            $table->id();
            
            $table->date('date');
            $table->string('bank_branch');
            $table->string('name');
            $table->decimal('gold_net_weight', 8, 2);
            $table->string('mobile_no', 15);
            $table->string('family_mobile_no', 15)->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->decimal('gold_loan_amount', 15, 2);
            $table->string('aadhar_card')->nullable();
            $table->string('pan_card')->nullable();
            $table->string('gold_loan_slip')->nullable();
            $table->string('branch')->nullable();
            $table->string('branch_user')->nullable();
            
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            
            $table->timestamps();
            $table->softDeletes(); // Soft delete
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gold_loans');
    }
};
