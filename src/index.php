<html lang="ru">
<head>
    <title>GroupsPage</title>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <link type="text/css" href="./style.css" rel="stylesheet">
</head>
<body>

<div class="search_box">
    <form action="">
        <input type="text" name="search" id="search" placeholder="Введите группу..." autocomplete="off">
        <input type="submit">
    </form>
    <div id="search_box-result"></div>
</div>

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