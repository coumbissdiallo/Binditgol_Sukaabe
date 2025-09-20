<x-guest-layout>

<!-- le choix des roles -->
        <div class="container  pageinsc justify-content-center">
            <h2 class="text-primary">Inscrivez-Vous</h2>
            <form action="{{route ('envoie.role')}}" method="POST">
            @csrf
            <p>Quel est votre role svp?</p>
            
            <div class="d-flex justify-content-center align-items-center flex-column gap-3">
                <div class="form-check">
                    <input type="radio" name="role" id="roleParent" value="parent" required>
                    <label for="roleParent">Parent</label>
                </div>

                <div class="form-check">
                    <input type="radio" name="role" id="roleAsc" value="asc" required>
                    <label for="roleAsc">Agent Santé Communautaire</label>
                </div>

                <div class="form-check">
                    <input type="radio" name="role" id="roleAgent" value="agent" required>
                    <label for="roleAgent">Agent Civil</label>
                </div>

                <div class="form-check">
                    <input type="radio" name="role" id="roleOfficier" value="officier" required>
                    <label for="roleOfficier">Officier civil</label>
                </div>

                <div class="form-check">
                    <input type="radio" name="role" id="roleMaternite" value="maternite" required>
                    <label for="roleMaternite">Maternite</label>
                </div>

            </div>

                 <button type="submit" class="btn btn-primary mt-4">Continuer</button>

            </form>
        </div>





</x-guest-layout>