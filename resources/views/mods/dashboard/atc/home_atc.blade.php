@section('style')
    <style>
        .go {
            text-decoration: underline !important;
        }
    </style>
@endsection

@section('script')
<script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

<script>
    var radialoptions = {
            series: [{{$dt['sekolah']['persen_tk']}}],
            chart: {
                type: "radialBar",
                wight: 60,
                height: 60,
                sparkline: {
                    enabled: !0
                }
            },
            dataLabels: {
                enabled: !1
            },
            colors: ["#408fd3"],
            stroke: {
                lineCap: "round"
            },
            plotOptions: {
                radialBar: {
                    hollow: {
                        margin: 0,
                        size: "70%"
                    },
                    track: {
                        margin: 0
                    },
                    dataLabels: {
                        show: !1
                    }
                }
            },
        },
        radialchart = new ApexCharts(document.querySelector("#radialchart-1"), radialoptions);
    radialchart.render();

    var radialoptions = {
            series: [{{$dt['sekolah']['persen_sd']}}],
            chart: {
                type: "radialBar",
                wight: 60,
                height: 60,
                sparkline: {
                    enabled: !0
                }
            },
            dataLabels: {
                enabled: !1
            },
            colors: ["#6f3838"],
            stroke: {
                lineCap: "round"
            },
            plotOptions: {
                radialBar: {
                    hollow: {
                        margin: 0,
                        size: "70%"
                    },
                    track: {
                        margin: 0
                    },
                    dataLabels: {
                        show: !1
                    }
                }
            },
        },
        radialchart = new ApexCharts(document.querySelector("#radialchart-2"), radialoptions);
    radialchart.render();

    var radialoptions = {
            series: [{{$dt['sekolah']['persen_sltp']}}],
            chart: {
                type: "radialBar",
                wight: 60,
                height: 60,
                sparkline: {
                    enabled: !0
                }
            },
            dataLabels: {
                enabled: !1
            },
            colors: ["#edc348"],
            stroke: {
                lineCap: "round"
            },
            plotOptions: {
                radialBar: {
                    hollow: {
                        margin: 0,
                        size: "70%"
                    },
                    track: {
                        margin: 0
                    },
                    dataLabels: {
                        show: !1
                    }
                }
            },
        },
        radialchart = new ApexCharts(document.querySelector("#radialchart-3"), radialoptions);
    radialchart.render();

</script>
@endsection
