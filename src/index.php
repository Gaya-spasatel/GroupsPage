<html lang="ru">
<head>
    <title>GroupsPage</title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <link type="text/css" href="./style.css" rel="stylesheet">
</head>
<body>
<select id="groups_list" name="group_name">
    <?php
    try {
        $db = new SQLite3('./groupPageDb.db', SQLITE3_OPEN_READONLY);
        $sql = "SELECT * FROM groups";
            $result = $db->query($sql);
            while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                if ($row['is_present'] === 1) {
                    ?>
                    <option value="<?php echo $row["name"] ?>">
                        <?php echo $row["name"] ?>
                    </option>
                    <?php
                }
            }
    } catch (Exception $e) {
        echo $e->getMessage();
    } ?>
</select>
<button type="submit" value="Search group" id="get_info">Search</button>
<table class="groups_table">
    <thead>
    <tr>
        <th>Группа</th>
        <th>Семестр</th>
        <th>Предмет</th>
        <th>Ссылка</th>
        <th>Ведущее подразделение</th>
    </tr>
    </thead>
    <tbody id="groups_data">
    </tbody>
</table>
</body>
</html>