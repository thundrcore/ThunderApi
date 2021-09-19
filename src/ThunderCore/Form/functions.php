<?php
namespace ThunderCore\Form;

/**
 * @param $array
 * @return array
 */
function generateInputNameErrors($array)
{
    $result = generateInputNameRec($array);
    $retArray = array();
    foreach ($result as $arrKey => $arrVal) {
        $exp = explode("]", $arrKey);
        $newKey = array_shift($exp);
        array_pop($exp);
        $newKey = $newKey.implode("]", $exp).(count($exp) > 0 ? "]" : "");
        $retArray[$newKey][] = $arrVal;
    }
    return $retArray;
}

/**
 * @param $array
 * @param string $prefix
 * @return array
 */
function generateInputNameRec($array, $prefix = '')
{
    $result = array();
    foreach ($array as $key=>$value) {
        if (is_array($value)) {
            $result = $result + generateInputNameRec($value, $prefix . $key . '][');
        } else {
            $result[$prefix.$key] = $value;
        }
    }
    return $result;
}
