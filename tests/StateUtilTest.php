<?php

namespace Ipag\Sdk\Tests;

use Ipag\Sdk\Util\StateUtil;
use PHPUnit\Framework\TestCase;

class StateUtilTest extends BaseTestCase
{
    public function testFoundStateUFValid()
    {
        $this->assertEquals(StateUtil::transformState('sp'), 'SP');
    }

    public function testNotFoundStateUFInvalid()
    {
        $this->assertEmpty(StateUtil::transformState('Sa'));
    }

    public function testFoundStateValid()
    {
        $this->assertEquals(StateUtil::transformState('são paulo'), 'SP');
    }

    public function testNotFoundStateInvalid()
    {
        $this->assertEmpty(StateUtil::transformState('são paulos'));
    }

    public function testFoundStateNameNoNNormalized()
    {
        $this->assertEquals(StateUtil::transformState('SaO pAuLo'), 'SP');
    }
}