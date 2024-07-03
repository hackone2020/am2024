<?php

class cache
{
    public $cacheRoot = "cache/";
    public $cacheLimitTime = 10;
    public $cacheFileName = "";
    public $cacheFileExt = "html";
    public function cache($cacheLimitTime)
    {
        if (intval($cacheLimitTime)) {
            $this->cacheLimitTime = $cacheLimitTime;
        }
        $this->cacheFileName = $this->getCacheFileName();
        ob_start();
    }
    public function cacheCheck($staticFileName = "")
    {
        if ($staticFileName) {
            $this->cacheFileName = $staticFileName;
        }
        if (file_exists($this->cacheFileName)) {
            $cTime = $this->getFileCreateTime($this->cacheFileName);
            if (time() < $cTime + $this->cacheLimitTime) {
                echo file_get_contents($this->cacheFileName);
                return true;
            }
        }
        return false;
    }
    public function caching($staticFileName = "")
    {
        if ($this->cacheFileName) {
            $cacheContent = ob_get_contents();
            ob_end_flush();
            if ($staticFileName) {
                $this->saveFile($staticFileName, $cacheContent);
            }
            if ($this->cacheLimitTime) {
                $this->saveFile($this->cacheFileName, $cacheContent);
            }
        }
    }
    public function clearCache($fileName = "all")
    {
        if ($fileName != "all") {
            $fileName = $this->cacheRoot . strtoupper(md5($fileName)) . "." . $this->cacheFileExt;
            if (file_exists($fileName)) {
                return unlink($fileName);
            } else {
                return false;
            }
        }
        if (is_dir($this->cacheRoot)) {
            if ($dir = @opendir($this->cacheRoot)) {
                while ($file = @readdir($dir)) {
                    $check = is_dir($file);
                    if (!$check) {
                        @unlink($this->cacheRoot . $file);
                    }
                }
                @closedir($dir);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function getCacheFileName()
    {
        return $this->cacheRoot . strtoupper(md5($_SERVER['REQUEST_URI'])) . "." . $this->cacheFileExt;
    }
    public function getFileCreateTime($fileName)
    {
        if (!trim($fileName)) {
            return 0;
        }
        if (file_exists($fileName)) {
            return intval(filemtime($fileName));
        } else {
            return 0;
        }
    }
    public function saveFile($fileName, $text)
    {
        if (!$fileName || !$text) {
            return false;
        }
        if ($this->makeDir(dirname($fileName)) && ($fp = fopen($fileName, "w"))) {
            if (@fwrite($fp, $text)) {
                fclose($fp);
                return true;
            } else {
                fclose($fp);
                return false;
            }
        }
        return false;
    }

    public function makeDir($dir)
    {
        if (!$dir) {
            return 0;
        }
        $dir = str_replace("\\", "/", $dir);
        $mdir = "";
        foreach (explode("/", $dir) as $val) {
            $mdir .= $val . "/";
            if ($val == ".." || $val == "." || trim($val) == "") {
                continue;
            }
            if (!file_exists($mdir)) {
                $oldumask = umask(0);
                if (!mkdir($mdir)) {
                    return false;
                }
            }
        }
        return true;
    }
}