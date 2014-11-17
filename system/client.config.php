<?php   
	
	// Connessione
	define('CLIENT_HOST', '127.0.0.1'); // Endereço de IP
	define('CLIENT_PORT', 30000); // Porta do Servidor
	
	// Informações da SWF
	define('CLIENT_BASE', 'http://localhost/game/gordon/RELEASE63-201409222303-304766480/'); // Base da SWF
	define('CLIENT_SWFNAME', "Habbo.swf");  // O nome do .SWF principal
	
	define('CLIENT_GAMEDATABASE', 'http://localhost/game/gamedata'); // Base da Gamedata
	
	define('CLIENT_LOADING', 'Wait! '.SITE_NAME.' is loading'); // Mensagem de Carregamento
	define('CLIENT_CROSSDOMAIN', 1); // Crossdomain ?
	define('CLIENT_SSOTICKET', 1); // SSOTicket
	define('CLIENT_ORIGIN', "popup"); // Client Popup (new window)
?>