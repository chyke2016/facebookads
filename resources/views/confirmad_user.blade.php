@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
                 
@if($users)
                   <div class="inner-block">
    <div class="product-block">
     @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
        @endif  
        <div class="pro-head">
            <h2>Publishers Assigned the Ad</h2>
        </div>
    <?php $i =1; ?>
    <div class="table-responsive">
                                <table class="table table-hover">
                                  <thead>
                                    <tr>
                                      <th>S/N</th>
                                      <th>Name</th>
                                      <th>Phone Number</th>
                                      <th>Balance</th>                                   
                                                                        
                                      <th>Status</th>
                                      <th>Ad</th>
                                      <th> Upload</th>
                                        <th> Confirm </th>
                                                                                
                                     
                                    
                                      <th>Credit</th>
                                  </tr>
                              </thead>
                              <tbody>
           
            @foreach ( $users as $user)
                                
                              <tr>
                                  <td> {{ $i++}} </td>
                                  <td>{{ Auth::user()->getId($user->publisher_id)->name  }}         </td>
                                  <td>  {{ Auth::user()->getId($user->publisher_id)->phone  }}</td>
                                  <td>  {{ Auth::user()->getId($user->publisher_id)->balance  }}  Naira         </td>                                 
                                                             
                                  <td>
                                            @if( $user->confirmed == 0 )
                                  
                                                <span class="label label-warning"> Not Confirmed</span>
                                            @else
                                                <span class="label label-success">Confirmed</span>

                                             @endif
                                   </td>
                                   
                                  <td>

                             <div class="project-eff">

         <div id="nivo-lightbox-demo"> <p> <a href="/storage/{{$user->adlink}}" data-lightbox-gallery="gallery1" id="nivo-lightbox-demo"><span class="rollover1"> </span> </a></p></div>     
                         <button src="/storage/{{$user->adlink}}" class="btn btn-info"/> View Ad</button>
                    </div>
                                  </td>
                                   <td>

                                  @if($user->screen_shot_link == null)
           <span class="label label-warning"/> None Uploaded</span>
                                  @else
                      <div class="project-eff">
         <div id="nivo-lightbox-demo"> <p> <a href="/storage/{{$user->screen_shot_link}}" data-lightbox-gallery="gallery1" id="nivo-lightbox-demo"><span class="rollover1"> </span> </a></p></div>     
                         <button src="/storage/{{$user->screen_shot_link}}" class="btn btn-info"/> View ScreenShoot</button>
          
   </div>
                                   @endif

                                  </td>
                                
                                  <td> 

                                           @if( $user->confirmed == 1 )
                                  Already confirmed
                                   @else
                                             <form method="POST" action="/confirmads/{{ $user->id}}">
                                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                                      <input type="hidden" value="{{ $user->id }}" name="advertid" />      
                                     <button type="submit" class="btn btn-info">Confirm</button>

                                     </form> 
                                        @endif
                                         </td>

                                   
                                  <td> 
                                             <form method="POST" action="{{ route('credit_user',$user->publisher_id) }}">
                                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                                      <input type="hidden" value="{{ $user->publisher_id }}" name="credit" />      
                                     <button type="submit" class="btn btn-success">Credit</button>

                                     </form> 
                                         </td>               
                              </tr>
                          
            @endforeach


                          </tbody>
                      </table>
                  </div>
        
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
