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
        Schema::create('designs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('designer_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('project_id')->constrained('orders')->onDelete('cascade');
            $table->string('title');
            $table->string('category_id');
            $table->enum('status', ['Pending','In Progress','Completed'])->default('Pending');
            $table->string('file');
            $table->string('feedback');
            $table->date('deadline');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('designs');
    }
};
