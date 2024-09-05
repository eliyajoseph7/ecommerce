<div>
    <div class="bg-gray-50 mt-2 p-2">
        <div class="font-bold text-gray-700 py-2">New vs. Returning Customers</div>
        <div class="h-60 relative">
            <div class="text-center absolute top-1/3 left-1/3 text-sky-300 {{ $loading ? '' : 'hidden' }}">
                <i class="fa-solid fa-spinner fa-spin fa-3x"></i>
                <p>Loading...</p>
            </div>
            <div class="{{ !$loading ? '' : 'hidden' }} h-full">
                <div wire:ignore class="customer h-full"></div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // drawChart()
        });


        function drawCustomerChart(series) {
            // console.log(series[0]);
            $('.customer').highcharts({
                chart: {
                    type: 'pie'
                },
                title: {
                    text: ''
                },
                tooltip: {
                    // valueSuffix: '%'
                },
                subtitle: {
                    text: ''
                },
                plotOptions: {
                    series: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: [{
                            enabled: true,
                            distance: 20
                        }, {
                            enabled: true,
                            distance: -40,
                            format: '{point.percentage:.1f}%',
                            style: {
                                fontSize: '1.2em',
                                textOutline: 'none',
                                opacity: 0.7
                            },
                            filter: {
                                operator: '>',
                                property: 'percentage',
                                value: 10
                            }
                        }]
                    }
                },
                series: [series]
            });


        }

        document.addEventListener('livewire:init', () => {
            Livewire.on('redraw_customer_chart', (data) => {
                drawCustomerChart(data[0])
                // console.log(data[0]);
                
            })
        })
    </script>
</div>
