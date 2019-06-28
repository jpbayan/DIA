<?php

use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\TextareaField;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SiteConfigExtension
 *
 * @author Joy
 */
class SiteConfigExtension extends DataExtension {

    private static $db = [
        "BirdSheetLink" => "Text"
    ];

    public function updateCMSFields(FieldList $fields) {
        parent::updateCMSFields($fields);

        $fields->addFieldToTab('Root.Main', new TextareaField('BirdSheetLink'));


    }

}


