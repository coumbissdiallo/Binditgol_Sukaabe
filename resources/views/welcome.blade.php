<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/welcome.css')
    @vite(['resources/css/interfaceUsers.css'])

    <title>Binditgol Sukaabe</title>
</head>
    <section class="hero-section d-flex align-items-center justify-content-center">
        <div class="fond w-100 h-100 d-flex align-items-center justify-content-center">
    
        <div class="container-fluid container-fixed p-4 mon-cadre">
       <h4>Ensemble pour chaque enfant déclaré au Sénégal</h4>
       <div class="welcome d-flex flex-wrap justify-content-center mt-4">
            <p>Bienvenue sur</p>
          <Strong class="ms-3 logo1">Binditgol</Strong>
          <strong class="ms-2 logo2">Sukaabe</strong>
       </div>
       <p>Cette application facilite l’enregistrement à l’état civil des nouveaux-nés dans les zones rurales du Sénégal afin de réduire le taux d’enfants non déclarés, garantissant ainsi une identité légale dès la naissance.</p>
        <p>Que vous soyez <strong>parents</strong>, <strong>agents</strong>, ou <strong>officiers d'états civils</strong>, vous faites face à de nombreux problèmes administratifs causés par un manque d’outils modernes.</p>
        <p><strong class="logo1">Binditgol</strong> <strong class="logo2">Sukaabe</strong> s’inscrit dans cette dynamique pour rendre l’enregistrement des naissances <mark>simple</mark>,<mark> rapide</mark> et <mark>accessible à tous</mark>.</p>
        <p class="text-primary">Saviez-vous que 1 enfant sur 1000 n’est pas déclaré ? Objectif : 100% des enfants enregistrés.</p>
       <h6 class="text-white">Ensemble, faisons disparaître l’invisibilité administrative.</h6>
       <a href="{{ route('login') }}" class="text-primary">[ Commencer maintenant ]</a>
          
          
        </div>
        

        </div>

       
    </section>
</body>
</html>