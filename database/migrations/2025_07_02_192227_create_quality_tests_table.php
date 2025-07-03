<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('quality_tests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('batch_id');
            $table->unsignedBigInteger('tester_id'); // user who performs the test
            $table->date('test_date');
            $table->string('result'); // e.g., passed, failed, or score
            $table->text('notes')->nullable();
            $table->string('status')->default('pending'); // e.g., pending, reviewed, approved
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            // Foreign keys
            $table->foreign('batch_id')->references('id')->on('batches')->onDelete('cascade');
            // optionally: $table->foreign('tester_id')->references('id')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quality_tests');
    }
};
