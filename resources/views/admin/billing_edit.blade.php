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
                                            <option value="{{$v->id}}" {{$v->id==$trnbilling->client_id?"selected":""}}>{{$v->code .' - '. $v->name}}</option>
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
                                        <select class="form-control" name="mhc_code">
                                            <!--  -->
                                        </select>
                                    </div>                         
                                </div>
                            </div>
                        </div><br>
                        <div class="col-md-12" style="margin-bottom:10px;">
                            <div class="form-group">
                                <label for="title" class="col-sm-2  control-label">Provider</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-building fa-fw"></i></span>
                                        <select class="form-control" name="provider_id">
                                            <option></option>
                                            @foreach($provider as $k=>$v)
                                            <option value="{{$v->id}}" {{$v->id==$trnbilling->provider_id?"selected":""}}>
                                                {{$v->code .' - '. $v->name}}
                                            </option>
                                            @endforeach
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
                                        <input type="text" id="item{{$v->id}}" name="item[{{$v->id}}]" value="{{$v->price}}" class="form-control title" placeholder="Input {{$v->name}}" data-a-sign="Rp. " data-a-dec="," data-a-sep=".">
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
                                        <input type="text" id="total" name="total" value="" class="form-control title"  data-a-sign="Rp. " data-a-dec="," data-a-sep="." readonly>
                                    </div>                         
                                </div>
                            </div>
                        </div><br>

                        <div class="col-md-12" style="margin-bottom:10px;">
                            <div class="form-group">
                                <label for="title" class="col-sm-2  control-label">Catatan</label>
                                <div class="col-sm-8">                                    
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-sticky-note fa-fw"></i></span>
                                        <input type="text" id="catatan" name="catatan" value="{{$trnbilling->catatan}}" class="form-control title" placeholder="Isi catatan bila diperlukan...">
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
    mhc_code = "{{$trnbilling->mhc_code}}";

    var getTotal = function(){
        $.ajax({
            url: "/admin/get/billingobj",
            type: "get",
            dataType: "json"
        }).done(function(json){
            var total = 0;            
            $.each(json, function(k,v){
                rawNumeric = $("#item"+v.id).autoNumeric('get');
                total = total + (parseFloat(rawNumeric) * v.multiplier);
            });
            $("#total").autoNumeric('set',total);
        }).fail(function(xhr){
            //...
        });        
    }

    var initAutoNumeric = function(){
        $.ajax({
            url: "/admin/get/billingobj",
            type: "get",
            dataType: "json"
        }).done(function(json){
            $.each(json, function(k,v){
                $('#item'+v.id).autoNumeric('init');
            });
            $('#total').autoNumeric('init');
        }).fail(function(xhr){
            //...
        });
    }

    var getRawNumeric = function(){
        $.ajax({
            url: "/admin/get/billingobj",
            type: "get",
            dataType: "json"
        }).done(function(json){
            var itemArray = [];
            $.each(json, function(k,v){
                itemArray.push({
                    'name' : 'item['+(k+1)+']',
                    'value' : $("#item"+v.id).autoNumeric('get')
                });
            });
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
            $("select[name='mhc_code']").empty().trigger('change');
            $.each(json, function(k,v){
                var newState = new Option(v.text, v.id, true, true);
                $("select[name='mhc_code']").append(newState).trigger('change');
            });
            $("select[name='mhc_code']").val(mhc_code).trigger('change');
        }).fail(function(xhr){
            //...
        });
    }

    var simpanBill = function(){
        data = [];
        $.ajax({
            url: "/admin/get/billingobj",
            type: "get",
            dataType: "json",
            async: false
        }).done(function(json){
            var itemArray = [];
            $.each(json, function(k,v){
                itemArray.push({
                    'name' : 'item['+(k+1)+']',
                    'value' : $("#item"+v.id).autoNumeric('get')
                });
            });            
            var headerArray = [
                {name:'_token', value:"{{ csrf_token() }}"},
                {name:'id', value:billing_id},
                {name:'client_id', value:$("select[name='client_id']").val()},
                {name:'mhc_code', value:$("select[name='mhc_code']").val()},
                {name:'provider_id', value:$("select[name='provider_id']").val()},
                {name:'date', value:$("input[name='date']").val()},
                {name:'diagnosa', value:$("input[name='diagnosa']").val()},
                {name:'total', value:$("input[name='total']").autoNumeric('get')},
                {name:'catatan', value:$("input[name='catatan']").val()}
            ];            
            data = $.merge(itemArray, headerArray);            
        });
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

        initAutoNumeric();

        changeEmployee($("select[name='client_id']").val());

        getTotal();

        $('[id^=item]').on("blur", function(){
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