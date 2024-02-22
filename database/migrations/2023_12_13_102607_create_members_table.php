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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('dept');
            $table->string('session')->nullable();
            $table->string('gender');
            $table->date('dor')->nullable();
            $table->string('services');
            $table->integer('amount');
            $table->integer('plan');
            $table->integer('p_year');
            $table->integer('status')->nullable();
            $table->integer('attendance_count')->nullable();
            $table->integer('ini_weight');
            $table->integer('curr_weight')->nullable();
            $table->string('ini_bodytype');
            $table->string('curr_bodytype')->nullable();
            $table->integer('reminder')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
