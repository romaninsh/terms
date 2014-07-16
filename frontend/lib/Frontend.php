<?php
class Frontend extends ApiFrontend {
    function init() {
        parent::init();

        $this->add('Layout_Basic',null,null,['layout/nearly-guru']);
        $this->add('jUI');

        $this->add('agile55/ga/Controller_Tracker');

        $dialog = $this->layout->add('View_Popover');
        $this->on('click','.do-tooltip',$dialog->showJS());

        $pop=$dialog->add('View')->addClass('atk-align-center');

        $pop->add('P')
            ->set('I believe that we continue to evolve ourselves throughout all our lives constantly
                improving our skills. I myself am on my path to become IT Guru.');
        $pop->add('Button')->set(['Dismiss','button'=>'small', 'icon'=>'close'])->js('click',$dialog->js()->dialog('close'));
    }

}
