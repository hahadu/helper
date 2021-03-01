<?php


namespace Hahadu\Helper;
use SplFileObject;
use Hahadu\Helper\FilesHelper;

/****
 * 处理文件上传
 * Class UploadHelper
 * @package Hahadu\Helper
 */
class UploadHelper
{
    /****
     * @var string 上传文件的表单名
     */
    protected static $upFiles = 'files';
    protected static $directory = './';
    /****
     * @var SplFileObject
     */
    protected static $files;

    /*****
     * UploadHelper constructor.
     * @param string $Files
     */
    public function __construct($Files = ''){
        if(null != $Files) static::$upFiles = $Files;
        $files = $_FILES[static::$upFiles];
        if (!is_dir($directory)) {
            FilesHelper::mkdir($directory);
        } elseif (!is_writable($directory)) {
            @chmod(static::$directory, 0777 & ~umask());
        }

        $uploadFile = static::$directory.basename($files['name']);
        move_uploaded_file($files['tmp_name'], $uploadFile);
        static::$files = new SplFileObject($uploadFile);
    }

    /****
     * 文件上传
     * @param string $Files
     * @return string
     */
    public static function uploader($Files = ''){
        new static($Files);
        return static::$files->getPathname();
    }

    public static function make($filename=''){
        if(null != $filename){
            return new SplFileObject($filename);
        }elseif(static::$files instanceof SplFileObject){
            return static::$files;
        }else{
            return null;
        }
    }

}