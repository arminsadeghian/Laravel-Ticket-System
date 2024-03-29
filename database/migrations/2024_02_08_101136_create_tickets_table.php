<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('text');
            $table->tinyInteger('priority')->comment('0: low, 1: mid, 2: high');
            $table->tinyInteger('status')->comment('0: created, 1: replied, 2: closed');
            $table->string('file_path')->nullable();
            $table->tinyInteger('department')->comment('0: support, 1: tech, 2: financial');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
