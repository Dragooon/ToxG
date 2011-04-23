<?php

require(dirname(dirname(__FILE__)) . '/include.php');

// The default is simply "lang".
ToxgExpression::setLangFunction('my_lang_formatter');

$theme = new SampleToxgTheme(dirname(__FILE__), dirname(__FILE__), array(), true);
$theme->loadTemplates('templates');
$theme->addLayer('main');

$theme->listenEmit('', 'title', 'add_title_prefix', 'after');
$theme->listenEmit('', 'p', 'add_paragraph_title', 'before');

$theme->addTemplate('home');
$theme->context['page_name'] = my_lang_formatter('page_name_home');
$theme->output();

function my_lang_formatter()
{
	// This could use gettext, or logic based on the number of parameters.
	// It could also use a different string based on numeric parameters.
	static $strings = array(
		'home_hello' => 'Hello, this is the home page.  Isn\'t it pretty?',
		'site_name' => 'My Site: %s',
		'page_name_home' => 'Home',
	);

	$args = func_get_args();
	$id = array_shift($args);

	if (!isset($strings[$id]))
		$string = '(unknown translation)';
	else
		$string = $strings[$id];

	return vsprintf($string, $args);
}

function add_title_prefix(ToxgBuilder $builder, $type, array $attributes, ToxgToken $token)
{
	if ($type === 'html-tag-start')
		$builder->emitOutputString('Hey! ', $token);
}

function add_paragraph_title(ToxgBuilder $builder, $type, array $attributes, ToxgToken $token)
{
	// !!! Might we want a way to change $attributes and then rebuild $token?
	$token->data = str_replace('<p', '<p title="[Unknown] likes this paragraph."', $token->data);
}

?>