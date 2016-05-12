<?php

namespace Sso\Support;


class SsoRequestGenerate
{
    /**
     * SSO 服务端允许的 action
     * @var array
     * */
    private $_allowedActions = [
        'add_user',
        'delete_user',
        'add_group',
        'delete_group',
        'edit_user',
        'login',
        'logout',
        'validate_token',
        'get_user',
        'sync_login',
        'sync_logout'
    ];

    /**
     * 生成请求 SSO 的 url
     * @param string $action
     * @param array  $params
     * @param string $configKey
     * @return string
     *
     * */
    public function getRequestUrl($action, array $params, $configKey)
    {
        // 设置配置
        app(SsoClientConfig::class)->setConfig($configKey);
        $isAllowed  = $this->_isActionAllowed($action);
        $action     = $isAllowed ? $action : '404';
        $configName = app(SsoClientConfig::class)->getConfigName($configKey);

        $key       = config($configName)['sso_key'];
        $time      = time();
        $urlParams = json_encode($params);
        $sign      = md5($key.$time.$urlParams);

        return sprintf('%s/%s?time=%s&params=%s&sign=%s',
            $this->getSsoUrl($configKey),
            $action,
            $time,
            $urlParams,
            $sign
        );


    }

    /**
     * SSO 允许的 action
     *
     * */
    public function getAllowedAction()
    {
        return $this->_allowedActions;
    }

    /**
     * 获取 SSO url
     * @param string $configKey
     * @return string
     *
     * */
    public function getSsoUrl($configKey)
    {
        app(SsoClientConfig::class)->setConfig($configKey);
        $configName = app(SsoClientConfig::class)->getConfigName($configKey);

        return config($configName)['sso_url'];
    }

    /**
     * action 是否允许
     * @param string $action
     * @return boolean
     *
     * */
    private function _isActionAllowed($action)
    {
        return in_array($action, $this->_allowedActions);
    }

}
