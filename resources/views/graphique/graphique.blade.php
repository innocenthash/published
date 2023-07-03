@extends('layouts.dashboard_admin')

@section('title')
   Representation|Graphique
@endsection

@section('Representation|Graphique')
<div class="row">
    <div class="col-12 ">
        <h1 class="text-center my-4 font-extrabold text-2xl bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-yellow-500">Representation Graphique des utilisateurs</h1>
         <canvas class="bg-white shadow-2xl transition transform hover:bg-gradient-to-r from-white to-pink-500" id="myChart" height="100px"></canvas>
    </div>
</div>
{{-- <div class="row">
    <div class="col-12 ">
        <h1 class="text-center my-4 font-extrabold text-2xl bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-yellow-500">Representation Graphique des utilisateurs</h1>
         <canvas class="bg-white shadow-2xl transition transform hover:bg-gradient-to-r from-white to-pink-500" id="myChartannonce" height="100px"></canvas>
    </div>
</div> --}}
@endsection

@section('Graphique_js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script type="text/javascript">

      var labels =  {{ Js::from($labels) }};
      var users =  {{ Js::from($data) }};

      const data = {
        labels: labels,
        datasets: [{
          label: 'Mes utilisateurs ',
          backgroundColor: 'rgb(255, 99, 132)',
          borderColor: 'rgb(255, 99, 132)',
          data: users,
        }]
      };

      const config = {
        type: 'line',
        data: data,
        options: {}
      };

      const myChart = new Chart(
        document.getElementById('myChart'),
        config
      );

</script>
{{-- <script>

    var labels_annonce =  {{ Js::from($labels_annonce) }};
    var annonce =  {{ Js::from($data_annonce) }};

    const data = {
      labels: labels_annonce,
      datasets: [{
        label: 'Liste des annonces ',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: annonce,
      }]
    };

    const config = {
      type: 'line',
      data: data,
      options: {}
    };

    const myChartannonce = new Chart(
      document.getElementById('myChartannonce'),
      config
    );

</script> --}}

@endsection
