<?php

namespace PaulhenriL\LaravelHasMeta\Tests\Fakes;

use Illuminate\Database\Eloquent\Model;
use PaulhenriL\LaravelHasMeta\HasMeta;

class Patient extends Model
{
    use HasMeta;

    protected function getMetaColumnName(): string
    {
        return 'data';
    }
}
