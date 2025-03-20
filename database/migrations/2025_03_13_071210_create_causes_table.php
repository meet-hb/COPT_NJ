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
        Schema::create('causes', function (Blueprint $table) {
            $table->id();
            $table->integer('treatment_id');
            $table->text('name');
            $table->text('description');
            $table->boolean('is_active')->default(1)->comment('1=Active, 0=Inactive');
            $table->boolean('is_deleted')->default(0)->comment('1=Deleted, 0=Not Deleted');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('causes');
    }
};