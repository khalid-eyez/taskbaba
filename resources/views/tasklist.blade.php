@extends('layouts.taskbox')
@section('content')
    <div class="realtime-statistic-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="add-todo-list notika-shadow mg-t-5">
                        <div class="card-box">
                            <div class="todoapp">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="realtime-ctn">
                                            <div class="realtime-title">
                                                <h2>
                                                    My Tasks
                                                    <span class="badge" style="background-color: #5cb85c; color: white">
                                                        {{ $tasks->count() }}
                                                    </span>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="notika-todo-btn">
                                            <a
                                                href="{{ route('tasks.create') }}"
                                                class="pull-right btn btn-primary btn-sm"
                                            >
                                                <i class="fa fa-plus"></i>
                                                Add Task
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="notika-todo-scrollbar">
                                    <div class="row mg-t-20" style="font-weight: bold">
                                        <div class="col-sm-3">Title</div>
                                        <div class="col-sm-5">Description</div>
                                        <div class="col-sm-1">Status</div>
                                        <div class="col-sm-2">Date & Time</div>
                                        <div class="col-sm-1"></div>
                                    </div>
                                    @if ($tasks->isEmpty())
                                        <div
                                            class="card-body"
                                            style="
                                                text-align: center;
                                                font-size: 20px;
                                                color: #ccc;
                                                padding: 20px;
                                                border-top: solid 0.5px #eeececff;
                                            "
                                        >
                                            Add Tasks Here
                                        </div>
                                    @endif

                                    @foreach ($tasks as $task)
                                        <div class="row mg-t-20" style="border-bottom: 1px solid #f1f0f0ff">
                                            <div class="col-sm-3" style="font-weight: bold; color: green">
                                                {{ $loop->iteration }}. {{ $task->title }}
                                            </div>
                                            <div class="col-sm-5">{{ $task->description }}</div>
                                            <div class="col-sm-1">
                                                @if ($task->status == 'complete')
                                                    <span class="badge" style="background-color: #5cb85c">done</span>
                                                @else
                                                    <span class="badge" style="background-color: #d9534f">open</span>
                                                @endif
                                            </div>
                                            <div class="col-sm-2">
                                                {{ $task->created_at }}
                                            </div>
                                            <div class="col-sm-1">
                                                <a
                                                    href=""
                                                    class="status"
                                                    id="{{ $task->id }}"
                                                    data-toggle="tooltip"
                                                    data-title="Mark as finished"
                                                >
                                                    <i class="fa fa-check"></i>
                                                </a>
                                                <a
                                                    href="{{ route('tasks.edit', $task) }}"
                                                    data-toggle="tooltip"
                                                    data-title="Edit task"
                                                >
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a
                                                    href=""
                                                    class="custom-tooltip task"
                                                    id="{{ $task->id }}"
                                                    data-toggle="tooltip"
                                                    data-title="Delete task"
                                                >
                                                    <i class="fa fa-trash text-danger"></i>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Realtime sts area-->
    <!-- Start Footer area-->
@endsection
