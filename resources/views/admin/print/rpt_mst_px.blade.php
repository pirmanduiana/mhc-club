<style>
.th-lg.rowspan {
  vertical-align: middle;
}
.algright {
  text-align: right;
}
.algcenter {
  text-align: center;
}
.table>thead>tr>td, .sum {
  font-weight: bold;
}
.table>thead, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {
  border: 1px solid;
}
.nama-karaywan {
    font-size: 12pt;
    text-transform: uppercase;
}
</style>

<title>{{$parameter["title"]}}</title>

<div style="text-align:center; margin-bottom:10px;">
    <h3>{{$parameter["title"]}}</h3>
    {{$parameter["client"]}}<br>
    Status keanggotaan: {{$parameter["status"]}}
</div>

<!-- Table with panel -->
<div class="card card-cascade narrower">

  <div class="px-4">

    <div class="table-wrapper">
      <!--Table-->
      <table class="table" width="100%">
        <!--Table head-->
        <thead>
            <tr>
                <td>No.</td>
                <td>ID MHC</td>
                <td>Kode MHC</td>
                <td>Nama</td>
                <td>Tgl. lahir</td>
                <td>Dept.</td>
                <td>Kelas</td>
                <td>BPJS</td>
                <td>Status</td>
            </tr>            
        </thead>
        <!--Table head-->
        <!--Table body-->
        <tbody>
            <?php $no_karyawan = 1; ?>
            @foreach($karyawan as $k=>$v)
            <tr>
                <td><?=$no_karyawan++;?></td>
                <td>{{$v->id}}</td>
                <td>{{$v->mhc_code}}</td>
                <td>
                    <span class="nama-karaywan">{{$v->name}}</span> <br>
                    <?php $no_tanggungan = 1; ?>
                    @foreach($v->tanggungan as $t=>$u)
                    &nbsp;&nbsp;<?=$no_tanggungan++;?>. ({{$u->mhc_code}}) {{$u->name}} <br>                    
                    @endforeach
                </td>
                <td>
                    <span class="nama-karaywan">{{$v->dob}}</span> <br>
                    @foreach($v->tanggungan as $t=>$u)
                    &nbsp;&nbsp;{{$u->dob}} <br>
                    @endforeach
                </td>
                <td>{{$v->deptname}}</td>
                <td>{{$v->classname}}</td>
                <td>{{$v->bpjs_code}}</td>
                <td>{{$v->status_id==1 ? "Aktif" : "Tidak aktif"}}</td>
            </tr>
            @endforeach
        </tbody>
        <!--Table body-->
      </table>
      <!--Table-->
    </div>

  </div>

</div>
<!-- Table with panel -->