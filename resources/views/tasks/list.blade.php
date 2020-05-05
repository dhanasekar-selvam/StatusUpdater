@extends('layout')

@section('content')
<div class="column is-9">
    <section class="hero is-info welcome is-small">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Tasks
                </h1>
                
            </div>
        </div>
    </section><br><br>
    <div class="columns">
        <div class="column">
            <table border="1" class="table is-fullwidth">
				<tr>
					<td>Sno</td>
					<td>Task Title </td>
					<td>Status</td>
					<td>Assigned To</td>
					<td>Action</td>
				</tr>
				<?php $i = 0 ; ?>
				@foreach ($tasks as $task)
				<?php $i++ ; ?>
				<tr>
					<td>{{ $i }}</td>  
					<td>{{ $task->title }} </td>
					<td>{{ $task->status }}</td>
					<td> {{ $task->assigned_to_name }}</td> 
					<td> <a href="{{route('tasks.edit',$task->id)}}" class="btn btn-small btn-info">edit</a>
						<a href="{{route('tasks.delete',$task->id)}}" class="btn btn-small btn-danger">delete</a>
						</td> 
				</tr> 
				@endforeach 
            </table>
        </div>
    </div>
</div>
@endsection