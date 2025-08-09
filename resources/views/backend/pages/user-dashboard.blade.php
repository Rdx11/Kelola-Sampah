@extends('backend.layouts.app')

@section('title', 'dashboard')


@section('content')
<div class="main-panel">
    <div class="container">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row mt--2">
                <div class="col-md-8">
                    <div class="card full-height">
                        <div class="card-body">
                            <div class="card-title">Overall statistics</div>
                            <div class="card-category">Berikut adalah ringkasan tentang statistik kamu</div>
                            <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                                <div class="px-2 pb-2 pb-md-0 text-center">
                                    <div id="circles-1"></div>
                                    <h6 class="fw-bold mt-3 mb-0">Total Laporan</h6>
                                </div>
                                <div class="px-2 pb-2 pb-md-0 text-center">
                                    <div id="circles-2"></div>
                                    <h6 class="fw-bold mt-3 mb-0">Laporan Diterima</h6>
                                </div>
                                <div class="px-2 pb-2 pb-md-0 text-center">
                                    <div id="circles-3"></div>
                                    <h6 class="fw-bold mt-3 mb-0">Laporan Ditolak</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                 <div class="col-md-4">
                    <div class="card full-height">
                        <div class="card-body">
                            <div class="card-title">
                                Total Points
                                 <small data-toggle="tooltip" data-placement="top" title="Point didapatkan dari laporan yang diterima. Semakin banyak laporan diterima, semakin banyak point yang kamu kumpulkan." style="cursor: pointer;">
                                    <i class="fa fa-info-circle text-primary"></i>
                                </small>
                                <script>
                                    $(function () {
                                        $('[data-toggle="tooltip"]').tooltip()
                                    })
                                </script>
                            </div>
                            <div class="card-category">Berikut adalah total point yang berhasil kamu kumpulkan</div>
                            <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                                <div class="px-2 pb-2 pb-md-0 text-center">
                                    <div id="circles-4"></div>
                                    <h6 class="fw-bold mt-3 mb-0">Total Point</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container-fluid">
            <nav class="pull-left">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="http://www.themekita.com">
                            ThemeKita
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Help
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Licenses
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="copyright ml-auto">
                2018, made with <i class="fa fa-heart heart text-danger"></i> by <a href="http://www.themekita.com">ThemeKita</a>
            </div>
        </div>
    </footer>
</div>
@endsection

@push('script')
    <script src="{{ asset('backend/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('backend/js/plugin/chart-circle/circles.min.js') }}"></script>
    <script src="{{ asset('backend/js/plugin/chart.js/chart.min.js') }}"></script>
    <script>
        $.notify({
            icon: 'flaticon-success',
            title: 'Sukses',
            message: 'Masuk Kehalaman Dashboard Berhasil!',
        }, {
            type: 'success',
            placement: {
                from: "top",
                align: "right"
            },
            time: 1000,
        });
    </script>

    <script>
        let data = @json($data);
        let userPoints = parseInt(@json($userPoints), 10);

		Circles.create({
			id:'circles-1',
			radius:45,
			value: Number(data.totalReports),
			maxValue:10,
			width:7,
            text: data.totalReports > 0 ? data.totalReports : '0',
			colors:['#f1f1f1', '#FF9E27'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-2',
			radius:45,
			value: Number(data.acceptedReports),
			maxValue:10,
			width:7,
			text: data.acceptedReports > 0 ? data.acceptedReports : '0',
			colors:['#f1f1f1', '#2BB930'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-3',
			radius:45,
			value: Number(data.rejectedReports),
			maxValue:10,
			width:7,
			text: data.rejectedReports > 0 ? data.rejectedReports : '0',
			colors:['#f1f1f1', '#F25961'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

        Circles.create({
            id:'circles-4',
            radius:45,
            value: Number(data.acceptedReports) * 1000,
            maxValue: 100000,
            width:7,
            text: userPoints > 0 ? userPoints : '0',
            colors:['#f1f1f1', '#1572E8'],
            duration:400,
            wrpClass:'circles-wrp',
            textClass:'circles-text',
            styleWrapper:true,
            styleText:true
        })

	</script>
@endpush
