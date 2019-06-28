<?php

use SilverStripe\Forms\EmailField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\HeaderField;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\LiteralField;
use Silverstripe\Forms\HiddenField;
use SilverStripe\Security\Member;
use SilverStripe\Security\Security;
use SilverStripe\Control\Session;

/**
 * Page for editing contact info
 *
 * @author Joy
 */
class EditContactPage extends Page {

    private static $singular_name = 'Edit Contact page';
    private static $description = "A page where visitors can edit contact information";

}

class EditContactPageController extends PageController {

    private $ID;

    private static $allowed_actions = [
        "Form",
		"doEditContact",
        "success"
    ];


    public function init() {
        parent::init();

       $this->ID = $this->request->getVar('ID'); 


    }

    public function Form() {

        $member = null;

        if ($this->ID) {
           $member = Member::get()->byID($this->ID);
        }

        if (!$member) {
          $fields = FieldList::create();
          $fields->add(HeaderField::create("PersonalHeader", "No Record Found"));
            $actions = FieldList::create();
            $form = Form::create($this, 'Form', $fields, $actions);
            return $form;
    
        }


        $fields = FieldList::create();
        $fields->add(HeaderField::create("PersonalHeader", "Personal details"));
        $fields->add(LiteralField::create("EmailDisplay", " Email : ".$member->Email));
        $fields->add(TextField::create("FirstName", "")->setAttribute("placeholder", "Name"));
        $fields->add(TextField::create("Surname", "")->setAttribute("placeholder", "Surname"));
        $fields->add(TextField::create("Phone", "")->setAttribute("placeholder", "Tel"));
        $fields->add(TextField::create("Mobile", "")->setAttribute("placeholder", "Mob"));
        $fields->add(TextField::create("FacebookLink", "")->setAttribute("placeholder", "Facebook"));
        $fields->add(TextField::create("TwitterLink", "")->setAttribute("placeholder", "Twitter"));
        $fields->add(TextField::create("LinkedinLink", "")->setAttribute("placeholder", "Linkedin"));
        $fields->add(HiddenField::create("PID", "", $member->ID));

        $actions = FieldList::create();
        $actions->add(FormAction::create('doEditContact', 'Save'));

        $required = RequiredFields::create([
                    'FirstName',
                    'Surname',
                    'Mobile'

        ]);
         $form = Form::create($this, 'Form', $fields, $actions, $required);

        $form->getSessionData();
        $form->loadDataFrom($member);

        return $form;
    }

   public function doEditContact($data, $form, $request) {

        $existingMember =  Member::get()->byID($data['PID']); 
        if (!$existingMember) {
            $form->sessionMessage("This user doesnot exist", "bad");
            $form->setSessionData($data);
            return $this->redirectBack();
        }

        $existingMember->update($data);
        $existingMember->write();

	return $this->redirect($this->Link() . 'success/');



    }
	
    public function success($data) {

        $messg = "Contact Info updated!";

        $arrayData = new SilverStripe\View\ArrayData([
            'Content' => $messg
        ]);

        return $arrayData->renderWith('Page');;

    }
	




}




