<?php

namespace app\modules\lessonsSchedule;

use app\models\User;
use app\modules\panel\components\Configs;
use Yii;
use yii\helpers\Inflector;
use yii\helpers\Url;

/**
 * education module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\lessonsSchedule\controllers';
    public $layout = '@adminlte';

    public $defaultUrl;
    public $defaultUrlLabel;
    public $navbar;
    public $defaultRoute = 'default';

    private $_coreItems = [];
    private $_menus = [];
    private $_normalizeMenus;

    public function beforeAction($action)
    {
        if (Yii::$app->user->isGuest){
            $request = (isset($_SERVER['REDIRECT_URL'])) ? $_SERVER['REDIRECT_URL'] : $_SERVER['REQUEST_URI'];
            $arr = explode("/", $request);
            $controller = $arr[2];
            if($controller != 'sign-in'){
                Yii::$app->response->redirect(Url::to(['/ems/sign-in/login']))->send();
                return false;
            }
        }
        return parent::beforeAction($action);
    }

    public function getMenus()
    {
        if ($this->_normalizeMenus === null) {
            $mid = '/' . $this->getUniqueId() . '/';
            // resolve core menus
            $this->_normalizeMenus = [];

            $config = Configs::instance();
            $conditions = [
                'user' => $config->db && $config->db->schema->getTableSchema($config->userTable),
                'assignment' => ($userClass = Yii::$app->getUser()->identityClass) && is_subclass_of($userClass, 'yii\db\BaseActiveRecord'),
                'menu' => $config->db && $config->db->schema->getTableSchema($config->menuTable),
            ];
            foreach ($this->_coreItems as $id => $lable) {
                if (!isset($conditions[$id]) || $conditions[$id]) {
                    $this->_normalizeMenus[$id] = ['label' => Yii::t('rbac-admin', $lable), 'url' => [$mid . $id]];
                }
            }
            foreach (array_keys($this->controllerMap) as $id) {
                $this->_normalizeMenus[$id] = ['label' => Yii::t('rbac-admin', Inflector::humanize($id)), 'url' => [$mid . $id]];
            }

            // user configure menus
            foreach ($this->_menus as $id => $value) {
                if (empty($value)) {
                    unset($this->_normalizeMenus[$id]);
                    continue;
                }
                if (is_string($value)) {
                    $value = ['label' => $value];
                }
                $this->_normalizeMenus[$id] = isset($this->_normalizeMenus[$id]) ? array_merge($this->_normalizeMenus[$id], $value)
                    : $value;
                if (!isset($this->_normalizeMenus[$id]['url'])) {
                    $this->_normalizeMenus[$id]['url'] = [$mid . $id];
                }
            }
        }
        return $this->_normalizeMenus;
    }
    /**
     * {@inheritdoc}
     */
    public function init()
    {
        User::getRoleRedirect(Yii::$app->user->getId(), $this->id);

        parent::init();

        // custom initialization code goes here
    }
}