<div>
    <div class="bg-gray-50 p-2">
        <div class="font-bold text-gray-700 py-2">Best selling categories</div>
        <div class="h-96 relative">
            <div class="text-center absolute top-1/3 left-1/3 text-sky-300 {{ $loading ? '' : 'hidden' }}">
                <i class="fa-solid fa-spinner fa-spin fa-3x"></i>
                <p>Loading...</p>
            </div>
            <div class="{{ !$loading ? '' : 'hidden' }} h-full">
                <div wire:ignore class="best_selling_category h-full"></div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // drawChart()
        });


        function drawBestSaleCategoriesChart(values, total) {
            $('.best_selling_category').highcharts({
                chart: {
                    type: 'pie',
                    custom: {},
                    events: {
                        render() {
                            const chart = this,
                                series = chart.series[0];
                                // console.log(chart.series);
                                
                            let customLabel = chart.options.chart.custom.label;

                            if (!customLabel) {
                                customLabel = chart.options.chart.custom.label =
                                    chart.renderer.label(
                                        'Total <br/>' +
                                        '<strong><small class="text-sm">TSh.</small>'+ total + '</strong>'
                                    )
                                    .css({
                                        color: '#000',
                                        textAnchor: 'middle'
                                    })
                                    .add();
                            }

                            const x = series.center[0] + chart.plotLeft,
                                y = series.center[1] + chart.plotTop -
                                (customLabel.attr('height') / 2);

                            customLabel.attr({
                                x,
                                y
                            });
                            // Set font size based on chart diameter
                            customLabel.css({
                                fontSize: `${series.center[2] / 12}px`
                            });
                        }
                    }
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                title: {
                    text: ''
                },
                subtitle: {
                    text: ''
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.0f}%</b>'
                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    series: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        borderRadius: 8,
                        dataLabels: [{
                            enabled: true,
                            distance: 20,
                            format: '{point.name}'
                        }, {
                            enabled: true,
                            distance: -15,
                            format: '{point.percentage:.0f}%',
                            style: {
                                fontSize: '0.9em'
                            }
                        }],
                        showInLegend: true
                    }
                },
                series: values
            });
        }



        document.addEventListener('livewire:init', () => {
            Livewire.on('draw_selling_category_chart', (data) => {
            // console.log(data.series);
            setTimeout(() => {
                drawBestSaleCategoriesChart(data.series, data.total);
            }, 100); // Delay to ensure DOM readiness
            })
        })
    </script>
</div>
