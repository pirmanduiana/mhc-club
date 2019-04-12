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
    .radio-status {
        margin-right: 20px;
    }
</style>

<section class="content">
    <div class="row">
        <fieldset>
            <legend>parameter</legend>
            <form name="frmReport3" id="frmReport3" method="post" action="{{url('/admin/rpt/mst/px/1')}}" target="_blank">
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
                        <label for="title" class="col-sm-2  control-label">Status</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <span class="radio-status"><input type="radio" name="status_id" value="1" checked> Aktif</span>
                                <span class="radio-status"><input type="radio" name="status_id" value="2"> Tidak Aktif</span>
                            </div>                         
                        </div>
                    </div>
                </div><br>
                <div class="col-md-12">
                    <div class="form-group" style="float:left;">
                        <button class="btn btn-sm btn-primary" id="btn_TampilRpt3">Tampilkan &nbsp;<i class="fa fa-search"></i></button>
                        <button class="btn btn-sm btn-danger" id="btn_PDFRpt3">PDF &nbsp;<i class="fa fa-file-pdf-o"></i></button>
                    </div>
                </div>
            </form>
        </fieldset>
        <hr>
        <div class="col-md-12" id="preview_px">
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

    var previewRpt = function(){
        var data = $("form[name='frmReport3']").serializeArray();
        $.ajax({
            url: "/admin/rpt/mst/px/0",
            type: "post",
            data: data,
            dataType: "html"
        }).done(function(html){
            $("#preview_px").html(html);
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

        $("#btn_TampilRpt3").on("click", function(e){
            e.preventDefault();
            previewRpt();
        });        

    });
</script>