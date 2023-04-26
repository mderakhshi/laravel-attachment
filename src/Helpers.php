<?php

namespace Mderakhshi;

class Helpers
{

    public function convertHtmlAttributes(array $data, array $acceptableKeys = null, array $aliasKeys = null): ?string
    {
        $responseString = null;
        foreach ($data as $key => $value) {
            if ( ! is_null($aliasKeys) && array_key_exists($key, $aliasKeys)) {
                $key = $aliasKeys[$key];
            }
            if (
              ( ! is_null($acceptableKeys) && ! in_array($key, $acceptableKeys, true))
              || is_array($value)
              || is_null($value)
              || is_numeric($key)
              || str_starts_with($key, ':')
              || $value === false
            ) {
                continue;
            }
            $responseString .= $value === true ? $key.' ' : $key.'="'.$value.'" ';
        }

        return $responseString;
    }

}