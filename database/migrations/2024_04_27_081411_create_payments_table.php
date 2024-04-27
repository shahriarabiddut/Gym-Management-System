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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('plan_id')->references('id')->on('plans')->onDelete('cascade');
            $table->integer('plan_member_id')->nullable();
            $table->date('validity');
            $table->integer('amount');
            $table->integer('status');
            $table->string('method')->nullable();
            $table->integer('accepted')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
