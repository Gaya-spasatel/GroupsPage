<?php
function check_group_name($name): bool
{
    if (strlen($name)>14) return False;
    if (strspn($name, "АБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯ-01234567890") != strlen($name)) return False;
    return True;
}


if (isset($_POST['group_name']) && check_group_name($_POST['group_name'])) {
    try {
        $name = $_POST['group_name'];
        $db = new SQLite3('./groupPageDb.db', SQLITE3_OPEN_READONLY);
        $sql = "SELECT * FROM groups WHERE name LIKE '$name%' LIMIT 10";
        $result = $db->query($sql);
        ?>
        <div class="search_result">
        <table>
            <?php
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {

            if ($row['is_present'] === 1) {
                ?>
                <tr>
                <td class="search_result-name">
                <a href="#"><?php echo $row['name']; ?></a>
                </td>
                </tr>
                <?php
            }
        }
        ?>
        </table></div>
            <?php
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
