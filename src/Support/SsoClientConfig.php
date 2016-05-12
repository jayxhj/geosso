<?php
/**
 * 读取接入应用配置并设置到全局 config
 */

namespace Sso\Support;


class SsoClientConfig
{
    /**
     *
     * 根据 config 名设置对应应用的配置
     * @param string $configKey
     * @return void
     * */
    public function setConfig($configKey)
    {
        $ssoConfig = config('ssoclientconfig.'.$configKey);
        if (! is_null(array_get($ssoConfig, 'path')) && ! \Config::offsetExists(array_get($ssoConfig, 'config_name'))) {
            $config = $this->_getClientConfig(array_get($ssoConfig, 'path'));
            \Config::set(array_get($ssoConfig, 'config_name'), $config);
        }
    }

    /**
     * 通过 config_key 获取配置对应的配置名（供 config() 调用时使用）
     * @param string $configKey
     * @return mixed
     *
     * */
    public function getConfigName($configKey)
    {
        $ssoConfig = config('ssoclientconfig.'.$configKey);

        return array_get($ssoConfig, 'config_name');

    }

    /**
     * 根据地址获取配置
     * @param string $path
     * @return array
     *
     * */
    private function _getClientConfig($path)
    {
        if (file_exists($path)) {
            return include $path;
        }

        return [];
    }

}
