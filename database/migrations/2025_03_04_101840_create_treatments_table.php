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
        Schema::create('treatments', function (Blueprint $table) {
            $table->id();
            $table->integer('sequence');
            $table->string('treatment_name', 255);
            $table->text('body_description');
            $table->string('banner', 255);
            $table->string('image', 255);
            $table->text('causes_summary')->nullable();
            $table->text('causes_note')->nullable();
            $table->text('symptoms')->nullable();
            $table->text('extra_information')->nullable();
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
        Schema::dropIfExists('treatments');
    }
};
