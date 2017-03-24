<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>

    <div id="messages">
        
    </div>

    <div>
        <input type="text" id="message">
        <button type="button" id="send">Enviar</button>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript">
    var conn = new WebSocket('ws://localhost:8080/chat');

    $("#send").on("click", function(event) {
        event.preventDefault();
        conn.send(JSON.stringify({ message: $("#message").val() }));
        $("#message").val("");
    });

    conn.onmessage = function(event) {
        var $messages = $('#messages');

        var data = JSON.parse(event.data);
        console.log( data );

        $messages.prepend('<p>'+data.message+'</p>');
        console.log(event);
    }
    </script>
</body>
</html>