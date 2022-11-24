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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('title_company');
            $table->text('content')->nullable();
            $table->string('company category');
            $table->string('thumbnail');
            $table->string('adr_title');
            $table->string('adr_url');
            $table->string('adr_target');
            $table->text('about_company');
            $table->string('related_companies');
            $table->string('tags');
            $table->string('boss');
            $table->string('payments');
            $table->string('services_list');
            $table->text('additional_information');
            $table->string('seo');
            $table->string('gallery');
            $table->string('news');
            $table->string('contacts_fax');
            $table->string('contacts_phone');
            $table->string('contacts_comment-to-phone');
            $table->string('emails-group_email');
            $table->string('emails-group_comment-to-email');
            $table->string('connectivity_options_options_list');
            $table->string('connectivity_options_comment-to-option');
            $table->string('links_link');
            $table->string('social_links_social_link');
            $table->string('social_links_social_lists');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
};
