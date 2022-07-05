<?php

namespace DNW\Skills;

/**
 * Basic hashmap that supports object keys.
 */
class HashMap
{
    private array $_hashToValue = [];

    private array $_hashToKey = [];

    public function getValue($key)
    {
        $hash = self::getHash($key);

        return $this->_hashToValue[$hash];
    }

    public function setValue($key, $value)
    {
        $hash = self::getHash($key);
        $this->_hashToKey[$hash] = $key;
        $this->_hashToValue[$hash] = $value;

        return $this;
    }

    public function getAllKeys()
    {
        return array_values($this->_hashToKey);
    }

    public function getAllValues()
    {
        return array_values($this->_hashToValue);
    }

    public function count()
    {
        return count($this->_hashToKey);
    }

    private static function getHash($key)
    {
        if (is_object($key)) {
            return spl_object_hash($key);
        }

        return $key;
    }
}
