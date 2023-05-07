<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function createNewTask(Request $request)
    {
        $userIDForCreateReq = $request->input('user_id');

        if ($request->input('order') == 'create') {
            $task = new \App\Models\Task;
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
        $userIDForDeleteReq = $request->input('id');
        $itemIDForDeleteReq = $request->input('item_id');

        $order = "delete";
        $request->merge(["order" => $order]);

        if ($request->input('order') == 'delete') {
            # code...
            Account::where('id', $userIDForDeleteReq)->where('item_id', $itemIDForDeleteReq)->delete();
        }

        return $request;
    }
    public function updateTask(Request $request)
    {
        $order = "update";

        $request->merge(["order" => $order]);
        return $request;
    }
}