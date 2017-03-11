<?php

class TaskController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(){
          $tasks = Task::all();
          return Response::json(compact('tasks'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(){
	  $data = Input::get('task');
          $task = Task::create($data);
          return Response::json(compact('task'));
	}
        
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id){
          $data = Input::get('task');
	  $task = Task::find($id);
          if($task){
             $task->update($data);     
          }
          return Response::json(compact('task'));
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id){
          Task::destroy($id);
          return Response::json(null, 204);
	}


}
