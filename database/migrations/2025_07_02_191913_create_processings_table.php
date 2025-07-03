<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('processings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('batch_id');
            $table->unsignedBigInteger('processor_id');
            $table->float('output_quantity');
            $table->date('processing_date');
            $table->text('notes')->nullable();
            $table->string('status')->default('processing');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            // Foreign keys
            $table->foreign('batch_id')->references('id')->on('batches')->onDelete('cascade');
            // optionally: $table->foreign('processor_id')->references('id')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('processings');
    }
};
