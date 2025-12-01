<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Admin Dashboard</title>
</head>

<body class="bg-gray-100">
    <div class="max-w-5xl mx-auto py-10">
        <h1 class="text-2xl font-bold mb-6">Dashboard Admin</h1>
        <div class="bg-white p-6 rounded shadow">
            <canvas id="chart"></canvas>
        </div>
    </div>


    <script>
        const ctx = document.getElementById('chart');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['SD', 'SMP', 'SMA'],
                datasets: [{
                    label: 'Jumlah Pendaftar',
                    data: [{{ $counts['SD'] }}, {{ $counts['SMP'] }}, {{ $counts['SMA'] }}]
                }]
            }
        });
    </script>
</body>

</html>
