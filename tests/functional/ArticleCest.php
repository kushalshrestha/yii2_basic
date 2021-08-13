<?php

class ArticleCest
{
    public function _before(FunctionalTester $I)
    {
       $I->amOnPage(['article/index']) ;
    }

    public function _after(FunctionalTester $I)
    {
       
    }

    // tests
    public function tryToTest(FunctionalTester $I)
    {
        $I->submitForm('#contact-form', []);
        $I->expectTo('see validations errors');
        $I->see('Contact', 'h1');
        $I->see('Name cannot be blank');
        $I->see('Email cannot be blank');
        $I->see('Subject cannot be blank');
        $I->see('Body cannot be blank');
    }
}
