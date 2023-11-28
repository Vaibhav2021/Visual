<style>

.select2-dropdown{
    z-index: 3051;
}
</style>

<form method="post" action="{{route('package.store')}}" class="form form-vertical visual-notes-ajax-form">
   @csrf 
   <input type="hidden" name="package_id" value="{{ $packages->id ?? '' }}">
    <div class="form-body">
        <div class="row">
           
            <div class="col-md-4 mt-1">
                <label for="role-name">Package</label>
            </div>
            <div class="col-md-8 form-group mt-1">
                <input type="text" id="role-name" class="form-control" name="name" placeholder="Enter Package Name" value="{{ $packages->name ?? '' }}">
            </div>

            <div class="col-md-4 mt-2">
                <label for="role-name">Price</label>
            </div>
            <div class="col-md-8 form-group mt-2">
                <input type="text" id="role-name" class="form-control" name="price" placeholder="Enter Price" value="{{ $packages->price ?? '' }}">
            </div>

            <div class="col-md-4 mt-2">
                <label for="role-name">Type</label>
            </div>
            <div class="col-md-8 form-group mt-2">
                <select class="form-control js-example-basic-single" name="type" data-width ="100%">
                    <option value="">Select Type</option>

                    @foreach ($package_type as $type)
                    <option value="{{$type}}" @selected(!empty($packages->type) && $packages->type == $type)>{{ucwords($type)}}</option>
                    @endforeach

                </select>
            </div>
                <div class="col-md-8 form-group">
                    <div class="d-flex justify-content-between align-items-center">

                         
                    </div>
                </div>

            
        <div class="modal-footer mt-5">
        <button type="submit" class="btn btn-dark-theme me-1 mb-1">Submit</button>
        <button type="reset" class="btn btn-light-secondary bg-theme me-1 mb-1">Reset</button>
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