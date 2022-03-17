<?php
$re = "[А-Я]{4}-\d{2}-\d{2}";
echo '"'.$_POST['group_name'].'"';
if(isset($_POST['group_name']) && strlen($_POST['group_name'])==14){
    $gr_name = $_POST['group_name'];
    try {
        $db = new SQLite3('./groupPageDb.db', SQLITE3_OPEN_READONLY);
        $sql = "SELECT * FROM subject_info WHERE group_name LIKE '%$gr_name%'";
        $result = $db->query($sql);

        $table_body = "";

        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $table_body .= "<tr>";
            foreach ($row as $item) {
                if(gettype($item)=="string" && stripos($item, "https") === 0){
                    $table_body .= "<td><a href='$item'>$item</a></td>";
                }
                else {
                    $table_body .= "<td>$item</td>";
                }
            }
            $table_body .= "</tr>";
        }
        echo $table_body;
        $db->close();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}