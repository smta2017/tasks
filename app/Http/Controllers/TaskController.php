<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TaskController extends AppBaseController
{
    /** @var taskRepository $taskRepository*/
    private $taskRepository;

    public function __construct(TaskRepository $taskRepo)
    {
        $this->taskRepository = $taskRepo;
    }

    /**
     * Display a listing of the task.
     */
    public function index(Request $request)
    {
        $tasks = $this->taskRepository->paginate(10);
        
        return view('tasks.index')
            ->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new task.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created task in storage.
     */
    public function store(CreateTaskRequest $request)
    {
        $input = $request->all();

        $task = $this->taskRepository->create($input);

        Session::flash('success','task saved successfully.');

        return redirect(route('tasks.index'));
    }

    /**
     * Display the specified task.
     */
    public function show($id)
    {
        $task = $this->taskRepository->find($id);

        if (empty($task)) {
            Session::error('task not found');

            return redirect(route('tasks.index'));
        }

        return view('tasks.show')->with('task', $task);
    }

    /**
     * Show the form for editing the specified task.
     */
    public function edit($id)
    {
        $task = $this->taskRepository->find($id);

        if (empty($task)) {
            Session::error('task not found');

            return redirect(route('tasks.index'));
        }

        return view('tasks.edit')->with('task', $task);
    }

    /**
     * Update the specified task in storage.
     */
    public function update($id, UpdateTaskRequest $request)
    {
        $task = $this->taskRepository->find($id);

        if (empty($task)) {
            Session::flash('error','task not found');

            return redirect(route('tasks.index'));
        }

        $task = $this->taskRepository->update($request->all(), $id);

        Session::flash('success','task updated successfully.');

        return redirect(route('tasks.index'));
    }

    /**
     * Remove the specified task from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $task = $this->taskRepository->find($id);

        if (empty($task)) {
            Session::flash('error','task not found');

            return redirect(route('tasks.index'));
        }

        $this->taskRepository->delete($id);

        Session::flash('success', 'Success deleted.');

        return redirect(route('tasks.index'));
    }
}
