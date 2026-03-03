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
        // Add nullable scheduling and reminder columns to tasks
        Schema::table('tasks', function (Blueprint $table) {
            $table->date('scheduled_date')->nullable()->after('description');
            $table->time('start_time')->nullable()->after('scheduled_date');
            $table->time('reminder_time')->nullable()->after('start_time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn(['scheduled_date', 'start_time', 'reminder_time']);
        });
    }
};
