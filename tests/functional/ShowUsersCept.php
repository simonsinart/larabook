<?php 
$I = new FunctionalTester($scenario);
$I->am('a Larabook member');
$I->wantTo('review all users who are registred for larabook');

$I->haveAnAccount(['username' => 'Foo']);
$I->haveAnAccount(['username' => 'Bar']);

$I->amOnPage('/users');
$I->see('Foo');
$I->see('Bar');
