<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Chat Bootstrap</title>

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

    <div class="container">
        <div class="panel panel-default">

            <div class="panel-body">
                <div class="message">
                    <span class="label label-default">Luan Oliveira</span>
                    <p>dasdasdasd</p>
                    <hr>
                </div>
            </div><!-- .panel-body -->

            <div class="panel-footer">
                <form id="send">
                    <div class="row">
                        <div class="col-xs-8 col-sm-10">
                            <input type="text" class="form-control" placeholder="Digite sua mensagem..." id="message">    
                        </div><!-- .col-* -->

                        <div class="col-xs-4 col-sm-2">
                            <button type="submit" class="btn btn-block btn-primary">Enviar</button>
                        </div><!-- .col-* -->
                    </div><!-- .row -->
                </form><!-- #message -->         
            </div><!-- .panel-footer -->

        </div><!-- .panel -->
    </div><!-- .container -->

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    var conn = new WebSocket('ws://localhost:8080/chat');

    $("#send").on("submit", function(event) {
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