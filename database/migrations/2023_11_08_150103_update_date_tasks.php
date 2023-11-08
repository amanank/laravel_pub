<?php

use Illuminate\Database\Console\DbCommand;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        //rename old date column to date_old

        //add new column date of type datetime nullable

        //add date from date_old and if time Am add 11:00:00 and for PM 16:00:00 
        // 07-11-2023 11:00:00 
        //delete old date_old and time

        Schema::table('tasks', function (Blueprint $table) {

            $table->renameColumn('date', 'datetime');
            $table->dateTime('date')->nullable();

            $table = DB::tasks('datetime')->select('date', 'datetime')->get();

            $i = 1;
            foreach ($table as $tasks) {
                db::table('tasks')
                ->where('date', $tasks->datetime)
                ->update([
                    "date" => "datetime" . $i
                ]);
                $i++;
            }
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('tasks', function (Blueprint $table) {

            $table->dropColumn('datetime', 'date');
            $table->dropColumn('date');
            
        });
    }
};
