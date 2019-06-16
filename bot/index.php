<!DOCTYPE html>
<html>
<head>
    <title>bot</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">
    <meta charset="utf-8">

</head>
<body >

    <!-- wrap -->
    <div class="container-fluid" style="background-image: url('bg.jpg'); padding: 30px; padding-top: 0;">

        <!-- header -->
        <div style="background-color: rgba(110,160,239,0.8); height: 60px; ">
           <p class="text-center" style="font-size: 36px; line-height: 1.5;">Онлайн конструктор чат-ботов для вашего мед учреждения</p>
        </div> <!-- end of header -->

        <!-- content -->
        <div style="background-color: rgba(222,236,242,0.9); margin-top: 30px; font-size: 24px; padding: 30px;">
            <div class="col">

            <form id="createbot" target="_blank" enctype="multipart/form-data" method="POST" action="result.php">
                <div class="form-group">
                    <label>Подключение к базе данных</label><br>
                        <small class="text-muted">Этот блок очень важен! Укажите данные для подключения к вашему  mySQL серверу!</small><br><br>
                    <label>Хост(адрес mySQL сервера):<input name="dbhost" class="form-control" type="text" placeholder="localhost"></label><br><br>
                    <label>Название базы данных:<input name="dbname" class="form-control" type="text" placeholder="bot_db"></label><br><br>
                    <label>Имя пользователя для подключения к серверу:<input name="dbuser" class="form-control" type="text" placeholder="root"></label><br><br>
                    <label>Пароль для подключения к серверу:<input name="dbpass" class="form-control" type="text" placeholder="root"></label><br>
                </div>
                <hr>
                <div class="form-group">
                    <label >Название мед учреждения:</label><br>
                        <small class="text-muted">Будет отображаться в нижней части ассистента</small>
                    <input name="companyname" class="form-control" type="text" placeholder="МКДЦ">
                </div>
                <hr>
                <div class="form-group">
                    <label>Приветственное сообщение:</label><br>
                        <small class="text-muted">Будет отображаться вновь подключившемуся пользователю при первом открытии чата</small>
                    <textarea name="hellomsg" class="form-control">Здравствуйте, я Ваш онлайн доктор. Задайте мне интересующие Вас вопросы и я попробую Вам помочь!</textarea>
                </div>
                <hr>
                <div class="form-group">
                    <label>Частые вопросы:</label><br>
                        <small class="text-muted">Добавьте вопросы, которые могут интересовать пользователя и ответы к ним</small>
                    <br>
                <div id="questions-box">
                    <button id="btn-addquestion" class="btn-outline-primary">Добавить</button>
                </div>
                </div>
                <hr>
                <div class="form-group">
                    <label>Врачи:</label><br>
                        <small class="text-muted">Добавьте Врачей</small>
                    <br>
                <div id="doctors-box">
                    <button id="btn-adddoctor" class="btn-outline-primary">Добавить</button>
                </div>
                </div>




                <button type="submin" id="showresult" class="btn-outline-primary" style="background-color: #deecf2; border-radius:5px; margin: 5px;">Посмотреть результат</button>
                <button class="btn-outline-primary" style="background-color: #deecf2; border-radius:5px; margin: 5px;">Собрать бота</button>
            </form>
            </div>
            <hr>
        </div><!-- end of content -->
    </div><!-- end of wrap -->
    <div class="container-fluid" style="height: 50px; background-color: #123a7a;">
        <p class="text-right" style="color: white; padding-top: 15px;">Designed by Webgetables on hackaton 2019</p>
    </div>




    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>

    <!-- script for add and remove questions -->
    <script type="text/javascript">
        
        $(function(){
        var id = '1';
        $("#btn-addquestion").click(function(){
            event.preventDefault();
            $('#questions-box').prepend('<div id="que'+id+'" class="form-row que"><div class="col"><input type="text" class="form-control q" name="que[]" placeholder="Вопрос"></div><div class="col"><input type="text" class="form-control kw" name="ans[]" placeholder="Ответ"></div><div class="col"><button class="delque" id="que'+id+'" class="btn-outline-primary" style="background-color: #e6eef2; border-radius:5px; margin: 5px;">-</button></div></div>');
            id++;
            jQuery.getScript('delque.js');
            });
        });
    </script>

    <!-- script for add and remove doctors -->
    <script type="text/javascript">
        
        $(function(){
        var id = '1';
        $("#btn-adddoctor").click(function(){
            event.preventDefault();
            $('#doctors-box').prepend('<div id="doc'+id+'" class="doc-box"><div class="form-row"><div class="col"><input type="text" class="form-control" name="doc-name[]" placeholder="Имя"></div><div class="col"><input type="text" class="form-control" name="doc-spec[]" placeholder="Специальность"></div><div class="col"><button class="delque" id="doc'+id+'" class="btn-outline-primary">Удалить</button></div></div>');
            id++;
            jQuery.getScript('delque.js');
            });
        });
    </script>


    

    <!-- script for show result button -->
    <script type="text/javascript">
        $(function(){
            $('#showresult').click(function(){
                // $('createbot').attr('method','POST');
                // var questions = new Array();
                // var keywords = new Array();
                // for (var i = 1; i < $('.q').length + 1; i++) {
                //     var q = $('#q'+i).val();
                //     var kw = $('#kw'+i).val();
                //     questions.push(q);
                //     keywords.push(kw);
                // }
                

                //  $.ajax({
                //     type: "POST",
                //     data:{data: questions},
                //     url: "result.php",
                //     success: function(data){
                //        alert(data);
                //     }
                // });

               

            });
        })
        
    </script>
</body>
</html>