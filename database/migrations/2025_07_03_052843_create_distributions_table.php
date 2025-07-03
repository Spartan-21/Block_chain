<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('distributions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('batch_id');
            $table->unsignedBigInteger('distributor_id');
            $table->string('destination');
            $table->date('expected_delivery_date');
            $table->string('transport_method');
            $table->string('tracking_number');
            $table->string('status')->default('successfull');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('batch_id')->references('id')->on('batches')->onDelete('cascade');
            // optionally: $table->foreign('distributor_id')->references('id')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('distributions');
    }
};
