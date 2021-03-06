<?php namespace App\Http\Controllers;

class DashboardController extends BaseController {

	public function __construct()
	{
		$this->middleware('auth');

        parent::__construct();
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        $items = $this->auth->getUser()->userItems->sortByDesc('updated_at');

		return view('dashboard', array(
			'user' => $this->auth->getUser(),
            'items' => $items
		));
	}

}
