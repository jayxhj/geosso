<?php
/**
 * SSO 请求参数处理
 *
 */

namespace Sso\Http\Requests;

use Illuminate\Http\Request;
use Sso\ParamsBean\SsoParams;


class SsoRequest implements RequestBeanInterface
{
    /**
     * @var  \Sso\ParamsBean\SsoParams 返回的 bean
     *
     * */
    private $_paramsBean;

    /**
     * @var array 请求参数
     * */
    private $_requestParams;

    /**
     * @var array 原始请求参数 key
     *
     * */
    private $_requestKeys = [
        'action',
        'time',
        'params',
        'sign',
    ];


    public function __construct(SsoParams $params, Request $request)
    {
        $this->_paramsBean    = $params;
        $this->_requestParams = $this->_filterRequest($request);

    }

    /**
     * 处理请求参数，并返回 paramsBean
     * @return \Sso\ParamsBean\SsoParams
     *
     * */
    public function toParamsBean()
    {
        $this->_paramsBean->setAction(array_get($this->_requestParams, 'action'));
        $this->_paramsBean->setParams(array_get($this->_requestParams, 'params'));
        $this->_paramsBean->setTime(array_get($this->_requestParams, 'time'));
        $this->_paramsBean->setSign(array_get($this->_requestParams, 'sign'));

        return $this->_paramsBean;
    }


    /**
     * 过滤请求参数
     * @param  \Illuminate\Http\Request $request
     * @return array
     *
     * */
    private function _filterRequest(Request $request)
    {
        $ret = array();
        foreach ($this->_requestKeys as $requestKey) {
            $ret[$requestKey] = $request->get($requestKey);
        }
        if (array_has($ret, 'params')) {
            $ret['params'] = json_decode($ret['params'], true);
        }

        return $ret;
    }

}

