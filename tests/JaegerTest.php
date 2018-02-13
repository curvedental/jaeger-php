<?php

use Jaeger\Jaeger;
use Jaeger\Reporter\RemoteReporter;
use Jaeger\Sampler\ConstSampler;
use Jaeger\Transport\TransportUdp;

class JaegerTest extends PHPUnit_Framework_TestCase
{

    public function testGetEnvTags(){

        $tranSport = new TransportUdp();
        $reporter = new RemoteReporter($tranSport);
        $sampler = new ConstSampler();

        $_SERVER['JAEGER_TAGS'] = 'foo=bar';
        $Jaeger = new Jaeger('getEnvTags', $reporter, $sampler);
        $tags = $Jaeger->getEnvTags();

        $this->assertTrue(count($tags) > 0);
    }

}
