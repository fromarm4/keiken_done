<?php

namespace App;

use Carbon\Carbon;

trait Common
{
    public function formatDate($date)
    {
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $date);

        if ($date <= Carbon::now()->startOfYear()) {
            // 去年以前の投稿は西暦を追加表示する
            return $date->format('Y年n月j日 H:i');
        } elseif ($date <= Carbon::now()->startOfMonth()) {
            // 先月以前は日付表示する
            return $date->format('n月j日 H:i');
        } else {
            return $date->diffForHumans();
        }
    }
}