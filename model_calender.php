<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class model_calender extends Model
{
    public function index()
    {
        $timestamp = time();
        $y = date( "Y" , $timestamp );
        $n = date( "n" , $timestamp );

        // 1日までの空白セルを作成
        $wd1 = date("w", mktime(0, 0, 0, $n, 1, $y));
        for ($i = 1; $i <= $wd1; $i++) {
            echo "<td>　</td>";
        }

        // カレンダー作成
        $j = 1;
        while (checkdate($n, $j, $y))
        {
            // echo __FILE__;
            echo "<td id=$j><form method=\"POST\"><button type=\"submit\" value=$j>$j</form></button></td>";
            if (date("w", mktime(0, 0, 0, $n, $j, $y)) == 6) {
                echo "</tr>";
                if (checkdate($n, $j + 1, $y)) {
                    echo "<tr>";
                }
            }
            $j++;
        }

        // 最終日以降の空白セルを作成
        $wdx = date("w", mktime(0, 0, 0, $n + 1, 0, $y));
        for ($i = 1; $i < 7 - $wdx; $i++) {
          echo "<td>　</td>";
        }
    }
}
