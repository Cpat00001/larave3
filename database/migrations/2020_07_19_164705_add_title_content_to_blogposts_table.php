<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTitleContentToBlogpostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blogposts', function (Blueprint $table) {
            $table->string('title')->default('');
            if (env('DB_CONNECTION') === 'sqlite_testing') {
                $table->string('content', 5000)->default('');
            } else {
                $table->string('content', 5000);
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blogposts', function (Blueprint $table) {
            $table->dropColumn(['title', 'content']);
        });
    }
}
