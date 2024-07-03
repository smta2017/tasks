@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Post Details</div>

                <div class="card-body">
<!-- Id Field -->
<div class="col-sm-12">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $task->id }}</p>
</div>

<!-- Title Field -->
<div class="col-sm-12">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $task->title }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $task->description }}</p>
</div>
 
<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('created_by', 'User Id:') !!}
    <p>{{ $task->created_by }}</p>
</div>
 
<!-- User Id Field -->
<div class="col-sm-12">
    {!! Form::label('assigned_to', 'User Id:') !!}
    <p>{{ $task->assigned_to }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $task->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $task->updated_at }}</p>
</div>

                </div>
            </div>
        </div>
    </div>
</div>



@endsection
