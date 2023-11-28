<style>

    .select2-dropdown{
        z-index: 3051;
    }
    </style>
    
    <form method="post" action="{{route('tag.store')}}" class="form form-vertical visual-notes-ajax-form">
       @csrf 
       <input type="hidden" name="tag_id" value="{{ $tag->id ?? '' }}">
        <div class="form-body">
            <div class="row">
               
                <div class="col-md-4 mt-1">
                    <label for="role-name">TagName</label>
                </div>
                <div class="col-md-8 form-group mt-1">
                    <input type="text" id="role-name" class="form-control" name="tagname" placeholder="Enter Tag Name" value="{{ $tag->tagname ?? '' }}">
                </div>
    

            <div class="modal-footer mt-5">
            <button type="submit" class="btn btn-dark-theme me-1 mb-1">Submit</button>
            <button type="reset" class="btn bg-theme border me-1 mb-1">Reset</button>
        </div>
    </div>
    </div>
    </form>
    <script type="text/javascript">
    $('.js-example-basic-single').select2();
    // $('#visual_notes_modal').select2({
    //         dropdownParent: $('#visual_notes_modal')
    //     });
    
    </script>