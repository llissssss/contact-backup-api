<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel PHP Framework</title>
    <script src='//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js' type="text/javascript"></script>
    <script type="text/javascript">
    /*
        $(document).ready(function(){
            $.ajax({
                url: "/contactbackup/public/api/v1/backup",
                data: {email : "llis@llis.com", contrasenya: "llisss"},
                context: document.body
                }).done(function(data) {
                console.log(data);
            });
        });
    */
    
    // CREAR UN USUARI
    $(document).ready(function(){
            $.ajax({
                url: "api/v1/user/new",
                data: {email : "albert@javajan.com", password: "albert", password_confirmation: "albert"},
                type: "POST",
                context: document.body
                }).done(function(data) {
                console.log(data);
            });
        });
    
    /*
        // MODIFICAR USUARI
    $(document).ready(function(){
            $.ajax({
                url: "api/v1/user/save",
                data: {email : "albert@javajan.com", password: "lliset", email_new : "apple@javajan.com", password_new: "lliset", password_new_confirmation: "lliset"},
                type: "POST",
                context: document.body
                }).done(function(data) {
                console.log(data);
            });
        });
*/

    </script>
</head>
<body>
    
</body>
</html>