<?php

use Illuminate\Database\Capsule\Manager as Capsule;


function viacoinEnable_config () {
    $result = Capsule::select("SELECT gateway, `value` FROM tblpaymentgateways WHERE setting = 'name' GROUP BY gateway");
    foreach($result as $row) {
        $pays[] = $row->gateway;
    }

    $pays = implode(',', $pays);
    
    $configarray = array(
        "name" => "Viacoin Enabler",
        "description" => "This module will allow you to disable fraud checking for Viacoin Payments.",
        "version" => "1.0",
        "author" => "Viacoin",
        "fields" => array(
            "option1" => array ("FriendlyName" => "Enable Checking", "Type" => "yesno", "Size" => "25",
                                  "Description" => "Enable checking for payment method by module", ),
            "option2" => array ("FriendlyName" => "Disable on Method", "Type" => "dropdown", "Options" => $pays,
                                  "Description" => "Select the Viacoin payment Gateway", ),
        )
    );

    return $configarray;
}

?>
