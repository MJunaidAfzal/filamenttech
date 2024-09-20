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
        Schema::create('developments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('developer_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('project_id')->constrained('orders')->onDelete('cascade');
            $table->string('title');
            $table->enum('status', ['In Progress', 'Completed']);
            $table->string('version');
            $table->string('file');
            $table->string('feedback');
            $table->date('deadline');
            $table->string('code_repository_url');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('developments');
    }
};
