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
                        <div id="nivo-lightbox-demo"> <p><a href="/storage/{{$advert->address}}" data-lightbox-gallery="gallery1" id="nivo-lightbox-demo"><span class="rollover1"> </span> </a> </p></div>     
                            <img class="img-responsive" src="/storage/{{$advert->address}}" alt="">
                </div>
                <div class="produ-cost">
                <div class="row" >
                @if($advert->state == 0)
                    
                    <div class="col-md-6">
                    <form method="POST" action="{{ route('publishad') }}">
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                      <input type="hidden" value="{{ $advert->id }} " name="advertid" />      
                     <button type="submit" class="btn btn-danger">Publish</button>

                     </form>
                     </div>

                @endif
                     <div class="col-md-6">
                    <form method="POST" action="{{ route('deletead',$advert->id) }}">
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                     <input type="hidden" value="{{ $advert->id }} " name="advertid" />      
                           
                     <button type="submit" class="btn btn-danger">Delete</button>

                     </form>
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
