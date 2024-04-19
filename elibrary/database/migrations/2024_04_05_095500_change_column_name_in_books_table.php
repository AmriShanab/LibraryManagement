<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnNameInBooksTable extends Migration
{
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->renameColumn('id', 'book_id');
        });
    }

    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->renameColumn('book_id', 'id');
        });
    }
}
