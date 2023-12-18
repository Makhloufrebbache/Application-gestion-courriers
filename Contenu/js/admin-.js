function menuDelete(id){
    var msg = "Etes vous s\373re de vouloir supprimer cet menu?";
	if (confirm(msg))
	  document.location.href='admin/menusdel/'+id;	
	}

function categorieDelete(id){
    var msg = "Etes vous s\373re de vouloir supprimer cette catégorie?";
	if (confirm(msg))
	  document.location.href='admin/categoriesdel/'+id;	
	}
	
function sousRubDelete(id){
    var msg = "Etes vous s\373re de vouloir supprimer cette sous rubrique?";
	if (confirm(msg))
	  document.location.href='admin/sousRubdel/'+id;	
	}


function scategorieDelete(id){
    var msg = "Etes vous s\373re de vouloir supprimer cette catégorie?";
	if (confirm(msg))
	  document.location.href='admin/scategoriesdel/'+id;	
	}
	
function infoDelete(id){
    var msg = "Etes vous s\373re de vouloir supprimer cet élément?";
	if (confirm(msg))
	  document.location.href='admin/infosdel/'+id;	
	}
	
	
function commentDelete(id){
    var msg = "Etes vous s\373re de vouloir supprimer ce commentaire?";
	if (confirm(msg))
	  document.location.href='admin/commentdel/'+id;	
	}

function entretienDelete(id){
    var msg = "Etes vous s\373re de vouloir supprimer cet entretien?";
	if (confirm(msg))
	  document.location.href='admin/entretiendel/'+id;	
	}

function cat_son (rang_ligne,rep_id){ //r*
var   nbrelet = document.getElementById('categories').getElementsByTagName('div')[0].childNodes.length-2;
//alert(rang_ligne+',  '+nbrelet);
rang_ligne1 = rang_ligne+1;
if(rang_ligne1 <= nbrelet )
		                  {//verifier s'il y'a changement de choix
						
 		             for(var i=rang_ligne1;i<=nbrelet;i=i+1){ //supprimer les children
		               if(document.getElementById("come"+i)){
	 document.getElementById('categories').getElementsByTagName('div')[0].removeChild(document.getElementById("come"+i)); 
	                                                        }
		                                                    }
															//return false;
		                 }

//$("#wait_load").html('<img src="images/loaderc.gif" />');
	$.ajax({type:"POST", data: "rang_ligne="+rang_ligne+"&rep_id="+rep_id, url:"Modele/catSon.php", 
			success: function(data){
				//alert(data);
			rang_ligne++;	
    var conteneur = document.getElementById('categories').getElementsByTagName('div')[0];//elt recevant des resultats
			var ligne = document.createElement('div'); //TR  creation d'une ligne
	        ligne.setAttribute('id', 'come'+rang_ligne);
			ligne.setAttribute('class', 'form-group');
		    ligne.innerHTML=data;
			if(data!="")
            conteneur.appendChild(ligne);
			},
                        error: function(){
			        $("#categories").html('Problème de connexion!');
			}
		});
} //r*

jQuery('.aff').click(function()
  {
      jQuery('#menu-gauche').toggle(400);
      return false;
   });
   
$('.carousel').carousel({
  interval: 3000,
  direction:'right'
})

$('.carousel1').carousel({
  interval: 5000,
  direction:'right'
})

$('.carouselpub').carousel({
  interval: 10000,
  direction:'right'
})

$('.carouselpubf').carousel({
  interval: 22000,
  direction:'right'
})

$('.carouselpub300').carousel({
  interval: 20000,
  direction:'right'
})


function articleDelete(id){
    var msg = "Etes vous s\373re de vouloir supprimer cet article?";
	if (confirm(msg))
	  document.location.href='admin/articledel/'+id;	
	}  
	
function displayArticle(value, id){
	  document.location.href='admin/displayArticle/'+value+'-'+id;	
	}
	
function displayArticleSupplement(value, id){
	  document.location.href='admin/displayArticleSupplement/'+value+'-'+id;	
	}
	
function displayArticleSupplementC(value, id){
	  document.location.href='admin/displayArticleSupplementC/'+value+'-'+id;	
	}

function displayArticleSupplementSp(value, id){
	  document.location.href='admin/displayArticleSupplementSp/'+value+'-'+id;	
	}
	
function displayArticleSupplementSa(value, id){
	  document.location.href='admin/displayArticleSupplementSa/'+value+'-'+id;	
	}
	
function displayArticleSupplementIn(value, id){
	  document.location.href='admin/displayArticleSupplementIn/'+value+'-'+id;	
	}
	
function displayArticleSupplementEc(value, id){
	  document.location.href='admin/displayArticleSupplementEc/'+value+'-'+id;	
	}
	
function displayArticleSupplementBh(value, id){
	  document.location.href='admin/displayArticleSupplementBh/'+value+'-'+id;	
	}
	
function displayArticleSupplementThe(value, id){
	  document.location.href='admin/displayArticleSupplementThe/'+value+'-'+id;	
	}

function supplementThemaDelete(id){
    var msg = "Etes vous s\373re de vouloir supprimer cet article?";
	if (confirm(msg))
	  document.location.href='admin/supplementThemadel/'+id;	
	}  
	
function supplementCultureDelete(id){
    var msg = "Etes vous s\373re de vouloir supprimer cet article?";
	if (confirm(msg))
	  document.location.href='admin/supplementCulturedel/'+id;	
	}  
	
function supplementSportDelete(id){
    var msg = "Etes vous s\373re de vouloir supprimer cet article?";
	if (confirm(msg))
	  document.location.href='admin/supplementSportdel/'+id;	
	} 
	
function supplementSanteDelete(id){
    var msg = "Etes vous s\373re de vouloir supprimer cet article?";
	if (confirm(msg))
	  document.location.href='admin/supplementSantedel/'+id;	
	} 
	
function supplementInternationalDelete(id){
    var msg = "Etes vous s\373re de vouloir supprimer cet article?";
	if (confirm(msg))
	  document.location.href='admin/supplementInternationaldel/'+id;	
	}
	
function supplementEconomieDelete(id){
    var msg = "Etes vous s\373re de vouloir supprimer cet article?";
	if (confirm(msg))
	  document.location.href='admin/supplementEconomiedel/'+id;	
	}
	
function brocanteHebdoDelete(id){
    var msg = "Etes vous s\373re de vouloir supprimer cet article?";
	if (confirm(msg))
	  document.location.href='admin/brocanteHebdodel/'+id;	
	}                    
	
function supplementDelete(id){
    var msg = "Etes vous s\373re de vouloir supprimer ce supplément?";
	if (confirm(msg))
	  document.location.href='admin/supplementdel/'+id;	
	}  

function pdfDelete(id){
    var msg = "Etes vous s\373re de vouloir supprimer ce PDF?";
	if (confirm(msg))
	  document.location.href='admin/pdfdel/'+id;	
	}
	
function contactDelete(id){
    var msg = "Etes vous s\373re de vouloir supprimer ce contact?";
	if (confirm(msg))
	  document.location.href='admin/contactsdel/'+id;	
	}
	
function bannerDelete(id){
    var msg = "Etes vous s\373re de vouloir supprimer cette bannière?";
	if (confirm(msg))
	  document.location.href='admin/bannerdel/'+id;	
	}
	
function userDelete(id){
    var msg = "Etes vous s\373re de vouloir supprimer cette utilisateur?";
	if (confirm(msg))
	  document.location.href='admin/userdel/'+id;	
	}
	

jQuery('#comment').submit(function()
  {
     
//$("#wait_load").html('<img src="images/loaderc.gif" />');
    var commentArtId = $("#commentArtId").val();
    var commentName  = $("#commentName").val();
	var commentEmail = $("#commentEmail").val();
	var commentMsg   = $("#commentMsg").val();
	
	$("#commentAlert").html('Envoi en cours ...');

	$.ajax({type:"POST", data: "commentArtId="+commentArtId+"&commentName="+commentName+"&commentEmail="+commentEmail+"&commentMsg="+commentMsg, url:"Modele/comment.php", 
			success: function(data){
			$("#commentAlert").html(data);
			window.setTimeout(function(){$('.modal-backdrop').fadeOut(); $('#infos').fadeOut(); location.reload();}, 3000);
			},
                        error: function(){
			        $("#commentAlert").html('Problème de connexion!');
			}
		});

      return false;
   });

jQuery('#recommander').submit(function()
  {
     
//$("#wait_load").html('<img src="images/loaderc.gif" />');
    var recommanderArtId     = $("#recommanderArtId").val();
    var recommanderEmail     = $("#recommanderEmail").val();
	var recommanderEmailDest = $("#recommanderEmailDest").val();
	var recommanderMsg       = $("#recommanderMsg").val();
	var recommanderArtSlug   = $("#recommanderArtSlug").val();
	var recommanderArtTitle  = $("#recommanderArtTitle").val();
	
	$("#recommanderAlert").html('Envoi en cours ...');

	$.ajax({type:"POST", data: "recommanderArtId="+recommanderArtId+"&recommanderEmail="+recommanderEmail+"&recommanderEmailDest="+recommanderEmailDest+"&recommanderMsg="+recommanderMsg+"&recommanderArtSlug="+recommanderArtSlug+"&recommanderArtTitle="+recommanderArtTitle, url:"Modele/recommander.php", 
			success: function(data){
			$("#recommanderAlert").html(data);
			window.setTimeout(function(){$('.modal-backdrop').fadeOut(); $('#modal-content').fadeOut();}, 3000);
			},
                        error: function(){
			        $("#recommanderAlert").html('Problème de connexion!');
			}
		});

      return false;
   });

jQuery('#contactez-nous').submit(function()
  {
     
//$("#wait_load").html('<img src="images/loaderc.gif" />');
    var nom                = $("#nom").val();
    var email              = $("#email").val();
	var sujet              = $("#sujet").val();
	var destinataire       = $("#destinataire").val();
	var msg                = $("#msg").val();

	$("#contactAlert").html('Envoi en cours ...');

	$.ajax({type:"POST", data: "nom="+nom+"&email="+email+"&sujet="+sujet+"&destinataire="+destinataire+"&msg="+msg, url:"Modele/contacter_nous.php", 
			success: function(data){
			$("#contactAlert").html(data);
			     $("#nom").val('');
                 $("#email").val('');
	             $("#sujet").val('');
	             $("#destinataire").val('');
	             $("#msg").val('');
 window.setTimeout(function(){$('#contactAlert').html('');}, 3000);
			},
                        error: function(){
			        $("#contactAlert").html('Problème de connexion!');
			}
		});

      return false;
   });
   
jQuery('#pw-form').submit(function()
  {
    var login                = $("#login").val(); alert(login);
    var pw                   = $("#pw").val();
	var pwc                  = $("#pwc").val();
 if(pw != pwc){
	 alert("Les mots de passe ne sont pas identiques!");
	 return false;
	 }
   });

//Chargement des articles (pagination ajax)
jQuery('#plus_articles').click(function(){ //r*

  var id_rub = $("#plus_articles").data("rub");
  var pg     = $("#pg").val();  
  var ppg    = $("#plus_articles").data("ppg");
  var res    = $("#plus_articles").data("res");
  var nb_pg  = $("#plus_articles").data("nbpg");
  
  $("#plus_articles").html('Chargement...');
	$.ajax({type:"POST", data: "id_rub="+id_rub+"&pg="+pg+"&ppg="+ppg+"&res="+res, url:"Modele/rub_paginate.php", 
			success: function(data){
			//rang_ligne++;	
			//alert(data);
    var conteneur = document.getElementById('zone_articles');//elt recevant des resultats
			var ligne = document.createElement('article'); //TR  creation d'une ligne
	        ligne.setAttribute('class', 'row');
			//ligne.setAttribute('class', 'form-group');
		    ligne.innerHTML=data;
			if(data!=""){
			$("#plus_articles").html("+ d'articles");
            conteneur.appendChild(ligne);
			$("#plus_articles").attr("data-rub",id_rub);
			var pg1 = parseFloat(pg) + 1;
			document.getElementById('pg').value=pg1;
			$("#plus_articles").attr("data-ppg",ppg);
			$("#plus_articles").attr("data-res",res);} 
			if(pg1==nb_pg)
			  $("#more_articles").html('<button class="btn btn-info" >Terminé!</button>');
			},
                        error: function(){
			        $("#plus_articles").html="Problème de connexion!";
			}
		});
});

//Chargement des articles du moteur de recherches (pagination ajax)
jQuery('#plus_searchs').click(function(){ //r*

  var recherche = $("#plus_searchs").data("recherche");
  var pg        = $("#pg").val();  
  var ppg       = $("#plus_searchs").data("ppg");
  var res       = $("#plus_searchs").data("res");
  var nb_pg     = $("#plus_searchs").data("nbpg");
  
  $("#plus_searchs").html('Chargement...');
	$.ajax({type:"POST", data: "recherche="+recherche+"&pg="+pg+"&ppg="+ppg+"&res="+res, url:"Modele/search_paginate.php", 
			success: function(data){
			//rang_ligne++;	
			//alert(data);
    var conteneur = document.getElementById('zone_articles');//elt recevant des resultats
			var ligne = document.createElement('div'); //TR  creation d'une ligne
	        //ligne.setAttribute('class', 'archives_art');
			//ligne.setAttribute('class', 'form-group');
		    ligne.innerHTML=data;
			if(data!=""){
			$("#plus_searchs").html("+ de résultats");
            conteneur.appendChild(ligne);
			$("#plus_searchs").attr("data-recherche",recherche);
			var pg1 = parseFloat(pg) + 1;
			document.getElementById('pg').value=pg1;
			$("#plus_searchs").attr("data-ppg",ppg);
			$("#plus_searchs").attr("data-res",res);} 
			if(pg1==nb_pg)
			  $("#more_articles").html('<button class="btn btn-info" >Terminé!</button>');
			},
                        error: function(){
			        $("#plus_searchs").html="Problème de connexion!";
			}
		});
});

//Chargement des PDFs (pagination ajax)
jQuery('#plus_pdfs').click(function(){ //r*

  var pg        = $("#pg").val();  
  var ppg       = $("#plus_pdfs").data("ppg");
  var res       = $("#plus_pdfs").data("res");
  var nb_pg     = $("#plus_pdfs").data("nbpg");
  
  $("#plus_pdfs").html('Chargement...');
	$.ajax({type:"POST", data: "&pg="+pg+"&ppg="+ppg+"&res="+res, url:"Modele/pdf_paginate.php", 
			success: function(data){
			//rang_ligne++;	
			//alert(data);
    var conteneur = document.getElementById('zone_articles');//elt recevant des resultats
			var ligne = document.createElement('div'); //TR  creation d'une ligne
	        //ligne.setAttribute('class', 'archives_art');
			//ligne.setAttribute('class', 'form-group');
		    ligne.innerHTML=data;
			if(data!=""){
			$("#plus_pdfs").html("+ de résultats");
            conteneur.appendChild(ligne);
			//$("#plus_pdfs").attr("data-recherche",recherche);
			var pg1 = parseFloat(pg) + 1;
			document.getElementById('pg').value=pg1;
			$("#plus_pdfs").attr("data-ppg",ppg);
			$("#plus_pdfs").attr("data-res",res);} 
			if(pg1==nb_pg)
			  $("#more_articles").html('<button class="btn btn-info" >Terminé!</button>');
			},
                        error: function(){
			        $("#plus_pdfs").html="Problème de connexion!";
			}
		});
});

//Chargement des articles (pagination ajax)
jQuery('#plus_articlesSupp').click(function(){ //r*
  var id_sup = $("#plus_articlesSupp").data("sup");
  var id_sr  = $("#plus_articlesSupp").data("sr");
  var pg     = $("#pg").val();  
  var ppg    = $("#plus_articlesSupp").data("ppg");
  var res    = $("#plus_articlesSupp").data("res");
  var nb_pg  = $("#plus_articlesSupp").data("nbpg");
  var date   = $("#plus_articlesSupp").data("date");
  
  $("#plus_articlesSupp").html('Chargement...');
	$.ajax({type:"POST", data: "id_sup="+id_sup+"&id_sr="+id_sr+"&pg="+pg+"&ppg="+ppg+"&res="+res+"&date="+date, url:"Modele/sup_paginate.php", 
			success: function(data){
    var conteneur = document.getElementById('zone_articles');//elt recevant des resultats
			var ligne = document.createElement('article'); //TR  creation d'une ligne
	        ligne.setAttribute('class', 'row');
			//ligne.setAttribute('class', 'form-group');
		    ligne.innerHTML=data;
			if(data!=""){
			$("#plus_articlesSupp").html("+ d'articles");
            conteneur.appendChild(ligne);
			$("#plus_articlesSupp").attr("data-sup",id_sup);
			$("#plus_articlesSupp").attr("data-sr",id_sr);
			var pg1 = parseFloat(pg) + 1;
			document.getElementById('pg').value=pg1;
			$("#plus_articlesSupp").attr("data-ppg",ppg);
			$("#plus_articlesSupp").attr("data-res",res);
			$("#plus_articlesSupp").attr("data-date",date);} 
			if(pg1==nb_pg)
			  $("#more_articles").html('<button class="btn btn-info" >Terminé!</button>');
			},
                        error: function(){
			        $("#plus_articlesSupp").html="Problème de connexion!";
			}
		});
});


function show_hide(code){
    if(code == "CONSO") 
    $("#cooclient").show(1000);
	else
	$("#cooclient").hide(1000);
};

function distributeurw(w_id){ //r*
	$.ajax({type:"POST", data: "code="+w_id, url:"Modele/distributeurw.php", 
			success: function(data){
    var conteneur = document.getElementById('dist_w');//elt recevant des resultats
			if(data!="")
            conteneur.innerHTML=data;
			},
                        error: function(){
			        $("#dist_w").html('Problème de connexion!');
			}
		});
}

function cat_def(catdef_id){ //r*
	$.ajax({type:"POST", data: "code="+catdef_id, url:"Modele/defaut.php", 
			success: function(data){
    var conteneur = document.getElementById('defaut');//elt recevant des resultats
			if(data!="")
            conteneur.innerHTML=data;
			},
                        error: function(){
			        $("#defaut").html('Problème de connexion!');
			}
		});
}

function verifier(dlc){
	var date_fab=document.getElementById('Date_fab').value;
	if (dlc < date_fab){
	alert ("La DLC doit étre supérieur à la date fabrication");
	document.getElementById('DLC').focus();
	}
	}
	
	function Validercourrier(Num_Enrg){
    var msg = "Voulez vous valider ce courrier ?";
	if (confirm(msg))
	  document.location.href='courriernonvalide/validercourrier/'+Num_Enrg;	
	}
	
function Validerfacture(Num_Enrg){
    var msg = "Voulez vous valider cette facture ?";
	if (confirm(msg))
	  document.location.href='facturenonvalide/validerfacture/'+Num_Enrg;	
	}
	
function liberer(elem){
    document.getElementById(elem).removeAttribute("required"); 	}
	
	function imprimer(NumEnv){
	window.open('search/imprimer/'+NumEnv,'impression','width=800,height=500,fullscreen=yes,location=no,status=no');
	}
	
	function champsdate(){
	document.getElementById("Date_Rec").removeAttribute("value");
	document.getElementById("Date_Rec").type="date";
	}	
	
	function champstext(){
	document.getElementById("Date_Rec").type="text";
	document.getElementById("Date_Rec").value="Date d'arrivé";
	}	
	
	function test(){
	document.date_rec.submit();
function clique1($p){
 document.getElementById("p").selected = "true";

}	
	
	}
	
//Detecter la colonne selectionnée dans le tableau et affiche son menu de recherche
//Detecter la colonne selectionnée dans le tableau et affiche son menu de recherche
$(".glyphiconPers").click(function(){ 
	$('.SearchMenu').hide();  //Cacher un menu s'il est déja affiché
	var ColID = $( this ).attr("data-ColID");  //Récuperer l'ID de la "div" cliqué
	$('div #'+ColID+' .SearchMenu').toggle();
	});

//Detecter l'option de recherche selectionnée dans le menu de recherche	
$("li").click(function(){
	var LiID = $( this ).attr("data-ColID");  //Récuperer l'ID de la colonne cliquée
	var SearchType = $( this ).attr("data-action");  //Récuperer l'ID de "li" cliqué
	var InputType  = $( this ).attr("data-InputType");  //Récuperer le type du champs
	$('.'+LiID).remove();  //Supprimer les elements de la colonnes sélectionée
	$('div #'+LiID+' .SearchMenu').toggle();// Cacher le menu de recherche

	$('div #'+LiID).prepend("<form name=\""+LiID+"\" method=\"POST\" ><div class=\"ColContent\"><input name=\"search\" type=\""+InputType+"\" style=\"width: 80%; \" value=\"\"  required /><input name=\"SearchType\" type=\"hidden\" value="+SearchType+"><input name=\"Column\" type=\"hidden\" value="+LiID+"></div><div class=\"glyphicon glyphicon-search glyphiconPersForm\" onclick=\" document."+LiID+".submit()\" ></div></form>");
	$("input[name*='"+LiID+"']").focus();
	});	
	