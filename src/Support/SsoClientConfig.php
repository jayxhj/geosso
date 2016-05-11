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
     * @param string $configName
     * */
    public function setConfig($configName)
    {
        $ssoConfig = config('ssoclientconfig.'.$configName);
        if (! is_null(array_get($ssoConfig, 'path'))) {
            $config = $this->getClientConfig(array_get($ssoConfig, 'path'));
            \Config::set($configName, $config);
        }
    }

    /**
     * 根据地址获取配置
     * @param string $path
     * @return array
     *
     * */
    private function getClientConfig($path)
    {
        if (file_exists($path)) {
            return include $path;
        }

        return [];
    }

}
