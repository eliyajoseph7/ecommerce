<div>
    <div class="bg-gray-50 rounded-md p-2">
        <div class="font-bold text-gray-700 pb-2 flex justify-between">
            <div class="">Most viewed items</div>
            <div class="">
                <select wire:model.live="type" class="rounded-md shadow-sm py-0">
                    <option value="chart">Chart</option>
                    <option value="table">Table</option>
                </select>
            </div>
        </div>
        <div class="overfolw-x-auto {{ $type == 'table' ? 'max-h-96 overflow-y-auto' : 'h-96' }} relative">
            <div class="text-center absolute top-1/3 left-1/3 text-sky-300 {{ $loading ? '' : 'hidden' }}">
                <i class="fa-solid fa-spinner fa-spin fa-3x"></i>
                <p>Loading...</p>
            </div>
            <div class="{{ !$loading ? '' : 'hidden' }} h-full">
                @if ($type == 'table')
                    <table class="w-full overflow-x-auto mt-2 h-full">
                        <tbody>
                            @forelse ($data ?? [] as $dt)
                                <tr>
                                    <td class="py-2">{{ $loop->iteration }}.</td>
                                    <td class="">
                                        <div class="flex space-x-1">
                                            <img src="{{ asset($dt->images()->first()->image) }}"
                                                class="w-12 h-8 object-cover rounded-md">
                                            <div class="text-gray-700">{{ Str::limit($dt->name, 20, '...') }}</div>
                                        </div>
                                    </td>
                                    <td class="">{{ round($dt->percentage, 2) }}%</td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="3">No record</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                @else
                    <div wire:ignore class="view_trend h-full w-full"></div>
                @endif
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", () => {
                // drawChart()
            });


            function drawChart(categories, series) {
                // console.log(series);
                // console.log(categories);
                $('.view_trend').highcharts({
                    chart: {
                        type: 'bar'
                    },
                    title: {
                        text: '',
                        align: 'left'
                    },
                    subtitle: {
                        text: '',
                        align: 'left'
                    },
                    xAxis: {
                        categories: categories,
                        labels: {
                            formatter: function() {
                                var label = this.value;
                                if (label.length > 10) {
                                    return label.substring(0, 5) + '...';
                                }
                                return label;
                            }
                        },
                        title: {
                            text: null
                        },
                        gridLineWidth: 1,
                        lineWidth: 0
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Views',
                            align: 'high'
                        },
                        labels: {
                            overflow: 'justify'
                        },
                        gridLineWidth: 0
                    },
                    tooltip: {
                        valueSuffix: ' '
                    },
                    plotOptions: {
                        bar: {
                            borderRadius: '50%',
                            dataLabels: {
                                enabled: true
                            },
                            groupPadding: 0.1
                        }
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'top',
                        x: -40,
                        y: 80,
                        floating: true,
                        borderWidth: 1,
                        backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
                        shadow: true
                    },
                    credits: {
                        enabled: false
                    },
                    series: series
                });



            }

            document.addEventListener('livewire:init', () => {
                Livewire.on('redraw_view_trend_chart', (data) => {
                    // console.log(data.result);
                    setTimeout(() => {
                        drawChart(data.result[0], data.result[1]);
                    }, 100); // Delay to ensure DOM readiness
                })
            })
        </script>
    </div>
</div>
