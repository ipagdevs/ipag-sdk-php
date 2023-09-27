<?php

namespace Ipag\Sdk\Tests;

use Ipag\Sdk\Util\StateUtil;

class StateUtilTest extends BaseTestCase
{
    public function testFoundStateUfValid()
    {
        $this->assertEquals(StateUtil::transformState('sp'), 'SP');
    }

    public function testNotFoundStateUfInvalid()
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

    public function testFoundStateNameNonNormalized()
    {
        $this->assertEquals(StateUtil::transformState('SaO pAuLo'), 'SP');
    }
}