<?php

class page_cv extends Page {
  function init(){
    parent::init();
    header('Location: /files/romans-malinovskis-cv-2019.pdf');
    exit;
  }
}
