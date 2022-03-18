$(document).ready(function() {
    let $result = $('#search_box-result');
    $('#search').on('keyup', function(){
        let search = $(this).val();
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

    $(document).on('click', function(e){
        if (!$(e.target).closest('.search_box').length){
            $result.html('');
            $result.fadeOut(100);
        }
    });

});