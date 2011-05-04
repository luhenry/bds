<?php

require_once sfConfig::get('sf_symfony_lib_dir') . '/helper/TextHelper.php';

function parse_bbcode($bbcode) {
    $balises = array(
        "'\[b\](.*?)\[/b\]'is" => "<b>\\1</b>",
        "'\[i\](.*?)\[/i\]'is" => "<i>\\1</i>",
        "'\[u\](.*?)\[/u\]'is" => "<u>\\1</u>",
        "'\[s\](.*?)\[/s\]'is" => "<del>\\1</del>",
//        "'\[H1\](.*?)\[/H1\]'is" => "<h2>\\1</h2>",
//        "'\[H2\](.*?)\[/H2\]'is" => "<h3>\\1</h3>",
//        "'\[H3\](.*?)\[/H3\]'is" => "<center><b><u>\\1</u></b></center>",
        "'\[list\](.*?)\[/list\]'is" => "<ul>\\1</ul>",
        "'\[list=1\](.*?)\[/list\]'is" => "<ol>\\1</ol>",
        "'\[\*\](.*?)\[/\*\]'is" => "<li>\\1</li>",
        "'\[url\](.*?)\[/url\]'is" => "<a href='\\1'>\\1</a>",
//        "'\[email\](.*?)\[/email\]'is" => "<a href='mailto: \\1'>\\1</a>",
        "'\[img\](.*?)\[/img\]'is" => "<img border=\"0\" src=\"\\1\">",
    );

    return nl2br(preg_replace(array_keys($balises), array_values($balises), $bbcode));
}

function generate_string($length) {
    $chars = 'abcdefghijklmnopqrstuvwxyz0123456789';
    $chars_length = strlen($chars);
    $string = '';

    mt_srand();

    for ($i = 0; $i < $length; $i++)
        $string .= $chars[mt_rand(0, $chars_length - 1)];

    return $string;
}

function uppercase($text) {
    $string = ucwords(strtolower($text));

    foreach (array('-', '\'') as $delimiter)
        if (strpos($string, $delimiter) !== false)
            $string = implode($delimiter, array_map('ucfirst', explode($delimiter, $string)));

    return $string;
}