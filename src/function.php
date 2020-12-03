<?php
/**
 *  +----------------------------------------------------------------------
 *  | Created by  hahadu (a low phper and coolephp)
 *  +----------------------------------------------------------------------
 *  | Copyright (c) 2020. [hahadu] All rights reserved.
 *  +----------------------------------------------------------------------
 *  | SiteUrl: https://github.com/hahadu/helper-function
 *  +----------------------------------------------------------------------
 *  | Author: hahadu <582167246@qq.com>
 *  +----------------------------------------------------------------------
 *  | Date: 2020/11/10 下午9:20
 *  +----------------------------------------------------------------------
 *  | Description:   Helper-function
 *  +----------------------------------------------------------------------
 **/
use Hahadu\Helper\StringHelper;
use Hahadu\Helper\FilesHelper;
use Hahadu\Helper\ArrayHelper;
use Hahadu\Helper\XMLHelper;
if(!function_exists('password')){
    /****
     * 密码加密和验证
     * @param string $data 要加密或验证的密码字符串
     * @param string $hash 加密后的密码，该参数为空时加密$data,不为空则验证$data
     * @param int $cost //数值越大性能要求越高
     * @return bool|string|null
     */

    function password($data,$hash='',$cost=12){
        return StringHelper::password($data,$hash,$cost);
    }
}
if(!function_exists('wrap_msg_array')){
    /*****
     * 封装消息数组
     * @param int $code 状态码
     * @param string $message 消息提示
     * @param array $data 消息数据
     * @param array $optional 消息其他数据
     * @return array
     */
    function wrap_msg_array($code,$message='',$data=[],$optional=[]){
        return ArrayHelper::wrap_msg_array($code,$message,$data,$optional);
    }
}
if(!function_exists('create_rand_string')){
    /****
     * 生成随机字符串
     * 可用于创建随机密码
     * @param int $length 长度
     * @param string|null $chars 字符串字典
     * @return string
     */
    function create_rand_string($length = 9 ,$chars=NULL){
        return StringHelper::create_rand_string($length ,$chars);
    }
}
if(!function_exists('get_all_pic')){
    /**
     *获取正文所有图片路径
     * @param string $str 正文内容
     * @return array|mixed
     */

    function get_all_pic($str){
        return StringHelper::get_all_pic($str);
    }
}
if(!function_exists('dir_files_list')){
    /**
     * 遍历指定目录及子目录下的文件，返回所有与匹配模式符合的文件名
     *
     * @param string $dir
     * @param string $pattern
     *
     * @return array
     */
    function dir_files_list($dir, $pattern="*")
    {
        return FilesHelper::dir_files_list($dir, $pattern);
    }

}
if(!function_exists('get_one_pic')){
    /**
     *获取正文内其中1张图片路径 默认获取第一张
     * @param string $str 正文内容
     * @param int $num 第几张
     * @return mixed|string
     */
    function get_one_pic($str,$num=0){
        return StringHelper::get_one_pic($str,$num);
    }
}
if(!function_exists('re_substr')){
    /**
     * 字符串截取，支持中文和其他编码
     * @param string $str 需要转换的字符串
     * @param int $start 开始位置
     * @param int $length 截取长度
     * @param bool $suffix 截断显示字符
     * @param string $charset 编码格式
     * @return string
     */
    function re_substr($str, $start=0, $length=15, $suffix=true, $charset="utf-8"){
        return StringHelper::re_substr($str, $start, $length, $suffix, $charset);
    }
}
if(!function_exists('GetSubStr')){
    function GetSubStr($str, $leftStr, $rightStr){
        return StringHelper::GetSubStr($str, $leftStr, $rightStr);
    }
}

if(!function_exists('anonymous')){
    /**
     * 替换字符串中间的字符为指定符号，用于用户匿名处理
     * @param $name
     * @param string $mask
     * @return mixed|string
     */
    function anonymous($name,$mask='*'){
        return StringHelper::anonymous($name,$mask);
    }
}
if(!function_exists('xml_to_obj')){
    /******
     * xml 转数组
     * @param $xmlData
     * @param bool $assoc
     * @return mixed
     */
    function xml_to_obj($xmlData,$assoc=false){
        return XMLHelper::xml_to_obj($xmlData,$assoc);
    }
}
if(!function_exists('xml_to_json')){
    function xml_to_json($xmlData){
        return XMLHelper::xml_to_json($xmlData);
    }
}
if (!function_exists('uuid_create')) {
    function uuid_create()
    {
        if (function_exists('com_create_guid')) {
            return trim(com_create_guid(), '{}');
        } else {
            $guid = rand();
            $uid =uniqid(rand(), true);
            $data = $namespace;
            $data .= $_SERVER['REQUEST_TIME'];
            $data .= $_SERVER['HTTP_USER_AGENT'];
            $data .= $_SERVER['REMOTE_ADDR'];
            $data .= $_SERVER['REMOTE_PORT'];
            $char_id = hash('ripemd128', $uid . $guid . md5($data))
            $char_id = strtolower(md5($char_id)); //根据当前时间（微秒计）生成唯一id.
            $hyphen = chr(45); // "-"
            $uuid = substr($char_id, 0, 8) . $hyphen .
                substr($char_id, 8, 4) . $hyphen .
                substr($char_id, 12, 4) . $hyphen .
                substr($char_id, 16, 4) . $hyphen .
                substr($char_id, 20, 12);
            return $uuid;
        }
    }
}


