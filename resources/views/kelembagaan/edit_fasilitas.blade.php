@extends('/temp/template')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Fasilitas Pendukung</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <form action="/edt_fasil/<?php echo $data[0]->id?>" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row" >
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Nama labolatorium</b>
                        <input type="text" class="form-control" id="NamaLab" name="NamaLab" value="<?php echo $data[0]->NamaLab?>"
                        placeholder="Nama Lab">
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Lingkup</b>
                        <Select class="form-control" id="lingkup" name="Lingkup" value="<?php echo $data[0]->Lingkup?>">
                            <?php foreach ($prodi as $prodi) :?>
                                <option value="<?php echo $prodi->nama?>" {{ $data[0]->Lingkup == $prodi->nama ? 'selected' : '' }}><?php echo $prodi->nama?>  </option>
                            <?php endforeach ?>
                        </Select>
                    </p>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0 ml-2">
                    <p><b>Surat Keterangan</b>
                    <label for="Ada">
                        <input type="checkbox" id="Ada"> Ada
                        <input type="file" id="filesk" accept=".pdf" disabled=true name="filesk">
                    </label>
                </p>
                </div>
            </div>
            <button class="ml-2" type="submit">Submit</button>
        </form>
    </div>
</div>
<script language="javascript" type="text/javascript">
            document.getElementById("Ada").onchange = function() {file()};
            // var x = document.querySelector('input[name="Ada"]:checked');
            function file(){
                var x = document.getElementById("Ada");
                var y = document.getElementById("filesk");
                if(x.checked){
                    y.disabled = false
                }
                else{
                    y.disabled = true
                }
            }
    </script>
@stop