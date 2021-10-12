<?php

namespace PaulhenriL\LaravelHasMeta;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Crypt;

trait HasMeta
{
    public function initializeHasMeta()
    {
        $this->mergeCasts([
            $this->getMetaColumnName() => 'array'
        ]);

        $this->attributes = array_merge($this->attributes, [
            $this->getMetaColumnName() => '{}'
        ]);
    }

    public function setMeta(string $key, $value): void
    {
        $meta = $this->{$this->getMetaColumnName()};

        Arr::set($meta, $key, $value);

        $this->{$this->getMetaColumnName()} = $meta;
    }

    public function getMeta(string $key)
    {
        return Arr::get($this->{$this->getMetaColumnName()}, $key);
    }

    public function setEncryptedMeta(string $key, $value): void
    {
        $this->setMeta($key, Crypt::encrypt($value));
    }

    public function getEncryptedMeta(string $key)
    {
        $value = $this->getMeta($key);

        if ($value) {
            $value = Crypt::decrypt($value);
        }

        return $value;
    }

    protected function getMetaColumnName(): string
    {
        return 'meta';
    }
}
