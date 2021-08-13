<?php

namespace tests\unit\models;


use app\models\User;

use Yii;

class UserTest extends \Codeception\Test\Unit
{
    // public function testFindUserById()
    // {
    //     expect_that($user = User::findIdentity(100));
    //     expect($user->username)->equals('admin');

    //     expect_not(User::findIdentity(999));
    // }

    // /**
    //  * @depends testFindUserByUsername
    //  */
    // public function testValidateUser($user)
    // {
    //     $user = User::findByUsername('admin');
    //     expect_that($user->validateAuthKey('test100key'));
    //     expect_not($user->validateAuthKey('test102key'));

    //     expect_that($user->validatePassword('admin'));
    //     expect_not($user->validatePassword('123456'));        
    // }

    public function testFindIdentity()
    {
        expect_that($user = User::findIdentity(1));
        expect($user->id)->equals(1);
    }

    public function testFindIdentityByAccessToken()
    {
        expect_that($user = User::findIdentityByAccessToken('sO2kZwOtjgt_10gpoGdd8jbCGYkTms-p'));
        expect($user->username)->equals('kushal');

        expect_not(User::findIdentityByAccessToken('non-existing'));
    }

    public function testFindUserByUsername()
    {
        expect_that($user = User::findByUsername('kushal'));
        expect_not(User::findByUsername('not-kushal'));
    }

    public function testValidatePassword()
    {
        $password = Yii::$app->security->generatePasswordHash('kushal10');

        $user = User::findByUsername('kushal');

        expect($user->validatePassword($password))->equals(false);
        // expect_that($user = User::validatePassword($password,'$2y$13$IGcKubXIi5Qq/uiLMM8HmeICsBAYVCgdk3G3Hep29tPtBSJojoN1K'));
    }
}
