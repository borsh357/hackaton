<?php
	 $companyname = $_POST['companyname'];
	 $hellomsg = $_POST['hellomsg'];
	 $questions = $_POST['que'];
	 $answers = $_POST['ans'];
	 $docname = $_POST['doc-name'];
	 $docspec = $_POST['doc-spec'];
	 $dbhost = $_POST['dbhost'];
	 $dbname = $_POST['dbname'];
	 $dbuser = $_POST['dbuser'];
	 $dbpass = $_POST['dbpass'];

	$params = array(
		companyname => $companyname,
		hellomsg => $hellomsg,
		questions => $questions,
		answers => $answers,
		docname => $docname,
		docspec => $docspec,
		dbhost => $dbhost,
		dbname => $dbname,
		dbuser => $dbuser,
		dbpass => $dbpass
	);

	$configfilename = './webgetables-chatbot/bot-config.txt';
	$configtext = serialize($params);
	file_put_contents($configfilename, $configtext);
?>
	<script type="text/javascript">
		companyname = "<?php echo $companyname;?>";
		hellomsg = "<?php echo $hellomsg;?>";
		questions = [<?php echo '"'.implode('","', $_POST['que']).'"' ?>];
		docname = [<?php echo '"'.implode('","', $_POST['doc-name']).'"' ?>];
		docspec = [<?php echo '"'.implode('","', $_POST['doc-spec']).'"' ?>];
	</script>
