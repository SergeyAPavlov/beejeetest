<?php


use PHPUnit\Framework\TestCase;
require_once ("../vendor/autoload.php");

class TestPaginate extends TestCase {

    public function testPagesQuantity()
    {
        $pg = new \beejeetest\Services\Paginate(5, 4);
        $qw = $pg->getPagesQuantity();

        $this->assertTrue($qw == 1);

        $pg2 = new \beejeetest\Services\Paginate(5, 5);
        $qw2 = $pg2->getPagesQuantity();
        $this->assertTrue($qw2 == 1);

        $pg3 = new \beejeetest\Services\Paginate(5, 6);
        $qw3 = $pg3->getPagesQuantity();
        $this->assertTrue($qw3 == 2);

        $pg4 = new \beejeetest\Services\Paginate(5, 10);
        $qw4 = $pg4->getPagesQuantity();
        $this->assertTrue($qw4 == 2);

        $pg5 = new \beejeetest\Services\Paginate(5, 11);
        $qw5 = $pg5->getPagesQuantity();
        $this->assertTrue($qw5 == 3);

    }

    public function testPagesHtml()
    {
        $pg5 = new \beejeetest\Services\Paginate(5, 11);
        $html = $pg5->getPagesHtml('/?order=status&');
        $this->assertTrue(true);
    }

}