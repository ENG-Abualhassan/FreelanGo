<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('registration_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reviewed_by')->constrained('admins')->cascadeOnDelete();
            $table->string('name')->unique();
            $table->string('email');
            $table->string('password');
            $table->string('type');
            $table->string('selfie_with_id_path');
            $table->enum('status' , ['Done' , 'Pending' , 'Failed']);
            $table->text('rejection_reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registration_requests');
    }
};
