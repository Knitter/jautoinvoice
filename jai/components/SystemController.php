<?php

class SystemController extends CController {

    public $layout = '//layouts/system';
    protected $menu;

    public function __construct($id, $module = null) {
        parent::__construct($id, $module);

        $this->menu = array();
    }

}