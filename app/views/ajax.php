<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel PHP Framework</title>
    <script src='//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js' type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $.ajax({
                url: "/contactbackup/public/api/v1/backup",
                data: {email : "albert@javajan.com"},
                context: document.body
                }).done(function() {
                alert("hello");
            });
        });
    </script>
</head>
<body>
    
</body>
</html>
