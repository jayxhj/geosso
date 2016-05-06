<?php

namespace Sso\Http\Controllers;

use Sso\Http\Requests\SsoRequest;
use Sso\Support\SsoResponse;

class SsoController extends Controller
{

    private static $SERVICE = null;
    private $_configName = '';

    public function __construct(){
        $this->_configName = array_get(\Route::getCurrentRoute()->getAction(),'config_name');
    }

    /**
     * route to specific action
     *
     * @param \Sso\Http\Requests\SsoRequest $request
     * @return \Illuminate\Http\JsonResponse
     *
     */
    public function index(SsoRequest $request)
    {
        $action = $request->toParamsBean()->getAction();
        $method = $this->_getActionMethod($action);

        return $this->$method($request);
    }

    /**
     *
     * @param \Sso\Http\Requests\SsoRequest $request
     * @return \Illuminate\Http\JsonResponse
     *
     * */
    public function  addUser(SsoRequest $request)
    {
        $service       = $this->_getService();
        $userAddReturn = $service->addUser($request->toParamsBean());

        return response()->json(result(
            array_get($userAddReturn, 'data'),
            array_get($userAddReturn, 'code'),
            SsoResponse::$USER_ADD_MESSAGE[array_get($userAddReturn, 'code')]
        ));

    }

    /**
     *
     * @param \Sso\Http\Requests\SsoRequest $request
     * @return  \Illuminate\Http\JsonResponse
     *
     * */
    public function deleteUser(SsoRequest $request)
    {
        $service       = $this->_getService();
        $userDeleteRet = $service->deleteUser($request->toParamsBean());

        return response()->json(result(
            [],
            array_get($userDeleteRet, 'code'),
            SsoResponse::$USER_DELETE_MESSAGE[array_get($userDeleteRet, 'code')]
        ));

    }


    /**
     *
     * @param \Sso\Http\Requests\SsoRequest $request
     * @return \Illuminate\Http\JsonResponse
     *
     * */
    public function addGroup(SsoRequest $request)
    {
        $service        = $this->_getService();
        $groupAddReturn = $service->addUserGroup($request->toParamsBean());

        return response()->json(result(
            array_get($groupAddReturn, 'data'),
            array_get($groupAddReturn, 'code'),
            SsoResponse::$USER_GROUP_ADD_MESSAGE[array_get($groupAddReturn, 'code')]
        ));

    }

    /**
     *
     * @param \Sso\Http\Requests\SsoRequest $request
     * @return \Illuminate\Http\JsonResponse
     *
     * */
    public function deleteGroup(SsoRequest $request)
    {
        $service        = $this->_getService();
        $groupDeleteRet = $service->deleteUserGroup($request->toParamsBean());

        return response()->json(result(
            [],
            array_get($groupDeleteRet, 'code'),
            SsoResponse::$USER_GROUP_DELETE_MESSAGE[array_get($groupDeleteRet, 'code')]
        ));

    }

    /**
     *
     * @param \Sso\Http\Requests\SsoRequest $request
     * @return \Illuminate\Http\JsonResponse
     *
     * */
    public function editUser(SsoRequest $request)
    {
        $service     = $this->_getService();
        $userEditRet = $service->editUser($request->toParamsBean());

        return response()->json(result(
            [],
            array_get($userEditRet, 'code'),
            SsoResponse::$USER_EDIT_MESSAGE[array_get($userEditRet, 'code')]
        ));

    }

    /**
     *
     * @param \Sso\Http\Requests\SsoRequest $request
     * @return \Illuminate\Http\JsonResponse
     *
     * */
    public function ping(SsoRequest $request)
    {
        $service = $this->_getService();
        $pingRet = $service->ping($request->toParamsBean());

        return response()->json(result(
            [],
            array_get($pingRet, 'code'),
            SsoResponse::$PING_MESSAGE[array_get($pingRet, 'code')]
        ));

    }

    /**
     *
     * @param \Sso\Http\Requests\SsoRequest $request
     * @return \Illuminate\Http\JsonResponse
     *
     * */
    public function syncLogin(SsoRequest $request)
    {
        $service      = $this->_getService();
        $syncLoginRet = $service->syncLogin($request->toParamsBean());

        return response()->json(result(
            [],
            array_get($syncLoginRet, 'code'),
            SsoResponse::$SYNC_LOGIN_MESSAGE[array_get($syncLoginRet, 'code')]
        ));

    }

    /**
     *
     * @param \Sso\Http\Requests\SsoRequest $request
     * @return \Illuminate\Http\JsonResponse
     *
     * */
    public function syncLogout(SsoRequest $request)
    {
        $service       = $this->_getService();
        $syncLogoutRet = $service->syncLogout($request->toParamsBean());

        return response()->json(result(
            [],
            array_get($syncLogoutRet, 'code'),
            SsoResponse::$SYNC_LOGOUT_MESSAGE[array_get($syncLogoutRet, 'code')]
        ));

    }

    /**
     * 获取接口实现类的实例
     * @return object
     *
     * */
    private function _getService()
    {
        if (is_null(self::$SERVICE)) {
            self::$SERVICE = app()->make(config($this->_configName.'.sso_service'));
        }

        return self::$SERVICE;
    }


    /**
     * 请求参数的 action 到 Controller 具体 action 的映射
     * @param string $action
     * @return string
     *
     * */
    private function _getActionMethod($action)
    {
        return convert_underline($action, false);
    }


}
