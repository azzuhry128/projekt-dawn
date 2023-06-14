<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function getAllTask(Request $request)
    {
        $method = $request->input('method');
        $user_id = $request->input('user_id');

        if ($method == 'get') {
            //TODO make function that return tasks stored in local-storage for guest and server for logged-in user
        } else {
            $request->merge(["request status" => "rejected"]);
        }

        return response($request);
    }

    public function createNewTask(Request $request)
    {
        //TODO create new task with task id generated from utc and user_id as foreign key
        $method = $request->input('method');
        $user_id = $request->input('user_id');

        if ($method == 'post') {

            $task = new Task;
            $task_id = strval(round(microtime(true) * 1000));

            $task->task_id = $task_id;
            $task->user_id = $user_id;
            $task->title = $request->input("title");
            $task->priority = $request->input("priority");
            $task->status = $request->input("status");
            $task->save();

            $request->merge(["task_id" => $task_id, "request status" => "success"]);
        } else {
            $request->merge(["request status" => "failed"]);
        }

        return response($request);
    }

    public function deleteTask(Request $request)
    {
        //TODO delete task based on method retrieved from request object

        $method = $request->input('method');

        $user_id = $request->input('user_id');
        $task_id = $request->input('task_id');

        if ($method == 'delete') {
            # code...
            Task::where('task_id', $task_id)->where('user_id', $user_id)->delete();

            $request->merge(["task_status" => "deleted"]);
        }

        return $request;
    }
    public function updateTask(Request $request)
    {
        //TODO update task based on user input "task"
        $method = $request->input('method');

        $user_id = $request->input('user_id');
        $task_id = $request->input('task_id');
        $title = $request->input('title');


        if ($method == "update") {
            Task::where('task_id', $user_id)->where('user_id', $task_id)->update(['title' => $title]);
        }

        $request->merge(["task_status" => "updated"]);
        return $request;
    }
}