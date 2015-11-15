<?php
/**
 * 返回文件大小，根据不同大小呈现不同的单位
 */
function human_filesize($bytes, $decimals = 2)
{
    $size = ['B', 'kB', 'MB', 'GB', 'TB', 'PB'];
    $factor = floor((strlen($bytes) - 1) / 3);

    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) .
    @$size[$factor];
}

/**
 * 判断是否是图片类型
 */
function is_image($mimeType)
{
    return starts_with($mimeType, 'image/');
}
/**
 * return checked if true
 * @param  [type] $value [description]
 * @return [type]        [description]
 */
function checked($value)
{
    return $value ? 'checked' : '';
}