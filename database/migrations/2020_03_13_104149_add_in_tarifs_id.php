<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInTarifsId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tarifs', function (Blueprint $table) {
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->foreign('bank_id', 'tarifs_bank_id_banks_id')
                ->references('id')
                ->on('banks');
            $table->unsignedBigInteger('credit_type_id')->nullable();
            $table->foreign('credit_type_id', 'tarifs_credit_type_id_credit_types_id')
                ->references('id')
                ->on('credit_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tarifs', function (Blueprint $table) {
            $table->dropForeign('tarifs_bank_id_banks_id');
            $table->dropColumn('bank_id');
            $table->dropForeign('tarifs_credit_type_id_credit_types_id');
            $table->dropColumn('credit_type_id');
        });
    }
}
