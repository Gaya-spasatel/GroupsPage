$(document).ready(function () {
    $("#get_info").click(function () {
        let group = document.getElementById('groups_list').value;
        $.ajax({
            type:"POST",
            url: "table_generation.php",
            data:{
                group_name: group
            },
            success: function (response){
                $("#groups_data").html(response);
            }
        })
    });
});