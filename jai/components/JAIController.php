<?php

class JAIController extends CController {

    public $layout = '//layouts/default';
    protected $title;
    protected $menu;

    public function __construct($id, $module = null) {
        parent::__construct($id, $module);

        $this->menu = array();
    }

}