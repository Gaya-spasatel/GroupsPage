$(document).ready(function() {
    let $result = $('#search_box-result');
    let $table = $('#groups_data');
    $('#search').on('keyup', function(){
        let search = $(this).val().toUpperCase();
        if ((search !== '') && (search.length > 0)){
            $.ajax({
                type: "POST",
                url: "search_group.php",
                data: {'group_name': search},
                success: function(msg){
                    $result.html(msg);
                    if(msg !== ''){
                        $result.fadeIn();
                    } else {
                        $result.fadeOut(100);
                    }
                }
            });
        } else {
            $result.html('');
            $result.fadeOut(100);
        }
    });

    $('#search').on('focus', function(){
        let search = $(this).val().toUpperCase();
        if ((search !== '') && (search.length > 0)){
            $.ajax({
                type: "POST",
                url: "search_group.php",
                data: {'group_name': search},
                success: function(msg){
                    $result.html(msg);
                    if(msg !== ''){
                        $result.fadeIn();
                    } else {
                        $result.fadeOut(100);
                    }
                }
            });
        } else {
            $result.html('');
            $result.fadeOut(100);
        }
    });

    $(document).on('click', function(e){
        if (!$(e.target).closest('.search_box').length){
            $result.html('');
            $result.fadeOut(100);
        }
    });

    $(document).on('click', '.search_result-name a', function(){
        $('#search').val($(this).text());
        $result.fadeOut(100);
        return false;
    });

    $(document).on('click', '#submit_btn', function () {
        let search = $('#search').val().toUpperCase();
        if ((search !== '') && (search.length > 0)){
            $.ajax({
                type: "POST",
                url: "table_generation.php",
                data: {'group_name': search},
                success: function(msg){
                    $table.html(msg);
                    $result.fadeOut(50);
                    if(msg !== ''){
                        $table.fadeIn();
                    } else {
                        $table.fadeOut(100);
                    }
                }
            });
        } else {
            $result.html('');
            $result.fadeOut(100);
        }

    });

});