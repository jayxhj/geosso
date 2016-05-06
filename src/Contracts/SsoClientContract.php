<?php

namespace Sso\Contracts;

use Sso\ParamsBean\SsoParams;

interface SsoClientContract {

    /**
     * 添加用户
     * @param \Sso\ParamsBean\SsoParams
     * @return array
     *
     * */
    public function addUser(SsoParams $params);

    /**
     * 删除用户
     * @param \Sso\ParamsBean\SsoParams
     * @return array
     *
     * */
    public function deleteUser(SsoParams $params);

    /**
     * 添加用户组
     * @param \Sso\ParamsBean\SsoParams
     * @return array
     *
     * */
    public function addUserGroup(SsoParams $params);

    /**
     * 删除用户组
     * @param \Sso\ParamsBean\SsoParams
     * @return array
     *
     * */
    public function deleteUserGroup(SsoParams $params);

    /**
     * 修改用户信息
     * @param \Sso\ParamsBean\SsoParams
     * @return array
     *
     * */
    public function editUser(SsoParams $params);

    /**
     * ping 查看应用状态
     * @param \Sso\ParamsBean\SsoParams
     * @return array
     *
     * */
    public function ping(SsoParams $params);

    /**
     * 同步登录状态
     * @param \Sso\ParamsBean\SsoParams
     * @return array
     *
     * */
    public function syncLogin(SsoParams $params);

    /**
     * 同步退出状态
     * @param \Sso\ParamsBean\SsoParams
     * @return array
     *
     * */
    public function syncLogout(SsoParams $params);

}
