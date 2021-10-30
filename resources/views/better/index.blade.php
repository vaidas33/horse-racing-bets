@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">
               <h2>Better list</h2>


               <div class="make-inline">
                    <form action={{route('better.index')}} method="get" class="make-inline">
                    
                        <div class="form-group make-inline">
                            <label>Horse:</label>
                            <select class="form-control" name="horse_id">
                             <option value="0" disabled @if($filterBy == 0) selected @endif>
                             Select Horse 
                             </option>
                                @foreach ($horses as $horse)
                                    <option value="{{$horse->id}}" @if($filterBy == $horse->id) selected @endif>
                                        {{$horse->name}} 
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        
                        <label class="form-check-label" for="sortASC">Sort by bet: </label>
                        <label class="form-check-label" for="sortASC">ASC</label>
                        <div class="form-group make-inline column">
                            <input type="radio" name="sort" value="asc" class="form-check-input" id="sortASC" @if($sortBy == 'asc') checked @endif>
                        </div>

                        <label class="form-check-label" for="sortDESC">DESC</label>
                        <div class="form-group make-inline column">
                            <input type="radio" name="sort" value="desc" class="form-check-input" id="sortDESC" @if($sortBy == 'desc') checked @endif>
                        </div>

                    <button type="submit" class="btn btn-info">Filter</button>
                    </form>
                
                    <a href="{{route('better.index')}}" class="btn btn-info">Clear Filter</a>
                </div>
               
               </div>

               <div class="card-body">

                <ul class="list-group">
                 
                  @foreach ($betters as $better)

                   <li class="list-group-item list-line">
                    <div class="list-line__better">
                        <div class="list-line__better__title">
                            {{$better->name}} {{$better->surname}}
                            <div>Bet: {{$better->bet}}</div>
                        </div>
                        <div class="list-line__better__horse">
                            Horse: {{$better->betterHorse->name}} 
                        </div>
                    </div>

                    <div class="list-line__buttons">
                        <a href="{{route('better.edit',[$better])}}"  class="btn btn-info">EDIT</a> 
                        <form method="POST" action="{{route('better.destroy', [$better])}}">
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
