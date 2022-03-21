<?php

function check_group_name($name): bool
{
    if (strlen($name)>14) return False;
    if (strspn($name, "АБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ-01234567890") != strlen($name)) return False;
    return True;
}

if(isset($_POST['group_name']) && check_group_name($_POST['group_name'])){
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
                    $item = "<a href='$item'><img width=50 src='/assets/img/link.png' border=0 title='Перейти в дисциплину'></a>";
                    $table_body .= "<th>$item</th>";
                }
                else {
                  if(gettype($item)=="string" && stripos($item, "Смешанное") === 0){
                    $item = mb_substr($item, mb_strpos($item, 'Смешанное обучение / ') + mb_strlen('Смешанное обучение / '));
                    $table_body .= "<th>$item</th>";
                  }
                  else {
                      $table_body .= "<th>$item</th>";
                  }
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
