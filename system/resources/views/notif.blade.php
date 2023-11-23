@foreach (['errors','error'] as $status)
   @if (session($status))
     <div class="alert alert-danger alert-dismissible fade show">
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"><span><i class="mdi mdi-btn-close"></i></span>
         </button>
         <div class="media">
             <div class="media-body">
                 <h5 class="mt-1 mb-1">Notifications</h5>
                 <strong class="mb-0">{{ session($status)}}</strong>
             </div>
         </div>
     </div>
   @endif
@endforeach
