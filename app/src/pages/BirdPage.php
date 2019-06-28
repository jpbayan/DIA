<?php

use SilverStripe\ORM\PaginatedList;

/**
 * Page for showing list of bird info
 *
 * @author Joy
 */
class BirdPage extends Page {

    private static $singular_name = 'Bird page';
    private static $description = "A page where visitors can view list of birds";

}

class BirdPageController extends PageController {


    public function ShowBird() {
	
	$BirdList = Bird::get();
        
        return $BirdList;	
    }
	

    public function PaginatedPages() {

        $paginatedList = new PaginatedList($this->ShowBird(), $this->request);

        $paginatedList->setPageLength(30); 
        
        return $paginatedList;
    }        

}




