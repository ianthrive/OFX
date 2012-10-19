<?
	require_once(__DIR__.'/OFX.php');
	
	$finance = new Finance();
	$finance->banks['amex'] = new Bank($finance, '3101', 'https://online.americanexpress.com/myca/ofxdl/desktop/desktopDownload.do?request_type=nl_ofxdownload', 'AMEX');
	$finance->banks['amex']->logins[] = new Login($finance->banks['amex'], 'username', 'password');
	
	foreach($finance->banks as $bank) {
		foreach($bank->logins as $login) {
			$login->setup();
			foreach($login->accounts as $account) {
				$account->setup();
			}
		}
	}
	
	print "<pre>".print_r($finance, 1)."</pre>";
?>
