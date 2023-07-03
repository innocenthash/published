@extends('layouts.dashboard_admin')

@section('title')
    Formulaire|Plan
@endsection

@section('formulaire_plan')
   <div class="row justify-center h-screen ">
      <div class="col-12 col-md-4  ">
        <div class="card mt-1 hover:shadow-xl rounded-xl" >
            <div class="card-header text-center h1 bg-gradient-to-r from-pink-500 to-yellow-500">
                <span class="text-white">
                      Plan
                </span>
            </div>
            <div class="card-body">
                <form action="{{url('/save_plan')}}" method="POST">
                    @csrf
                    <div class="form-group">

                      <input type="text" class="form-control rounded-lg"  placeholder="Nom..." name="nom">
                    </div>
                    <div class="form-group">

                        <input type="text" class="form-control rounded-lg"  placeholder="Slug..." name="slug">
                    </div>
                    <div class="form-group ">

                        <input type="text" class="form-control rounded-lg"  placeholder="Plan..." name="plan">
                    </div>
                    <div class="form-group ">

                        <input type="number" class="form-control rounded-lg" min="0"  placeholder="Tarif..." name="tarif">
                    </div>
                    <label for="" class="text-muted">Avantage :</label>
                    <div class="form-group ">

                        <input type="text" class="form-control rounded-lg"  placeholder="Avantage..." name="liste[0]">
                    </div>

                    <div id="champs-dynamiques" class="form-group mt-0">
                        <!-- Les champs de formulaire dynamiques seront ajoutés ici -->
                    </div>

                    <div class="form-group ">

                        <button type="button" class="btn focus:ring-0  forn-control mt-0 " id="ajouter-champ"><i class="fas fa-plus-circle text-xl text-rose-900"></i></button>
                    </div>



                    <button type="submit" class=" hover:bg-red-900 form-control rounded-lg bg-gradient-to-r from-pink-500 to-yellow-500 shadow-lg shadow-teal-500/50 text-white btn btn-block">Enregistrer</button>
                  </form>
            </div>

          </div>
      </div>
   </div>
@endsection

@section('formulaire_plan_js')
<script>
    $(document).ready(function() {
        var champIndex = 1;

        $('#ajouter-champ').click(function() {
            var nouvelElement = '<input type="text" class="form-control rounded-md mb-2" name="liste[' + champIndex + ']" placeholder="Avantage' + champIndex + '" required>';
            $('#champs-dynamiques').append(nouvelElement);

            champIndex++;
        });
    });
</script>
@endsection
