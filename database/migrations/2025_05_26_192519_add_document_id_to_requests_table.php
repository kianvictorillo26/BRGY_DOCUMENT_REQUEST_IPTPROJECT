<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
        public function up()
    {
        Schema::table('requests', function (Blueprint $table) {
            $table->unsignedBigInteger('document_id')->after('user_id');

            // If you want to add a foreign key constraint:
            // $table->foreign('document_id')->references('id')->on('documents')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('requests', function (Blueprint $table) {
            $table->dropColumn('document_id');

            // If you added a foreign key:
            // $table->dropForeign(['document_id']);
        });
    }

};
