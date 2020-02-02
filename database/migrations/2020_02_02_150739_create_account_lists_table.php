<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->integer('server');
            $table->integer('planet');
            $table->integer('power')->default(0);
            $table->integer('gem')->default(0);
            $table->string('missions')->nullable();
            $table->string('map')->nullable();
            $table->timestamp('login_at')->nullable();
            $table->string('status')->default(App\Enums\AccountStatus::READY);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('key_id');
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('key_id')->references('id')->on('tool_key_lists');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_lists');
    }
}
