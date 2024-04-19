<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameUsers1TableToUsers extends Migration
{
    public function up()
    {
        Schema::rename('users1', 'users');
    }

    public function down()
    {
        Schema::rename('users', 'users1');
    }
}
