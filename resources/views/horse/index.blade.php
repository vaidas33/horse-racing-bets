
@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Horse list</div>

               <div class="card-body">

                <ul class="list-group">
                 
                  @foreach ($horses as $horse)

                   <li class="list-group-item list-line">
                    <div class="list-line__horse">
                        <div class="list-line__horse__title">
                            {{$horse->name}} 
                            <div>
                                Runs: {{$horse->runs}}
                                Wins: {{$horse->wins}}
                            </div>
                        </div>
                        <div class="list-line__horse__horse">
                            {!!$horse->about!!}
                        </div>
                    </div> 

                    <div class="list-line__buttons">
                        <a href="{{route('horse.edit',[$horse])}}"  class="btn btn-info">EDIT</a> 
                        <form method="POST" action="{{route('horse.destroy', [$horse])}}">
                        @csrf
                        <button  class="btn btn-danger" type="submit">DELETE</button>
                        </form>
                    </div>
                    </li>

                  @endforeach

                </ul>

               </div>
           </div>
       </div>
   </div>
</div>
@endsection