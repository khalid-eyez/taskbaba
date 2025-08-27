@extends('layouts.taskbox')
@section('content')
    <div class="form-element-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="container" style="color: #00c292">
                        <h4>
                            <i class="fa fa-plus"></i>
                            Add Task
                        </h4>
                    </div>
                    <div class="form-element-list">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <form action="{{ route('tasks.store') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <div class="nk-int-st">
                                            <input
                                                type="text"
                                                class="form-control"
                                                placeholder="Task Title"
                                                name="title"
                                                value="{{ old('title') }}"
                                                style="@error('title') border-bottom: 1px solid red; @enderror"
                                            />
                                            @error('title')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="nk-int-st">
                                            <textarea
                                                class="form-control"
                                                rows="5"
                                                placeholder="Task Description..."
                                                name="description"
                                                style="@error('description') border-bottom: 1px solid red; @enderror"
                                            >
{{ old('description') }}</textarea
                                            >
                                            @error('description')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="nk-int-st mt-3" style="margin-top: 18px">
                                        <button
                                            type="submit"
                                            class="btn btn-md m-1"
                                            style="background-color: #00c292; color: white; float: right"
                                        >
                                            <i class="fa fa-plus"></i>
                                            Add Task
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
