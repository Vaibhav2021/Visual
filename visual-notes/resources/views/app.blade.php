@include('/layout/header')
@include('/layout/sidebar')
@include('/layout/mainbar')

@yield('content')

<div class="modal fade" id="visual_notes_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         
        </div>
       
      </div>
    </div>
  </div>
@include('/layout/footer')
