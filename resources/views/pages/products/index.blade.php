@extends('layouts.app')
@section('content')

<div class="backgroundcolor">
   <div class="container">
      <div id="searchsectiion">
         <form>
            <div style="display: flex;">
               <input placeholder="Search....." class="searchinputproduct form-control" type="text" name="">
               <button class="btnsearchformproducts btn btn-primary">Search</button>
            </div>
         </form>
         <div class="searchresult">
            <p>You found <b>63</b> multivendor store store website templates.</p>
         </div>
      </div>
      <div>
         <div class="row">
            <div class="col-md-3">
              <div class="side-bar category category-md">
                  <h5 class="title">Category</h5>
                  <ul class="dropdown-list-menu">

                    <?php foreach(DB::table('storecategories')->get() as $r){ ?>

                    <li>
                      <a href="{{ url('') }}/{{ $r->storecategoryurl }}"><i class="fa fa-angle-double-right" aria-hidden="true"></i>{{ $r->name }}</a>
                    </li>

                    <?php  } ?>
                  </ul>
                </div>
                <div class="side-bar tags-box">
                  <h5 class="title">Tags</h5>
                  <ul style="padding-left: 0px;">
                    <?php foreach(DB::table('storetags')->get() as $r){ ?>
                    <li><a href="{{ url('') }}/{{ $r->storetagurl }}">{{ $r->name }} </a></li>
                    <?php  } ?>
                  </ul>
                </div>
            </div>
            <div class="col-md-9">
              @foreach($data as $r)
               <div class="row" style="margin: 0px 0px 10px 10px;">
                  <div class="productbox">
                     <div class="imageproduct">
                        <a href="{{ url('') }}/{{ $r->url }}">
                           <div class="">
                              <img class="_1xvs1" src="{{ url('public/images/') }}/{{ $r->image }}" style="left: 0%;">
                           </div>
                        </a>
                        <div class="HogM0">
                           <div class="_343Ow _3OY-2">
                              <span class="productpagestags">Tags: 
                              </span>
                           </div>
                        </div>
                     </div>
                     <div class="tittlesection">
                        <h3 class="_2WWZB">
                          <a href="{{ url('') }}/{{ $r->url }}" class="tittlesectionanchor" tabindex="0">{{ $r->name }}
                          </a>
                        </h3>
                        <div class="productfeaturls">
                            <ul>
                              {{ $r->shortdescription }}
                            </ul>
                        </div>
                     </div>
                     <div class="borderhorixontal"></div>
                     <div class="pricesectionproductpage">
                        <div class="priceofproduct">$17</div>
                        <div class="productpagebuttons">
                            <button  class="perviewbutton">Perview</button>
                            <button onclick="alertpopup()" class="addtocartbutton"><i class="fas fa-shopping-cart"></i></button>
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </div>
   </div>
</div>

<!-- Modal  -->


<div class="modal fade" id="myModal">
  <div class="modal-dialog modal-dialog-centered">
    <div style="background-color: #51668a;" class="modal-content">
      <div>
        <button style="color: white;" type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
            <h3 style="text-align: center;color: white;">
                We are Sorry Our Payement Services is Under Construction
            </h3>
            <div style="display: flex;text-align: center;">
                <button style="margin: 30px;" class="btn btn-primary">Chat to Agent</button>
                <button type="button"  data-dismiss="modal" style="margin: 30px;" class="btn btn-danger">Close Alert</button>
            </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$(window).on('load', function(){ 
  // $('#myModal').modal('toggle');
});
function alertpopup()
{
  $('#myModal').modal('toggle');
}
</script>
@endsection