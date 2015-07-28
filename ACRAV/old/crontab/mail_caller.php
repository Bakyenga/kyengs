<?php
	include_once "class.httprequest.php";
	#Send Audit Trail mail everyday
	$r = new HTTPRequest("http://www.acravonline.com/index.php/settings/cronmail/send_cron_mail/type/help");
	echo $r->DownloadToString();
?>