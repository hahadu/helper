<?php
/**
 *  +----------------------------------------------------------------------
 *  | Created by  hahadu (a low phper and coolephp)
 *  +----------------------------------------------------------------------
 *  | Copyright (c) 2020. [hahadu] All rights reserved.
 *  +----------------------------------------------------------------------
 *  | SiteUrl: https://github.com/hahadu/wechat
 *  +----------------------------------------------------------------------
 *  | Author: hahadu <582167246@qq.com>
 *  +----------------------------------------------------------------------
 *  | Date: 2020/10/23 下午3:27
 *  +----------------------------------------------------------------------
 *  | Description:   微信公众平台SDK
 *  +----------------------------------------------------------------------
 **/

namespace Hahadu\Helper;


use http\Client;
use http\Client\Request;
use http\Message\Body;

class HttpHelper
{
    protected static $client;
    protected static $request;
    protected static $body;
    public function __construct(){
        self::$client = new Client();
        self::$request = new Request();
        self::$body = new Body();
    }
    static protected function init(){
        new self();
    }

    /****
     * 发送post请求
     * @param $url
     * @param $body
     * @param array $header
     * @return Body
     */
    static public function post($url, $body, array $header = []): Body
    {

        if(is_array($body)){
            $body = json_encode($body);
        }
        return self::request('post',$url,$body,$header)->getBody();
    }

    /****
     * 发送get请求
     * @param $url
     * @param string $body
     * @param array $header
     * @return Body
     */
    static public function get($url,$body='',$header=[]){
        if(is_array($body)){
            $body = json_encode($body);
        }
        return self::request('get',$url,$body,$header)->getBody();
    }
    /****
     * 发送http请求，
     * return self::request(...)->getBody()
     * @param string $method 请求方式
     * @param string $url 请求地址
     * @param string $body 请求内容
     * @param array|null $headers header
     * @return Client\Response|NULL
     */
    static public function request($method,$url,$body='',$headers=[]){
        self::init();
        self::$request->setRequestMethod(strtoupper($method));
        self::$request->setRequestUrl($url);
        if(null!=$body){
            self::$body->append($body);
            self::$request->setBody(self::$body);
        }
        if(!empty($headers)){
            self::$request->setHeaders($headers);
        }
        self::$client->enqueue(self::$request)->send();
        return  self::$client->getResponse();
    }


}