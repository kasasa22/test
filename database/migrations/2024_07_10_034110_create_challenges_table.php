<?php
// database/migrations/xxxx_xx_xx_create_challenges_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChallengesTable extends Migration
{
    public function up()
    {
        Schema::create('challenges', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('duration');
            $table->integer('number_of_questions');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('challenges');
    }
}
