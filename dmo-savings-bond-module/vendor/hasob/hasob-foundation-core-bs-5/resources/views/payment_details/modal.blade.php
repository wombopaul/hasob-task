

<div class="modal fade" id="mdl-paymentDetail-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 id="lbl-paymentDetail-modal-title" class="modal-title">Payment Detail</h4>
            </div>

            <div class="modal-body">
                <div id="div-paymentDetail-modal-error" class="alert alert-danger" role="alert"></div>
                <form class="form-horizontal" id="frm-paymentDetail-modal" role="form" method="POST" enctype="multipart/form-data" action="">
                    <div class="row">
                        <div class="col-lg-12 ma-10">
                            
                            @csrf
                            
                            <div class="offline-flag"><span class="offline">You are currently offline</span></div>
                            <div id="spinner-payment_details" class="">
                                <div class="loader" id="loader-1"></div>
                            </div>

                            <input type="hidden" id="txt-paymentDetail-primary-id" value="0" />
                            <div id="div-show-txt-paymentDetail-primary-id">
                                <div class="row">
                                    <div class="col-lg-10 ma-10">                            
                                    @include('hasob-foundation-core::pages.payment_details.show_fields')
                                    </div>
                                </div>
                            </div>
                            <div id="div-edit-txt-paymentDetail-primary-id">
                                <div class="row">
                                    <div class="col-lg-10 ma-10">
                                    @include('hasob-foundation-core::pages.payment_details.fields')
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>

            <div id="div-save-mdl-paymentDetail-modal" class="modal-footer">
                <hr class="light-grey-hr mb-10" />
                <button type="button" class="btn btn-primary" id="btn-save-mdl-paymentDetail-modal" value="add">Save</button>
            </div>

        </div>
    </div>
</div>

@push('page_scripts')
<script type="text/javascript">
$(document).ready(function() {

    $('.offline').hide();

    //Show Modal for New Entry
    $(document).on('click', ".btn-new-mdl-paymentDetail-modal", function(e) {
        $('#div-paymentDetail-modal-error').hide();
        $('#mdl-paymentDetail-modal').modal('show');
        $('#frm-paymentDetail-modal').trigger("reset");
        $('#txt-paymentDetail-primary-id').val(0);

        $('#div-show-txt-paymentDetail-primary-id').hide();
        $('#div-edit-txt-paymentDetail-primary-id').show();

        $("#spinner-payment_details").hide();
        $("#div-save-mdl-paymentDetail-modal").attr('disabled', false);
    });

    //Show Modal for View
    $(document).on('click', ".btn-show-mdl-paymentDetail-modal", function(e) {
        e.preventDefault();
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}});

        //check for internet status 
        if (!window.navigator.onLine) {
            $('.offline').fadeIn(300);
            return;
        }else{
            $('.offline').fadeOut(300);
        }

        $('#div-paymentDetail-modal-error').hide();
        $('#mdl-paymentDetail-modal').modal('show');
        $('#frm-paymentDetail-modal').trigger("reset");

        $("#spinner-payment_details").show();
        $("#div-save-mdl-paymentDetail-modal").attr('disabled', true);

        $('#div-show-txt-paymentDetail-primary-id').show();
        $('#div-edit-txt-paymentDetail-primary-id').hide();
        let itemId = $(this).attr('data-val');

        $.get( "{{ route('gb-api.paymentDetails.show','') }}/"+itemId).done(function( response ) {
			
			$('#txt-paymentDetail-primary-id').val(response.data.id);
            		$('#spn_paymentDetail_label').html(response.data.label);
		$('#spn_paymentDetail_bank_account_name').html(response.data.bank_account_name);
		$('#spn_paymentDetail_bank_account_number').html(response.data.bank_account_number);
		$('#spn_paymentDetail_bank_name').html(response.data.bank_name);
		$('#spn_paymentDetail_bank_verification_number').html(response.data.bank_verification_number);
		$('#spn_paymentDetail_national_id_number').html(response.data.national_id_number);


            $("#spinner-payment_details").hide();
            $("#div-save-mdl-paymentDetail-modal").attr('disabled', false);
        });
    });

    //Show Modal for Edit
    $(document).on('click', ".btn-edit-mdl-paymentDetail-modal", function(e) {
        e.preventDefault();
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}});

        $('#div-paymentDetail-modal-error').hide();
        $('#mdl-paymentDetail-modal').modal('show');
        $('#frm-paymentDetail-modal').trigger("reset");

        $("#spinner-payment_details").show();
        $("#div-save-mdl-paymentDetail-modal").attr('disabled', true);

        $('#div-show-txt-paymentDetail-primary-id').hide();
        $('#div-edit-txt-paymentDetail-primary-id').show();
        let itemId = $(this).attr('data-val');

        $.get( "{{ route('gb-api.paymentDetails.show','') }}/"+itemId).done(function( response ) {     

			$('#txt-paymentDetail-primary-id').val(response.data.id);
            		$('#label').val(response.data.label);
		$('#bank_account_name').val(response.data.bank_account_name);
		$('#bank_account_number').val(response.data.bank_account_number);
		$('#bank_name').val(response.data.bank_name);
		$('#bank_verification_number').val(response.data.bank_verification_number);
		$('#national_id_number').val(response.data.national_id_number);


            $("#spinner-payment_details").hide();
            $("#div-save-mdl-paymentDetail-modal").attr('disabled', false);
        });
    });

    //Delete action
    $(document).on('click', ".btn-delete-mdl-paymentDetail-modal", function(e) {
        e.preventDefault();
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}});

        //check for internet status 
        if (!window.navigator.onLine) {
            $('.offline').fadeIn(300);
            return;
        }else{
            $('.offline').fadeOut(300);
        }

        let itemId = $(this).attr('data-val');
        swal({
                title: "Are you sure you want to delete this PaymentDetail?",
                text: "You will not be able to recover this PaymentDetail if deleted.",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                closeOnConfirm: false,
                closeOnCancel: true
            }, function(isConfirm) {
                if (isConfirm) {

                    let endPointUrl = "{{ route('gb-api.paymentDetails.destroy','') }}/"+itemId;

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
                                //swal("Deleted", "PaymentDetail deleted successfully.", "success");
                                swal({
                                        title: "Deleted",
                                        text: "PaymentDetail deleted successfully",
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
    $('#btn-save-mdl-paymentDetail-modal').click(function(e) {
        e.preventDefault();
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()}});


        //check for internet status 
        if (!window.navigator.onLine) {
            $('.offline').fadeIn(300);
            return;
        }else{
            $('.offline').fadeOut(300);
        }

        $("#spinner-payment_details").show();
        $("#div-save-mdl-paymentDetail-modal").attr('disabled', true);

        let actionType = "POST";
        let endPointUrl = "{{ route('gb-api.paymentDetails.store') }}";
        let primaryId = $('#txt-paymentDetail-primary-id').val();
        
        let formData = new FormData();
        formData.append('_token', $('input[name="_token"]').val());

        if (primaryId != "0"){
            actionType = "PUT";
            endPointUrl = "{{ route('gb-api.paymentDetails.update','') }}/"+primaryId;
            formData.append('id', primaryId);
        }
        
        formData.append('_method', actionType);
        @if (isset($organization) && $organization!=null)
            formData.append('organization_id', '{{$organization->id}}');
        @endif
        // formData.append('', $('#').val());
        		formData.append('label', $('#label').val());
		formData.append('bank_account_name', $('#bank_account_name').val());
		formData.append('bank_account_number', $('#bank_account_number').val());
		formData.append('bank_name', $('#bank_name').val());
		formData.append('bank_verification_number', $('#bank_verification_number').val());
		formData.append('national_id_number', $('#national_id_number').val());


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
					$('#div-paymentDetail-modal-error').html('');
					$('#div-paymentDetail-modal-error').show();
                    
                    $.each(result.errors, function(key, value){
                        $('#div-paymentDetail-modal-error').append('<li class="">'+value+'</li>');
                    });
                }else{
                    $('#div-paymentDetail-modal-error').hide();
                    window.setTimeout( function(){

                        $('#div-paymentDetail-modal-error').hide();

                        swal({
                                title: "Saved",
                                text: "PaymentDetail saved successfully",
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

                $("#spinner-payment_details").hide();
                $("#div-save-mdl-paymentDetail-modal").attr('disabled', false);
                
            }, error: function(data){
                console.log(data);
                swal("Error", "Oops an error occurred. Please try again.", "error");

                $("#spinner-payment_details").hide();
                $("#div-save-mdl-paymentDetail-modal").attr('disabled', false);

            }
        });
    });

});
</script>
@endpush
