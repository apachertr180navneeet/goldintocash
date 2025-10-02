<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('branch_users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('mobile')->unique();
            $table->foreignId('branch_id')->constrained('branches')->onDelete('cascade'); // foreign key relation
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
            $table->softDeletes(); // Soft deletes
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('branch_users');
    }
};
