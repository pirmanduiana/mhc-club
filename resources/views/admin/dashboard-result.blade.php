<style>
    .client {
        font-size: 14pt;
    }
    .bold {
        font-weight: bold;
    }
    .red {
        color: red;
    }
</style>
@if(empty($grouped))
    Tidak ada hasil pencarian...
@else
    <table class="table" border="0">    
        <tbody>
        @foreach($grouped as $k=>$g)
            <tr>
                <td colspan="8" class="client bold">{{$k}}</td>
            </tr>
            <tr>
                <td width="10%" class="bold">ID</td>
                <td width="10%" class="bold">Kode MHC</td>
                <td width="20%" class="bold">Nama</td>            
                <td width="10%" class="bold">Status</td>
                <td width="10%" class="bold">Pilihan</td>
            </tr>
            @foreach($g as $x=>$y)
            <tr>
                <td class="{{$y["status_name"]=="Active"?"black":"red"}}">{{$y['id']}}</td>
                <td class="{{$y["status_name"]=="Active"?"black":"red"}}">{{$y['mhc_code']}}</td>
                <td class="{{$y["status_name"]=="Active"?"black":"red"}}">{{$y['name']}}</td>
                <td class="{{$y["status_name"]=="Active"?"black":"red"}}">{{$y['type']}} <span class='label label-{{$y["status_name"]=="Active"?"info":"danger"}}'>{{$y['status_name']}}</span></td>
                <td class="{{$y["status_name"]=="Active"?"black":"red"}}"><a href="{{$y['view_url']}}">Lihat detail</a></td>
            </tr>
            @endforeach
        @endforeach
        </tbody>    
    </table>
@endif