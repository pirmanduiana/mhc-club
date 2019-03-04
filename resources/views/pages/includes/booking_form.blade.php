<style>
    .booking-form-input {
        width: 100%;
    }
    small.error, small.error-guest{
        color: red;
        font-style: italic;
        font-size: medium;
    }
</style>

<form name="frmbooking">
@csrf
<input type="hidden" class="form-control pull-right" name="product_id">

<div class="form-group">
    <label>Your name:</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
        <input type="text" class="form-control pull-right" id="tmp_guest_name">
    </div>
    <small class="form-text error" id="err_full_name"></small>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-md-6">
            <label>Booking date:</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                <input type="text" class="form-control pull-right date" name="booking_date">
            </div>
            <small class="form-text error" id="err_booking_date"></small>
        </div>
        <div class="col-md-6">
            <label>Pax:</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                <input type="number" class="form-control pull-right" name="pax">
            </div>
            <small class="form-text error" id="err_pax"></small>
        </div>
    </div>
</div>
<div class="form-group">
    <label>Notes:</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-sticky-note-o"></i></div>
        <textarea id="editor1" name="notes" rows="10" cols="80">
        </textarea>
    </div>
    <small class="form-text error" id="err_notes"></small>
</div>
<div class="form-group">
    <label>Captcha:</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-check"></i></div>
        {!! Recaptcha::render() !!}
    </div>
    <small class="form-text error" id="err_recaptcha"></small>
</div>
<div class="row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-10">        
        <button id="submit_booking1">Submit</button>
        <button id="cancel_booking1">Cancel</button>
    </div>
</div>
</form>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form name="frmcustomer">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Guest information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <label>Your name:</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                            <input type="text" class="form-control pull-right" name="full_name">
                        </div>
                        <small class="form-text error-guest" id="err_guest_full_name"></small>
                    </div>                    
                </div>
            </div>
            <div class="form-group">
                <div class="row">                  
                    <div class="col-md-12">
                        <label>Nationality:</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            <select class="form-control select2" name="country_code" style="width:100%">
                                <option></option>
                                @foreach($countries as $k=>$v)
                                    <option value="{{ $k }}">{{ $v }}</option>
                                @endforeach
                            </select>
                        </div>
                        <small class="form-text error-guest" id="err_guest_nationality"></small>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>Your valid email:</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                            <input type="email" class="form-control pull-right" name="email">
                        </div>
                        <small class="form-text error-guest" id="err_guest_email"></small>
                    </div>
                    <div class="col-md-6">
                        <label>Your phone number:</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            <input type="text" class="form-control pull-right" name="phone">
                        </div>
                        <small class="form-text error-guest" id="err_guest_phone"></small>
                    </div>
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btn_confirm_customer">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
$(function(){
    $("#cancel_booking1").on("click", function(){
        window.location.reload();
    });

    $("#submit_booking1").on("click", function(e){
        e.preventDefault();
        var formdata = $("form[name='frmbooking']").serialize();
        formdata = formdata + "&full_name="+$("input[name='full_name']").val()+"&country_code="+$("select[name='country_code']").val()+"&email="+$("input[name='email']").val()+"&phone="+$("input[name='phone']").val();
        $.ajax({
            url: "/booking/post_form",
            type: 'post',
            data: formdata,
            dataType: "json",
            beforeSend : function(){
                $("#spinner1").show();
                $("#booking-form1 :input").attr("disabled", true);
            }
        }).done(function(response){
            Cookies.set('booked', true, { expires: 1 });
            Cookies.set('product_id', response.product_id, { expires: 1 });
            window.location.reload();
        }).fail(function(xhr){
            var err_msg = xhr.responseJSON.errors;
            var err_field_id = {
                "err_full_name": "full_name",
                "err_booking_date": "booking_date",
                "err_pax": "pax",
                "err_notes": "notes",
                "err_recaptcha": "g-recaptcha-response"
            }; $(".error").html("");
            $.each(err_msg, function(i, item){
                $.each(err_field_id, function(j, field){
                    if (i == field) {
                        $("#"+j).html(item[0]);
                    }
                });
            });
            $("#spinner1").hide(); $("#booking-form1 :input").attr("disabled", false);
        });
    });

    $(".select2").select2({
        placeholder: "Select a country",
        allowClear: true,
        dropdownParent: $('.modal')
    });

    $('.date').datepicker({
        format: "yyyy/mm/dd",        
        todayBtn: "linked",
        autoclose: true,
        todayHighlight: true
    });

    $("#tmp_guest_name").on("click", function(){
        $("#exampleModal").modal("show");
    });

    function validateEmail($email) {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        return emailReg.test($email);
    }

    $("#btn_confirm_customer").on("click", function(){
        var elements_to_validate = {
            "err_guest_full_name" : [$("input[name='full_name']").val(), "full name is required!"],
            "err_guest_nationality" : [$("select[name='country_code']").val(), "nationality is required!"],
            "err_guest_email" : [$("input[name='email']").val(), "email is required!"],
            "err_guest_phone" : [$("input[name='phone']").val(), "phone is required!"]
        };
        $(".error-guest").html(""); var is_valids = "";
        $.each(elements_to_validate, function(k,v){
            if (v[0]=="") {
                $("#"+k).html(v[1]);
            } else {
                is_valids += "NaN";
            }
        });
        if (is_valids=="NaNNaNNaNNaN") {
            if (validateEmail($("input[name='email']").val())) {                
                $("#tmp_guest_name").val($("input[name='full_name']").val());
                $("#exampleModal").modal("hide");
            } else {
                $("#err_guest_email").html("Invalid email!");
            }
        }
    });
});
</script>