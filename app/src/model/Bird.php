<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use SilverStripe\ORM\DataObject;
use SilverStripe\ORM\FieldType\DBInt;

/**
 * Description of Bird
 *
 * @author Joy
 */
class Bird extends DataObject {

    private static $singular_name = "Bird";
    private static $plural_name = "Birds";

    private static $db = array(
        "Record" => DBInt::class,
        "RecordID" => "Varchar(255)",
        "SpeciesCommonName" => "Varchar(255)",
        "SpeciesScientificName" => "Varchar(255)",
        "SpeciesAbbreviation" => "Varchar(255)",
        "Age" => "Varchar",	
        "WANPLUM" => "Varchar",	
        "PLPHASE" => "Varchar",	
        "Sex" => "Varchar",	
        "Count" => DBInt::class,	
        "NFEED" => 	DBInt::class,
        "OCFEED" => "Varchar",	
        "NSOW" => DBInt::class,	
        "OCSOW" => 	"Varchar",
        "NSOICE" => DBInt::class,		
        "OCSOICE" => "Varchar",	
        "OCSOSHP" => "Varchar",	
        "OCINHD" => "Varchar",	
        "NFLYP" => DBInt::class,	
        "OCFLYP" => "Varchar",	
        "NACC" => DBInt::class,	
        "OCACC" => 	"Varchar",
        "NFOLL" => 	DBInt::class,
        "OCFOL" => 	"Varchar",
        "OCMOULT" => "Varchar",	
        "OCNATFED" => "Varchar"
    );

    private static $summary_fields = [
        "ID"=>"ID",
        "Record"=>"Record",
        "RecordID"=>"RecordID",
        "SpeciesCommonName"=>"SpeciesCommonName",
        "SpeciesScientificName"=>"SpeciesScientificName"
    ];


}
