<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/docs/3.3/favicon.ico">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.3/examples/jumbotron-narrow/">

    <title>Pemilihan Tilok SKTTMB Area Kab. Pesisir Selatan</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="https://getbootstrap.com/docs/3.3/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/3.3/examples/jumbotron-narrow/jumbotron-narrow.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="https://getbootstrap.com/docs/3.3/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div class="container">
        <div class="header clearfix">
            {{-- <nav>
                <ul class="nav nav-pills pull-right">
                    <li role="presentation" class="active"><a href="#">Home</a></li>
                    <li role="presentation"><a href="#">About</a></li>
                    <li role="presentation"><a href="#">Contact</a></li>
                </ul>
            </nav> --}}
            <h3 class="text-muted">Kementerian Agama Kab. Pesisir Selatan</h3>
        </div>

        <div class="jumbotron" style="padding-top:10px!important; padding-bottom:10px!important">
            <h1>SKTT MB</h1>
            <p class="lead">Pemilihan Titik Lokasi Ujian SKTTMB di Lingkup Area Kementerian Agama Kabupaten Pesisir
                Selatan.</p>
        </div>

        <nav class="navbar navbar-default">
            <div class="container-fluid">

                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="@if(app()->request->segment(1) == '') active @endif"><a href="/">Cari Data</a></li>
                        <li class="@if(app()->request->segment(1) == 'daftar') active @endif"><a href="/daftar">Lihat
                                Daftar
                                Data</a></li>

                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
            <!--/.container-fluid -->
        </nav>

        <div class="row">
            <div class="col-lg-12">

                @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
                @endif

                @if(!isset($peserta))
                <div class="well">

                    <h3 class="nopadding nomargin" style="margin-top: 0 !important; margin-bottom:10px !important;">Cari
                        Data</h3>
                    <form action="{{ route('input.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="nomor_peserta">Masukkan Nomor Peserta Ujian Anda</label>
                            <input class="form-control" type="text" name="nomor_peserta" placeholder="Nomor Peserta">
                            @if ($errors->has('nomor_peserta'))
                            <span class="text-danger">{{ $errors->first('nomor_peserta') }}</span>
                            @endif
                        </div>
                        <input type="submit" class="btn btn-primary" value="Cari Data Peserta">
                    </form>
                </div>
                @else
                <div class="well">
                    <h3 class="nopadding nomargin" style="margin-top: 0 !important; margin-bottom:10px !important;">
                        Detail Peserta</h3>
                    <form action="{{ route('inputtilok.store') }}" method="post">
                        {{ csrf_field() }}

                        <input type="hidden" name="id" id="id" value="{{$peserta->id}}">
                        <div class="form-group">
                            <label for="nomor_peserta">Nomor Peserta</label>
                            <input class="form-control" type="text" name="nomor_peserta"
                                value="{{$peserta->nomor_peserta}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input class="form-control" type="text" name="nama" value="{{$peserta->nama}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="lokasi_jabatan">Lokasi Jabatan</label>
                            <input class="form-control" type="text" name="lokasi_jabatan"
                                value="{{$peserta->lokasi_jabatan}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="titik_lokasi">Titik Lokasi Ujian</label>
                            <select id="titik_lokasi" name="titik_lokasi" class="form-control">
                                <option value="">.=== Silahkan Pilih Tilok ===.</option>
                                <option value="MTsN 1 Pesisir Selatan">MTsN 1 Pesisir Selatan (Salido)</option>
                                <option value="MTsN 5 Pesisir Selatan">MTsN 5 Pesisir Selatan (Punggasan)</option>
                            </select>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Simpan Titik Lokasi Ujian">
                    </form>
                </div>
                @endif

            </div>


        </div>

        <footer class="footer">
            <p>&copy; 2023 Pranata Komputer YD</p>
        </footer>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="https://getbootstrap.com/docs/3.3/assets/js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>