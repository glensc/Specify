<?php
require_once __DIR__.'/../vendor/autoload.php';

class ConfigTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Codeception\Specify\Config
     */
    protected $config;

    protected function setUp()
    {
        $this->config = \Codeception\Specify\Config::create();
    }

    public function testDefaults()
    {
        $this->assertTrue($this->config->propertyIgnored('backupGlobals'));
        $this->assertTrue($this->config->propertyIgnored('dependencies'));
        $this->assertTrue($this->config->propertyIsDeeplyCloned('user'));
        $this->assertFalse($this->config->propertyIsShallowCloned('user'));
    }

    public function testCloneModes()
    {
        $this->config->is_deep = false;
        $this->config->deep[] = 'user';
        $this->assertTrue($this->config->propertyIsShallowCloned('profile'));
        $this->assertFalse($this->config->propertyIsShallowCloned('user'));
        $this->assertTrue($this->config->propertyIsDeeplyCloned('user'));
    }

}
