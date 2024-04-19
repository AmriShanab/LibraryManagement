<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTitleToBookBorrowTable extends Migration
{
    public function up()
    {
        Schema::table('book_borrow', function (Blueprint $table) {
            $table->string('title')->nullable();
        });
    }

    public function down()
    {
        Schema::table('book_borrow', function (Blueprint $table) {
            //$table->dropColumn('title');
        });
    }
}
