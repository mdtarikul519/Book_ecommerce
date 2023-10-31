<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name',100)->nullable();
            $table->string('last_name',100)->nullable();
            $table->string('user_name',100)->nullable()->unique();
            $table->integer('role_id')->default(6); //subscriber

            $table->string('telegram_id',100)->nullable();
            $table->string('telegram_name',100)->nullable();

            $table->string('mobile_number',40)->nullable()->unique();
            $table->string('photo',150)->nullable()->default('avatar.png');
            $table->string('email',80)->nullable()->unique();

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',200);
            $table->string('slug',100)->nullable();

            $table->tinyInteger('status')->default(1);

            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('user_user_role', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('user_role_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('user_user_role');
    }
};
