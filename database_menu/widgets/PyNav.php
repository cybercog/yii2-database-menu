<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014
 * @package yii2-nav-x
 * @version 1.2.0
 */

namespace app\modules\database_menu\widgets;


use app\modules\database_menu\models\DatabaseMenu;
use yii\base\InvalidConfigException;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/**
 * An extended nav menu for Bootstrap 3 - that offers
 * submenu drilldown
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class PyNav extends \yii\bootstrap\Nav
{
   
    /**
     * @inheritdoc
     * @throws InvalidConfigException
     */
    public function init() {
       
       
        
        $this->getMenuByName("default");
        
        $this->items =  $this->getMenuByName("default");
        parent::init();
    }
  
    public function getMenuByName($menuName) {

        $menus = DatabaseMenu::find()->asArray()->indexBy('id')->all();

        foreach ($menus as $key => $value) {
            if ( isset($value['icon']) && !empty($value['icon']) ) {
                $menus[$key]['label'] = '  <span class="'.$value['icon'].'"></span> '.$value['label'];
            }

            if ( isset($value['url']) && !empty($value['url'])) {

                if($value['url'] !== "#" ) {
                    $menus[$key]['url'] = [$value['url']];
                } else {
                    
                }
            } 
            // print $key.'  <span class="'.$value['icon'].'"></span>'.$value['label'].'  '.$value['url'].'  '.$value['icon']."<br>";
        }
        // var_dump($menus);

        return $menus;
    }

}
