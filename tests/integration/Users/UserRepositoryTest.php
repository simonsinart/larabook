<?php

use Larabook\Users\UserRepository;
use Laracasts\TestDummy\Factory as TestDummy;


class UserRepositoryTest extends \Codeception\TestCase\Test
{
   /**
    * @var \IntegrationTester
    */
    protected $tester;

    protected $repo;

    protected function _before()
    {
        $this->repo = new UserRepository();

        $this->tester->grabService('Larabook\Users\UserRepository');
    }

    /** @test */
    public function it_paginates_all_users(){

        TestDummy::times(4)->create('Larabook\Users\User');

        $results = $this->repo->getPaginated(2);

        $this->assertCount(2,$results);
    }

    /** @tests */
    public function it_finds_a_user_with_statuses_by_their_username(){
        
        //given - arrange
        //this method creates users also
        $statuses = TestDummy::times(3)->create('Larabook\Statuses\Status');
        $username = $statuses[0]->user->username;

        //when - act
        $user = $this->repo->findByUsername($username);

        //then - assert

        $this->assertEquals($username, $user->username);
        $this->assertCount(3, $user->statuses);

    }

    /** @tests */
    public function it_follows_another_user(){

        // given I have two users
        // an array of using object that was created
        list($john, $susan) = TestDummy::times(2)->create('Larabook\Users\User');

        //and one user follows another user
        $this->repo->follow($susan->id, $john);

        //then i should see that use in the list of those that $users[0] follows...
        $this->assertTrue($john->followedUsers->contains($susan->id));

        $this->tester->seeRecord('follows', [
            'follower_id' => $john->id,
            'followed_id' => $susan->id
        ]);

    }

        /** @tests */
    public function it_unfollows_another_user(){

        // given I have two users
        // an array of using object that was created
        $users = TestDummy::times(2)->create('Larabook\Users\User');

        //and one user follows another user
        $this->repo->follow($users[1]->id, $users[0]);

        //when I unfollow the same user
        $this->repo->unfollow($users[1]->id, $users[0]);

        // then I should NOT see that user in the list of those that $users[0] follows...
        $this->tester->dontSeeRecord('follows', [
            'follower_id' => $users[0]->id,
            'followed_id' => $users[1]->id
        ]);

    }

}