<?php
/**
 * Ping-o-matic v2
 *
 * @author Dharma
 *
 * Given a csv domains list `domains.csv` in the same path, this script outputs the IP (v4) address associated.
 * The output is redirected to STDOUT with php:print
 *
 * Usage: `$~ php -f get-ip-from-domain.php`
 *
 * @todo Improve output redirection, pass csv file as parameter
 *
 */


$domains = array_map('str_getcsv', file('./domains.csv'));

foreach ($domains as $domain) {
    $result = exec('host -t a '.$domain[0]);
    preg_match('/(?:[0-9]{1,3}\.){3}[0-9]{1,3}/', $result, $matches);
    print((count($matches) ? $matches[0] : '') ."\n");
}
