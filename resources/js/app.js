import './bootstrap';
import { Modal } from 'bootstrap';


import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


document.addEventListener('DOMContentLoaded', function () {

/*page inscription*/
  const radios = document.querySelectorAll('input[name="role"]');
    const sections = document.querySelectorAll('.role-section');

    radios.forEach(radio => {
        radio.addEventListener('change', function () {
            const selected = this.value;

            sections.forEach(section => {
                section.style.display = section.dataset.role === selected ? 'block' : 'none';
            });
        });
    });

/*pour l'affichage des communes*/
    const region= document.getElementById('region');
    const commune= document.getElementById('commune');


    if (region && commune) {
        region.addEventListener('change', function () {
            let region = this.value;

            fetch(`/communes-by-region/${region}`)
  .then(response => {
    if (!response.ok) {
      throw new Error("Réponse non valide : " + response.status);
    }
    return response.json();
  })

  .then(data => {
    commune.innerHTML = '<option value="">-- Sélectionnez votre commune --</option>';
    data.forEach(item => {
      let option = document.createElement('option');
      option.value = item.id;
      option.text = item.nom_commune;
      commune.appendChild(option);
    });
  })
  .catch(error => {
    console.error("Erreur AJAX :", error);
    alert("Impossible de charger les communes. Vérifie la région ou la connexion.");
  });

                
        });

    }

});


/*modal de détails */
window.showDetails = function(id) {
    fetch(`/accouchement/${id}/details`)
        .then(response => response.text())
        .then(html => {
            document.getElementById('detailsModalBody').innerHTML = html;
            const modal = new Modal(document.getElementById('detailsModal'));
            modal.show();
        })
        .catch(error => {
            console.error("Erreur lors du chargement des détails :", error);
        });
};

/*filtrage par nom maternité$*/
 document.getElementById('commune').addEventListener('change', function () { 
  let id_commune = this.value; 
  fetch(`/maternites-by-commune/${id_commune}`) .then(res => res.json()) .then(data => { console.log(data); let select = document.getElementById('maternite'); select.innerHTML = '<option value="">Choisir une maternité</option>'; data.forEach(m => { select.innerHTML += `<option value="${m.id}">${m.nom_maternite}</option>`; }); }); });


