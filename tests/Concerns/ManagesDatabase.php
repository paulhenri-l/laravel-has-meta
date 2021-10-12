<?php

namespace PaulhenriL\LaravelHasMeta\Tests\Concerns;

use Illuminate\Support\Facades\Schema;

trait ManagesDatabase
{
    protected function freshSchema()
    {
        Schema::dropIfExists('users');
        Schema::create('users', function ($table) {
            $table->bigIncrements('id');
            $table->json('meta');
            $table->timestamps();
        });

        Schema::dropIfExists('patients');
        Schema::create('patients', function ($table) {
            $table->bigIncrements('id');
            $table->json('data');
            $table->timestamps();
        });
    }
}
