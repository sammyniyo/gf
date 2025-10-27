<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('album_purchases', function (Blueprint $table) {
            // Add fields to support IremboPay integration
            $table->string('irembo_invoice_id')->nullable()->after('transaction_id');
            $table->string('irembo_reference')->nullable()->after('irembo_invoice_id');
            $table->json('irembo_payment_details')->nullable()->after('irembo_reference');
            $table->timestamp('payment_processed_at')->nullable()->after('downloaded_at');

            // Add indexes for better performance
            $table->index('irembo_invoice_id');
            $table->index('irembo_reference');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('album_purchases', function (Blueprint $table) {
            // Drop indexes first
            $table->dropIndex(['irembo_invoice_id']);
            $table->dropIndex(['irembo_reference']);

            // Drop columns
            $table->dropColumn([
                'irembo_invoice_id',
                'irembo_reference',
                'irembo_payment_details',
                'payment_processed_at'
            ]);
        });
    }
};
