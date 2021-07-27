<?php

function num_to_day($num)
{
    $days = array('Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Minggu');

    return $days[$num - 1];
}