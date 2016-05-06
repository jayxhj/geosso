<?php
/**
 * 请求参数约束
 *
 */

namespace Sso\Http\Requests;


interface RequestBeanInterface {
    public function toParamsBean();
}
