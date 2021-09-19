<?php

namespace ThunderCore\Utils;

class ArrayUtils
{

    /**
     * Merge two arrays together.
     *
     * If an integer key exists in both arrays and preserveNumericKeys is false, the value
     * from the second array will be appended to the first array. If both values are arrays, they
     * are merged together, else the value of the second array overwrites the one of the first array.
     *
     * @param  array $a
     * @param  array $b
     * @param  bool  $preserveNumericKeys
     * @return array
     */
    public static function merge(array $a, array $b, $preserveNumericKeys = false)
    {
        foreach ($b as $key => $value) {
            if ($value instanceof MergeReplaceKeyInterface) {
                $a[$key] = $value->getData();
            } elseif (isset($a[$key]) || array_key_exists($key, $a)) {
                if ($value instanceof MergeRemoveKey) {
                    unset($a[$key]);
                } elseif (! $preserveNumericKeys && is_int($key)) {
                    $a[] = $value;
                } elseif (is_array($value) && is_array($a[$key])) {
                    $a[$key] = static::merge($a[$key], $value, $preserveNumericKeys);
                } else {
                    $a[$key] = $value;
                }
            } else {
                if (! $value instanceof MergeRemoveKey) {
                    $a[$key] = $value;
                }
            }
        }

        return $a;
    }

    /**
     * Apply array_filter() on multidimensional array recursively
     *
     * @param array $array
     * @param callable $callback
     * @param int $flag
     * @return array
     */
    public static function filter_recursive(array $array, callable $callback = null, $flag = 0)
    {
        foreach ($array as $index => $value) {
            if (is_array($value)) {
                $array[$index] = self::filter_recursive($value, $callback, $flag);
            }
        }

        return array_filter($array, $callback, $flag);
    }
}
