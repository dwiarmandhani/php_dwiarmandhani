<?php

$jml = $_GET['jml'];
echo "<table border=1>\n";
for ($a = $jml; $a > 0; $a--) {
    $total = 0;
    // Hitung total untuk baris ini
    for ($b = $a; $b > 0; $b--) {
        $total += $b;
    }
    // Tampilkan total di atas baris
    echo "<tr><td colspan=\"$jml\">TOTAL : $total</td></tr>\n";

    // Tampilkan baris
    echo "<tr>\n";
    for ($b = $a; $b > 0; $b--) {
        echo "<td>$b</td>";
    }
    echo "</tr>\n";
}
echo "</table>";
