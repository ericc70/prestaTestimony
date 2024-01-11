<?php


if (!class_exists('ModelTestimony'));
require_once _PS_MODULE_DIR_ . 'testimony/classes/ModelTestimony.php';

class AdminTestimonyController extends ModuleAdminController
{


    public function __construct()
    {
        $this->table = 'testimony';
        $this->className = 'ModelTestimony';
        $this->lang = true;
        $this->bootstrap = true;
        parent::__construct();

        $this->addRowAction('edit');
        $this->addRowAction('delete');
    $this->bulk_actions = [
            'delete' => [
                'text' => $this->trans('Delete selected', [], 'Admin.Notifications.Info'),
                'confirm' => $this->trans('Delete selected items?', [], 'Admin.Notifications.Info'),
                'icon' => 'icon-trash',
            ],
        ];

        
        $this->fieldImageSettings = array(
            'name' => 'logo',
            'dir' => 'testimony'
        );
        $this->fields_list = [
            'id_testimony' => [
                'title' => $this->l('ID'),
                'align' => 'center',
                'class' => 'fixed-width-xs',
            ],
                'logo'=>[
                'title' => $this->l('Logo'),
                'image' => 'testimony',
                'orderby' => false,
                'search' => false,
                'align' => 'center'
            ],
            'name' => [
                'title' => $this->l('Name'),
                'width' => 'auto'
            ],
            'description' => [
                'title' => $this->l('Description'),
                'width' => 'auto'
            ],
            'active' => [
                'title' => $this->l('Status'),
                'align' => 'center',
                'active' => 'active',
                'type' => 'bool',
                'class' => 'fixed-width-sm',
                'orderby' => false,
            ],
        

         
        ];

    }
  
    public function renderForm(){

        if(!$testimony = $this->loadObject((true))) 
        {
            return;
        }
    $image = ModelTestimony::$img_dir.'/'.$testimony->id.'.jpg';
    $image_url = ImageManager::thumbnail(
        $image,
        $this->table . '_' . (int) $testimony->id . '.' . $this->imageType,
        350,
        $this->imageType,
        true,
        true
    );
    $image_size = file_exists($image) ? filesize($image) / 1000 : false;

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
                    'type' => 'file',
                    'label' => $this->l('Logo'),
                    'name' => 'logo',
                    'image' => $image_url ? $image_url : false,
                    'size' => $image_size,
                    'display_image' => true,
                    'col' => 6,
                    'hint' => $this->l('Upload image from your computer')
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
                // array(
                //     'submit' => [
                //         'title' => $this->l('Save'),
                //     ],
                // )
            )
            );
            $this->fields_form['submit'] = [
              // 'title' => $this->trans('Save', [], 'Admin.Actions'),
               'title' => $this->l('Save'),
              'class' => 'btn btn-default pull-right',
            ];
            if(!$testimony = $this->loadObject((true))) 
                {
                    return;
                }
             $this->getFieldsValue($testimony);
            return parent::renderForm();
    }

    
}
