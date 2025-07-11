<?php
function sort_2way(array $array, bool $order): /*bool*/void
{
    // ソート方向に応じてソート
    if ($order) {
        sort($array); // 昇順ソート
        echo "昇順にソートします。<br>";
    } else {
        rsort($array); // 降順ソート
        echo "降順にソートします。<br>";
    } 

    // ソート結果の表示
    foreach ($array as $value) {
        echo htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8') . '<br>';
    }
}

// 使用例
$sampleArray = [4, 10, 15, 18, 23];
sort_2way($sampleArray, true);  // 昇順ソート
sort_2way($sampleArray, false); // 降順ソート
?>
