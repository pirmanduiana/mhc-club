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
        <fieldset>
            <legend>parameter</legend>
            <form name="frmReport" id="frmReport" method="post" action="{{url('/admin/rpt/bill/bymonth/1')}}" target="_blank">
            @csrf
                <div class="col-md-12" style="margin-bottom:10px;">
                    <div class="form-group">
                        <label for="title" class="col-sm-2  control-label">Client</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-building fa-fw"></i></span>
                                <select class="form-control" name="client_id">
                                    @foreach($clients as $k=>$v)
                                    <option value="{{$v->id}}">{{$v->name}}</option>
                                    @endforeach
                                </select>
                            </div>                         
                        </div>
                    </div>
                </div><br>
                <div class="col-md-12" style="margin-bottom:10px;">
                    <div class="form-group">
                        <label for="title" class="col-sm-2  control-label">Dari bulan</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                <select class="form-control" name="month_from">
                                    @foreach($bulan_array as $k=>$v)
                                    <option value="{{$k}}" {{$k==date('n')?"selected":""}}>{{$v}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                <select class="form-control" name="year_from">
                                    @foreach($tahun_array as $k=>$v)
                                    <option value="{{$k}}" {{$k==date('Y')?"selected":""}}>{{$v}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div><br>
                <div class="col-md-12" style="margin-bottom:10px;">
                    <div class="form-group">
                        <label for="title" class="col-sm-2  control-label">Sampai bulan</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                <select class="form-control" name="month_to">
                                    @foreach($bulan_array as $k=>$v)
                                    <option value="{{$k}}" {{$k==date('n')?"selected":""}}>{{$v}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                <select class="form-control" name="year_to">
                                    @foreach($tahun_array as $k=>$v)
                                    <option value="{{$k}}" {{$k==date('Y')?"selected":""}}>{{$v}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div><br>
                <div class="col-md-12">
                    <div class="form-group" style="float:left;">
                        <button class="btn btn-sm btn-primary" id="btn_TampilRpt">Tampilkan &nbsp;<i class="fa fa-search"></i></button>
                        <button class="btn btn-sm btn-danger" id="btn_PDFRpt">PDF &nbsp;<i class="fa fa-file-pdf-o"></i></button>
                    </div>
                </div>
            </form>
        </fieldset>
        <hr>
        <div class="col-md-12" id="preview_bymonth">
            <!-- preview -->
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

    var previewRpt = function(){
        var data = $("form[name='frmReport']").serializeArray();
        $.ajax({
            url: "/admin/rpt/bill/bymonth/0",
            type: "post",
            data: data,
            dataType: "html"
        }).done(function(html){
            $("#preview_bymonth").html(html);
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
            placeholder: "Pilih",
            width: "100%"
        });

        $("#btn_TampilRpt").on("click", function(e){
            e.preventDefault();
            previewRpt();
        });

    });
</script>