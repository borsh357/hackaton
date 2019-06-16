<!DOCTYPE html>
<html>
<head>
	<title>Просмотр результата - Конструтор чат-ботов</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">
    <meta charset="utf-8">
</head>
<body>

	<div class="container-fluid" style="background-image: url('bg.jpg'); padding: 30px; padding-top: 0;">
	<?php include 'database.php'?>


<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);?>

	<div style="padding: 30px; padding-bottom: 10px; width: 850px; background-color: rgba(214,227,249,0.8); border-radius: 15px;">
	<p>1.Создайте в корневой дирректории вашего сайта каталок с именем <span style="color: #af7860;">webgetables-chatbot</span></p>
	<P>2.Загрузмте файлы и поместите их в папку:</P>
	<a href="webgetables-chatbot/bot-config.txt">Файл конфигурации</a><br>
	<a href="webgetables-chatbot/db.sql">База данных</a><br><br>
	Вставьте этот код перед закрытием тега body:<br><br>
	
	<p style="width: 600px; height: 500px; background-color: #d2efd3; overflow-y: scroll; overflow-x: hidden; padding: 10px; border: 1px solid; border-radius: 5px;">&lt;?php $configfilename = './webgetables-chatbot/bot-config.txt'; $configtext = file_get_contents($configfilename); $params = unserialize($configtext);$host = $params['dbhost'];$dbname = $params['dbname'];$user = $params['dbuser'];$pass = $params['dbpass'];$link = mysqli_connect($params['dbhost'],$params['dbuser'],$params['dbpass'],$params['dbname']);if (!$link) {$sql = file_get_contents('db.sql');$dbh = new PDO("mysql:host=".$params['dbhost']."", $params['dbuser'], $params['dbpass']);$dbh-&gt;exec("CREATE DATABASE `".$params['dbname']."`");$dbh = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $pass);$dbh-&gt;exec($sql);}mysqli_close($link);$link = mysqli_connect($params['dbhost'],$params['dbuser'],$params['dbpass'],$params['dbname']);if (mysqli_num_rows(mysqli_query($link, 'SELECT * FROM `botparams`')) == 0){$companyname = $params['companyname'];$hellomsg = $params['hellomsg'];mysqli_query($link, 'INSERT INTO `botparams` VALUES ("'.$companyname.'","'.$hellomsg.'")');}if (mysqli_num_rows(mysqli_query($link, 'SELECT * FROM `doctors`')) == 0){$docnamearr = $params['docname'];$docspecarr = $params['docspec'];for ($i=0; $i &lt; sizeof($docnamearr); $i++) {);}}if (mysqli_num_rows(mysqli_query($link, 'SELECT * FROM `questions`')) == 0){$questionsarr = $params['questions'];$answersarr = $params['answers'];for ($i=0; $i &lt; sizeof($questionsarr); $i++) { '")');}}mysqli_close($link);?&gt;
&lt;script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"&gt;&lt;/script&gt;
&lt;script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"&gt;&lt;/script&gt;
&lt;script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"&gt;&lt;/script&gt;
&lt;script type="text/javascript"&gt;$(function(){$('head').append('&lt;link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"&gt;&lt;style type="text/css"&gt;html {font-family: "Merriweather", serif;}body {line-height: 1;font-family: "Merriweather", serif;}small {font-size: 16px;}label {margin-bottom: 0;}input, textarea {margin-top: 5px;}button {padding: 5px;}#bot-wrap {height: 400px;width: 350px;border: 2px solid;border-radius: 5px;bottom: 0px;background: #92b2a4;transition: all 1s;right: -350px;transform: translateX(-350px);}#bot-wrap2 {height: 400px;width: 350px;border: 2px solid;border-radius: 5px;bottom: 0px;background: #92b2a4;transition: all 1s;right: 350px;display: none;}#bot-close  {height: auto;width: auto;font-size: 32px;line-height: 1.5;padding: 0;border: 2px solid;border-radius: 5px;bottom: 0px;right: 0px;background: #92b2a4;transition: all 1s;transform: translateX(-350px);}#arrow {transition: all 1s;}#questions-box, #doctors-box {background-color: #e6eef2;border: 1px solid;border-radius:5px;margin-top: 5px;padding: 5px;}.doc-box {background-color: #e6eef2;border: 1px solid;border-radius: 5px;margin: 5px;}.que{padding: 5px;}#btn-adddoctor, #btn-addquestion, .delque {background-color: #deecf2;border-radius: 5px;margin: 5px;}.form-row {margin: 10px;}#companyname {margin:15px;margin-top: 25px;padding:0;bottom: 0;font-size: 12px;}#bot-msgbox, #bot-msgbox2 {background-color: #eaeaea;height: 70%;width: 90%;border: 1px solid;border-radius: 5px;overflow-y: scroll;padding: 5px;margin-top: 10px;}#bot-msgbox2 {height: 80%}.botmsg {border-radius: 10px;background:#dae2c7;padding:5px;width:80%;float:left;font-size: 12px;}#hellomsg {margin-top: 40px;}#sendmsg {background-color: #92b2a4;margin-top: 5px;border-radius: 5px;outline: none;height: 100%;}.msgsent {border-radius: 10px;background:#d5e0f2;padding:5px;width:80%;float:right;font-size: 12px;}.doc-zapis {border-radius: 5px;background:#d5e0f2;margin: 5px;}#btn-quickquestions {position: fixed;}.dropdown-item {font-size: 12px;word-wrap: break-word;white-space: normal !important;}#div-quickquestions{width: 300px;}#msginput{background-color: #eaeaea; height: 100%; width: 100%; border: 1px solid; border-radius: 5px; resize: none;}&lt;/style&gt;');})&lt;/script&gt;
&lt;script type="text/javascript"&gt;$('body').append('&lt;div id="bot-close" class="position-fixed"&gt;&lt;div id="arrow"&gt;&gt;&lt;/div&gt;&lt;/div&gt;&lt;div id="bot-wrap" class="position-fixed"&gt;&lt;div id="bot-msgbox" class="container"&gt;&lt;div id="btn-quickquestions" class="btn-group"&gt;&lt;button id="btn-quickquestions" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"&gt;Частые вопросы&lt;/button&gt;&lt;div id="div-quickquestions" class="dropdown-menu"&gt;&lt;/div&gt;&lt;/div&gt;&lt;p id="hellomsg" class="text-left botmsg"&gt;&lt;/p&gt;&lt;/div&gt;&lt;div class="row container"&gt;&lt;div class="col-9" style="padding-right: 0;"&gt;&lt;textarea id="msginput" style=""&gt;&lt;/textarea&gt;&lt;/div&gt;&lt;div class="col-3" style="padding-left: 0;"&gt;&lt;button id="sendmsg" class="btn-outline-primary"&gt;&lt;span style="font-size: 14px;"&gt;Отправить&lt;/span&gt;&lt;/button&gt;&lt;/div&gt;&lt;/div&gt;&lt;p id="companyname" class="text-right text-muted companyname"&gt;&lt;/p&gt;&lt;/div&gt;&lt;div id="bot-wrap2" class="position-fixed"&gt;&lt;div id="bot-msgbox2" class="container"&gt;&lt;div id="doctors-available" class="botmsg"&gt;&lt;p class="text-left"&gt;Выберите врача для записи:&lt;/p&gt;&lt;/div&gt;&lt;/div&gt;&lt;p id="companyname" class="text-right text-muted companyname"&gt;&lt;/p&gt;&lt;/div&gt;');&lt;/script&gt;
&lt;script type="text/javascript"&gt;var clicked = 2;$('#bot-close').click(function(){if (clicked % 2 == 0) {$('#bot-wrap').css({'right' : '0px', 'transform' : 'translateX(350px)'});$('#bot-close').css({'right' : '350px', 'transform' : 'translateX(350px)'});$('#arrow').css({'transform' : 'rotate(180deg)'});} else {$('#bot-wrap').css({'right' : '-350px', 'transform' : 'translateX(-350px)'});$('#bot-close').css({'right' : '0px', 'transform' : 'translateX(-350px)'});$('#arrow').css({'transform' : 'rotate(0deg)'});}clicked++;});$('.companyname').html("&lt;?php $link = mysqli_connect($params['dbhost'],$params['dbuser'],$params['dbpass'],$params['dbname']);$res=mysqli_query($link, 'SELECT `companyname` FROM `botparams`');$resarr = mysqli_fetch_assoc($res);mysqli_close($link); echo $resarr['companyname'] ?&gt;");$('#hellomsg').html("&lt;?php $link = mysqli_connect($params['dbhost'],$params['dbuser'],$params['dbpass'],$params['dbname']);$res=mysqli_query($link, 'SELECT `hellomsg` FROM `botparams`');$resarr = mysqli_fetch_assoc($res);mysqli_close($link); echo $resarr['hellomsg'] ?&gt;");var questions = [&lt;?php echo '"'.implode('","', $params['questions']).'"' ?&gt;];for (var i=0; i&lt;questions.length; i++) {if (questions[i] != ""){$('#div-quickquestions').append('&lt;p index="'+i+'" class="dropdown-item question-link"&gt;'+questions[i]+'&lt;/p&gt;'); } }&lt;/script&gt;
    &lt;script type="text/javascript"&gt;var questions = [&lt;?php echo '"'.implode('","', $params['questions']).'"' ?&gt;];var answers = [&lt;?php echo '"'.implode('","', $params['answers']).'"' ?&gt;];$('#btn-quickquestions').click(function(){$('#div-quickquestions').toggle();document.getElementById('bot-msgbox').scrollTop = 9999999;});$('.question-link').click(function(){$('#bot-msgbox').append('&lt;p class="text-right msgsent"&gt;'+questions[$(this).attr('index')]+'&lt;/p&gt;&lt;p class="text-left botmsg"&gt;'+answers[$(this).attr('index')]+'&lt;/p&gt;');document.getElementById('bot-msgbox').scrollTop = 9999999;});&lt;/script&gt;
    &lt;script type="text/javascript"&gt;$(function(){$('#sendmsg').click(function(){event.preventDefault();if ($.trim($("#msginput").val()) != "") {$('#bot-msgbox').append('&lt;p class="text-right msgsent" style="border-radius: 10px; background:#d5e0f2; padding:5px; width:80%; float:right;"&gt;'+$("#msginput").val()+'&lt;/p&gt;');$("#msginput").val('');document.getElementById('bot-msgbox').scrollTop = 9999999;var questions = [&lt;?php echo '"'.implode('","', $params['questions']).'"' ?&gt;];var answers = [&lt;?php echo '"'.implode('","', $params['answers']).'"' ?&gt;];var msgstr = $('.msgsent:last').text();var msgsplit = msgstr.split(' ');let msgsplit2 = msgsplit.filter(element =&gt; element !== "");for (var i = 0; i &lt; msgsplit2.length; i++) {for (var j = 0; j &lt; questions.length; j++) {if  (questions[j].toLowerCase().indexOf(msgsplit2[i].toLowerCase()) !== -1) {$('#bot-msgbox').append('&lt;p class="text-left botmsg"&gt;'+answers[j]+'&lt;/p&gt;');break;}}document.getElementById('bot-msgbox').scrollTop = 9999999;}$('.msgsent:last').html();}});$('#msginput').keypress(function(e){if(e.which == 13) {event.preventDefault();if ($.trim($("#msginput").val()) != "") {$('#bot-msgbox').append('&lt;p class="text-right msgsent" style="border-radius: 10px; background:#d5e0f2; padding:5px; width:80%; float:right;"&gt;'+$("#msginput").val()+'&lt;/p&gt;');$("#msginput").val('');document.getElementById('bot-msgbox').scrollTop = 9999999;var questions = [&lt;?php echo '"'.implode('","', $params['questions']).'"' ?&gt;];var answers = [&lt;?php echo '"'.implode('","', $params['answers']).'"' ?&gt;];var msgstr = $('.msgsent:last').text();var msgsplit = msgstr.split(' ');let msgsplit2 = msgsplit.filter(element =&gt; element !== "");if  (msgstr.toLowerCase().indexOf('запис') !== -1) {$('#bot-msgbox').append('&lt;p class="text-left botmsg"&gt;Хотите записаться к врачу?&lt;/p&gt;');document.getElementById('bot-msgbox').scrollTop = 9999999;$('#msginput').keypress(function(e){if(e.which == 13) {var msgstr = $('.msgsent:last').text();if (msgstr.toLowerCase().indexOf('да') !== -1){$('#bot-wrap2').toggle();}}})}}}});});&lt;/script&gt;
    &lt;script type="text/javascript"&gt;var docname = [&lt;?php echo '"'.implode('","', $params['docname']).'"'?&gt;];var docspec = [&lt;?php echo '"'.implode('","', $params['docspec']).'"' ?&gt;];console.log(docname);for (var i = 0; i &lt; docname.length; i++) {if (docname[i] != ''){$('#doctors-available').append('&lt;a class="docnamelink" index="'+i+'" href=""&gt;&lt;p&gt;'+docname[i]+'('+docspec[i]+')&lt;/p&gt;&lt;/a&gt;');}}$('.docnamelink').click(function(){event.preventDefault();$('#bot-msgbox').append('&lt;p class="text-left botmsg"&gt;Вы записаны на прием. '+docname[$(this).attr('index')]+' свяжется с вами по номеру телефона для уточнения времени.&lt;/p&gt;');document.getElementById('bot-msgbox').scrollTop = 9999999;$('#bot-wrap2').toggle();})&lt;/script&gt;</p>
    </div>



<div id="bot-close" class="position-fixed"><div id="arrow">></div></div><div id="bot-wrap" class="position-fixed"><div id="bot-msgbox" class="container"><div id="btn-quickquestions" class="btn-group"><button id="btn-quickquestions" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Частые вопросы</button><div id="div-quickquestions" class="dropdown-menu"></div></div><p id="hellomsg" class="text-left botmsg"></p></div><div class="row container"><div class="col-9" style="padding-right: 0;"><textarea id="msginput" style=""></textarea></div><div class="col-3" style="padding-left: 0;"><button id="sendmsg" class="btn-outline-primary"><span style="font-size: 14px;">Отправить</span></button></div></div><p id="companyname" class="text-right text-muted companyname"></p></div><div id="bot-wrap2" class="position-fixed"><div id="bot-msgbox2" class="container"><div id="doctors-available" class="botmsg"><p class="text-left">Выберите врача для записи:</p></div></div><p id="companyname" class="text-right text-muted companyname"></p></div>


</div><!-- wrap -->
<div class="container-fluid" style="height: 500px; background-color: #123a7a;">
        <p class="text-center" style="color: white; padding-top: 15px;">Designed by Webgetables on hackaton 2019</p>
    </div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <!-- script for showing and hiding chat bot  -->
    <script type="text/javascript">
        var clicked = 2;
        $('#bot-close').click(function(){
            if (clicked % 2 == 0) {
                $('#bot-wrap').css({'right' : '0px', 'transform' : 'translateX(350px)'});
                $('#bot-close').css({'right' : '350px', 'transform' : 'translateX(350px)'});
                $('#arrow').css({'transform' : 'rotate(180deg)'});
            } else {
                $('#bot-wrap').css({'right' : '-350px', 'transform' : 'translateX(-350px)'});
                $('#bot-close').css({'right' : '0px', 'transform' : 'translateX(-350px)'});
                $('#arrow').css({'transform' : 'rotate(0deg)'});
            }
            clicked++;
    });
        $('.companyname').html(companyname);
        $('#hellomsg').html(hellomsg);

        for (var i=0; i<questions.length; i++) {
        	if (questions[i] != ""){
			$('#div-quickquestions').append('<p index="'+i+'" class="dropdown-item question-link">'+questions[i]+'</p>'); 
			} }

    </script>

    <!-- script for showing quick questions -->
    <script type="text/javascript">
    	var questions = [<?php echo '"'.implode('","', $_POST['que']).'"' ?>];
    	var answers = [<?php echo '"'.implode('","', $_POST['ans']).'"' ?>];
    	$('#btn-quickquestions').click(function(){
    			$('#div-quickquestions').toggle();
    			document.getElementById('bot-msgbox').scrollTop = 9999999;
    	});

    	$('.question-link').click(function(){
    		$('#bot-msgbox').append('<p class="text-right msgsent">'+questions[$(this).attr('index')]+'</p><p class="text-left botmsg">'+answers[$(this).attr('index')]+'</p>');

    		document.getElementById('bot-msgbox').scrollTop = 9999999;
    	});
    </script>

    <!-- script for sending messages -->
    <script type="text/javascript">
        $(function(){
            $('#sendmsg').click(function(){
                event.preventDefault();
                if ($.trim($("#msginput").val()) != "") {
                    $('#bot-msgbox').append('<p class="text-right msgsent" style="border-radius: 10px; background:#d5e0f2; padding:5px; width:80%; float:right;">'+$("#msginput").val()+'</p>');
                    $("#msginput").val('');
                    document.getElementById('bot-msgbox').scrollTop = 9999999;


        // script for bot answers
        var questions = [<?php echo '"'.implode('","', $_POST['que']).'"' ?>];
    	var answers = [<?php echo '"'.implode('","', $_POST['ans']).'"' ?>];
    	var msgstr = $('.msgsent:last').text();
    	var msgsplit = msgstr.split(' ');
    	let msgsplit2 = msgsplit.filter(element => element !== "");
  		
  		for (var i = 0; i < msgsplit2.length; i++) {
    		for (var j = 0; j < questions.length; j++) {
    			if  (questions[j].toLowerCase().indexOf(msgsplit2[i].toLowerCase()) !== -1) {
    				$('#bot-msgbox').append('<p class="text-left botmsg">'+answers[j]+'</p>');
    				break;
    			}
    		}
    		document.getElementById('bot-msgbox').scrollTop = 9999999;
    	}
		
    	$('.msgsent:last').html();

                }
             });

            $('#msginput').keypress(function(e){
                if(e.which == 13) {
                    event.preventDefault();
                    if ($.trim($("#msginput").val()) != "") {
                    $('#bot-msgbox').append('<p class="text-right msgsent" style="border-radius: 10px; background:#d5e0f2; padding:5px; width:80%; float:right;">'+$("#msginput").val()+'</p>');
                    $("#msginput").val('');
                    document.getElementById('bot-msgbox').scrollTop = 9999999;
        

        // script for bot answers
        var questions = [<?php echo '"'.implode('","', $_POST['que']).'"' ?>];
    	var answers = [<?php echo '"'.implode('","', $_POST['ans']).'"' ?>];
    	var msgstr = $('.msgsent:last').text();
    	var msgsplit = msgstr.split(' ');
    	let msgsplit2 = msgsplit.filter(element => element !== "");
  		
  		

    	if  (msgstr.toLowerCase().indexOf('запис') !== -1) {
    				$('#bot-msgbox').append('<p class="text-left botmsg">Хотите записаться к врачу?</p>');
    				document.getElementById('bot-msgbox').scrollTop = 9999999;
    		$('#msginput').keypress(function(e){
                if(e.which == 13) {
                	var msgstr = $('.msgsent:last').text();
                	if (msgstr.toLowerCase().indexOf('да') !== -1){
                		$('#bot-wrap2').toggle();
                	
    			  }
                }
            })
    			  
    	}
                }
                }
            });
        });
    </script>

						<script type="text/javascript">
                			var docname = [<?php echo '"'.implode('","', $_POST['doc-name']).'"' ?>];
                			var docspec = [<?php echo '"'.implode('","', $_POST['doc-spec']).'"' ?>];
                			console.log(docname);
                				for (var i = 0; i < docname.length; i++) {
                					if (docname[i] != ''){
                						$('#doctors-available').append('<a class="docnamelink" index="'+i+'" href=""><p>'+docname[i]+'('+docspec[i]+')</p></a>');
                					}
                				}
                			$('.docnamelink').click(function(){
                				event.preventDefault();
                				$('#bot-msgbox').append('<p class="text-left botmsg">Вы записаны на прием. '+docname[$(this).attr('index')]+' свяжется с вами по номеру телефона для уточнения времени.</p>');
                				document.getElementById('bot-msgbox').scrollTop = 9999999;
                				$('#bot-wrap2').toggle();

                			})
                		</script>

<script type="text/javascript">
	$('head').append('<style type="text/css">html {font-family: "Merriweather", serif;}body {line-height: 1;font-family: "Merriweather", serif;}small {font-size: 16px;}label {margin-bottom: 0;}input, textarea {margin-top: 5px;}button {padding: 5px;}#bot-wrap {height: 400px;width: 350px;border: 2px solid;border-radius: 5px;bottom: 0px;background: linear-gradient(#9198e5, #aee8cc);transition: all 1s;right: -350px;transform: translateX(-350px);}#bot-wrap2 {height: 400px;width: 350px;border: 2px solid;border-radius: 5px;bottom: 0px;background: linear-gradient(#9198e5, #aee8cc);transition: all 1s;right: 350px;display: none;}#bot-close  {height: auto;width: auto;font-size: 32px;line-height: 1.5;padding: 0;border: 2px solid;border-radius: 5px;bottom: 0px;right: 0px;background: #92b2a4;transition: all 1s;transform: translateX(-350px);}#arrow {transition: all 1s;}#questions-box, #doctors-box {background-color: #e6eef2;border: 1px solid;border-radius:5px;margin-top: 5px;padding: 5px;}.doc-box {background-color: #e6eef2;border: 1px solid;border-radius: 5px;margin: 5px;}.que{padding: 5px;}#btn-adddoctor, #btn-addquestion, .delque {background-color: #deecf2;border-radius: 5px;margin: 5px;}.form-row {margin: 10px;}#companyname {margin:15px;margin-top: 25px;padding:0;bottom: 0;font-size: 12px;}#bot-msgbox, #bot-msgbox2 {background: linear-gradient(rgba(170,238,238,0.7), rgba(145,152,229,0.7));height: 70%;width: 90%;border: 1px solid;border-radius: 5px;overflow-y: scroll;padding: 5px;margin-top: 10px;}#bot-msgbox2 {height: 80%}.botmsg {border-radius: 10px;background:#dae2c7;padding:5px;width:80%;float:left;font-size: 12px;}#hellomsg {margin-top: 40px;}#sendmsg {background-color: transparent;margin-top: 5px;border-radius: 5px;outline: none;height: 100%;}.msgsent {border-radius: 10px;background:#d5e0f2;padding:5px;width:80%;float:right;font-size: 12px;}.doc-zapis {border-radius: 5px;background:#d5e0f2;margin: 5px;}#btn-quickquestions {position: fixed;}.dropdown-item {font-size: 12px;word-wrap: break-word;white-space: normal !important;}#div-quickquestions{width: 300px;}#msginput{background-color: #eaeaea; height: 100%; width: 100%; border: 1px solid; border-radius: 5px; resize: none;}</style>');
</script>

</body>
</html>