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
            <form name="frmReport2" id="frmReport2" method="post" action="{{url('/admin/rpt/bill/bydate/1')}}" target="_blank">
            @csrf
                <div class="col-md-12" style="margin-bottom:10px;">
                    <div class="form-group">
                        <label for="title" class="col-sm-2  control-label">Client</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-building fa-fw"></i></span>
                                <select class="form-control" name="client_id" width="100%">
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
                        <label for="title" class="col-sm-2  control-label">Dari tanggal</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                <input type="text" name="first_date_of_month" value="{{date('Y/m/d')}}" class="form-control title date" placeholder="Input tanggal">
                            </div>
                        </div>                        
                    </div>
                </div><br>
                <div class="col-md-12" style="margin-bottom:10px;">
                    <div class="form-group">
                        <label for="title" class="col-sm-2  control-label">Sampai tanggal</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                <input type="text" name="last_date_of_month" value="{{date('Y/m/d')}}" class="form-control title date" placeholder="Input tanggal">
                            </div>
                        </div>                        
                    </div>
                </div><br>
                <div class="col-md-12">
                    <div class="form-group" style="float:left;">
                        <button class="btn btn-sm btn-primary" id="btn_TampilRpt2">Tampilkan &nbsp;<i class="fa fa-search"></i></button>
                        <button class="btn btn-sm btn-danger" id="btn_PDFRpt2">PDF &nbsp;<i class="fa fa-file-pdf-o"></i></button>
                    </div>
                </div>                
            </form>
        </fieldset>
        <hr>
        <div class="col-md-12" id="preview_bydate">
            <!-- preview -->
        </div>
    </div>   
</section>

<!-- Modal -->
<div id="myModal2" class="modal fade" role="dialog">
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
            <button type="button" id="btn_rubahstatuskaryawan2" class="btn btn-info" data-dismiss="modal">Simpan</button>
        </div>
        </div>
        </form>
    </div>
</div>
<!-- modal -->

<script>

    var previewRpt2 = function(){
        var data = $("form[name='frmReport2']").serializeArray();
        $.ajax({
            url: "/admin/rpt/bill/bydate/0",
            type: "post",
            data: data,
            dataType: "html"
        }).done(function(html){
            $("#preview_bydate").html(html);
        }).fail(function(xhr){
            //...
        });
    }

    $(document).ready(function(){
        
        $("#btn_TampilRpt2").on("click", function(e){
            e.preventDefault();
            previewRpt2();
        });

    });
</script>