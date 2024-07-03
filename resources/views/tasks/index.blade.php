@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tasks <a class="btn btn-primary float-right" href="{{ route('tasks.create') }}">
                        Add New
                    </a></div>

                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif

                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table" id="tasks-table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Created By</th>
                                        <th>Assigned To</th>

                                        <th colspan="3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tasks as $task)
                                    <tr>
                                        <td>{{ $task->id }}</td>
                                        <td>{{ $task->title }}</td>
                                        <td>{{ strlen($task->description) > 512 ? substr($task->description, 0, 512) . '...' : $task->description }}</td>
                                        <td>{{ $task->creator->name }}</td>
                                        <td>{{ $task->assigned->name }}</td>
                                        <td style="width: 120px">
                                            {!! Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
                                            <div class='btn-group'>
                                                <a href="{{ route('tasks.show', [$task->id]) }}" class='btn btn-info btn-xs'>
                                                    <i class="far fa-eye">View</i>
                                                </a>
                                                <a href="{{ route('tasks.edit', [$task->id]) }}" class='btn btn-success btn-xs'>
                                                    <i class="far fa-edit">Edit</i>
                                                </a>
                                                {!! Form::button('<i class="far fa-trash-alt">Delete</i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                            </div>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="card-footer clearfix">
                            <div class="float-right">
                                <nav aria-label="Page navigation">
                                    <nav aria-label="Page navigation">
                                        <ul class="pagination">
                                            @if ($tasks->onFirstPage())
                                            <li class="page-item disabled">
                                                <span class="page-link">&laquo;</span>
                                            </li>
                                            @else
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $tasks->previousPageUrl() }}" rel="prev">&laquo;</a>
                                            </li>
                                            @endif

                                            @foreach ($tasks as $task)
                                            @if (is_int($task))
                                            <li class="page-item {{ $task == $tasks->currentPage() ? 'active' : '' }}">
                                                <a class="page-link" href="{{ $tasks->url($task) }}">{{ $task }}</a>
                                            </li>
                                            @elseif (is_string($task))
                                            <li class="page-item disabled"><span class="page-link">{{ $task }}</span></li>
                                            @endif
                                            @endforeach

                                            @if ($tasks->hasMorePages())
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $tasks->nextPageUrl() }}" rel="next">&raquo;</a>
                                            </li>
                                            @else
                                            <li class="page-item disabled">
                                                <span class="page-link">&raquo;</span>
                                            </li>
                                            @endif
                                        </ul>
                                    </nav>
                                </nav>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection