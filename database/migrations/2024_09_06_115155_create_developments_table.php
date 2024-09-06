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
            $table->string('title');
            $table->enum('status', ['In Progress', 'Completed']);
            $table->string('version');
            $table->string('feedback');
            $table->date('deadline');
            $table->date('code_repository_url');
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
