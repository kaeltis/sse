<?php

use App\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMoreFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('firstname');
            $table->string('street');
            $table->string('housenumber', 10);
            $table->string('zipcode', 10);
            $table->string('city');
            $table->string('phone', 20);
            $table->date('birthdate');
            $table->enum('role', array_keys(User::$roles))->default(User::STUDENT);
        });

        DB::update("ALTER TABLE users AUTO_INCREMENT = 1710001;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('firstname');
            $table->dropColumn('street');
            $table->dropColumn('housenumber');
            $table->dropColumn('zipcode');
            $table->dropColumn('city');
            $table->dropColumn('phone');
            $table->dropColumn('birthdate');
            $table->dropColumn('role');
        });
    }
}
