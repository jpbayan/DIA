<?php

use SilverStripe\ORM\DataExtension;

/*
 * Developed by Joy
 */

/**
 * Description of RegisterMemberExtension
 *
 * @author nick
 */
class RegisterMemberExtension extends DataExtension {

    private static $db = [
        "Phone" => "Varchar(255)",
        "Mobile" => "Varchar(255)",
		"Address" => "Varchar(255)",
        "FacebookLink" => "Varchar(255)",
        "LinkedinLink" => "Varchar(255)",
        "TwitterLink" => "Varchar(255)"		
    ];


}
