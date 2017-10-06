@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
                 

                   <div class="inner-block">
    <div class="product-block">
 
    <div class="signup-page-main">

     <div class="signup-main">
             <div class="signup-head">
                <h1>Add Ads</h1>
            </div>
            <div class="signup-block">
                <form class="form-horizontal"  method="POST" action="{{ route('addads') }}" name="adverts" enctype="multipart/form-data"> 
               {{ csrf_field() }}

                <input type="text" name="description" placeholder="Brief description of ad" />
                    <input type="file" name="advert" placeholder="Upload" >
                    <div class="forgot-top-grids">
                        
                        
                        <div class="clearfix"> </div>
                    </div>
                    <input type="submit" name="add" value="Add Ads"> 
                     @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif  
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                                <ul>
                                        @foreach ($errors->all() as $error)
                                            <li> {{ $error }} </li>
                                        @endforeach
                                </ul>
                        </div>
                    @endif                                                     
                </form>
                <div class="sign-down">
                
                  <h5><a href="/home">Go Back to Home</a></h5>
                </div>
            </div>
    </div>
</div>
        
      <div class="clearfix"> </div>
    </div>
</div>
                
        
    </div>
</div>
@endsection
