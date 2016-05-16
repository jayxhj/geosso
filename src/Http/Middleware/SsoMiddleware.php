<?php

namespace Sso\Http\Middleware;

use Sso\Support\SsoResponse;
use Closure;
use Sso\Support\SsoClientConfig;

class SsoMiddleware
{
    const SYNC_LOGIN   = 'sync_login';
    const SYNC_LOGOUT  = 'sync_logout';
    const ADD_GROUP    = 'add_group';
    const ADD_USER     = 'add_user';
    const DELETE_USER  = 'delete_user';
    const DELETE_GROUP = 'delete_group';
    const EDIT_USER    = 'edit_user';
    const PING         = 'ping';


    /**
     * 允许请求的方法
     * @var array
     *
     */
    private static $_allowed_actions = [
        self::SYNC_LOGIN,
        self::SYNC_LOGOUT,
        self::ADD_USER,
        self::ADD_GROUP,
        self::DELETE_USER,
        self::DELETE_GROUP,
        self::EDIT_USER,
        self::PING,
    ];

    /**
     * 校验请求合法性
     *
     * @param \Illuminate\Http\Request $request 请求参数
     * @param \Closure                 $next
     * @return mixed
     *
     * */
    public function handle($request, Closure $next)
    {
        $this->_setConfig();

        if ($this->_filterAction($request) !== true) {
            $actionCode = SsoResponse::SSO_ACTION_INVALID;

            return response()->json(result([], $actionCode, SsoResponse::$SSO_ROUTE_MESSAGE[$actionCode]));
        }
        if ($this->_filterSign($request) !== true) {
            $actionCode = SsoResponse::SSO_SIGN_INVALID;

            return response()->json(result([], $actionCode, SsoResponse::$SSO_ROUTE_MESSAGE[$actionCode]));
        }


        return $next($request);
    }


    /**
     * 校验请求方法是否是规定的几种 action
     * @param \Illuminate\Http\Request $request 请求参数
     * @return bool
     *
     **/
    private function _filterAction($request)
    {
        return in_array($request->input('action'), self::$_allowed_actions);
    }


    /**
     * 校验请求签名是否合法
     *
     * @param \Illuminate\Http\Request $request 请求参数
     * @return bool
     *
     * */
    private function _filterSign($request)
    {
        $time       = $request->input('time');
        $params     = $request->input('params');
        $sign       = $request->input('sign');
        $configKey  = array_get(\Route::getCurrentRoute()->getAction(), 'config_key');
        $configName = app(SsoClientConfig::class)->getConfigName($configKey);
        $key        = config($configName)['sso_key'];
        $md5Sign    = md5($key.$time.$params);

        $timeDiff = abs(time() - $time);
        if ($md5Sign == $sign && $timeDiff < SsoResponse::REQUEST_DURATION) {
            return true;
        }

        return false;
    }

    /**
     * 设置当前应用的配置
     *
     * */
    private function _setConfig()
    {
        $configKey = array_get(\Route::getCurrentRoute()->getAction(), 'config_key');

        return app(SsoClientConfig::class)->setConfig($configKey);
    }


}
