<?php

class TestimonyTestimoniesModuleFrontController extends ModuleFrontController
{

    public function initContent(){
        parent::initContent();

        $page = Tools::getValue('p', 1); // Récupère le numéro de page à partir de l'URL, par défaut à 1
        $itemsPerPage = 3; // Définissez le nombre d'éléments que vous voulez par page
    
        $totalItems = ModelTestimony::getTotalTestimonies(true); // Assurez-vous que votre modèle a une méthode getTotalTestimonies
        $totalPages = ceil($totalItems / $itemsPerPage);
    
        $offset = $page * $itemsPerPage - $itemsPerPage;
       // $testimonies = ModelTestimony::getTestimonies(($page - 1) * $itemsPerPage);
        $testimonies = ModelTestimony::getTestimonies($itemsPerPage, $offset);
    
        $this->context->smarty->assign(array(
            'testimonies' =>  $testimonies,
            'testimony_path' => ModelTestimony::getImgPath(true),
            'current_page' => $page,
            'total_pages' => $totalPages,
        ));
    
        return $this->setTemplate('module:testimony/views/templates/front/testimony.tpl');
    }
    
}

