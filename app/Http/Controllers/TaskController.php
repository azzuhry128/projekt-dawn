<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function createNewTask(Request $request)
    {
        $userIDForCreateReq = $request->input('user_id');

        if ($request->input('order') == 'create') {

            $task = new Task;
            $task_id = strval(round(microtime(true) * 1000));

            $task->task_id = $task_id;
            $task->user_id = $userIDForCreateReq;
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
        $userIDForDeleteReq = $request->input('user_id');
        $taskIDForDeleteReq = $request->input('task_id');

        $order = "delete";
        $request->merge(["order" => $order]);

        if ($request->input('order') == 'delete') {
            # code...
            Task::where('task_id', $taskIDForDeleteReq)->where('user_id', $userIDForDeleteReq)->delete();

            $request->merge(["task_status" => "deleted"]);
        }

        return $request;
    }
    public function updateTask(Request $request)
    {

        $userIDForUpdateReq = $request->input('user_id');
        $taskIDForUpdateReq = $request->input('task_id');

        $updatedTitle = $request->input("title");

        $order = "update";
        $request->merge(["order" => $order]);
        if ($request->input("order") == "update") {
            Task::where('task_id', $taskIDForUpdateReq)->where('user_id', $userIDForUpdateReq)->update(['title' => $updatedTitle]);
        }

        $request->merge(["task_status" => "updated"]);
        return $request;
    }
}