<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1517571044IncomeCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('income_categories', function (Blueprint $table) {
            if(! Schema::hasColumn('income_categories', 'deleted_at')) {
                $table->softDeletes();
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
        Schema::table('income_categories', function (Blueprint $table) {
            if(Schema::hasColumn('income_categories', 'deleted_at')) {
                $table->dropColumn('deleted_at');
            }
            
        });

    }
}
