<?php
use SilverStripe\Dev\BuildTask;
use SilverStripe\SiteConfig\SiteConfig;
use SilverStripe\Core\Config\Config;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UpdateBirdData
 *
 * @author Joy
 */
class UpdateBirdData extends BuildTask {

        protected $title = 'Update Bird data';

        protected $enabled = true;

        public function run($request) {
		
			ini_set('max_execution_time', 0);
			$spreadsheet_url = SiteConfig::current_site_config()->BirdSheetLink;
		
			$keys = array(
				"RECORD" => "Record",
				"RECORD ID" => "RecordID",
				"Species common name (taxon [AGE / SEX / PLUMAGE PHASE])" => "SpeciesCommonName",
				"Species  scientific name (taxon [AGE /SEX /  PLUMAGE PHASE])" => "SpeciesScientificName",
				"Species abbreviation" => "SpeciesAbbreviation",
				"AGE" => "Age",	
				"WANPLUM" => "WANPLUM",	
				"PLPHASE" => "PLPHASE",	
				"SEX" => "Sex",	
				"COUNT" => "Count",	
				"NFEED" => 	"NFEED",
				"OCFEED" => "OCFEED",	
				"NSOW" => "NSOW",	
				"OCSOW" => 	"OCSOW",
				"NSOICE" => "NSOICE",		
				"OCSOICE" => "OCSOICE",	
				"OCSOSHP" => "OCSOSHP",	
				"OCINHD" => "OCINHD",	
				"NFLYP" => "NFLYP",	
				"OCFLYP" => "OCFLYP",	
				"NACC" => "NACC",	
				"OCACC" => 	"OCACC",
				"NFOLL" => 	"NFOLL",
				"OCFOL" => 	"OCFOL",
				"OCMOULT" => "OCMOULT",	
				"OCNATFED" => "OCNATFED"
			);
			$columns = array();
			
			if (($handle = fopen($spreadsheet_url, "r")) !== FALSE) {
				while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
					$spreadsheet_data[] = $data;
				}
				fclose($handle);
				$index = 0;
				$header = array_shift($spreadsheet_data);
				foreach ($header as $value) {
					foreach ($keys as $k => $v) {
						if ($k == $value) {
							$columns[$k] = $index;
						}
					}
					$index++;
				}
				

				foreach ($spreadsheet_data as $row) {


				  $recordid = $row[$columns['RECORD']];
					
				  $bird = Bird::get()->filter(array("Record" => $recordid))->first();
					
					if (!$bird) {

						$bird = new Bird();				
					
					}
					
				   foreach ($keys as $k => $v) {
						$bird->$v = $row[$columns[$k]];
					}

					$bird->write();
					
					
				}
			
				
		
			} else {
				die("Problem reading csv");
			}
		
		

            echo "done";

        }


}
          	
