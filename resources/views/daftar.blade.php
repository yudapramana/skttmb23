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
    {{--
    <link href="https://getbootstrap.com/docs/3.3/examples/jumbotron-narrow/jumbotron-narrow.css" rel="stylesheet"> --}}

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

                <div class="well">

                    <h3 class="nopadding nomargin" style="margin-top: 0 !important; margin-bottom:10px !important;">
                        Daftar Data</h3>
                </div>
                <table class="table" style="font-size: small!important;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Peserta</th>
                            <th>Nama</th>
                            <th>Lokasi Jabatan</th>
                            <th>Titik Lokasi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($peserta as $key => $item)
                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <th>{{ $item->nomor_peserta }}</th>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->lokasi_jabatan }}</td>
                            <td>{{ $item->titik_lokasi }}</td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>

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