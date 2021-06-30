<title>MHC - Hasil Swab {{$data->nama_pasien}}</title>
<style>
    .sw-hasil-container {
        background: white;
        position: relative;
        padding: 0 35px 35px 35px;
        height: 944px;
    }
    
    .sw-hasil-header {
        margin-bottom: 20px;
    }
    .btn-download {
        vertical-align: top;
        padding-top: 10px;
        text-align: right;
    }
    table {
        width: 100%;
    }
    img.logo-mhc {
        width: 100px;
        height: 100px;
    }
    td.center {
        text-align: center;
    }
    .kop-comp-title {
        font-size: 20pt;
        font-weight: bold;
        color: #fbbf3a;
    }
    .kop-comp-desc {
        font-size: 11pt;
    }

    .sw-hasil-body table {
        border: 1px solid;
        border-collapse: collapse;
    }
    .sw-hasil-body table tr td {
        padding: 5px;
    }
    tr.dc-id {
        border-bottom: 1px solid;
    }
    
    table.tb-hasil-pemeriksaan tr, table.tb-hasil-pemeriksaan td {
        border: 1px solid black;
    }
    .sec-1, .sw-hasil-body, .footer-1 {
        margin-bottom: 30px;
    }    
    .footer-2 td {
        text-align: center;
    }
    .signer {
        margin-bottom: 72px;
    }
    .sign-kiri {
        float: left;
    }
    .sign-kanan {
        float: right;
    }
    .btn-download a {
        color: white;
        cursor: default;
    }
</style>
<div class="sw-hasil-container">
    <div class="sw-hasil-header">
        <table>
            <tr>
                <td width="20%"><img class="logo-mhc" src="{{asset('uploads/images/logo.png')}}"></td>
                <td class="center" width="70%">
                    <div class="kop-comp-title">MANDIRI HEALTH CARE</div>
                    <div class="kop-comp-desc">
                        Jl. Tukad Badung XXI B No.16, Renon Denpasar- Bali<br>
                        Telp. 0819 9986 1734 / 0852 3825 9966<br>
                        Email : admin@mhc-club.com // Website : www.mhc-club.com
                    </div>
                </td>
                <td class="btn-download" width="10%">
                    <a target="_blank" href="/admin/swab/{{$data->id}}/pull" class="btn btn-block btn-primary btn-xs"><i class='fa fa-file-pdf-o'></i>&nbsp;&nbsp;Download</a>
                </td>
            </tr>
        </table>
    </div>
    <div class="sw-hasil-body">
        <div class="sec-1">
            <table class="tb-isian">
                <tr><td width="30%">DOCTOR</td><td>: {{$data->dokter->dokter}}</td></tr>
                <tr class="dc-id"><td width="30%">NO. SIP</td><td>: {{$data->dokter->no_sip}}</td></tr>
                <tr><td width="30%">Patient Name</td><td>: {{$data->nama_pasien}}</td></tr>
                <tr><td width="30%">ID. Card</td><td>: {{$data->no_identitas}}</td></tr>
                <tr><td width="30%">Date of Birth</td><td>: {{$data->tanggal_lahir}}</td></tr>
                <tr><td width="30%">Gender</td><td>: {{$data->kelamin->kelamin}}</td></tr>
                <tr><td width="30%">Address</td><td>: {{$data->alamat}}</td></tr>
                <tr><td width="30%">Date of Test</td><td>: {{$data->tanggal_periksa}}</td></tr>
                <tr><td width="30%">Time</td><td>: {{$data->jam}}</td></tr>
                <tr><td width="30%">Method</td><td>: {{$data->bahan}}</td></tr>
            </table>
        </div>
        <div class="sec-2">
            <h4>Test Result</h4>
            <table class="tb-hasil-pemeriksaan">
                <tr><td colspan="2" align="center">Analysis</td><td>Result</td><td>Unit</td><td>Reference Range</td></tr>
                <tr><td colspan="2" align="center">Imunoserology</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
                <tr><td>Rapid Test</td><td>{} Antigen SARS CoV - 2</td><td>{{$data->hasil->keterangan}}</td><td>&nbsp;</td><td>Negative</td></tr>
            </table>
        </div>
    </div>
    <div class="sw-hasil-footer">
        <div class="footer-1">
            Suggestions:
            <ul>
                <li>Positive result must be confirmed by performing PCR Swab Test,</li>
                <li>Keep doing social/physical distancing,</li>
                <li>Keep doing PHBS (Clean and Healty Behavior), wash your hands, apply cough ethics, use mask, and keep stamina well.</li>
            </ul>
        </div>
        <div class="footer-2">
            <table>
                <tr>
                    <td class="signt-kiri">
                        @if (isset($data->qrcode))
                            <img src="{{$data->qrcode}}">
                        @else
                            <div id="qr-code">
                                {{-- dyn --}}
                            </div>
                        @endif
                    </td>
                    <td class="sign-kanan">
                        <div class="sign-template">
                            <div class="sign-date">Denpasar, {{$data->tanggal_periksa}}</div>
                            <div class="signer">Authorized by,</div>
                            <div class="signer-name">{{$data->dokter->dokter}}</div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<input type="hidden" id="qrbase64" value="{{$data->qrcode}}">

<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.2.4.min.js"></script>
<script type="text/javascript" src="{{asset('/vendor/qrcodejs/qrcode.js')}}"></script>
<script>
    function generate()
    {
        var qrcodejs = new QRCode(document.getElementById('qr-code'), {
            text: "{{$qrcode}}",
            width: 128, height: 128,
            correctLevel: QRCode.CorrectLevel.H
        });

        qrcodejs._oDrawing._elImage.onload = ev => { 
            $.ajax({
                url: '/admin/swab/{{$data->id}}/setQrBase64',
                method: 'post',
                dataType: 'json',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'qrbase64': ev.target.src
                }
            }).done(function(res){
                console.log("done");
            })
        }
    }
    
    $(function(){
        if ($("#qrbase64").val() == "") {
            generate();
        }
    })
</script>