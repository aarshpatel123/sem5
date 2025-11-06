<!DOCTYPE html>
<html>
<head>
    <title>AJAX Product Search</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h2>Search Product</h2>
    <input type="text" id="search" placeholder="Enter product name...">
    <div id="result"></div>

    <script>
        $(document).ready(function(){
            $("#search").on("keyup", function(){
                var query = $(this).val();
                if(query != ""){
                    $.ajax({
                        url: "search.php",
                        method: "POST",
                        data: {query: query},
                        success: function(data){
                            $("#result").html(data);
                        }
                    });
                } else {
                    $("#result").html("");
                }
            });
        });
    </script>
</body>
</html>
