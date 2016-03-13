<?php 

/**
* 输出一张PNG图像
*/
function LoadPNG($imgname)
{
    /* Attempt to open */
    $im = @imagecreatefrompng($imgname);

    /* See if it failed */
    if(!$im)
    {
        /* Create a blank image */
        $im  = imagecreatetruecolor(150, 30);
        $bgc = imagecolorallocate($im, 255, 255, 255);
        $tc  = imagecolorallocate($im, 0, 0, 0);

        imagefilledrectangle($im, 0, 0, 150, 30, $bgc);

        /* Output an error message */
        imagestring($im, 1, 5, 5, 'Error loading ' . $imgname, $tc);
    }

    return $im;
}



/**
* 为传入的图像添加文字
*/
function ImgAddText($im, $font, $content, $x, $y, $z, $size, $rgb)
{
    $color = imagecolorallocate($im, $rgb['0'], $rgb['1'], $rgb['2']);
    imagettftext($im, $size, $z, $x, $y, $color, $font, $content);

    return $im;
}

/**
* 组合文字，添加字间距
*/
function Id2String($name, $id, $strArray, $space = true)
{
    $str = $name . $strArray[$id];
    $content = "";
    $letter = array();

    for ($i = 0; $i < mb_strlen($str); $i++) 
    {
        $letter[] = mb_substr($str, $i, 1);
    }

    if($space)
    {
        foreach ($letter as $l) 
        {
            $content = $content . "  " . $l;
        }
    }
    else
    {
        foreach ($letter as $l) 
        {
            $content = $content .  $l;
        }
    }

    return $content;
}