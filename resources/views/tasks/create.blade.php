@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card-header">Create task</div>

            <div class="card">
            @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            {!! Form::open(['route' => 'tasks.store']) !!}

            <div class="card-body">

                <div class="row">
                <div class="form-group col-sm-12">
                    {!! Form::label('title', 'Title:') !!}
                    {!! Form::text('title', null, ['class' => 'form-control', 'required']) !!}
                </div>

                <div class="form-group col-sm-12">
                    {!! Form::label('description', 'Description:') !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group col-sm-12">
                    {!! Form::label('created_by', 'Created By:') !!}
                    {!! Form::select('created_by', \App\Models\User::pluck('name', 'id')->toArray(), null, ['class' => 'form-control']) !!}                </div>
                </div>
                <div class="form-group col-sm-12">
                    {!! Form::label('assigned_to', 'Assigned To:') !!}
                    {!! Form::select('assigned_to', \App\Models\User::pluck('name', 'id')->toArray(), null, ['class' => 'form-control']) !!}                </div>
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('tasks.index') }}" class="btn btn-default"> Cancel </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
