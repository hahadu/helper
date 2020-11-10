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


