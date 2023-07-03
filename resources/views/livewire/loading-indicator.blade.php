<div>
    @if ($isLoading)
    <!-- Afficher l'indicateur de chargement -->
    <div class="loading-indicator">Chargement en cours...</div>
@endif

<button wire:click="startLoading">Démarrer le chargement</button>

</div>
