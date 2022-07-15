

<div class="modal fade" id="mdl-relationship-modal" tabindex="-1" role="dialog" aria-modal="true" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 id="lbl-relationship-modal-title" class="modal-title">Relationship</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div id="div-relationship-modal-error" class="alert alert-danger" role="alert"></div>
                <form class="form-horizontal" id="frm-relationship-modal" role="form" method="POST" enctype="multipart/form-data" action="">
                    <div class="row">
                        <div class="col-lg-12 ma-10">
                            
                            @csrf
                            
                            <div class="offline-flag"><span class="offline-relationships">You are currently offline</span></div>

                            <div id="spinner-relationships" class="spinner-border text-primary" role="status"> 
                                <span class="visually-hidden">Loading...</span>
                            </div>

                            <input type="hidden" id="txt-relationship-primary-id" value="0" />
                            <div id="div-show-txt-relationship-primary-id">
                                <div class="row">
                                    <div class="col-lg-10 ma-10">                            
                                    @include('hasob-foundation-core::pages.relationships.show_fields')
                                    </div>
                                </div>
                            </div>
                            <div id="div-edit-txt-relationship-primary-id">
                                <div class="row">
                                    <div class="col-lg-10 ma-10">
                                    @include('hasob-foundation-core::pages.relationships.fields')
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>

        
            <div class="modal-footer" id="div-save-mdl-relationship-modal">
                <button type="button" class="btn btn-primary" id="btn-save-mdl-relationship-modal" value="add">Save</button>
            </div>

        </div>
    </div>
</div>

@push('page_scripts')
<script type="text/javascript">
$(document).ready(function() {

    $('.offline-relationships').hide();

    //Show Modal for New Entry
    $(document).on('click', ".btn-new-mdl-relationship-modal", function(e) {
        $('#div-relationship-modal-error').hide();
        $('#mdl-relationship-modal').modal('show');
        $('#frm-relationship-modal').trigger("reset");
        $('#txt-relationship-primary-id').val(0);

        $('#div-show-txt-relationship-primary-id').hide();
        $('#div-edit-txt-relationship-primary-id').show();

        $("#spinner-relationships").hide();
        $("#div-save-mdl-relationship-modal").attr('disabled', false);
    });

    //Show Modal for View
    $(document).on('click', ".btn-show-mdl-relationship-modal", function(e) {
        e.preventDefault();
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}});

        //check for internet status 
        if (!window.navigator.onLine) {
            $('.offline-relationships').fadeIn(300);
            return;
        }else{
            $('.offline-relationships').fadeOut(300);
        }

        $('#div-relationship-modal-error').hide();
        $('#mdl-relationship-modal').modal('show');
        $('#frm-relationship-modal').trigger("reset");

        $("#spinner-relationships").show();
        $("#div-save-mdl-relationship-modal").attr('disabled', true);

        $('#div-show-txt-relationship-primary-id').show();
        $('#div-edit-txt-relationship-primary-id').hide();
        let itemId = $(this).attr('data-val');

        $.get( "{{ route('fc-api.relationships.show','') }}/"+itemId).done(function( response ) {
			
			$('#txt-relationship-primary-id').val(response.data.id);
            

            $("#spinner-relationships").hide();
            $("#div-save-mdl-relationship-modal").attr('disabled', false);
        });
    });

    //Show Modal for Edit
    $(document).on('click', ".btn-edit-mdl-relationship-modal", function(e) {
        e.preventDefault();
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}});

        $('#div-relationship-modal-error').hide();
        $('#mdl-relationship-modal').modal('show');
        $('#frm-relationship-modal').trigger("reset");

        $("#spinner-relationships").show();
        $("#div-save-mdl-relationship-modal").attr('disabled', true);

        $('#div-show-txt-relationship-primary-id').hide();
        $('#div-edit-txt-relationship-primary-id').show();
        let itemId = $(this).attr('data-val');

        $.get( "{{ route('fc-api.relationships.show','') }}/"+itemId).done(function( response ) {     

			$('#txt-relationship-primary-id').val(response.data.id);
            

            $("#spinner-relationships").hide();
            $("#div-save-mdl-relationship-modal").attr('disabled', false);
        });
    });

    //Delete action
    $(document).on('click', ".btn-delete-mdl-relationship-modal", function(e) {
        e.preventDefault();
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}});

        //check for internet status 
        if (!window.navigator.onLine) {
            $('.offline-relationships').fadeIn(300);
            return;
        }else{
            $('.offline-relationships').fadeOut(300);
        }

        let itemId = $(this).attr('data-val');
        swal({
                title: "Are you sure you want to delete this Relationship?",
                text: "You will not be able to recover this Relationship if deleted.",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                closeOnConfirm: false,
                closeOnCancel: true
            }, function(isConfirm) {
                if (isConfirm) {

                    let endPointUrl = "{{ route('fc-api.relationships.destroy','') }}/"+itemId;

                    let formData = new FormData();
                    formData.append('_token', $('input[name="_token"]').val());
                    formData.append('_method', 'DELETE');
                    
                    $.ajax({
                        url:endPointUrl,
                        type: "POST",
                        data: formData,
                        cache: false,
                        processData:false,
                        contentType: false,
                        dataType: 'json',
                        success: function(result){
                            if(result.errors){
                                console.log(result.errors)
                                swal("Error", "Oops an error occurred. Please try again.", "error");
                            }else{
                                //swal("Deleted", "Relationship deleted successfully.", "success");
                                swal({
                                        title: "Deleted",
                                        text: "Relationship deleted successfully",
                                        type: "success",
                                        confirmButtonClass: "btn-success",
                                        confirmButtonText: "OK",
                                        closeOnConfirm: false
                                    },function(){
                                        location.reload(true);
                                });
                            }
                        },
                    });
                }
            });

    });

    //Save details
    $('#btn-save-mdl-relationship-modal').click(function(e) {
        e.preventDefault();
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}});


        //check for internet status 
        if (!window.navigator.onLine) {
            $('.offline-relationships').fadeIn(300);
            return;
        }else{
            $('.offline-relationships').fadeOut(300);
        }

        $("#spinner-relationships").show();
        $("#div-save-mdl-relationship-modal").attr('disabled', true);

        let actionType = "POST";
        let endPointUrl = "{{ route('fc-api.relationships.store') }}";
        let primaryId = $('#txt-relationship-primary-id').val();
        
        let formData = new FormData();
        formData.append('_token', $('input[name="_token"]').val());

        if (primaryId != "0"){
            actionType = "PUT";
            endPointUrl = "{{ route('fc-api.relationships.update','') }}/"+primaryId;
            formData.append('id', primaryId);
        }
        
        formData.append('_method', actionType);
        @if (isset($organization) && $organization!=null)
            formData.append('organization_id', '{{$organization->id}}');
        @endif
        // formData.append('', $('#').val());
        

        $.ajax({
            url:endPointUrl,
            type: "POST",
            data: formData,
            cache: false,
            processData:false,
            contentType: false,
            dataType: 'json',
            success: function(result){
                if(result.errors){
					$('#div-relationship-modal-error').html('');
					$('#div-relationship-modal-error').show();
                    
                    $.each(result.errors, function(key, value){
                        $('#div-relationship-modal-error').append('<li class="">'+value+'</li>');
                    });
                }else{
                    $('#div-relationship-modal-error').hide();
                    window.setTimeout( function(){

                        $('#div-relationship-modal-error').hide();

                        swal({
                                title: "Saved",
                                text: "Relationship saved successfully",
                                type: "success",
                                showCancelButton: false,
                                closeOnConfirm: false,
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "OK",
                                closeOnConfirm: false
                            },function(){
                                location.reload(true);
                        });

                    },20);
                }

                $("#spinner-relationships").hide();
                $("#div-save-mdl-relationship-modal").attr('disabled', false);
                
            }, error: function(data){
                console.log(data);
                swal("Error", "Oops an error occurred. Please try again.", "error");

                $("#spinner-relationships").hide();
                $("#div-save-mdl-relationship-modal").attr('disabled', false);

            }
        });
    });

});
</script>
@endpush
