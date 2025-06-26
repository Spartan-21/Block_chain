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
        Schema::create('batches', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->string('id')->primary();
            $table->string('farm_id')->index();
            $table->foreign('farm_id')->references('id')->on('farms')->onDelete('cascade');
            $table->string('coffee_type');
            $table->float('quantity');
            $table->string('processing_method');
            $table->string('quality_grade');
            $table->float('moisture_content');
            $table->string('certifications')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batches');
    }
};
