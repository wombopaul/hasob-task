
<a id="btn-mdl-bulk-upload-rating-modal" class="btn btn-primary btn-mdl-bulk-upload-rating-modal" tabindex="-1" role="dialog" aria-modal="true" aria-hidden="true">
    <i class="bx bx-upload"></i> Bulk Upload
</a>

<div class="modal fade" id="mdl-bulk-upload-rating-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h4 id="lbl-rating-modal-title-bku" class="modal-title">Bulk Upload</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div id="div-rating-modal-error-bku" class="alert alert-danger" role="alert"></div>
                <form class="form-horizontal" id="frm-rating-modal-bku" role="form" method="POST" enctype="multipart/form-data" action="">
                    <div class="row">
                        <div class="col-lg-12">
                            
                            @csrf
                            
                            <div class="offline-flag"><span class="offline">You are currently offline</span></div>
                            <div id="spinner-mdl-bulk-upload-rating-modal" class="">
                                <div class="loader" id="loader-1"></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-11 ma-10">

                                    <div id="div-value-key" class="form-group">
                                        <div class="col-sm-12">
                                            You may select a comma separated value (csv) file containing data that can be uploaded. The format of the <span style="font-weight:bold;">expected CSV file</span> is indicated below, only properly formatted will be successfully uploaded. 
                                        </div>
                                    </div>

                                    <div id="div-value" class="form-group">
                                        <div class="col-sm-12">
                                            
                                            {!! Form::file('mdl-bulk-upload-rating-modal-file', ['class' => 'form-control', 'id'=>'mdl-bulk-upload-rating-modal-file']) !!}

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>

            <div id="div-upload-mdl-rating-modal-bku" class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-upload-mdl-rating-modal" value="add">Upload</button>
            </div>

        </div>
    </div>
</div>

@push('page_scripts')
<script type="text/javascript">
$(document).ready(function() {

    $('.offline').hide();

    //Show Modal for Bulk Upload
    $(document).on('click', ".btn-mdl-bulk-upload-rating-modal", function(e) {
        $('#div-rating-modal-error-bku').hide();
        $('#mdl-bulk-upload-rating-modal').modal('show');
        $('#frm-rating-modal-bku').trigger("reset");

        $("#spinner-mdl-bulk-upload-rating-modal").hide();
        $("#btn-upload-mdl-rating-modal").attr('disabled', false);
    });

    //Save details
    $('#btn-upload-mdl-rating-modal').click(function(e) {
        e.preventDefault();
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}});

        //check for internet status 
        if (!window.navigator.onLine) {
            $('.offline').fadeIn(300);
            return;
        }else{
            $('.offline').fadeOut(300);
        }

        $("#spinner-mdl-bulk-upload-rating-modal").show();
        $("#btn-upload-mdl-rating-modal").attr('disabled', true);

        let actionType = "POST";
        let endPointUrl = "###### PATH TO UPLOAD #####";
        
        let formData = new FormData();
        formData.append('_token', $('input[name="_token"]').val());        
        formData.append('_method', actionType);
        formData.append('value', $('#value-file')[0].files[0]);
        @if (isset($organization) && $organization!=null)
            formData.append('organization_id', '{{$organization->id}}');
        @endif

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
                    $('#div-rating-modal-error-bku').html('');
                    $("#spinner-mdl-bulk-upload-rating-modal").show();
                    
                    $.each(result.errors, function(key, value){
                        $('#div-rating-modal-error-bku').append('<li class="">'+value+'</li>');
                    });
                }else{
                    $('#div-rating-modal-error-bku').hide();
                    window.setTimeout( function(){

                        $('#div-rating-modal-error-bku').hide();
                        swal({
                                title: "Saved",
                                text: "Bulk upload completed successfully",
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

                $("#spinner-mdl-bulk-upload-rating-modal").hide();
                $("#btn-upload-mdl-rating-modal").attr('disabled', false);
                
            }, error: function(data){
                console.log(data);
                swal("Error", "Oops an error occurred. Please try again.", "error");

                $("#spinner-mdl-bulk-upload-rating-modal").hide();
                $("#btn-upload-mdl-rating-modal").attr('disabled', false);
            }
        });
    });

});
</script>
@endpush
