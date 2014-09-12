<?php 
$I = new FunctionalTester($scenario);
$I->am('a guest');
$I->wantTo('sign up for Larabook account');

$I->amOnPage('/');
$I->click('Sign up');
$I->seeCurrentUrlEquals('/register');

$I->fillField('username','John Dee');
$I->fillField('email','john@example.com');
$I->fillField('password','demo');
$I->fillField('password_confirmation','demo');

$I->click('Sign up');

$I->seeCurrentUrlEquals('');
$I->see('Welcome to Larabook');

//pregledamo ali je sploh kaj v tabeli

$I->seeRecord('users', [
	'username' => 'John Dee'
]);

$I->assertTrue(Auth::check());
