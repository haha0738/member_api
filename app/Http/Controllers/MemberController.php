<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\member;
use App\member_profiles;
use App\member_credits;
use App\member_percents;
use Request;
use Session;
class MemberController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		Session::start(); 
		$members = member::all();
		$members->load('profile', 'credit', 'percent');
		return response()->json($members);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$member = member::create([
			'pid'      => Request::input('pid'),
			'username' => Request::input('username'),
			'password' => md5(Request::input('password')),
			'status'   => Request::input('status'),
			]);

		member_profiles::create([
			'uid'      => $member->id,
			'nickname' => Request::input('nickname'),
			]);
		member_credits::create([
			'uid'    => $member->id,
			'credit' => Request::input('credit'),
			]);
		member_percents::create([
			'uid' => $member->id,
			]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$member = member::find($id);
		if (!$member) 
		{
			return response()->json(['status' => 404], 404);	
		}
		$member->load('profile', 'credit', 'percent');
		return response()->json($member);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$member = member::find($id);
		if (!$member) 
		{
			return response()->json(['status' => 404], 404);	
		}

		if (Request::has('pid')) 
		{
			$member->pid = Request::input('pid');
		}

		if (Request::has('username')) 
		{
			$member->username = Request::input('username');
		}

		if (Request::has('password')) 
		{
			$member->password = md5(Request::input('password'));
		}

		if (Request::has('status')) 
		{
			$member->status = Request::input('status');
		}


		if (Request::has('nickname')) 
		{
			$member->profile->nickname = Request::input('nickname');
		}

		if (Request::has('credit')) 
		{
			$member->credit->credit = Request::input('credit');
		}

		$member->save();
		$member->profile->save();
		$member->credit->save();
		$member->percent->save();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$member = member::find($id);
		if (!$member) 
		{
			return response()->json(['status' => 404], 404);	
		}
		$member->profile->delete();
		$member->credit->delete();
		$member->percent->delete();
		$member->delete();
		return response()->json(['status' => 200]);
	}

}

