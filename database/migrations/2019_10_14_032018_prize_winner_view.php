<?php

use Illuminate\Database\Migrations\Migration;

class PrizeWinnerView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW prize_winner_view AS(SELECT cus.name as customer_name,prizes.name as prize_name,winning.winning_number as winning_number FROM lucky_draws lucky
            INNER JOIN winning_numbers winning ON winning.winning_number=lucky.winning_number
            INNER JOIN customers cus ON winning.customer_id=cus.id
            INNER JOIN prizes ON lucky.prize_id=prizes.id)
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW prize_winner_view");
    }
}
