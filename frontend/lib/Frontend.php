<?php
class Frontend extends ApiFrontend {
    function init() {
        parent::init();

        $this->add('Layout_Basic',null,null,['layout/nearly-guru']);
        $this->add('jUI');
        $this->template->set('css','romans.css');
        $this->jui->addStaticInclude('prism');

        $this->add('agile55/ga/Controller_Tracker');
        $this->add('romaninsh/mdcms/Controller');
        if($this->page!='index')$this->layout->template->tryDel('IndexHeader');
        $this->js(true)->_selector('.atk-layout-cell:first')->css('height','auto');

        $this->js(true)->_selector('.header-push')->css('padding-top', $this->js()->_selector('#header header')->outerHeight());

    // $('.header-push').each(function(){
    // 	var header = $('#header header').outerHeight();
    // 	$(this).css('padding-top', header);
    // });


    }
    function initLayout(){
        parent::initLayout();
        $this->page_object->title='My Personal Page - Romans Malinovskis';
    }

}
