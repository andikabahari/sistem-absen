<?php

function empty_to_null($value)
{
    return $value === '' ? null : $value;
} 