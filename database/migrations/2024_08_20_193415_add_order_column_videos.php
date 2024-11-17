<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
      Schema::table('videos', function (Blueprint $table) {
        $table->integer('order')->nullable()->after('user_id')->change();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      Schema::table('videos', function (Blueprint $table) {
        $table->dropColumn('order');
    });
    }
};
