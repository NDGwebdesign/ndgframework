<?php

return new class {
    public function up() {
        Schema::create('users', function($table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::drop('users');
    }
};