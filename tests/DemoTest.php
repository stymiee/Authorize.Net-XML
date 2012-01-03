<?php
    //require_once('PHPUnit/Framework.php');
    require('PHPUnit/Framework/TestCase.php');
    require_once(dirname(__FILE__) . '/Demo.php');

    class DemoTest extends PHPUnit_Framework_Testcase {
        public function testSum() {
            $demo = new Demo();
            $this->assertEquals(4, $demo->sum(2,2));
            $this->assertNotEquals(3, $demo->sum(1,1));
        }
    }
?>