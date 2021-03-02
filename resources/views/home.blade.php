<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid 19</title>

    <!--STYLING CSS DAN JQUERY BOOTSTRAP  -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fa/css/all.css">
    <link rel="stylesheet" type="text/css" href="style/custom.css">
    
    <!-- <scrip src="/jquery/jquery-3.5.0.js"></scrip> -->
    <script src="/jquery/jquery-3.2.1.slim.min.js"></script>

    <script type="text/javascript" src="js/bootstrap.min.js"> </script>
    <script type="text/javascript" src="js/bootstrap.js"> </script>
    <!--TUTUP STYLING CSS DAN JQUERY BOOTSTRAP  -->

    <!-- SWALL -->
    <script src="alert/sweetalert2.all.min.js"></script>
</head>
<?php

?>
<body class="body font">
    <div class="container-fluid">
        <nav class="navbar fixed-top navbar-light bg-dark">
            <a class="navbar-brand" href="#">
                <img src="img/home_1.png" width="80" height="60" alt="" loading="lazy">
            </a>
            <div class="text-white mr-5">
                <div class="m-auto">
                    <h2 class="">Sistem Informasi Data Covid</h2>
                    <div class='text-center'>
                        <p class="m-auto">www.indonesia-covid.com</p>
                    </div>
                </div>
            </div>
            <div class="">
            <a href=""><h1><i class="fas fa-power-off text-info"></i></h1></a>
            </div>
        </nav>
    </div>
    <br>
    <br>
    <br>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-info text-white">
                <!-- this is card header -->
            </div>
            <div class="card-body">
            <!--  -->
            <div class="row">
                <div class="col-sm-3" style="height: 5mm;">
                    <h5 class="card-title font"> <b>Data Update</b></h5>
                </div>
                <div class="col-sm" style="height: 5mm;">
                    <!-- <a href=""><h2 class="card-title font"> <i class="fas fa-folder-plus text-success"></i></h2></a> -->
                    
                </div>
            </div>
            <hr class="">
            <div class="row">
                <div class="col-sm">
                    <div class="card bg-light text-warning font shadow-box" style="height: 3cm;" >
                        <div class="card-body row mt-1">
                            <div class="col-sm-1">
                                <h1> <i class="fas fa-file"></i></h1>
                            </div>
                            <div class="col-sm text-right">
                                    <h4 id='konfirmasi'>{{$data1['_source']['total_confirmed']}}</h4>
                                    <p>Konfirmasi Terakhir</p>
                            </div>
                        </div>
                    </div>

                    <div class="card bg-light text-danger font mt-2 shadow-box" style="height: 3cm;" >
                        <div class="card-body row mt-1">
                            <div class="col-sm-1">
                                <h1> <i class="fas fa-file"></i></h1>
                            </div>
                            <div class="col-sm text-right">
                                    <h4 id='meninggal'>{{$data1['_source']['total_deaths']}}</h4>
                                    <p>Meninggal Terakhir</p>
                            </div>
                        </div>
                    </div>

                    <div class="card bg-light text-success font mt-2 shadow-box" style="height: 3cm;" >
                        <div class="card-body row mt-1">
                            <div class="col-sm-1">
                                <h1> <i class="fas fa-file"></i></h1>
                            </div>
                            <div class="col-sm text-right">
                                    <h4 id='sembuh'>{{$data1['_source']['total_recovered']}}</h4>
                                    <p>Sembuh Terakhir</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9 font">
                <div class="row">
                    <div class="col-sm">
                        <button class="btn btn-info shadow-lg" data-toggle="modal" data-target="#modal_tambah_data">Tambah Data</button>
                    </div>
                    <div class="col-sm-4 text-right">
                        <input class="form-control" placeholder="Search" aria-label="Search" id="myInput">
                    </div>
                </div>

                <div id='table'  style="overflow-y:auto; height: 9cm" >
                    <table class="table table-bordered mt-2 table-hover table-sm">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col" class="text-center">Negara</th>
                                <th scope="col" class="text-center">Konfirmasi</th>
                                <th scope="col" class="text-center">Meninggal</th>
                                <th scope="col" class="text-center">Sembuh</th>
                                <th scope="col" class="text-center">Terakhir Update</th>
                                <th scope="col" class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                        <?php
                            $no = 0;
                        ?>
                            
                            @foreach($data as $res)
                        <?php
                            $no++;
                            $item = $res['_source'];
                        ?>
                            <tr>
                                <th scope="row">{{$no}}</th>
                                <td class="text-center">{{$item['country']}}</td>
                                <td class="text-center">{{$item['total_confirmed']}}</td>
                                <td class="text-center">{{$item['total_deaths']}}</td>
                                <td class="text-center">{{$item['total_recovered']}}</td>
                                <td class="text-center">{{$item['last_updated']}}</td>
                                <td class="text-center">
                                    <a href="" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="/home/{{$res['_id']}}/hapus" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                    <hr>
                </div>
            </div>
            <!--  -->
            </div>
        </div>
    </div>

<!-- MODAL TAMBAH DATA -->
    <div class="modal fade" id="modal_tambah_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title" id="exampleModalLabel"> Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="home/tambah" method ="POST">
                    {{csrf_field()}}
                        <!-- <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Negara</label>
                            <div class="col-sm-8">
                            <select class="custom-select" id="inputGroupSelect01" name="negara">
                                <option selected>Input Negara</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Singapura">Singapura</option>
                                <option value="Kamboja">Kamboja</option>
                                <option value="Laos">Laos</option>
                                <option value="Timor leste">Timor Leste</option>
                                <option value="Brunei arusalam">Brunei Darusalam</option>
                                <option value="Myanmar">Myanmar</option>
                                <option value="Philipina">Philipina</option>
                                <option value="Vietnam">Vietnam</option>
                            </select>
                            </div>
                        </div> -->
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Konfirmasi</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" name="konfirmasi" placeholder="Input Jumlah Konfirmasi">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Meninggal</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" name="meninggal" placeholder="Input Jumlah Meninggal">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">Sembuh</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" name="sembuh" placeholder="Input Jumlah Sembuh">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn bg-info text-white"> <b>Simpan</b></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
<script>
$(document).ready(function(){
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
</script>

<?php
    if(session()->has('tambah')) {
        ?>
            <script src="/jquery/jquery-3.5.0.js"></script>
            <script>
            Swal.fire({
                icon: 'success',
                title: 'Save Success !',
                showConfirmButton: false,
                timer: 1500
            });
                setTimeout(function(){
                        $(document).ready(function(){
                            $( "#table" ).load( "home #table" );
                            $( "#konfirmasi" ).load( "home #konfirmasi" );
                            $( "#meninggal" ).load( "home #meninggal" );
                            $( "#sembuh" ).load( "home #sembuh" );
                        }); 
                }, 1000);
            </script>
        <?php
        session()->forget('tambah');
    } 
?>

<?php
    if(session()->has('hapus')) {
        ?>
            <script src="/jquery/jquery-3.5.0.js"></script>
            <script>
            Swal.fire({
                icon: 'success',
                title: 'Delete Success !',
                showConfirmButton: false,
                timer: 1500
            });
                setTimeout(function(){
                        $(document).ready(function(){
                            $( "#table" ).load( "home #table" );
                            $( "#konfirmasi" ).load( "home #konfirmasi" );
                            $( "#meninggal" ).load( "home #meninggal" );
                            $( "#sembuh" ).load( "home #sembuh" );
                        }); 
                }, 1000);
            </script>
        <?php
        session()->forget('hapus');
    } 
?>

<?php
//     date_default_timezone_set('Asia/Jakarta');
//     $tanggal = date('h:i:s a');
//     echo "Log login ", $tanggal;
?>


</html>