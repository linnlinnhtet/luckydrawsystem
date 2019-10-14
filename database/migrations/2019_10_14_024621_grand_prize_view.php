<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GrandPrizeView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW grand_prize_view AS (select `vw_grand_prize`.`winning_number` AS `winning_number`,`vw_grand_prize`.`customer_id` AS `customer_id` from `lucky_draw_system`.`vw_grand_prize` where !(`vw_grand_prize`.`customer_id` in (select `winning`.`customer_id` from (`lucky_draw_system`.`lucky_draws` `lucky` join `lucky_draw_system`.`winning_numbers` `winning` on(`winning`.`winning_number` = `lucky`.`winning_number`)))))
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW grand_prize_view");

    }
}
