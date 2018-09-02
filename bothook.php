<?php

include_once('conf.php');

spl_autoload_register(function($class) {
	include_once 'classes/' . $class . '.php';
});

$content = file_get_contents("php://input");
$update = json_decode($content, true);
$chat_id = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];

// Available bot commands
$commands = [
	
	// Msg de compra para teste
	'compra',
	// Msg de compra para teste Sim
	'S',
	// Msg de compra para teste Não
	'N',
	// TCod para finalizar
	'ABC123',

];

$arguments = [
	
	'S'=>[
		's_compra',
	],
	'N'=>[
		'n_compra',
	],
	'ABC123'=>[
		'f_compra',
	],
];

$args = explode(' ', trim($message));

$command = ltrim(array_shift($args), '/');
$method = '';
if (isset($args[0]) && in_array($args[0], $arguments[$command])) {
	$method = array_shift($args);
}
else { 
	if (in_array($command, array_keys($alias))) {
		$method = $command;
		$command = $alias[$command];
	}
}


switch ($command) {
	case 'compra':
		$class = 'Compra';
		break;
	case 'S':
		$class = 'Compra';
		break;
	case 'N':
		$class = 'Compra';
		break;
	case 'ABC123':
		$class = 'Compra';
		break;
	case 'N':
		$class = 'Compra';
		break;

	default:
		$class = 'Bot';
}

$hook = new $class($conf, $chat_id);

if (!$hook->isTrusted()) {
	$hook->unauthorized();
	die();
}

if (!in_array($command, $commands)) {
	$hook->unknown();
}

else {
	if (isset($arguments[$command]) && in_array($method, $arguments[$command])) {
		$hook->{$method}($args);
		die();
	} else if (in_array($command, $commands)) {
		$hook->{$command}($args);
	} else {
		$hook->unknown();
	}
}