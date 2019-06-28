<?php

/*
 * Developed by Joy
 */

use SilverStripe\Admin\ModelAdmin;

/**
 * Adminitration for Birds
 *
 * @author Joy
 */

class BirdAdmin extends ModelAdmin {

    private static $managed_models = [
        'Bird'
    ];
    private static $url_segment = 'Bird';
    private static $menu_title = 'Birds';

}

