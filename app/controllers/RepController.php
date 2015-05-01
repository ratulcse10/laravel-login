<?php

class RepController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /reps
	 *
	 * @return Response
	 */
	public function index()
	{

		//return Rep::all();
		return View::make('reps.index')
					->with('reps',Rep::all())
					->with('title',"VIP Reps");
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /reps/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('reps.create')
					->with('title','Create VIP Rep');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /reps
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = [
					'name'      => 'required',
					'address'   => 'required',
					'email'     => 'required|email|unique:users',
					'password'  => 'required',
					'city'      => 'required',
					'state'     => 'required',
					'zip'       => 'required',
					'phone' => 'required'

		];

		$data = Input::all();

		$validator = Validator::make($data,$rules);

		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$user = new User();

		$user->email = $data['email'];
		$user->password = Hash::make($data['password']);

		if($user->save()){
			$rep = new Rep();
			$rep->user_id = $user->id;
			$rep->name = $data['name'];
			$rep->address = $data['address'];
			$rep->city = $data['city'];
			$rep->state = $data['state'];
			$rep->zip = $data['zip'];
			$rep->phone = $data['phone'];


			if($rep->save()){
				return Redirect::route('rep.index')->with('success',"VIP Rep Created Successfully");
			}else{
				return Redirect::route('rep.index')->with('error',"Something went wrong.Try again");
			}

		}else{
			return Redirect::route('rep.index')->with('error',"Something went wrong.Try again");
		}
	}

	/**
	 * Display the specified resource.
	 * GET /reps/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /reps/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		try{
			$rep = Rep::findOrFail($id);
			return View::make('reps.edit')
						->with('rep',$rep)
						->with('title','Edit VIP Rep');
		}catch (Exception $ex){
			return Redirect::route('rep.index')->with('error',"Something went wrong.Try again");
		}

	}

	/**
	 * Update the specified resource in storage.
	 * PUT /reps/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = [

					'name'      => 'required',
					'address'   => 'required',
					'city'      => 'required',
					'state'     => 'required',
					'zip'       => 'required',
					'phone' => 'required'
		];

		$data = Input::all();

		$validator = Validator::make($data,$rules);

		if($validator->fails()){
			return Redirect::back()->withInput()->withErrors($validator);
		}

		$rep = Rep::find($id);
		$rep->name = $data['name'];
		$rep->address = $data['address'];
		$rep->city = $data['city'];
		$rep->state = $data['state'];
		$rep->zip = $data['zip'];
		$rep->phone = $data['phone'];

		if($rep->save()){
			return Redirect::route('rep.index')->with('success',"VIP Rep Updated Successfully");
		}else{
			return Redirect::route('rep.index')->with('error',"Something went wrong.Try again");
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /reps/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$rep = Rep::find($id);
		if(User::destroy($rep->user_id)){
			return Redirect::route('rep.index')->with('success',"VIP Rep deleted Successfully.");
		}else{
			return Redirect::route('rep.index')->with('error',"Something went wrong.Try again");
		}
	}

}