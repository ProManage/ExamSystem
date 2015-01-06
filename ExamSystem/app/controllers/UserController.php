<?php

class UserController extends \BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
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
        $data = Input::only(['username', 'email', 'password']);
        $data['password'] = Hash::make($data['password']);
        $newUser = User::create($data);
        if ($newUser) {
            Auth::login($newUser);
            return Redirect::intended('/');
        }
        return Redirect::route('user.create')->withInput();
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::find($id);
		if (Request::ajax())
			return $user;
        else
            return View::make('user.showinfo',[
                'user' => $user
            ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $data = Input::only(['email']);
		$user = User::find($id) -> first();
		$user -> email = $data['email'];
		$user -> save();
        return Redirect::route('users.show', array($user->id));;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function login()
    {
        if (Auth::attempt(Input::only('username', 'password'))) {
            return Redirect::intended('/');
        } else {
            return Redirect::back()
                ->withInput()
                ->with('error', "Invalid credentials");
        }
    }
    public function logout()
    {
        Auth::logout();
        return Redirect::to('/')
            ->with('message', 'You are now logged out');
    }

}
