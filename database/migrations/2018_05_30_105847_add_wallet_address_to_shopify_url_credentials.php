<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddWalletAddressToShopifyUrlCredentials extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('shopify_url_credentials', function($table) {
            $table->string('wallet_address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shopify_url_credentials', function($table) {
            $table->dropColumn('wallet_address');
        });
    }
}
