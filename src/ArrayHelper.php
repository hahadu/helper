<?php
/**
 *  +----------------------------------------------------------------------
 *  | Created by  hahadu (a low phper and coolephp)
 *  +----------------------------------------------------------------------
 *  | Copyright (c) 2020. [hahadu] All rights reserved.
 *  +----------------------------------------------------------------------
 *  | SiteUrl: https://github.com/hahadu
 *  +----------------------------------------------------------------------
 *  | Author: hahadu <582167246@qq.com>
 *  +----------------------------------------------------------------------
 *  | Date: 2020/10/1 下午4:54
 *  +----------------------------------------------------------------------
 *  | Description:   数组操作类
 *  +----------------------------------------------------------------------
 **/

namespace Hahadu\Helper;


class ArrayHelper
{
    /*多维数组排序

    $multi_array:多维数组名称
    $sort_key:二维数组的键名
    $sort:排序方式	SORT_ASC || SORT_DESC
    */

    /****
     * 多维数组排序
     * @param array $multi_array 多维数组
     * @param string $sort_key  二维数组的键名
     * @param int $sort 排序方式 SORT_ASC || SORT_DESC
     * @return array|false
     */
    static public function multi_array_sort(&$multi_array,$sort_key,$sort=SORT_DESC){
        if(is_array($multi_array)){
            foreach ($multi_array as $row_array){
                if(is_array($row_array)){
                    //把要排序的字段放入一个数组中，
                    $key_array[] = $row_array[$sort_key];
                }else{
                    return false;
                }
            }
        }else{
            return false;
        }
        //对多个数组或多维数组进行排序
        array_multisort($key_array,$sort,$multi_array);
        return $multi_array;
    }

    /*****
     * 封装消息数组
     * @param int $code 状态码
     * @param string $message 消息提示
     * @param array $data 消息数据
     * @param array $optional 消息其他数据 [$key=>$value]
     * @return array
     */
    static public function wrap_msg_array($code,$message='',$data=[],array $optional=[]){
        $array = [
            'code' => $code,
            'message' => $message,
            'data' => $data,
        ];
        if(!empty($optional) && is_array($optional)){
            return array_merge($array,$optional);
        }
        return $array;
    }

    /****
     * 获取数组下标
     * @param array $arrk
     */
    static public function arrk($arrk){
        foreach( array_keys($arrk) as $k1 ) {
            foreach( array_keys($arrk[$k1]) as $k2 ) {
                $k1;
                $k2;
            }
        }
    }

    /*****
     * 列出数组中的重复元素
     * @param $array
     * @return array
     */
    static public function array_repeat_list($array) {
        // 获取去掉重复数据的数组
        $unique_arr = array_unique ( $array );
        // 获取重复数据的数组
        $repeat_arr = array_diff_assoc ( $array, $unique_arr );
        return $repeat_arr;
    }

    /******
     * 根据二维数组中的部分子键值列出多维数组中的重复元素
     * @param array $arr 查询的目标数组
     * @param array $keys 要进行判断的键名组合的数组
     * @return array 重复的值
     */
    static function check_array_repeat($arr,$keys)
    {
        $unique_arr = [];
        $repeat_arr = [];
        foreach ($arr as $k => $v) {
            $str = "";
            foreach ($keys as $a => $b) {
                $str .= "{$v[$b]},";
            }
            if (!in_array($str, $unique_arr)) {
                $unique_arr[] = $str;
            } else {
                $repeat_arr[] = $v;
            }
        }
        return $repeat_arr;
    }


    /**
     * 不区分大小写的in_array()
     * @param  string $str   检测的字符
     * @param  array  $array 数组
     * @return boolear       是否in_array
     */
    static public function in_iarray($str,$array){
        $str=strtolower($str);
        $array=array_map('strtolower', $array);
        if (in_array($str, $array)) {
            return true;
        }
        return false;
    }

    /******
     * 数组模糊查询
     * @param string $search 查询字符串
     * @param array $array 查询对象
     * @return array 查询结果
     */
    static public function array_fuzzy_search($search, $array){
        $list = [];
        foreach ($array as $key => $value) {
            if (strstr($value, $search) !== false) {
                array_push($list, $value);
            }
        }
        return $list;
    }



}