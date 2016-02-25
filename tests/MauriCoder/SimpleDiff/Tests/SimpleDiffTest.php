<?php
/**
 * Created by PhpStorm.
 * User: mauricio
 * Date: 25/02/16
 * Time: 01:21 PM
 */

namespace MauriCoder\SimpleDiff\Tests;

use MauriCoder\SimpleDiff\SimpleDiff;

class SimpleDiffTest extends \PHPUnit_Framework_TestCase
{
    protected $simpleDiff;
    protected $a;
    protected $b;

    protected function setUp()
    {
        $this->a = "[b]Some bbcode[/b]
        Shouldn't hurt anybady
        [i]Waht do ya think?[/i]";

        $this->b = "[b]Some bbcode[/b]
        Shouldn't hurt anybody.
        [i]What do you think?[/i]
        This is gross!

        Some newlines to.";

        $this->simpleDiff = new SimpleDiff();
    }

    public function testInstantiate()
    {
        $this->assertInstanceOf('MauriCoder\SimpleDiff\SimpleDiff', $this->simpleDiff);
    }

    public function testDiff()
    {
        $result = $this->simpleDiff->htmlDiff($this->a, $this->b);
        $this->assertEquals("[b]Some bbcode[/b]
        Shouldn't hurt <del>anybady
</del> <ins>anybody.
</ins>        <del>[i]Waht</del> <ins>[i]What</ins> do <del>ya think?[/i]</del> <ins>you think?[/i]
        This is gross!

        Some newlines to.</ins> ", $result);
//        print $result;
    }

    public function testDeletesOnly()
    {
        $this->simpleDiff->htmlDiff($this->a, $this->b);
        $res = $this->simpleDiff->getOld();
        $this->assertEquals("[b]Some bbcode[/b]
        Shouldn't hurt <del>anybady
</del>        <del>[i]Waht</del> do <del>ya think?[/i]</del> ", $res);
    }

    public function testInsertsOnly()
    {
        $this->simpleDiff->htmlDiff($this->a, $this->b);
        $res = $this->simpleDiff->getNew();
        $this->assertEquals("[b]Some bbcode[/b]
        Shouldn't hurt <ins>anybody.
</ins>        <ins>[i]What</ins> do <ins>you think?[/i]
        This is gross!

        Some newlines to.</ins> ", $res);
    }

}
