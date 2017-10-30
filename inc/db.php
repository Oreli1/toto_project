<?php
//dsn
$dsn='mysql:dbname='.$config['DB_DATABASE'].';host='.$config['DB_HOST'].';charset=UTF8';
//try/clearstatcache
try {
	// Je crée une instance de PDO
	$pdo = new PDO($dsn, $config['DB_USER'], $config['DB_PASSWORD']);

	// Génère automatiquement une exception si erreur dans la requete
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e) {
	echo 'Connexion échouée : '.$e->getMessage();
}
