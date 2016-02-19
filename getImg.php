<?php
    /**
     * 保存远程图片到本地
     * @param $url
     * @param $filename
     * @return bool|string
     */
    public function getImg($url,$filename){
      if($url=='') return false;
      if($filename == ''){
        $ext = strrchr($url,'.');
        if($ext != '.gif' && $ext != ".jpg") return false;
        $filename = time().rand(1,9999).$ext;
      }
      //save file
      ob_start();
      readfile($url);
      $img = ob_get_contents();
      ob_end_clean();
      $size = strlen($img);//备用 文件大小
      $fp = @fopen($filename,"a");
      fwrite($fp,$img);
      fclose($fp);
      return $filename;
    }