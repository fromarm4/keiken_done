<?php

if (! function_exists('cutString')) {
    /**
     * 指定された数で文章をカットして...を付与
     * 全角=2, 半角=1で計算
     * @param string $sentence
     * @param integer $num
     * @return string
     */
    function cutString($sentence, $num)
    {
        $num = $num + 3;
        return mb_strimwidth($sentence, 0, $num, "...", "UTF-8");
    }
}
