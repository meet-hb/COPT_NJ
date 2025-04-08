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
        Schema::create('our_locations', function (Blueprint $table) {
            $table->id();
            $table->string('location_name', 255);
            $table->text('location_details', 255);
            $table->text('description');
            $table->string('address', 255);
            $table->string('phone', 20);
            $table->string('fax', 20);
            $table->string('email', 255);
            $table->text('images');
            $table->text('business_hours');
            $table->text('expertise')->nullable();
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
        Schema::dropIfExists('our_locations');
    }
};
