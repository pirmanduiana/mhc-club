<style>
    fieldset {
        margin-top: 10px;
    }
    legend {
        font-weight: bold;
        text-transform: uppercase;
    }
    span.highlight {
        font-size: 24px;
        font-weight: bold;
    }
</style>

<section class="content">
    <div class="row">        
        <div class="col-md-12">
            <div class="box box-info">                
                <div class="box-header with-border">
                    <h3 class="box-title">Detail</h3>
                    <div class="box-tools">
                        <div class="btn-group pull-right" style="margin-right: 5px">
                            <a href="{{ url('admin/billing') }}" class="btn btn-sm btn-default" title="List"><i class="fa fa-list"></i><span class="hidden-xs">&nbsp;List</span></a>                            
                        </div>
                    </div>
                </div>                
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                    <form name="frmBilling" id="frmBilling" method="post">
                    @csrf
                        <input type="hidden" name="id" value="{{$trnbilling->id}}">
                        <div class="col-md-12" style="margin-bottom:10px;">
                            <div class="form-group">
                                <label for="title" class="col-sm-2  control-label">Client</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-building fa-fw"></i></span>
                                        <select class="form-control" name="client_id">
                                            <option></option>
                                            @foreach($client as $k=>$v)
                                            <option value="{{$v->id}}" {{$v->id==$trnbilling->client_id?"selected":""}}>{{$v->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>                         
                                </div>
                            </div>
                        </div><br>
                        <div class="col-md-12" style="margin-bottom:10px;">
                            <div class="form-group">
                                <label for="title" class="col-sm-2  control-label">Pasien</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                                        <select class="form-control" name="employee_id">
                                            <!--  -->
                                        </select>
                                    </div>                         
                                </div>
                            </div>
                        </div><br>
                        <div class="col-md-12" style="margin-bottom:10px;">
                            <div class="form-group">
                                <label for="title" class="col-sm-2  control-label">Tanggal</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                        <input type="text" name="date" value="{{$trnbilling->date}}" class="form-control title date" placeholder="Input tanggal">
                                    </div>                         
                                </div>
                            </div>
                        </div><br>
                        <div class="col-md-12" style="margin-bottom:10px;">
                            <div class="form-group">
                                <label for="title" class="col-sm-2  control-label">Diagnosa</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-stethoscope fa-fw"></i></span>
                                        <input type="text" name="diagnosa" value="{{$trnbilling->diagnosa}}" class="form-control title" placeholder="Input diagnosa">
                                    </div>                         
                                </div>
                            </div>
                        </div><br>
                        @foreach($billobj as $k=>$v)
                        <div class="col-md-12" style="margin-bottom:10px;">
                            <div class="form-group">
                                <label for="title" class="col-sm-2  control-label">{{$v->name}}</label>
                                <div class="col-sm-8">                                    
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-medkit fa-fw"></i></span>
                                        <input type="number" id="item{{$v->id}}" name="item[{{$v->id}}]" value="{{$v->price}}" class="form-control title" placeholder="Input {{$v->name}}">                   
                                    </div>                         
                                </div>
                            </div>
                        </div><br>
                        @endforeach

                        <div class="col-md-12" style="margin-bottom:10px;">
                            <div class="form-group">
                                <label for="title" class="col-sm-2  control-label">Total</label>
                                <div class="col-sm-8">                                    
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                        <input type="number" name="total" value="" class="form-control title" readonly>
                                    </div>                         
                                </div>
                            </div>
                        </div><br>

                        <div class="col-md-12" style="margin-bottom:10px;">
                            <div class="form-group">
                                <button id="btn_SimpanBill">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>            
            </div>
        </div>  
    </div>   
</section>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">[MODAL_TITLE]</h4>
        </div>
        <form name="frm_rubahstatuskaryawan">
        @csrf
        <input type="hidden" name="billing_id" value="">
        <div class="modal-body">
            <!--  -->
        </div>
        <div class="modal-footer">                            
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            <button type="button" id="btn_rubahstatuskaryawan" class="btn btn-info" data-dismiss="modal">Simpan</button>
        </div>
        </div>
        </form>
    </div>
</div>
<!-- modal -->

<script>    

    billing_id = "{{$trnbilling->id}}";

    var getTotal = function(){
        $.ajax({
            url: "/admin/get/billingobj",
            type: "get",
            dataType: "json"
        }).done(function(json){
            var total = 0;            
            $.each(json, function(k,v){
                total = total + (parseFloat($("#item"+v.id).val()) * v.multiplier);
            });
            $("input[name='total']").val(total);
        }).fail(function(xhr){
            //...
        });        
    }

    var changeEmployee = function(this_value){
        $.ajax({
            url: "/admin/get/employee/byclient/" + this_value,
            type: "get",
            dataType: "json"
        }).done(function(json){
            $("select[name='employee_id']").empty().trigger('change');
            $.each(json, function(k,v){
                var newState = new Option(v.text, v.id, true, true);
                $("select[name='employee_id']").append(newState).trigger('change');
            });
        }).fail(function(xhr){
            //...
        });
    }

    var simpanBill = function(){
        var data = $("form[name='frmBilling']").serializeArray();
        $.ajax({
            url: "/admin/update/billing",
            type: "post",
            data: data,
            dataType: "json"
        }).done(function(json){
            $.pjax.reload('#pjax-container');
            toastr.success('Billing telah diperbaharui');
        }).fail(function(xhr){
            //...
        });
    }

    $(document).ready(function(){
        
        // ... 
        $('.date').datepicker({
            format: "yyyy/mm/dd",
            startDate: "2000-01-01",
            endDate: "2050-01-01",
            todayBtn: "linked",
            autoclose: true,
            todayHighlight: true
        }).attr("autocomplete", "off");

        $('select').select2({
            allowClear: true,
            placeholder: "Pilih"
        });

        changeEmployee($("select[name='client_id']").val());
        getTotal();

        $('[id^=item]').on("keyup", function(){
            getTotal();
        })

        $("#btn_SimpanBill").on("click", function(e){
            e.preventDefault();
            simpanBill();
        })

        $("select[name='client_id']").on("change", function(){
            changeEmployee(this.value);
        })

    });
</script>