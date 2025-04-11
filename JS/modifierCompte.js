document.getElementById("formCompte").addEventListener("submit", function (event) {
    console.log("Formulaire soumis"); // Ajoute ceci pour tester si l'événement est bien capté.
    let isValid = true;

    const soldeCompte = document.getElementById("solde_compte").value;

    // Validation du solde (doit être un nombre positif)
    if (isNaN(soldeCompte) || parseFloat(soldeCompte) <= 0) {
        isValid = false;
        alert("Le solde doit être un nombre positif. Chez PicsouBanque on est riche.");
    }

    if (!isValid) {
        event.preventDefault(); // Empêche l'envoi du formulaire si la validation échoue
    }
});