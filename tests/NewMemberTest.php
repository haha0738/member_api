<?php
use App\member;
class NewMemberTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testNewMember()
	{
		Session::start(); 
		$response = $this->action('POST', 'MemberController@store', [
			'pid' => null,
			'username' => 'haha0738',
			'password' => '123456',
			'status' => 0,
			'nickname' => '豆花',
			'credit' => 0,
			'_token' =>  csrf_token(), 
			]);
		$this->assertEquals(200, $response->getStatusCode());
	}
	public function testGetMembers()
	{
		$response = $this->action('GET', 'MemberController@index');;
		$this->assertEquals(200, $response->getStatusCode());
	}
	public function testUpdateMember()
	{
		Session::start(); 
		$member = member::where('username', '=', 'haha0738')->firstOrFail();
		$response = $this->action('PUT', 'MemberController@update', ['id' => $member->id, 'nickname' => 'test0001' ,'_token' =>  csrf_token()]);;
		$this->assertEquals(200, $response->getStatusCode());
	}

	public function testDeleteMember()
	{
		Session::start(); 
		$member = member::where('username', '=', 'haha0738')->firstOrFail();
		$response = $this->action('DELETE', 'MemberController@destroy', ['id' => $member->id, '_token' =>  csrf_token()]);;
		$this->assertEquals(200, $response->getStatusCode());
	}

}
