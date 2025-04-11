document.getElementById("formContrat").addEventListener("submit", function (event) {
    let isValid = true;

    // Récupération des valeurs
    const montant_contrat = document.getElementById("montant_contrat").value.trim();
    const duree_contrat = document.getElementById("duree_contrat").value.trim();
    const id_client = document.getElementById("id_client").value.trim();

    // Vérification du montant
    if (montant_contrat === "") {
        isValid = false;
        document.getElementById("erreurMontant").innerHTML = "❗ Merci de renseigner le montant";
    } else if (isNaN(montant_contrat) || parseFloat(montant_contrat) <= 0) {
        isValid = false;
        document.getElementById("erreurMontant").innerHTML = "❗ Le montant doit être supérieur à 0";
    } else {
        document.getElementById("erreurMontant").innerHTML = "";
    }

    // Vérification de la durée
    if (duree_contrat === "") {
        isValid = false;
        document.getElementById("erreurDuree").innerHTML = "❗ Merci de renseigner la durée du contrat";
    } else if (isNaN(duree_contrat) || parseFloat(duree_contrat) <= 0) {
        isValid = false;
        document.getElementById("erreurDuree").innerHTML = "❗ La durée doit être supérieure à 0";
    } else {
        document.getElementById("erreurDuree").innerHTML = "";
    }

    // Vérification de l'ID client
    if (id_client === "") {
        isValid = false;
        document.getElementById("erreurID").innerHTML = "❗ Merci de renseigner un numéro client";
    } else if (isNaN(id_client) || parseInt(id_client) <= 0) {
        isValid = false;
        document.getElementById("erreurID").innerHTML = "❗ ID client invalide";
    } else {
        document.getElementById("erreurID").innerHTML = "";
    }

    // Si l'une des validations échoue, on empêche l'envoi du formulaire
    if (!isValid) {
        event.preventDefault();
    }
});