@extends('layout')

@section('content')
<div class="column is-9">
    <section class="hero is-info welcome is-small">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Projects
                </h1>
                
            </div>
        </div>
    </section><br><br>
    <div class="columns">
        <div class="column">
            <table border="1" class="table is-fullwidth">
                <tr>
                    <th>Project Id</th>
                    <th>Name</th>
                    <th>Client</th>
                    <th>Developers</th>
                    <th>Action</th>
                </tr>

                <?php $i = 0 ; ?>
                @foreach ($projects as $project)
                <?php $i++ ; ?>
                <tr>
                    <td>{{ $project->id }}</td>  
                    <td>{{ $project->title }} </td>
                    <td>{{ $project->client_id }}</td>
                    <td> - </td> 
                    <td> 
                    <a class="button is-small is-info" href="{{route('projects.edit',$project->id)}}">Edit</a>
                    <a class="button is-small is-danger" href="{{route('projects.delete',$project->id)}}">Remove</a>
                        </td> 
                </tr> 
                @endforeach 
            </table>
        </div>
    </div>
</div>
@endsection