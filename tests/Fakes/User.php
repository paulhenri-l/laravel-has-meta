<?php

namespace PaulhenriL\LaravelHasMeta\Tests\Fakes;

use Illuminate\Database\Eloquent\Model;
use PaulhenriL\LaravelHasMeta\HasMeta;

class User extends Model
{
    use HasMeta;
}
