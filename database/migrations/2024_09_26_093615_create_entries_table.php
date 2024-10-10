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
        Schema::create('entries', function (Blueprint $table) {
            $table->id();
            $table->string('company')->nullable();
            $table->date('date')->nullable();
            $table->string('gst')->nullable();
            $table->string('address')->nullable();
            $table->string('contact')->nullable();
            $table->string('contactno')->nullable();
            $table->string('email')->nullable();
            $table->string('totalamount')->nullable();
            $table->string('receivedamount')->nullable();
            $table->string('bdmname')->nullable();
            $table->string('remark')->nullable();
            $table->string('payment')->nullable();
            $table->string('type')->nullable();
            $table->string('type1')->nullable();
            $table->string('image')->nullable();
            $table->string('state')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entries');
    }
};
