<?php
class Frontend extends ApiFrontend {
    function init() {
        parent::init();

        $this->add('Layout_Basic',null,null,['layout/nearly-guru']);
        $this->add('jUI');

        $this->add('agile55/ga/Controller_Tracker');
    }

}
