<?php

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\Forms\TextField;
use SilverStripe\Security\Member;
use SilverStripe\Security\Security;
use SilverStripe\ORM\PaginatedList;

/**
 * Page for collecting a person contact info
 *
 * @author Joy
 */
class SearchPage extends Page {

    private static $singular_name = 'Search page';
    private static $description = "A page where visitors can search contact";

}

class SearchPageController extends PageController {

    private $resultListing;
    private $cKey;

    private static $allowed_actions = [
        "Form","doSearch"
    ];

    public function init() {
        parent::init();
        
        
    }    

    public function ShowKeyword() {
        return  $this->cKey;
    }

    public function Form() {
        $fields = FieldList::create();
        $fields->add(TextField::create("Keyword", "")->setAttribute("placeholder", "Keyword"));

        $actions = FieldList::create();
        $actions->add(FormAction::create('doSearch', 'Search'));

        $required = RequiredFields::create([
                    'Keyword'

        ]);
         $form = Form::create($this, 'Form', $fields, $actions, $required);
        $form->setFormMethod('GET');
        $form->disableSecurityToken();

        return $form;
    }

   public function doSearch($data, $form, $request) {

        $this->cKey = $data['Keyword'];

        return $this->render();


    }

    public function SearchContact() {
	
       if (!$this->cKey) {
          return null;
       }

	$MemberList = Member::get()->where("Email like '%". $this->cKey ."%'");
        
        return $MemberList;	
    }
	

    public function PaginatedPages() {

       if (!$this->cKey) {
          return null;
       }
 
        $paginatedList = new PaginatedList($this->SearchContact(), $this->request);

        $paginatedList->setPageLength(5); 
        
        return $paginatedList;
    }        

}




