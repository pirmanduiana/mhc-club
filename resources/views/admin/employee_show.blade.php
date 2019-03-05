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
                            @if($employee->status_id==1)
                                <span class="btn btn-info btn-flat btn-sm" style="margin-left:10px;">Status: Aktif</span>
                            @else
                                <span class="btn btn-warning btn-flat btn-sm" style="margin-left:10px;">Status: Tidak aktif</span>
                            @endif
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
                                    <div class="col-sm-6">
                                        <label for="unit_kerja_dari1">Departmen:</label><br>
                                        {{ $employee->department_name }}
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
        <div class="modal-body">
            <!-- // dyn -->
        </div>
        <div class="modal-footer">                            
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>
<!-- modal -->

<script>    
    
    $(document).ready(function(){
        
        // ...

    });
</script>