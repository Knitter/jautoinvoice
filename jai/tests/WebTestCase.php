<?php

define('TEST_BASE_URL', 'http://localhost/jai/index-test.php/');

class WebTestCase extends CWebTestCase {

    protected function setUp() {
        parent::setUp();
        $this->setBrowserUrl(TEST_BASE_URL);
    }

}
