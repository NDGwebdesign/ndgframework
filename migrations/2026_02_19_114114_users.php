<?php

return new class {
    public function up() {
        Schema::create('users', function($table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->unique('email');
            $table->string('password');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::drop('users');
    }
};