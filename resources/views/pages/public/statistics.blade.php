@extends('layouts.public')

@section('title', 'Statistik Desa')

@section('content')
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Statistik Desa Katingan</h2>
                <p class="text-lg text-gray-600">Data demografis penduduk desa Katingan yang diperbarui secara real-time berdasarkan sistem administrasi desa.</p>
            </div>

            <!-- Stats Overview -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 text-center">
                    <p class="text-gray-500 text-sm mb-2 uppercase tracking-wider font-semibold">Total Penduduk</p>
                    <h3 class="text-4xl font-bold text-primary-600">{{ number_format($stats['total_penduduk']) }}</h3>
                </div>
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 text-center">
                    <p class="text-gray-500 text-sm mb-2 uppercase tracking-wider font-semibold">Laki-laki</p>
                    <h3 class="text-4xl font-bold text-blue-600">{{ number_format($stats['penduduk_laki']) }}</h3>
                </div>
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 text-center">
                    <p class="text-gray-500 text-sm mb-2 uppercase tracking-wider font-semibold">Perempuan</p>
                    <h3 class="text-4xl font-bold text-pink-600">{{ number_format($stats['penduduk_perempuan']) }}</h3>
                </div>
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 text-center">
                    <p class="text-gray-500 text-sm mb-2 uppercase tracking-wider font-semibold">Total Keluarga</p>
                    <h3 class="text-4xl font-bold text-green-600">{{ number_format($stats['total_kk']) }}</h3>
                </div>
            </div>

            <!-- Visualizations -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Age Groups -->
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                    <h4 class="text-xl font-bold text-gray-900 mb-6">Kelompok Usia</h4>
                    <div class="h-80">
                        <canvas id="ageChart"></canvas>
                    </div>
                </div>

                <!-- Religion -->
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                    <h4 class="text-xl font-bold text-gray-900 mb-6">Distribusi Agama</h4>
                    <div class="h-80">
                        <canvas id="religionChart"></canvas>
                    </div>
                </div>

                <!-- Education -->
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 lg:col-span-2">
                    <h4 class="text-xl font-bold text-gray-900 mb-6">Tingkat Pendidikan</h4>
                    <div class="h-96">
                        <canvas id="educationChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const chartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        };

        // Age Chart
        new Chart(document.getElementById('ageChart'), {
            type: 'bar',
            data: {
                labels: {!! json_encode($demographics['age_groups']['labels']) !!},
                datasets: [{
                    label: 'Jumlah',
                    data: {!! json_encode($demographics['age_groups']['data']) !!},
                    backgroundColor: '#3b82f6',
                    borderRadius: 8
                }]
            },
            options: chartOptions
        });

        // Religion Chart
        new Chart(document.getElementById('religionChart'), {
            type: 'doughnut',
            data: {
                labels: {!! json_encode($demographics['religion']['labels']) !!},
                datasets: [{
                    data: {!! json_encode($demographics['religion']['data']) !!},
                    backgroundColor: ['#3b82f6', '#10b981', '#f59e0b', '#ef4444', '#8b5cf6', '#6b7280'],
                    borderWidth: 0
                }]
            },
            options: chartOptions
        });

        // Education Chart
        new Chart(document.getElementById('educationChart'), {
            type: 'bar',
            data: {
                labels: {!! json_encode($demographics['education']['labels']) !!},
                datasets: [{
                    label: 'Jumlah',
                    data: {!! json_encode($demographics['education']['data']) !!},
                    backgroundColor: '#8b5cf6',
                    borderRadius: 8
                }]
            },
            options: {
                ...chartOptions,
                indexAxis: 'y'
            }
        });
    </script>
@endpush