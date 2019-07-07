<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class model_calender2 extends Model
{
    public function index($year='', $month='', $selects='')
    {
        $y = $year;
        $n = $month;
        $dayArray = array_column($selects, 'day');

        // 1日までの空白セルを作成
        $wd1 = date("w", mktime(0, 0, 0, $n, 1, $y));
        for ($i = 1; $i <= $wd1; $i++) {
            echo "<td>　</td>";
        }

        // カレンダー作成
        $j = 1;
        while (checkdate($n, $j, $y))
        {
          $result = array_search($j, $dayArray);

          // 画像がデータベースに登録されている場合
          if ($result !== FALSE) {
            echo "<td id=" . $n . $j . ">
                  <form action=\"calender\" method=\"POST\">
                      <button id=" . $y . $n . $j . " type=\"submit\" name=\"key\" value=" . $n . $j . ">$j</button>
                      <input type=\"hidden\" name=\"year\" value=" . $y . "></input>
                      <input type=\"hidden\" name=\"month\" value=" . $n . "></input>
                      <input type=\"hidden\" name=\"day\" value=" . $j . "></input>
                  </form>
                  <form action=\"calender\" method=\"POST\">
                      <input type=\"hidden\" name=\"year\" value=" . $y . "></input>
                      <input type=\"hidden\" name=\"month\" value=" . $n . "></input>
                      <input type=\"hidden\" name=\"day\" value=" . $j . "></input>
                      <a></a>
                  </form>
                  <img src=\"" . $selects[$result]->file . "\" width=\"130\">
                </td>";
            if (date("w", mktime(0, 0, 0, $n, $j, $y)) == 6) {
                echo "</tr>";
                if (checkdate($n, $j + 1, $y)) {
                    echo "<tr>";
                }
            }

          // 画像がデータベースに登録されていない場合
          } else {
            echo "<td id=" . $n . $j . ">
                  <form action=\"calender\" method=\"POST\">
                      <button id=" . $y . $n . $j . " type=\"submit\" name=\"key\" value=" . $n . $j . ">$j</button>
                      <input type=\"hidden\" name=\"year\" value=" . $y . "></input>
                      <input type=\"hidden\" name=\"month\" value=" . $n . "></input>
                      <input type=\"hidden\" name=\"day\" value=" . $j . "></input>
                  </form>
                  <form id=\"download" . $n . $j . "\" action=\"calender\" method=\"POST\">
                      <input type=\"hidden\" name=\"year\" value=" . $y . "></input>
                      <input type=\"hidden\" name=\"month\" value=" . $n . "></input>
                      <input type=\"hidden\" name=\"day\" value=" . $j . "></input>
                      <a></a>
                  </form>
                </td>";
            if (date("w", mktime(0, 0, 0, $n, $j, $y)) == 6) {
                echo "</tr>";
                if (checkdate($n, $j + 1, $y)) {
                    echo "<tr>";
                }
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

    public function month($year, $adjust)
    {
        $y = $year;
        $n = $adjust;
        echo "<a href=calender?year=" . $year . "&amp;month=" . $adjust . " id=\"now\">" . $y . "年" . $n . "月</a>";
    }

    public function prev($year, $adjust)
    {
        if ($adjust == 0) {
          $y = $year - 1;
          $n = 12;
        } else {
          $y = $year;
          $n = $adjust;
        }
        echo "<a href=calender?year=" . $y . "&amp;month=" . $n . ">" . $n . "月</a>";
    }

    public function next($year, $adjust)
    {
        if ($adjust == 13) {
          $y = $year + 1;
          $n = 1;
        } else {
          $y = $year;
          $n = $adjust;
        }
        echo "<a href=calender?year=" . $y . "&amp;month=" . $n . ">" . $n . "月</a>";
    }
}
