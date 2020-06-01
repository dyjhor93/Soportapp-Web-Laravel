@extends('layouts.app')
@section('sidebar')
<style>


.img {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

.img:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>
@endsection
@section('content')
<!-- The Modal -->
<div id="myModal" class="modal" style="overflow: scroll;">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01" height: auto;>
  <div id="caption"></div>
</div>
        <div class="flex-center position-ref full-height">
            

            <div class="content">
            <div class="title m-b-md">
                    SoportApp
                </div>
            @auth
            
                <form method="post" action="{{ action('OrderServiceController@search') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="input-group mb-3">
                <input name="nic" id="nic" type="number" class="form-control" placeholder="Search Nic/OS" aria-label="Nic" aria-describedby="button-addon2" required>
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search  &#128269;</button>
                </div>
                </div>
                </form>
                @if(isset($images))
                
                <div class="sliderr">
			        <ul>
                        @foreach($images as $image)
                        <!--href="http://soportapp.tk/storage/{{ $image }}"-->
                        <img class="img" weight="100px" height="100px" src="http://soportapp.tk/storage/{{ $image }}" />
                        @endforeach
                    </ul>
		        </div>
                @endif
                @if(isset($message))
                    <p style="color:Red;">{{ $message }} </p>
                @endif
                @if(isset($details))
                    <p> The Search results for your query <b> {{ $query }} </b> are :</p>
                    <h2>Nic details</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nic</th>
                            <th>OS</th>
                            <th>Ver</th>
                            @admin
                            <th>Editar</th>
                            <th>Eliminar</th>
                            @endadmin
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($details as $nic)
                        <tr>
                            <td>{{$nic->client_nic}}</td>
                            <td>{{$nic->os}}</td>
                            <td><a href="{{ URL('/search/'.$nic->client_nic.'-'.$nic->os )}}">👁</a></td>
                            @admin
                            
                            <td><a href="{{ route('orderservice.edit', $nic->id)}}">🖉</a></td>
                            
                            <td><a href="{{ URL('/deleteos/'.$nic->os )}}">🚮</a></td>
                            
                            @endadmin
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif

            @else
            <div class="links">
                    <a href="{{ route('login') }}">Login 👤</a>
                </div>
            @endauth
                
                <div class="links">
                    @admin
                    <a href="/listar">Back to list</a>
                    @endadmin
                    <a href="/">Back to main</a>
                </div>
            </div>
        </div>

<script>
    window.onload = function() {
        //alert('Hola');
        // Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
//var img = document.getElementById("myImg");
var imgs = document.getElementsByClassName("img");
var modalImg = document.getElementById("img01");

Array.prototype.forEach.call(imgs, function(img) {
    img.onclick = function(){
    modal.style.display = "flow";
    modalImg.src = this.src;
  }
});

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
    };

</script>
@endsection
