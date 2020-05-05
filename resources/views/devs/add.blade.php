@extends('layout')

@section('content')
 <div class="column is-9">
                <section class="hero is-info welcome is-small">
                    <div class="hero-body">
                        <div class="container">
                            <h1 class="title">
                                Add Dev
                            </h1>
                            
                        </div>
                    </div>
                </section><br><br>
                <div class="columns">
                    <div class="column">
                        <form action="{{route('devs.store')}}" method="POST"  class="box">
                            <div class="field">
                                <label for="name" class="label">Dev Name</label>
                                <div class="control has-icons-left">
                                <input type="text" placeholder="Enter Dev Name" 
                                id="name" name="name" 
                                value="{{$dev->name}}"
                                class="input" required>
                                <span class="icon is-small is-left">
                                    <i class="fas fa-tasks"></i>
                                </span>
                                </div>
                            </div>   
                            <div class="field">
                                <label for="email" class="label">Dev Email</label>
                                <div class="control has-icons-left">
                                <input type="text" placeholder="Enter Project Name" 
                                id="email" name="email" 
                                value="{{$dev->email}}" 
                                class="input" required>
                                <span class="icon is-small is-left">
                                    <i class="fas fa-tasks"></i>
                                </span>
                                </div>
                            </div>    
                            
                            <div class="field">
                                <button class="button is-success">
                                    Save Dev
                                </button>
                            </div>
                            <input type="hidden" name="id" value="{{$dev->id}}"> 
                             {{ csrf_field() }} 
                        </form>
                    </div>
                </div>
            </div>
@endsection