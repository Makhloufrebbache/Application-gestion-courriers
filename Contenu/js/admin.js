//Validation de courrier
function Validercourrier(Num_Enrg) {
  var msg = "Voulez vous valider ce courrier ?";
  if (confirm(msg))
    document.location.href = "courriernonvalide/validercourrier/" + Num_Enrg;
}
//Validation de facture
function Validerfacture(id) {
  var msg = "Voulez vous valider cette facture ?";
  if (confirm(msg))
    document.location.href = "facturenonvalide/validerfacture/" + id;
}
//Annulation d'une facture
function AnnulerFacture(Num_Fact) {
  var msg = "Voulez-vous vraiment annuler cette facture ?";
  if (confirm(msg))
    document.location.href = "factureannuler/annulerfacture/" + Num_Fact;
}

