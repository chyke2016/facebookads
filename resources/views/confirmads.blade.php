@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
                 
@if($adverts)
                   <div class="inner-block">
    <div class="product-block">
     @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
        @endif  
        <div class="pro-head">
            <h2>Your Ads</h2>
        </div>
        
            @foreach ( $adverts as $advert)

        <div class="col-md-3 product-grid">
            <div class="product-items">
                <div class="project-eff">
                        <div id="nivo-lightbox-demo"> <p> </p></div>     
                            <img class="img-responsive" src="/storage/{{$advert->address}}" alt="">
                </div>
                <div class="produ-cost">
                <div class="row" >
                
                     <div class="col-md-6">
                     <a href=" {{ route('confirmad_user',$advert->id) }} " ><button class="btn btn-danger">Confirm Publishers</button>
</a>
                     </div>
                    
                        
                </div></div>
            </div>
        </div>
        
            @endforeach
        
      <div class="clearfix"> </div>
    </div>
</div>
 @else
 <div class="inner-block">
    <div class="product-block">
     @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
        @endif  
        <div class="pro-head">
            <h2>Sorry you have no Ads</h2>
        </div>
        
          
        
      <div class="clearfix"> </div>
    </div>
</div>
 @endif               
        
    </div>
</div>
@endsection
