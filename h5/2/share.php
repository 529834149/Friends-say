<?php
/**
* 表白神器程序
* 作者：麦索
* qq：422190160
*/

// 载入表白神器公共函数
require('../../function/global.php');

$name = $_GET['name'];
$id = $_GET['id'];



/*配置部分开始*/

// 背景图片路径 在本程序同级目录下pic目录中存放
$bgImg = './pic/bg.png';

// 字体文件 在本程序同级目录下font存放
$font = './font/12.TTF';

// 后缀语句数组，按照前端页面顺序排列，0代表第一个，可支持更多
$strArray = array('我爱你LOVE', '来娶我LOVE', '嫁给我LOVE', '交个朋友可以吗', '元和建国喝点');

// 坐标，从图片左上角算起，X为横坐标，Y为纵坐标，Z为角度，SIZE为字体大小，目前仅支持横向排列
$x = 230;
$y = 180;
$z = 23;
$size = 20;

// 文字颜色
$rgb = array(236, 156, 59);


/*配置部分结束*/

$content = Id2String($name, $id, $strArray, false);

$im = LoadPNG($bgImg);

$img = ImgAddText($im, $font, $content, $x, $y, $z, $size, $rgb);

header('Content-Type: image/png');
imagepng($img);
imagedestroy($img);
