@extends('temp/template')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Anggota Dosen Yang Terlibat</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form action="/editpkm/staff/{{$id}}" method="post">
            @csrf
            <div class="form-group row" id="isian">
                <input type="text" hidden class="form-control" id="id" name="id" value="{{$id}}">
                @foreach($data as $key=>$value)
                <div class="col-sm-6 mb-3 mb-sm-0 mt-2 ml-4 card shadows">
                    <input type="text" hidden class="form-control" id="ids[{{$key}}]" name="ids[{{$key}}]" value="{{$value->id}}">
                    <p><b>Nama</b>
                        <input type="text" class="form-control" id="nama[{{$key}}]" name="nama[{{$key}}]" value=""
                        placeholder="Nama">
                    </p>
                    <p><b>NIDN</b>
                        <select class="nidn form-control" onchange="Update({{$key}})" id="nidn[{{$key}}]" name="nidn[{{$key}}]" value="{{$value->nidn_nrp}}"
                        placeholder="NIDN"></select>
                    </p>
                    <p><b>Program Studi</b>
                    <select class="form-control" name="prodi[{{$key}}]" id="prodi">
                            @foreach($prodi as $keys=>$prodis)
                                <option value="{{$prodis->id}}">{{$prodis->nama}}</option>
                            @endforeach
                        </select>
                    </p>
                    <p><b>Jenjang Pendidikan</b>
                        <input type="text" class="form-control" id="pend[{{$key}}]" name="pend[{{$key}}]" value=""
                        placeholder="Jenjang Pendidikan">
                    </p>
                    <p><b>Jabatan Fungsional</b>
                        <input type="text" class="form-control" id="jab[{{$key}}]" name="jab[{{$key}}]" value=""
                        placeholder="Jabatan Fungsional">
                    </p>
                    <p><b>Golongan</b>
                        <input type="text" class="form-control" id="gol[{{$key}}]" name="gol[{{$key}}]" value=""
                        placeholder="Golongan">
                    </p>
                </div>
                @endforeach
            </div>
            <button class="ml-2" type="button" id="tmbh">Tambah</button>
            <button class="ml-2" type="submit">Submit</button>
        </form>
    </div>
</div>
@stop
@push('script')
<script language="javascript" type="text/javascript">
            var i = 0;
           document.getElementById("tmbh").onclick = function() {Tambah()};
            // var x = document.querySelector('input[name="Ada"]:checked');
            function Tambah(){
                ++i;
                document.getElementById("isian").insertAdjacentHTML('beforeend',`
                <div class="col-sm-6 mb-3 mb-sm-0 mt-2 ml-4 card shadows">
                    <p><b>Nama</b>
                        <input type="text" class="form-control" id="namabru[`+i+`]" name="namabru[`+i+`]"
                        placeholder="Nama">
                    </p>
                    <p><b>NIDN</b>
                        <select class="nidnbru form-control" onchange="UpdateBru(${i})" id="nidnbru${i}" name="nidnbru[${i}]"></select>
                    </p>
                    <p><b>Program Studi</b>
                        <select class="form-control" name="prodibru[`+i+`]" id="prodibru[`+i+`]">
                            @foreach($prodi as $prodi)
                                <option value="{{$prodi->id}}">{{$prodi->nama}}</option>
                            @endforeach
                        </select>
                    </p>
                    <p><b>Jenjang Pendidikan</b>
                        <input type="text" class="form-control" id="pendbru[`+i+`]" name="pendbru[`+i+`]"
                        placeholder="Jenjang Pendidikan">
                    </p>
                    <p><b>Jabatan Fungsional</b>
                        <input type="text" class="form-control" id="jabbru[`+i+`]" name="jabbru[`+i+`]"
                        placeholder="Jabatan Fungsional">
                    </p>
                    <p><b>Golongan</b>
                        <input type="text" class="form-control" id="golbru[`+i+`]" name="golbru[`+i+`]"
                        placeholder="Golongan">
                    </p>
                </div>`)
                Select()
            };
            function UpdateBru(key){
                var dt = $(`#nidnbru${key}`).select2('val');
                console.log(dt)
                $.get('/dosens',{q:dt},function (dosen, textStatus,jqXHR){
                        console.log(dosen);  
                        document.getElementById(`namabru[${key}]`).value = dosen.nama;
                        document.getElementById(`pendbru[${key}]`).value = dosen.pendidikan;
                        document.getElementById(`jabbru[${key}]`).value = dosen.jab_fungsional;
                        document.getElementById(`golbru[${key}]`).value = dosen.golongan;
                        $(`select[name='prodibru[${key}]'] option[value='${dosen.prodi}']`).prop('selected',true);
                        //Belum NIDN
                    })
            }
            function Select(){
                $(`.nidnbru`).select2(
                    {
                        placeholder: 'NIDN',
                        ajax: {
                            url: '/dosens',
                            dataType: 'json',
                            delay: 250,
                            processResults: function (data) {
                                return {
                                results:  $.map(data, function (item) {
                                        return {
                                            text: item.nidn,
                                            id: item.nidn
                                        }
                                    })
                                };
                            },
                            cache: true
                        },
                        tags: true,
                        createTag: function(params){
                            return{
                                id : params.term,
                                text : params.term,
                                newOption : true
                            }
                        },
                    }
                );
            }
    </script>

    <script>
        var id = document.getElementById('id').value
        $.get('/staffs',{pkm:id}, function(data, textStatus, jqXHR){
            $.each(data,function(key,value){
                var newOption = new Option(value.nidn_nrp, value.nidn_nrp, true, true);
                $(`.nidn`)[key].append(newOption);
                console.log(newOption)
                $.get('/dosens',{q:value.nidn_nrp},function (dosen, textStatus,jqXHR){
                    document.getElementById(`nama[${key}]`).value = dosen.nama;
                    document.getElementById(`pend[${key}]`).value = dosen.pendidikan;
                    document.getElementById(`jab[${key}]`).value = dosen.jab_fungsional;
                    document.getElementById(`gol[${key}]`).value = dosen.golongan;
                    $(`select[name='prodi[${key}]'] option[value='${dosen.prodi}']`).prop('selected',true);
                    //Belum NIDN
                })
            })
        })
        function Update(key){
            var dt = $(`.nidn`)[key].value;
                console.log(dt)
                $.get('/dosens',{q:dt},function (dosen, textStatus,jqXHR){
                        console.log(dosen);  
                        document.getElementById(`nama[${key}]`).value = dosen.nama;
                        document.getElementById(`pend[${key}]`).value = dosen.pendidikan;
                        document.getElementById(`jab[${key}]`).value = dosen.jab_fungsional;
                        document.getElementById(`gol[${key}]`).value = dosen.golongan;
                        $(`select[name='prodi[${key}]'] option[value='${dosen.prodi}']`).prop('selected',true);
                        //Belum NIDN
                    })
        }
        
    </script>
@endpush