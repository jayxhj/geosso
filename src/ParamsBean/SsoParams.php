<?php
/**
 * SSO 请求参数 bean
 *
 */

namespace Sso\ParamsBean;


class SsoParams
{
    private $_action;
    private $_time;
    private $_sign;
    private $_params;

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->_action;
    }

    /**
     * @param mixed $action
     */
    public function setAction($action)
    {
        $this->_action = $action;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->_time;
    }

    /**
     * @param mixed $time
     */
    public function setTime($time)
    {
        $this->_time = $time;
    }

    /**
     * @return mixed
     */
    public function getSign()
    {
        return $this->_sign;
    }

    /**
     * @param mixed $sign
     */
    public function setSign($sign)
    {
        $this->_sign = $sign;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->_params;
    }

    /**
     * @param mixed $params
     */
    public function setParams($params)
    {
        $this->_params = $params;
    }


}

