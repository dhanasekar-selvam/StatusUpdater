@extends('layout')

@section('content')
<div class="column is-9">
    <section class="hero is-info welcome is-small">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Devs
                </h1>
                
            </div>
        </div>
    </section><br><br>
    <div class="columns">
        <div class="column">
            <table border="1" class="table is-fullwidth">
                <tr>
                    <th>Dev Id</th>
                    <th>Name</th>
                    <th>Email Id</th>
                    <th>Remove</th>
                </tr>

                <?php $i = 0 ; ?>
                @foreach ($devs as $dev)
                <?php $i++ ; ?>
                <tr>
                    <td>{{ $dev->id }}</td>  
                    <td>{{ $dev->name }} </td>
                    <td>{{ $dev->email }}</td>
                    <td> 
                    <a class="button is-small is-info" href="{{route('devs.edit',$dev->id)}}">Edit</a>
                    <a class="button is-small is-danger" href="{{route('devs.delete',$dev->id)}}">Remove</a>
                        </td> 
                </tr> 
                @endforeach 
            </table>
        </div>
    </div>
</div>
@endsection