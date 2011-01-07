<?php

function test_invalid_expression_001($harness)
{
	$harness->expectFailure(1);
	$harness->addWrappedData('<tpl:output value="{$x" />');
}

function test_invalid_expression_002($harness)
{
	$harness->expectFailure(1);
	$harness->addWrappedData('<tpl:output value="{$}" />');
}

function test_invalid_expression_003($harness)
{
	$harness->expectFailure(1);
	$harness->addWrappedData('<tpl:output value="{$x[}" />');
}

function test_invalid_expression_004($harness)
{
	$harness->expectFailure(1);
	$harness->addWrappedData('<tpl:output value="{$x[abc}" />');
}

function test_invalid_expression_005($harness)
{
	$harness->expectFailure(1);
	$harness->addWrappedData('<tpl:output value="{$x.}" />');
}

function test_invalid_expression_006($harness)
{
	// Just to make sure this isn't considered invalid too, which means the past ones are broken.
	$harness->addWrappedData('<tpl:output value="{$x.a}" />');
}

function test_invalid_expression_007($harness)
{
	$harness->expectFailure(1);
	$harness->addWrappedData('<tpl:output value="{" />');
}

function test_invalid_expression_008($harness)
{
	$harness->expectFailure(1);
	$harness->addWrappedData('<tpl:output value="{#}" />');
}

function test_invalid_expression_009($harness)
{
	$harness->addWrappedData('<tpl:output value="{#lang}" />');
}

function test_invalid_expression_010($harness)
{
	$harness->expectFailure(1);
	$harness->addWrappedData('<tpl:output value="{#lang:$}" />');
}

function test_invalid_expression_011($harness)
{
	$harness->expectFailure(1);
	$harness->addWrappedData('<tpl:output value="{#:}" />');
}

function test_expression_001($harness)
{
	$harness->addWrappedData('<tpl:output value="{$x}" />');
}

function test_expression_002($harness)
{
	$harness->addWrappedData('<tpl:output value="{$x.1}" />');
}

function test_expression_003($harness)
{
	$harness->addWrappedData('<tpl:output value="{$x.y}" />');
}

function test_expression_004($harness)
{
	$harness->addWrappedData('<tpl:output value="{$x.z.1}" />');
}

function test_expression_005($harness)
{
	$harness->addWrappedData('<tpl:output value="{$x.1.z}" />');
}

function test_expression_006($harness)
{
	$harness->addWrappedData('<tpl:output value="{$x[1]}" />');
}

function test_expression_007($harness)
{
	$harness->addWrappedData('<tpl:output value="{$x[1].z}" />');
}

function test_expression_008($harness)
{
	$harness->addWrappedData('<tpl:output value="{$x.1[3]}" />');
}

function test_expression_009($harness)
{
	$harness->addWrappedData('<tpl:output value="{$x.1[3].z}" />');
}

function test_expression_010($harness)
{
	$harness->addWrappedData('<tpl:output value="{#lang}" />');
}

function test_expression_011($harness)
{
	$harness->addWrappedData('<tpl:output value="{#lang:$x.1[3].z}" />');
}

function test_expression_012($harness)
{
	$harness->addWrappedData('<tpl:output value="{#lang:$x.1[3].z:$x.1[3].z:$x.1[3].z:$x.1[3].z}" />');
}

function test_expression_013($harness)
{
	$harness->addWrappedData('<tpl:output value="{$x.1[3].$z}" />');
}

function test_expression_014($harness)
{
	$harness->addWrappedData('<tpl:output value="{#lang:$x.1[3].$z}" />');
}

function test_expression_015($harness)
{
	$harness->expectFailure(1);
	$harness->addWrappedData('<tpl:output value="{test}" />');
}

function test_expression_016($harness)
{
	$harness->expectFailure(1);
	$harness->addWrappedData('<tpl:output value="{tpl:output /}" />');
}

function test_expression_017($harness)
{
	$harness->expectFailure(1);
	$harness->addWrappedData('<tpl:output value="xyz();" />');
}

function test_expression_018($harness)
{
	$harness->addWrappedData('<tpl:output value="xyz()" />');
}

function test_expression_019($harness)
{
	$harness->addWrappedData('<my:test x="asdf{$x}ysdf" />');
}

function test_expression_020($harness)
{
	$harness->expectFailure(1);
	$harness->addWrappedData('<my:test x="asdf{$x.}ysdf" />');
}

function test_expression_021($harness)
{
	$harness->expectFailure(1);
	$harness->addWrappedData('<tpl:foreach from="{#lang}" as="{#as}"></tpl:foreach>');
}

function test_expression_022($harness)
{
	$harness->addWrappedData('<my:test x="asdf{ToxgTestHarness::TEST}ysdf" />');
}

function test_expression_023($harness)
{
	$harness->expectFailure(1);
	$harness->addWrappedData('<tpl:set var="{$x}" value="{ToxgTestHarness} . ToxgTestHarness::TEST " />');
}

?>