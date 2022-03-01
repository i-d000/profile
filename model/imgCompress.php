<?php

/**
 * サムネイル作成
 * 引数 ファイル名 , 元画像dir, 保存先dir, 画像サイズ
 */
function imgCompress($file_name)
{
    //◎画像サイズを取得 + dir指定
    $img_size = getimagesize('./resource/img/' . $file_name);
    // 圧縮比率 h×w 100:150 + hxw指定
    if ($img_size[1] / 100 > $img_size[0] / 150) {
        $thumb_width = $img_size[0] / ($img_size[1] / 100);
        $thumb_height = $img_size[1] / ($img_size[1] / 100);
    } else {
        $thumb_height = $img_size[1] / ($img_size[0] / 150);
        $thumb_width = $img_size[0] / ($img_size[0] / 150);
    }
    // 拡張子によって圧縮方法変更
    $ext = str_replace('image/', '', $_FILES['img']['type']);
    // var_dump($ext);
    if ($ext === 'jpeg') {
        $ext = 'jpg';
    }
    switch ($ext) {
        case 'jpg':
            $img_in = imagecreatefromjpeg('./resource/img/' . $file_name);
            break;
        case 'png':
            //◎画像ファイルのコピーおよび画像ファイルの縮小拡大(png)
            $img_in = imagecreatefrompng('./resource/img/' . $file_name);
            break;
        case 'gif':
            $img_in = imagecreatefromgif('./resource/img/' . $file_name);
            break;
        default:
            break;
    }
    $img_out = ImageCreateTruecolor(intval($thumb_width), intval($thumb_height));
    // pngのみ透過等がある為設定
    if ($ext === 'png') {
        imagealphablending($img_out, false);
        imagesavealpha($img_out, true);
    }
    ImageCopyResampled($img_out, $img_in, 0, 0, 0, 0, $thumb_width, $thumb_height, $img_size[0], $img_size[1]);
    //画像ファイルの書き出し + dir指定
    switch ($ext) {
        case 'jpg':
            $boolean = Imagejpeg($img_out, './resource/img/thumb_' . $file_name);
            break;
        case 'png':
            $boolean = Imagepng($img_out, './resource/img/thumb_' . $file_name);
            break;
        case 'gif':
            $boolean = Imagegif($img_out, './resource/img/temp/thumb_' . $file_name);
            break;
        default:
            break;
    }
    //◎画像加工を行った後は、メモリを開放すること
    ImageDestroy($img_in);
    ImageDestroy($img_out);
    return $boolean;
}

function tweetImgCompress($file_name)
{
    //◎画像サイズを取得 + dir指定
    $img_size = getimagesize('./resource/img/tweet/' . $file_name);
    // 圧縮比率 h×w 100:150 + hxw指定
    if ($img_size[1] / 100 > $img_size[0] / 150) {
        $thumb_width = $img_size[0] / ($img_size[1] / 100);
        $thumb_height = $img_size[1] / ($img_size[1] / 100);
    } else {
        $thumb_height = $img_size[1] / ($img_size[0] / 150);
        $thumb_width = $img_size[0] / ($img_size[0] / 150);
    }
    // 拡張子によって圧縮方法変更
    $ext = str_replace('image/', '', $_FILES['img']['type']);
    // var_dump($ext);
    if ($ext === 'jpeg') {
        $ext = 'jpg';
    }
    switch ($ext) {
        case 'jpg':
            $img_in = imagecreatefromjpeg('./resource/img/tweet/' . $file_name);
            break;
        case 'png':
            //◎画像ファイルのコピーおよび画像ファイルの縮小拡大(png)
            $img_in = imagecreatefrompng('./resource/img/tweet/' . $file_name);
            break;
        case 'gif':
            $img_in = imagecreatefromgif('./resource/img/tweet/' . $file_name);
            break;
        default:
            break;
    }
    $img_out = ImageCreateTruecolor(intval($thumb_width), intval($thumb_height));
    // pngのみ透過等がある為設定
    if ($ext === 'png') {
        imagealphablending($img_out, false);
        imagesavealpha($img_out, true);
    }
    ImageCopyResampled($img_out, $img_in, 0, 0, 0, 0, $thumb_width, $thumb_height, $img_size[0], $img_size[1]);
    //画像ファイルの書き出し + dir指定
    switch ($ext) {
        case 'jpg':
            $boolean = Imagejpeg($img_out, './resource/img/tweet/thumb_' . $file_name);
            break;
        case 'png':
            $boolean = Imagepng($img_out, './resource/img/tweet/thumb_' . $file_name);
            break;
        case 'gif':
            $boolean = Imagegif($img_out, './resource/img/tweet/temp/thumb_' . $file_name);
            break;
        default:
            break;
    }
    //◎画像加工を行った後は、メモリを開放すること
    ImageDestroy($img_in);
    ImageDestroy($img_out);
    return $boolean;
}
