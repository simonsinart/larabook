<?php 
$I = new FunctionalTester($scenario);

$I->am('a larabook member');
$I->wantTo('follow other Larabook users.');

//setup
$I->haveAnAccount(['username' => 'OtherUser']);
$I->signIn();

//actions
$I->click('Browse users');
$I->click('OtherUser');

$I->seeCurrentUrlEquals('/@OtherUser');
$I->click('Follow OtherUser');
$I->seeCurrentUrlEquals('/@OtherUser');

$I->see('Unfollow OtherUser');

$I->click('Unfollow OtherUser');
$I->seeCurrentUrlEquals('/@OtherUser');

$I->see('Follow OtherUser');

//expectations


