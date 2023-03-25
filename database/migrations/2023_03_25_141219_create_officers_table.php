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
        Schema::create('officers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->longText('address')->nullable();
            $table->string('phone')->nullable();
            $table->integer('sex')->nullable();
            $table->uuid('created_by')->nullable();
            $table->integer('is_active')->default(1);
            $table->timestamps();
        });

        Schema::table('officers', function (Blueprint $table) {
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('officers');
    }
};
