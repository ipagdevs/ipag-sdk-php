<?php

namespace Ipag\Sdk\Tests\Model;

use Ipag\Sdk\Model\Schema\Exception\MutatorAttributeException;
use PHPUnit\Framework\TestCase;

class AntifraudSettingsTest extends TestCase
{
    public function testShouldCreateAntifraudSettingsObjectWithConstructorSuccessfully()
    {
        $antifraudSettings = new \Ipag\Sdk\Model\AntifraudSettings([
            'enabled' => true,
            'environment' => 'test',
            'consult_mode' => 'auto',
            'capture_on_approval' => false,
            'cancel_on_refused' => true,
            'review_score_threshold' => 0.8
        ]);

        $this->assertEquals(true, $antifraudSettings->getEnabled());
        $this->assertEquals('test', $antifraudSettings->getEnvironment());
        $this->assertEquals('auto', $antifraudSettings->getConsultMode());
        $this->assertEquals(false, $antifraudSettings->getCaptureOnApproval());
        $this->assertEquals(true, $antifraudSettings->getCancelOnRefused());
        $this->assertEquals(0.8, $antifraudSettings->getReviewScoreThreshold());

    }

    public function testShouldCreateAntifraudSettingsObjectAndSetTheValuesSuccessfully()
    {
        $antifraudSettings = (new \Ipag\Sdk\Model\AntifraudSettings)
            ->setEnabled(true)
            ->setEnvironment('test')
            ->setConsultMode('auto')
            ->setCaptureOnApproval(false)
            ->setCancelOnRefused(true)
            ->setReviewScoreThreshold(0.8);

        $this->assertEquals(true, $antifraudSettings->getEnabled());
        $this->assertEquals('test', $antifraudSettings->getEnvironment());
        $this->assertEquals('auto', $antifraudSettings->getConsultMode());
        $this->assertEquals(false, $antifraudSettings->getCaptureOnApproval());
        $this->assertEquals(true, $antifraudSettings->getCancelOnRefused());
        $this->assertEquals(0.8, $antifraudSettings->getReviewScoreThreshold());
    }

    public function testShouldCreateEmptyAntifraudSettingsObjectSuccessfully()
    {
        $antifraudSettings = new \Ipag\Sdk\Model\AntifraudSettings;

        $this->assertEmpty($antifraudSettings->getEnabled());
        $this->assertEmpty($antifraudSettings->getEnvironment());
        $this->assertEmpty($antifraudSettings->getConsultMode());
        $this->assertEmpty($antifraudSettings->getCaptureOnApproval());
        $this->assertEmpty($antifraudSettings->getCancelOnRefused());
        $this->assertEmpty($antifraudSettings->getReviewScoreThreshold());

    }

    public function testCreateAndSetEmptyPropertiesAntifraudSettingsObjectSuccessfully()
    {
        $antifraudSettings = new \Ipag\Sdk\Model\AntifraudSettings([
            'enabled' => true,
            'environment' => 'test',
            'consult_mode' => 'auto',
            'capture_on_approval' => false,
            'cancel_on_refused' => true,
            'review_score_threshold' => 0.8
        ]);

        $antifraudSettings
            ->setEnabled(null)
            ->setEnvironment(null)
            ->setConsultMode(null)
            ->setCaptureOnApproval(null)
            ->setCancelOnRefused(null)
            ->setReviewScoreThreshold(null);

        $this->assertEmpty($antifraudSettings->getEnabled());
        $this->assertEmpty($antifraudSettings->getEnvironment());
        $this->assertEmpty($antifraudSettings->getConsultMode());
        $this->assertEmpty($antifraudSettings->getCaptureOnApproval());
        $this->assertEmpty($antifraudSettings->getCancelOnRefused());
        $this->assertEmpty($antifraudSettings->getReviewScoreThreshold());

    }

    public function testShouldThrowATypeExceptionOnTheAntifraudSettingsReviewScoreThresholdProperty()
    {
        $AntifraudSettings = new \Ipag\Sdk\Model\AntifraudSettings;

        $this->expectException(\TypeError::class);

        $AntifraudSettings->setReviewScoreThreshold('a');
    }

    public function testShouldThrowAValidationExceptionOnTheAntifraudSettingsReviewScoreThresholdProperty()
    {
        $AntifraudSettings = new \Ipag\Sdk\Model\AntifraudSettings;

        $this->expectException(MutatorAttributeException::class);

        $AntifraudSettings->setReviewScoreThreshold(1.01);
    }

}