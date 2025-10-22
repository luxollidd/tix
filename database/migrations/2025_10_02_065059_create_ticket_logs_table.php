<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ticket_logs', function (Blueprint $table) {
            $table->string('id')->primary();

            $table->string('createdBy')->nullable()->index();
            $table->string('createdByName')->nullable();
            $table->string('modifiedBy')->nullable();
            $table->string('modifiedByName')->nullable();

            $table->longText('email_cc')->nullable();
            $table->longText('new_status')->nullable();
            $table->longText('orig_owner')->nullable();
            $table->longText('new_web_app_server')->nullable();
            $table->longText('orig_status')->nullable();
            $table->longText('new_priority')->nullable();
            $table->longText('email_bcc')->nullable();
            $table->longText('owner')->nullable();
            $table->longText('new_os_hidden_value')->nullable();
            $table->longText('changes')->nullable();
            $table->longText('status_group')->nullable();
            $table->longText('current_status')->nullable();
            $table->longText('new_issue_type')->nullable();
            $table->longText('pending_type')->nullable();
            $table->longText('new_web_app_server_hidden_value')->nullable();
            $table->longText('ticket_id')->nullable();
            $table->longText('new_database')->nullable();
            $table->longText('new_joget_version')->nullable();
            $table->longText('is_internal')->nullable();
            $table->longText('comment_from')->nullable();
            $table->longText('new_db_hidden_value')->nullable();
            $table->longText('new_project')->nullable();
            $table->longText('new_tags')->nullable();
            $table->longText('anchor')->nullable();
            $table->longText('new_os')->nullable();
            $table->longText('files')->nullable();
            $table->longText('comment')->nullable();
            $table->longText('database')->nullable();
            $table->longText('web_app_server')->nullable();
            $table->longText('os')->nullable();
            $table->longText('edit_tix_dets')->nullable();
            $table->longText('reply_template')->nullable();
            $table->longText('organization_id')->nullable();

            $table->dateTime('dateCreated')->nullable()->index();
            $table->dateTime('dateModified')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_logs');
    }
};
