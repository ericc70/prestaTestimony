<?php

class TestimonyTestimoniesModuleFrontController extends ModuleFrontController
{

    public function initContent(){
        parent::initContent();
        $testimonies = ModelTestimony::getTestimonies(null, null);

        $this->context->smarty->assign(array(
            'testimonies' =>  $testimonies,
            'testimony_path' => ModelTestimony::getImgPath(true)
         ));

      return $this->setTemplate('module:testimony/views/templates/front/testimony.tpl');
    
    // return $this->display('module/testimony/views/templates/front/testimony.tpl');
    }
}

