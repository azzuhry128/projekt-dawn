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
        //
        Schema::create('tasks', function (Blueprint $task) {
            $task->string('task_id', 13)->primary();
            $task->string('user_id', 128);
            $task->foreign('user_id')->references('id')->on('accounts');
            $task->string('title', 48);
            $task->string('priority', 6);
            $task->string('status', 12);
            $task->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::drop('accounts');
    }
};