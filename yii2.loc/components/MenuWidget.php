<?php
/**
 * Created by PhpStorm.
 * User: Anton
 * Date: 16.02.2018
 * Time: 11:13
 */

namespace app\components;
use yii\base\Widget;
use app\models\Category;
use Yii;

class MenuWidget extends Widget
{
    public $model;
    public $tpl;
    public $data;
    public $tree;
    public $menuHtml;

    public function init()
    {
        parent::init();
        if ($this->tpl === null) {
            $this->tpl = 'menu';
        }
        $this->tpl .= '.php';
    }

    public function run()
    {
        //get cache
        if($this->tpl === 'menu.php'){//если запрос из кеша пользвательской части -> menu.php, возвращаем кэш если нет то нет.
            $menu = Yii::$app->cache->get('menu');
            if($menu) return $menu;
        }
//        $menu = Yii::$app->cache->get('menu');//получаем меню и кэша
//            if($menu) return $menu;//если в кэше что-то есть с ключем menu то возвращаем его содержимое

        $this->data = Category::find()->indexBy('idCategory')->asArray()->all();//делаем выбоку из таблицы категории записываем все в массив и присваеиваем индекс массива к idCategory
        $this->tree = $this->getTree();//перебераем в функции getTree весь массив, преобразуя его в дерево(если у элемента вассива значение значение родителя равно idCategory влаживаем этот массив в ключ childs)
        $this->menuHtml = $this->getMenuHTML($this->tree);
        // set cache

        if($this->tpl === 'menu.php'){
            Yii::$app->cache->set('menu', $this->menuHtml, 60);

        }
//        Yii::$app->cache->set('menu'/*имя ключа для записи в кэш*/, $this->menuHtml/*что мы записываем в кэш*/, 60/*через какое время заново создастся файл кэша*/);//если у нас в кэше menu небыло, выполняем код выше по формированию меню, тут записываем его в кэш.
        return $this->menuHtml;
    }

    protected function getTree()
    {
        $tree = [];
        foreach ($this->data as $id => &$node) {
            if (!$node['parent_id'])
                $tree[$id] = &$node;
            else
                $this->data[$node['parent_id']]['childs'][$node['idCategory']] = &$node;
        }
        return $tree;

    }



    protected function getMenuHTML ($tree, $strel = '') {
        $str = '';
        foreach ($tree as $item) {
            $str .= $this->catToTemplate($item, $strel);
        }
        return $str;
    }



    protected function catToTemplate($category, $strel)
    {
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }
}
