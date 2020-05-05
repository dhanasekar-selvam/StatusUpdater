@extends('layout')

@section('content')
<div class="column is-9">
    <section class="hero is-info welcome is-small">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Clients
                </h1>
                
            </div>
        </div>
    </section><br><br>
    <div class="columns">
        <div class="column">
            <table border="1" class="table is-fullwidth">
                <tr>
                    <th>Client Id</th>
                    <th>Name</th>
                    <th>Email Id</th>
                    <th>No Of Projects</th>
                    <th>Remove</th>
                </tr>

                <?php $i = 0 ; ?>
                    @foreach ($clients as $client)
                    <?php $i++ ; ?>
					<tr>
						<td>{{ $i }}</td>  
						<td>{{ $client->name }} </td>
						<td>{{ $client->email }}</td>
						<td> - </td> 
						<td> 
                        <a class="button is-small is-info" href="{{route('clients.edit',$client->id)}}">Edit</a>
                        <a class="button is-small is-danger" href="{{route('clients.delete',$client->id)}}">Remove</a>
							</td> 
					</tr> 
					@endforeach 
            </table>
        </div>
    </div>
</div>
@endsection