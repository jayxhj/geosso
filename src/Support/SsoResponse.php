<?php
/**
 * SSO 配置项
 */

namespace Sso\Support;


class SsoResponse
{

    const REQUEST_DURATION = 180;

    /**
     * sso 非法请求
     * 1. 未定义的方法
     * 2. 请求时间戳错误
     * */
    const SSO_ACTION_INVALID = 3;
    const SSO_SIGN_INVALID   = 4;

    /**
     * sso_token 表配置
     *
     * */
    const SSO_TOKEN_DEFAULT_DURATION = 86400; //当前时间＋86400

    /**
     * 返回状态码定义
     *
     * */
    // ping
    const PING_SUCCEED        = 0;
    const PING_FAILED         = 1;
    const PING_PARAMS_INVALID = 2;

    // 同步登录
    const SYNC_LOGIN_SUCCEED        = 0;
    const SYNC_LOGIN_FAILED         = 1;
    const SYNC_LOGIN_PARAMS_INVALID = 2;

    // 同步退出
    const SYNC_LOGOUT_SUCCEED        = 0;
    const SYNC_LOGOUT_FAILED         = 1;
    const SYNC_LOGOUT_PARAMS_INVALID = 2;

    // 添加用户
    const USER_ADD_SUCCEED        = 0;
    const USER_ADD_FAILED         = 1;
    const USER_ADD_PARAMS_INVALID = 2;

    // 添加用户组
    const USER_GROUP_ADD_SUCCEED        = 0;
    const USER_GROUP_ADD_FAILED         = 1;
    const USER_GROUP_ADD_PARAMS_INVALID = 2;

    // 修改用户信息
    const USER_EDIT_SUCCEED        = 0;
    const USER_EDIT_FAILED         = 1;
    const USER_EDIT_PARAMS_INVALID = 2;

    // 删除用户组
    const USER_GROUP_DELETE_SUCCEED        = 0;
    const USER_GROUP_DELETE_FAILED         = 1;
    const USER_GROUP_DELETE_PARAMS_INVALID = 2;

    // 删除用户
    const USER_DELETE_SUCCEED        = 0;
    const USER_DELETE_FAILED         = 1;
    const USER_DELETE_PARAMS_INVALID = 2;

    // 获取用户信息
    const USER_INFO_GET_SUCCEED        = 0;
    const USER_INFO_GET_FAILED         = 1;
    const USER_INFO_GET_PARAMS_INVALID = 2;

    // 验证 token
    const TOKEN_VALID                     = 0;
    const TOKEN_INVALID                   = 1;
    const TOKEN_VALIDATION_PARAMS_INVALID = 2;

    /**
     * 返回状态码对应的返回信息
     *
     * */

    public static $SYNC_LOGIN_MESSAGE = [
        self::SYNC_LOGIN_SUCCEED        => '同步登录成功',
        self::SYNC_LOGIN_FAILED         => '同步登录失败',
        self::SYNC_LOGIN_PARAMS_INVALID => '请求参数不合法',
    ];

    public static $SYNC_LOGOUT_MESSAGE = [
        self::SYNC_LOGOUT_SUCCEED        => '同步退出成功',
        self::SYNC_LOGOUT_FAILED         => '同步退出失败',
        self::SYNC_LOGOUT_PARAMS_INVALID => '请求参数不合法',
    ];

    public static $PING_MESSAGE = [
        self::PING_SUCCEED        => '系统连接正常',
        self::PING_FAILED         => '系统无法正常连接',
        self::PING_PARAMS_INVALID => '请求参数不合法',
    ];


    public static $USER_ADD_MESSAGE = [
        self::USER_ADD_SUCCEED        => '添加用户成功',
        self::USER_ADD_FAILED         => '添加用户失败',
        self::USER_ADD_PARAMS_INVALID => '请求参数不合法',
    ];

    public static $USER_GROUP_ADD_MESSAGE = [
        self::USER_GROUP_ADD_SUCCEED        => '添加用户组成功',
        self::USER_GROUP_ADD_FAILED         => '添加用户组失败',
        self::USER_GROUP_ADD_PARAMS_INVALID => '请求参数不合法',
    ];

    public static $USER_GROUP_DELETE_MESSAGE = [
        self::USER_GROUP_DELETE_SUCCEED        => '删除用户组成功',
        self::USER_GROUP_DELETE_FAILED         => '删除用户组失败',
        self::USER_GROUP_DELETE_PARAMS_INVALID => '请求参数不合法',
    ];

    public static $USER_DELETE_MESSAGE = [
        self::USER_DELETE_SUCCEED        => '删除用户成功',
        self::USER_DELETE_FAILED         => '删除用户失败',
        self::USER_DELETE_PARAMS_INVALID => '请求参数不合法',
    ];

    public static $USER_EDIT_MESSAGE = [
        self::USER_EDIT_SUCCEED        => '修改用户信息成功',
        self::USER_EDIT_FAILED         => '修改用户信息失败',
        self::USER_EDIT_PARAMS_INVALID => '请求参数不合法',
    ];

    public static $SSO_ROUTE_MESSAGE = [
        self::SSO_ACTION_INVALID => '非法的请求',
        self::SSO_SIGN_INVALID   => '请求签名错误',
    ];

    public static $TOKEN_VALIDATION_MESSAGE = [
        self::TOKEN_VALID                     => 'token 有效',
        self::TOKEN_INVALID                   => 'token 无效',
        self::TOKEN_VALIDATION_PARAMS_INVALID => '请求参数参数',
    ];

    public static $USER_INFO_GET_MESSAGE = [
        self::USER_INFO_GET_SUCCEED        => '获取用户信息成功',
        self::USER_INFO_GET_FAILED         => '获取用户信息失败',
        self::USER_INFO_GET_PARAMS_INVALID => '请求参数不合法',
    ];


}

