<?php


if (!class_exists('ModelTestimony'));
require_once _PS_MODULE_DIR_ . 'testimony/classes/ModelTestimony.php';
class AdminTestimonyController extends ModuleAdminController
{


    public function __construct()
    {
        $this->table = 'testimony';
        $this->className = 'ModelTestimony';
        $this->lang = false;
        $this->bootstrap = true;
        parent::__construct();

        $this->fields_list = [
            'id_testimony' => [
                'title' => $this->l('ID'),
                'align' => 'center',
                'class' => 'fixed-width-xs',
            ],
            'name' => [
                'title' => $this->l('Name'),
                'width' => 'auto'
            ],
            'description' => [
                'title' => $this->l('Description'),
                'width' => 'auto'
            ],
            // 'logo'=>[
            //     'titile' => $this->l('Logo'),
            //     'image' => 'm',
            //     'orderby' => false,
            //     'search' => false,
            //     'align' => 'center'
            // ],

            'new_window' => [
                'title' => $this->trans('New window', [], 'Admin.Navigation.Header'),
                'align' => 'center',
                'type' => 'bool',
                'active' => 'new_window',
                'class' => 'fixed-width-sm',
            ],
        ];
    }

    public function renderForm(){

        if(!$testimony = $this->loadObject((true))) return false;

        $this->fields_form =array(
            'tinymce' => true,
            'legend' => array(
                'tittle' => $this->l('Testimony'),
                'icon' => 'icon-certifcate'
            ),
            'input' => array (
                array(
                    'type' => 'text',
                    'label' => $this->l('Name'),
                    'name' => 'name',
                    'col' => 4,
                    'required' => true,
                    'hint' => $this->l('Invalid characters :') 
                ),
                array(
                    'type' => 'textarea',
                    'label' => $this->l('Description'),
                    'name' => 'description',
                    'col' => 6,
                    'lang' => true,
                    'cols' => 60,
                    'rows' => 10,
                    'autoload_rte' => 'rte',
                
                    'hint' => $this->l('Invalid characters :') 
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Enable'),
                    'name' => 'active',
                    'required' => false,
                    'is_bool' => true,
                    'values' => [
                        [
                            'id' => 'active_on',
                            'value' => 1,
                            'label' => $this->l('Enable'),
                        ],
                        [
                            'id' => 'active_off',
                            'value' => 0,
                            'label' =>  $this->l('Disabled'),
                        ],
                    ],
                
                ),
                array(
                    'submit' => [
                        'title' => $this->l('Save'),
                    ],
                )
            )
            );
    }
}
