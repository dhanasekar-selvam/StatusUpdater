@extends('layout')

@section('content')
<div class="column is-9">
    <section class="hero is-info welcome is-small">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Add Client
                </h1>
                
            </div>
        </div>
    </section><br><br>
    <div class="columns">
        <div class="column">
            <form action="{{route('clients.store')}}" method="POST" class="box">
                <div class="field">
                    <label for="name" class="label">Client Name</label>
                    <div class="control has-icons-left">
                    <input type="text" placeholder="Enter Client's Name" 
                    id="name" class="input" 
                    value="{{$client->name}}"
                    name="name" required>
                    <span class="icon is-small is-left">
                    <i class="fas fa-user-circle"></i>
                    </span>
                    </div>
                </div>
                <div class="field">
                    <label for="email" class="label">Email ID</label>
                    <div class="control has-icons-left">
                    <input type="email" placeholder="Enter Email"
                     id="email" 
                     value="{{$client->email}}"
                     name="email" class="input" required>
                    <span class="icon is-small is-left">
                        <i class="fa fa-envelope"></i>
                    </span>
                    </div>
                </div>    
                
                <div class="field">
                    <button class="button is-success">
                        Save Client
                    </button>
                </div>
                <input type="hidden" name="id" value="{{$client->id}}"> 
                {{ csrf_field() }} 
            </form>
            
        </div>
    </div>
</div>
@endsection