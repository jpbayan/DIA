<?php

use SilverStripe\Forms\EmailField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\HeaderField;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\LiteralField;
use SilverStripe\Security\Member;
use SilverStripe\Security\Security;
use SilverStripe\Control\Session;

/**
 * Page for collecting a person contact info
 *
 * @author Joy
 */
class RegistrationPage extends Page {

    private static $singular_name = 'Registration page';
    private static $description = "A page where visitors can register their information";

}

class RegistrationPageController extends PageController {

    private static $allowed_actions = [
        "Form",
		"doRegister",
        "success"
    ];

    public function Form() {
        $fields = FieldList::create();
        $fields->add(HeaderField::create("PersonalHeader", "Personal details"));
        $fields->add(TextField::create("FirstName", "")->setAttribute("placeholder", "Name"));
        $fields->add(TextField::create("Surname", "")->setAttribute("placeholder", "Surname"));
        $fields->add(TextField::create("Phone", "")->setAttribute("placeholder", "Tel"));
        $fields->add(TextField::create("Mobile", "")->setAttribute("placeholder", "Mob"));
        $fields->add(EmailField::create("Email", "")->setAttribute("placeholder", "Email"));

        $actions = FieldList::create();
        $actions->add(FormAction::create('doRegister', 'Register'));

        $required = RequiredFields::create([
                    'FirstName',
                    'Surname',
                    'Email',
                    'Mobile'

        ]);
         $form = Form::create($this, 'Form', $fields, $actions, $required);

        $form->getSessionData();

        return $form;
    }

   public function doRegister($data, $form, $request) {

        $existingMember = Member::get()->filter(["Email" => $data['Email']])->first();
        if ($existingMember) {
            $form->sessionMessage("This user is already registered", "bad");
            $form->setSessionData($data);
            return $this->redirectBack();
        }

        $businessMember = Member::create();
        $businessMember->update($data);
        $businessMember->write();
		
		 return $this->redirect($this->Link() . 'success/');



    }
	
    public function success($data) {

        $messg = "Registration success!";

        $arrayData = new SilverStripe\View\ArrayData([
            'Content' => $messg
        ]);

        return $arrayData->renderWith('Page');;

    }
	



}




