<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OtherPrizeView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        DB::statement("
            create view other_prize_view as (select `lucky_draw_system`.`winning_numbers`.`winning_number` AS `winning_number`,`lucky_draw_system`.`winning_numbers`.`customer_id` AS `customer_id` from `lucky_draw_system`.`winning_numbers` where !(`lucky_draw_system`.`winning_numbers`.`customer_id` in (select `winning`.`customer_id` from (`lucky_draw_system`.`lucky_draws` `lucky` join `lucky_draw_system`.`winning_numbers` `winning` on(`winning`.`winning_number` = `lucky`.`winning_number`)))))
        ");
    }

    public function down()
    {
        DB::statement("DROP VIEW other_prize_view");
    }
}
