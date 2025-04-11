document.getElementById("formCompte").addEventListener("submit", function (event) {
    let isValid = true;

    const rib_compte = document.getElementById("rib_compte").value.trim();
    const type_compte = document.getElementById("type_compte").value.trim();
    const solde = document.getElementById("solde").value.trim();
    const id_client = document.getElementById("id_client").value.trim();

    const regexRib = /^[0-9A-Z]{5,34}$/; // le RIB doit contenir des lettres et des numeros

    // verification du rib compte 
    if (!regexRib.test(rib_compte)) {
        isValid = false;
        document.getElementById("erreur_rib").innerHTML = "❗ RIB invalide (lettres/numéros, 5 à 34 caractères)";
    } else {
        document.getElementById("erreur_rib").innerHTML = "";
    }

    // vérification du solde 
    if (isNaN(solde) || parseFloat(solde) <= 0) {
        isValid = false;
        document.getElementById("erreurSolde").innerHTML = "❗ Le solde doit être un nombre supérieur à 0";
    } else {
        document.getElementById("erreurSolde").innerHTML = "";
    }
    // Verification du type 
    const allowedTypes = ["compte courant", "compte épargne"];
    if (!allowedTypes.includes(type_compte)) {
        isValid = false;
        alert("❗ Type de compte invalide !");
    }
    // Verification de l'id
    if (isNaN(id_client) || parseInt(id_client) <= 0) {
        isValid = false;
    }

    // Si l'une des validations échoue, on empêche l'envoi du formulaire
    if (!isValid) {
        event.preventDefault();
    }
});