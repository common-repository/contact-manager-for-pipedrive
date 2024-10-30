<?php

namespace ContactManagerForPipedrive;

require_once(__DIR__ . "../includes/PipedriveApiCMFP.php");

use Brain\Monkey\Functions;
use Brain\Monkey\Actions;
use Brain\Monkey\Expectation;
use PHPUnit\Framework\TestCase;
use ContactManagerForPipedrive\PipedriveApiCMFP;


if (!function_exists('get_option')) {
    function get_option($val, $def) {
        return $def;
    }
}

class PipedriveTest extends TestCase
{
    public function setUp(): void
    {
    }
}
