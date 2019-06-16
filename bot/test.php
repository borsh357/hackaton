<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <?php $configfilename = './webgetables-chatbot/bot-config.txt'; $configtext = file_get_contents($configfilename); $params = unserialize($configtext);

$host = $params['dbhost'];
$dbname = $params['dbname'];
$user = $params['dbuser'];
$pass = $params['dbpass'];
$link = mysqli_connect($params['dbhost'],$params['dbuser'],$params['dbpass'],$params['dbname']);
if (!$link) {
    $sql = file_get_contents('db.sql');
    $dbh = new PDO("mysql:host=".$params['dbhost']."", $params['dbuser'], $params['dbpass']);
    $dbh->exec("CREATE DATABASE `".$params['dbname']."`");
    $dbh = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $pass);
    $dbh->exec($sql);
}
mysqli_close($link);
$link = mysqli_connect($params['dbhost'],$params['dbuser'],$params['dbpass'],$params['dbname']);

if (mysqli_num_rows(mysqli_query($link, 'SELECT * FROM `botparams`')) == 0){
$companyname = $params['companyname'];
$hellomsg = $params['hellomsg'];
mysqli_query($link, 'INSERT INTO `botparams` VALUES ("'.$companyname.'","'.$hellomsg.'")');
}
if (mysqli_num_rows(mysqli_query($link, 'SELECT * FROM `doctors`')) == 0){
    $docnamearr = $params['docname'];
    $docspecarr = $params['docspec'];
    for ($i=0; $i < sizeof($docnamearr); $i++) { 
        mysqli_query($link, 'INSERT INTO `doctors` VALUES ("'.$docnamearr[$i].'","'.$docspecarr[$i].'")');
    }
}
if (mysqli_num_rows(mysqli_query($link, 'SELECT * FROM `questions`')) == 0){
    $questionsarr = $params['questions'];
    $answersarr = $params['answers'];
    for ($i=0; $i < sizeof($questionsarr); $i++) { 
        mysqli_query($link, 'INSERT INTO `questions` VALUES ("'.$questionsarr[$i].'","'.$answersarr[$i].'")');
    }
}
mysqli_close($link);
?>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script type="text/javascript">$(function(){$('head').append('<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"><style type="text/css">html {font-family: "Merriweather", serif;}body {line-height: 1;font-family: "Merriweather", serif;}small {font-size: 16px;}label {margin-bottom: 0;}input, textarea {margin-top: 5px;}button {padding: 5px;}#bot-wrap {height: 400px;width: 350px;border: 2px solid;border-radius: 5px;bottom: 0px;background: #92b2a4;transition: all 1s;right: -350px;transform: translateX(-350px);}#bot-wrap2 {height: 400px;width: 350px;border: 2px solid;border-radius: 5px;bottom: 0px;background: #92b2a4;transition: all 1s;right: 350px;display: none;}#bot-close  {height: auto;width: auto;font-size: 32px;line-height: 1.5;padding: 0;border: 2px solid;border-radius: 5px;bottom: 0px;right: 0px;background: #92b2a4;transition: all 1s;transform: translateX(-350px);}#arrow {transition: all 1s;}#questions-box, #doctors-box {background-color: #e6eef2;border: 1px solid;border-radius:5px;margin-top: 5px;padding: 5px;}.doc-box {background-color: #e6eef2;border: 1px solid;border-radius: 5px;margin: 5px;}.que{padding: 5px;}#btn-adddoctor, #btn-addquestion, .delque {background-color: #deecf2;border-radius: 5px;margin: 5px;}.form-row {margin: 10px;}#companyname {margin:15px;margin-top: 25px;padding:0;bottom: 0;font-size: 12px;}#bot-msgbox, #bot-msgbox2 {background-color: #eaeaea;height: 70%;width: 90%;border: 1px solid;border-radius: 5px;overflow-y: scroll;padding: 5px;margin-top: 10px;}#bot-msgbox2 {height: 80%}.botmsg {border-radius: 10px;background:#dae2c7;padding:5px;width:80%;float:left;font-size: 12px;}#hellomsg {margin-top: 40px;}#sendmsg {background-color: #92b2a4;margin-top: 5px;border-radius: 5px;outline: none;height: 100%;}.msgsent {border-radius: 10px;background:#d5e0f2;padding:5px;width:80%;float:right;font-size: 12px;}.doc-zapis {border-radius: 5px;background:#d5e0f2;margin: 5px;}#btn-quickquestions {position: fixed;}.dropdown-item {font-size: 12px;word-wrap: break-word;white-space: normal !important;}#div-quickquestions{width: 300px;}#msginput{background-color: #eaeaea; height: 100%; width: 100%; border: 1px solid; border-radius: 5px; resize: none;}</style>');})</script>
<script type="text/javascript">$('body').append('<div id="bot-close" class="position-fixed"><div id="arrow">></div></div><div id="bot-wrap" class="position-fixed"><div id="bot-msgbox" class="container"><div id="btn-quickquestions" class="btn-group"><button id="btn-quickquestions" type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Частые вопросы</button><div id="div-quickquestions" class="dropdown-menu"></div></div><p id="hellomsg" class="text-left botmsg"></p></div><div class="row container"><div class="col-9" style="padding-right: 0;"><textarea id="msginput" style=""></textarea></div><div class="col-3" style="padding-left: 0;"><button id="sendmsg" class="btn-outline-primary"><span style="font-size: 14px;">Отправить</span></button></div></div><p id="companyname" class="text-right text-muted companyname"></p></div><div id="bot-wrap2" class="position-fixed"><div id="bot-msgbox2" class="container"><div id="doctors-available" class="botmsg"><p class="text-left">Выберите врача для записи:</p></div></div><p id="companyname" class="text-right text-muted companyname"></p></div>');</script>
<script type="text/javascript">var clicked = 2;$('#bot-close').click(function(){if (clicked % 2 == 0) {$('#bot-wrap').css({'right' : '0px', 'transform' : 'translateX(350px)'});$('#bot-close').css({'right' : '350px', 'transform' : 'translateX(350px)'});$('#arrow').css({'transform' : 'rotate(180deg)'});} else {$('#bot-wrap').css({'right' : '-350px', 'transform' : 'translateX(-350px)'});$('#bot-close').css({'right' : '0px', 'transform' : 'translateX(-350px)'});$('#arrow').css({'transform' : 'rotate(0deg)'});}clicked++;});$('.companyname').html("<?php $link = mysqli_connect($params['dbhost'],$params['dbuser'],$params['dbpass'],$params['dbname']);$res=mysqli_query($link, 'SELECT `companyname` FROM `botparams`');$resarr = mysqli_fetch_assoc($res);mysqli_close($link); echo $resarr['companyname'] ?>");$('#hellomsg').html("<?php $link = mysqli_connect($params['dbhost'],$params['dbuser'],$params['dbpass'],$params['dbname']);$res=mysqli_query($link, 'SELECT `hellomsg` FROM `botparams`');$resarr = mysqli_fetch_assoc($res);mysqli_close($link); echo $resarr['hellomsg'] ?>");var questions = [<?php echo '"'.implode('","', $params['questions']).'"' ?>];for (var i=0; i<questions.length; i++) {if (questions[i] != ""){$('#div-quickquestions').append('<p index="'+i+'" class="dropdown-item question-link">'+questions[i]+'</p>'); } }</script>
    <script type="text/javascript">var questions = [<?php echo '"'.implode('","', $params['questions']).'"' ?>];var answers = [<?php echo '"'.implode('","', $params['answers']).'"' ?>];$('#btn-quickquestions').click(function(){$('#div-quickquestions').toggle();document.getElementById('bot-msgbox').scrollTop = 9999999;});$('.question-link').click(function(){$('#bot-msgbox').append('<p class="text-right msgsent">'+questions[$(this).attr('index')]+'</p><p class="text-left botmsg">'+answers[$(this).attr('index')]+'</p>');document.getElementById('bot-msgbox').scrollTop = 9999999;});</script>
    <script type="text/javascript">$(function(){$('#sendmsg').click(function(){event.preventDefault();if ($.trim($("#msginput").val()) != "") {$('#bot-msgbox').append('<p class="text-right msgsent" style="border-radius: 10px; background:#d5e0f2; padding:5px; width:80%; float:right;">'+$("#msginput").val()+'</p>');$("#msginput").val('');document.getElementById('bot-msgbox').scrollTop = 9999999;var questions = [<?php echo '"'.implode('","', $params['questions']).'"' ?>];var answers = [<?php echo '"'.implode('","', $params['answers']).'"' ?>];var msgstr = $('.msgsent:last').text();var msgsplit = msgstr.split(' ');let msgsplit2 = msgsplit.filter(element => element !== "");for (var i = 0; i < msgsplit2.length; i++) {for (var j = 0; j < questions.length; j++) {if  (questions[j].toLowerCase().indexOf(msgsplit2[i].toLowerCase()) !== -1) {$('#bot-msgbox').append('<p class="text-left botmsg">'+answers[j]+'</p>');break;}}document.getElementById('bot-msgbox').scrollTop = 9999999;}$('.msgsent:last').html();}});$('#msginput').keypress(function(e){if(e.which == 13) {event.preventDefault();if ($.trim($("#msginput").val()) != "") {$('#bot-msgbox').append('<p class="text-right msgsent" style="border-radius: 10px; background:#d5e0f2; padding:5px; width:80%; float:right;">'+$("#msginput").val()+'</p>');$("#msginput").val('');document.getElementById('bot-msgbox').scrollTop = 9999999;var questions = [<?php echo '"'.implode('","', $params['questions']).'"' ?>];var answers = [<?php echo '"'.implode('","', $params['answers']).'"' ?>];var msgstr = $('.msgsent:last').text();var msgsplit = msgstr.split(' ');let msgsplit2 = msgsplit.filter(element => element !== "");if  (msgstr.toLowerCase().indexOf('запис') !== -1) {$('#bot-msgbox').append('<p class="text-left botmsg">Хотите записаться к врачу?</p>');document.getElementById('bot-msgbox').scrollTop = 9999999;$('#msginput').keypress(function(e){if(e.which == 13) {var msgstr = $('.msgsent:last').text();if (msgstr.toLowerCase().indexOf('да') !== -1){$('#bot-wrap2').toggle();}}})}}}});});</script>
    <script type="text/javascript">var docname = [<?php echo '"'.implode('","', $params['docname']).'"'?>];var docspec = [<?php echo '"'.implode('","', $params['docspec']).'"' ?>];console.log(docname);for (var i = 0; i < docname.length; i++) {if (docname[i] != ''){$('#doctors-available').append('<a class="docnamelink" index="'+i+'" href=""><p>'+docname[i]+'('+docspec[i]+')</p></a>');}}$('.docnamelink').click(function(){event.preventDefault();$('#bot-msgbox').append('<p class="text-left botmsg">Вы записаны на прием. '+docname[$(this).attr('index')]+' свяжется с вами по номеру телефона для уточнения времени.</p>');document.getElementById('bot-msgbox').scrollTop = 9999999;$('#bot-wrap2').toggle();})</script>
</body>
</html>