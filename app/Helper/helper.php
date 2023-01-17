<?php

use App\Models\Admin\Hospital;

function hospital(){
    $hospitals = Hospital::get();
    return $hospitals;
}
?>
