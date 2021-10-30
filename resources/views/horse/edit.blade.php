@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Edit horse</div>

               <div class="card-body">
                 

                  <form method="POST" action="{{route('horse.update',[$horse->id])}}">


                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" class="form-control" name="horse_name" value="{{old('horse_name',$horse->name)}}">
                        <small class="form-text text-muted">Please enter new horse name.</small>
                    </div>
                    <div class="form-group">
                        <label>Runs:</label>
                        <input type="text" class="form-control" name="horse_runs" value="{{old('horse_runs',$horse->runs)}}">
                        <small class="form-text text-muted">Please enter new horse runs.</small>
                    </div>
                    <div class="form-group">
                        <label>Wins:</label>
                        <input type="text" class="form-control" name="horse_wins" value="{{old('horse_wins',$horse->wins)}}">
                        <small class="form-text text-muted">Please enter new horse wins.</small>
                    </div>

                    <div class="form-group">
                        <label>About:</label>
                        <textarea id="summernote" name="horse_about" value="{{old('horse_about',$horse->about)}}"></textarea>
                        <small class="form-text text-muted">About this horse.</small>
                    </div>

                     @csrf
                     <button type="submit" class="btn btn-primary">EDIT</button>
                  </form>

               </div>
           </div>
       </div>
   </div>
</div>

<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        $('#summernote').summernote();
    });
</script>

@endsection
