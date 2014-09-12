<?php

use Larabook\Statuses\PublishStatusCommand;
use Larabook\Statuses\StatusRepository;
use Larabook\Forms\PublishStatusForm;

class StatusesController extends \BaseController {


	protected $statusRepository;
	protected $publishStatusForm;

	function __construct(PublishStatusForm $publishStatusForm, StatusRepository $statusRepository){

		$this->publishStatusForm = $publishStatusForm;
		$this->statusRepository = $statusRepository;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(){
		
		$user = Auth::user();
		$statuses = $this->statusRepository->getFeedForUser($user);

		return View::make('statuses.index',compact('statuses'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$input = Input::get();
		$input['userId'] = Auth::id(); 

		$this->publishStatusForm->validate($input);

		//we can explicity pull throw an $input, have a look at CommanderTrait.php
		$this->execute(PublishStatusCommand::class, $input); 

		Flash::message('Your status has been updated!');

		return Redirect::back();
	}

}
