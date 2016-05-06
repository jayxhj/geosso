<?php
/**
 * 助手类
 */
if (! function_exists('result')) {
    /**
     * 返回统一格式的结果(Controller)
     * @param array  $data 数据
     * @param int    $code 错误码
     * @param string $message 错误消息
     * @return array
     */
    function result($data, $code = 0, $message = '')
    {
        return [
            'data'    => $data,
            'status'  => $code,
            'message' => $message,
        ];
    }
}

if (! function_exists('service_result')) {
    /**
     * 返回统一格式的结果(Service)
     * @param array $data 数据
     * @param int   $code 错误码
     * @return array
     */
    function service_result($data, $code = 0)
    {
        return [
            'data' => $data,
            'code' => $code,
        ];
    }
}

if (! function_exists('config_path')) {
    /**
     * Get the configuration path.
     *
     * @param  string $path
     * @return string
     */
    function config_path($path = '')
    {
        return app()->make('path.config').($path ? DIRECTORY_SEPARATOR.$path : $path);
    }
}
