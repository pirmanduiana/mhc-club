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
.sum {
  font-weight: bold;
}
.table>thead, .table>thead>tr>th, .table>tbody>tr>td, .table>tfoot>tr>td {
  border: 1px solid;
}

</style>

<div style="text-align:center; margin-bottom:10px;">
    <h3>{{$parameter["title"]}}</h3>
    {{$parameter["client"]}}<br>
    {{$parameter["from"]}} - {{$parameter["to"]}}
</div>

<!-- Table with panel -->
<div class="card card-cascade narrower">

  <div class="px-4">

    <div class="table-wrapper">
      <!--Table-->
      <table class="table">
        <!--Table head-->
        <thead>
          <tr>            
            <th class="th-lg rowspan" rowspan="2">
              <a>Provider code
              </a>
            </th>
            <th class="th-lg rowspan" rowspan="2">
              <a href="">Provider name
              </a>
            </th>            
            @foreach($data_return['vipot'] as $x=>$y)
            <th class="th-lg algcenter" colspan="2">
              <a href="">{{$y}}
              </a>
            </th>
            @endforeach
          </tr>
          <tr>
            @foreach($data_return['vipot'] as $x=>$y)
            <th class="th-lg algright">
              <a href="">PX
              </a>
            </th>
            <th class="th-lg algright">
              <a href="">Nilai
              </a>
            </th>
            @endforeach
          </tr>
        </thead>
        <!--Table head-->

        <!--Table body-->
        <tbody>            
            @foreach($data_return['data'] as $k=>$v)
            <tr>
                <td>{{$k}}</td>
                <td>{{$v['name']}}</td>                
                @foreach($v['vipot_values'] as $i=>$j)
                  <td class="algright">{{ number_format($j['px'], 2) }}</td>
                  <td class="algright">{{ number_format($j['nilai'], 2) }}</td>
                @endforeach                
            </tr>
            @endforeach
        </tbody>
        <!--Table body-->

        <!--table footer-->        
        <tfoot class="sum">
            <tr>
                <td colspan="2" align="right">Total: </td>                
                @foreach($data_return['sum'] as $i=>$j)
                  <td class="algright">{{ number_format($j['px'], 2) }}</td>
                  <td class="algright">{{ number_format($j['nilai'], 2) }}</td>
                @endforeach
            </tr>
        </tfoot>
        <!--Table footer-->

      </table>
      <!--Table-->
    </div>

  </div>

</div>
<!-- Table with panel -->