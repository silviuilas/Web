<?php
require_once ('../configure/config.php');

$db = Database::getDatabaseObj();
$db->connect();
$result = $db->query("SELECT * FROM `td_deals` left join `items` on id_item = items.id ORDER BY `created_at` limit 100");

header("Content-Type: text/xml;charset=iso-8859-1");

echo "<?xml version='1.0' encoding='UTF-8' ?>" . PHP_EOL;
echo "<rss version='2.0'>".PHP_EOL;
echo "<channel>".PHP_EOL;
echo "<title>Compit RSS Feed</title>".PHP_EOL;
echo "<link>"._SITE_URL."</link>".PHP_EOL;
echo "<description>Here you can find our RSS</description>".PHP_EOL;
echo "<language>en-us</language>".PHP_EOL;

while(($row = mysqli_fetch_row($result))!=NULL) {
    echo "<item xmlns:dc='ns:1'>".PHP_EOL;
    echo "<title>".$row[6]."</title>".PHP_EOL;
    echo "<link>"._SITE_URL."/PHP/pageGenerator.php?name=".$row[6]."</link>".PHP_EOL;
    echo "<guid>".md5($row[0])."</guid>".PHP_EOL;
    echo "<description>Min Price ".substr($row[7], 0, 300) ." RON</description>".PHP_EOL;
    echo "<enclosure url='".$row[8]."' />".PHP_EOL;
    echo "<category>PHP tutorial</category>".PHP_EOL;
    echo "</item>".PHP_EOL;
}

echo '</channel>'.PHP_EOL;
echo '</rss>'.PHP_EOL;
