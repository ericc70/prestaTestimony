<?php
class ModelTestimony extends ObjectModel{

    public $name;
    public $active = true;
    public $description;

    public static $definition = array(
        'table' => 'testimony',
        'primary' => 'id_testimony',
        'multilang' => true,

        'fields' => array(
            'name' => array('type' => self::TYPE_STRING, 'validate' => 'isName', 'required' => true, 'size' => 255),
            'active' => array('type' => self::TYPE_BOOL),
            'description' => array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isCleanHtml'),
            
        ),
    );

    public static $img_dir = _PS_IMG_DIR_.'testimony';

    public static function getImgPath($front=false)
    {
        return $front ? _PS_IMG_.'testimony/' : _PS_IMG_DIR_.'testimony/' ;
    }

    public static function getTestimonies($limit = 12, $active=true , $id_lang = null ){

        $id_lang = $id_lang ? $id_lang : Context::getContext()->language->id;
        $q = new DbQuery();
        $q->select('t.*, t1.description')
          ->from('testimony' , 't')
          ->innerJoin('testimony_lang', 't1', 't1.id_testimony=t.id_testimony')
          ->limit($limit)
          ->where('t.active='.(int)$active);

          return Db::getInstance()->executeS($q);
    }


}