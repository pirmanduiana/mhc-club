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
                            <a href="{{ url('admin/employee') }}" class="btn btn-sm btn-default" title="List"><i class="fa fa-list"></i><span class="hidden-xs">&nbsp;List</span></a>                            
                        </div>
                    </div>
                </div>                
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                    <form name="frmMaster" id="frmMaster" method="post">
                    @csrf
                    <div class="col-sm-12">
                        <fieldset>
                            <legend>{{ $employee->name }}                            
                            </legend>
                            <div class="form-group">
                                <div class="row">                                                               
                                    <div class="col-sm-4">
                                        <label for="kode1">{{ $employee->mhc_code }}</label><br>
                                        <img src={{$barcode}} alt="barcode"/>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="no_surat1">Kelas:</label><br>
                                        <span class="highlight">{{ $employee->class_name }}</span>
                                    </div>    
                                    <div class="col-sm-6">
                                        <label for="nama_kegiatan1">Kode BPJS:</label><br>
                                        <span class="highlight">{{ $employee->bpjs_code }}</span>
                                    </div>            
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Data pribadi</legend>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="tanggal1">Alamat:</label><br>
                                        {{ $employee->address }}
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="kode_kegiatan1">No. telp:</label><br>
                                        {{ $employee->phone }}
                                    </div>    
                                    <div class="col-sm-3">
                                        <label for="total1" class="totalnum">Tgl. lahir:</label><br>
                                        {{ $employee->dob }}
                                    </div>                                    
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Data perusahaan</legend>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="opd_dari1">Nama perusahaan:</label><br>
                                        {{ $employee->client_name }}
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="unit_kerja_dari1">Departemen:</label><br>
                                        {{ $employee->department_name }}
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="opd_dari1">Status:</label><br>
                                        @if($employee->status_id==1)
                                            <span class='label label-info'>Aktif </span>
                                        @else
                                            <span class='label label-default'>Tidak aktif </span>
                                        @endif
                                        @php $edit_url = '/admin/employee/'.$employee->id.'/edit'; @endphp
                                        <br>Klik <a href="javascript:void(0)" id="a_triggerrubahstatus">disini</a> untuk merubah.
                                    </div>
                                </div>
                            </div>  
                        </fieldset>
                        <fieldset>
                            <legend>Data keluarga yang ditanggung</legend>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                    <table class="table table-condensed">
                                        <thead>
                                        <tr>
                                            <th>Kode MHC</th>
                                            <th>Kode BPJS</th>
                                            <th>Nama</th>
                                            <th>Hub. keluarga</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($tanggungan as $k=>$v)
                                            <tr>
                                                <td>
                                                    <img src="{{$v['barcode']}}" alt="barcode"/><br>
                                                    {{$v['mhc_code']}}
                                                </td>
                                                <td>{{$v['bpjs_code']}}</td>
                                                <td>{{$v['name']}}</td>
                                                <td>{{$v['family_status']}}</td>
                                                
                                                @if($v['status_id']==1)
                                                    <td><span class='label label-info'>Aktif </span></td>
                                                @else
                                                    <td><span class='label label-default'>Tidak aktif </span></td>
                                                @endif

                                            </tr>                                        
                                            @endforeach
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>  
                        </fieldset>
                        <fieldset>
                            <legend>Plafon tanggungan</legend>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                    <table class="table table-condensed">
                                        <thead>
                                        <tr>
                                            <th>Jns. tanggungan</th>
                                            <th>COB</th>
                                            <th>Catatan</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($plafons as $k=>$v)
                                            <tr>
                                                <td>{{$v->cov_name}}</td>
                                                <td>
                                                    @if($v->cob==0)
                                                        Tidak
                                                    @else
                                                        Ya
                                                    @endif
                                                </td>
                                                <td>{!!$v->description!!}</td>
                                            </tr>                                        
                                            @endforeach
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>                            
                        </fieldset>
                        <fieldset>
                            <legend>Riwayat status karyawan</legend>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                    <table class="table table-condensed">
                                        <thead>
                                        <tr>
                                            <th width="15%">Waktu dicatat</th>
                                            <th width="70%">Catatan</th>
                                            <th width="15%">Dicatat oleh</th>                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($logs as $k=>$v)
                                            <tr>
                                                <td>{{$v->created_at}}</td>
                                                <td>{!!$v->notes!!}</td>
                                                <td>{{$v->username}}</td>
                                            </tr>                                        
                                            @endforeach
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>                            
                        </fieldset> 
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
        <input type="hidden" name="employee_id" value="{{$employee->id}}">
        <div class="modal-body">
            <div class="form-group">
                <div class="radio">
                <label>
                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="1" {{$employee->status_id==1 ? "checked" : ""}}>
                    Aktif
                </label>
                </div>
                <div class="radio">
                <label>
                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="2" {{$employee->status_id==2 ? "checked" : ""}}>
                    Non aktif
                </label>
                </div>                
            </div>
            <div class="form-group">
                <textarea name="reason" class="form-control" rows="3" placeholder="Berikan alasan atas perubahan status karyawan!"></textarea>
                * Merubah status karyawan akan merubah seluruh status tanggungan keluarga
            </div>
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
    
    karyawan_id = "{{$employee->id}}";
    
    var modalRubahStatus = function()
    {
        $("#myModal").modal('show');
        $(".modal-title").html('Merubah status karyawan*');
    }

    var submitRubahStatus = function()
    {
        var data = $("form[name='frm_rubahstatuskaryawan']").serializeArray();
        $.ajax({
            url: "/admin/post/employee/status/update",
            type: "post",
            data: data,
            dataType: "json"
        }).done(function(json){
            if (json[0]) {                
                $.pjax.reload('#pjax-container');
                toastr.success('Status karyawan telah diperbaharui');
            } else {
                toastr.success('Terjadi kesalahan!');
            }
        }).fail(function(xhr){
            //...
        });
    }

    $(document).ready(function(){
        
        // ...
        $("#a_triggerrubahstatus").on("click", function(){
            modalRubahStatus();
        });

        $("#btn_rubahstatuskaryawan").on("click", function(e){
            e.preventDefault();
            submitRubahStatus();
        });

    });
</script>