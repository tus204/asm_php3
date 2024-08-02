</div>
</div>
</div>
</div>
<script>
    (function($) {

        toastr.options = {
            // "closeButton": true,
            "progressBar": true,
            "newestOnTop": true
            // "positionClass": "toast-top-full-width"
        };

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error('{{ $error }}', 'Lỗi');
            @endforeach
        @endif
        
        @if (Session::has('success'))
            toastr.success('{{ Session::get('success') }}', 'Thông báo');
        @endif

        var tfLineChart = (function() {

            var chartBar = function() {

                var options = {
                    series: [{
                            name: 'Total',
                            data: [0.00, 0.00, 0.00, 0.00, 0.00, 273.22, 208.12, 0.00, 0.00,
                                0.00, 0.00, 0.00
                            ]
                        }, {
                            name: 'Pending',
                            data: [0.00, 0.00, 0.00, 0.00, 0.00, 273.22, 208.12, 0.00, 0.00,
                                0.00, 0.00, 0.00
                            ]
                        },
                        {
                            name: 'Delivered',
                            data: [0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00,
                                0.00, 0.00
                            ]
                        }, {
                            name: 'Canceled',
                            data: [0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00,
                                0.00, 0.00
                            ]
                        }
                    ],
                    chart: {
                        type: 'bar',
                        height: 325,
                        toolbar: {
                            show: false,
                        },
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '10px',
                            endingShape: 'rounded'
                        },
                    },
                    dataLabels: {
                        enabled: false
                    },
                    legend: {
                        show: false,
                    },
                    colors: ['#2377FC', '#FFA500', '#078407', '#FF0000'],
                    stroke: {
                        show: false,
                    },
                    xaxis: {
                        labels: {
                            style: {
                                colors: '#212529',
                            },
                        },
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep',
                            'Oct', 'Nov', 'Dec'
                        ],
                    },
                    yaxis: {
                        show: false,
                    },
                    fill: {
                        opacity: 1
                    },
                    tooltip: {
                        y: {
                            formatter: function(val) {
                                return "$ " + val + ""
                            }
                        }
                    }
                };

                chart = new ApexCharts(
                    document.querySelector("#line-chart-8"),
                    options
                );
                if ($("#line-chart-8").length > 0) {
                    chart.render();
                }
            };

            /* Function ============ */
            return {
                init: function() {},

                load: function() {
                    chartBar();
                },
                resize: function() {},
            };
        })();

        jQuery(document).ready(function() {});

        jQuery(window).on("load", function() {
            tfLineChart.load();
        });

        jQuery(window).on("resize", function() {});
    })(jQuery);
</script>
