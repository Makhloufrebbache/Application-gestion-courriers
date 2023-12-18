/*
CARROUSEL
*/
var carousel_service = {
	nbSlide:0,
	nbCurrent:0,
	elemCurrent:null,
	elem:null,
	timer:null,	
	init:function(elem){
		//initialisation des variables
		this.elem = elem;
		this.nbSlide = this.elem.find(".sliderservices a").length;
		this.elemCurrent = this.elem.find(".sliderservices a:first"); 
		//action fleche gauche et droite
		var fleche_g = this.elem.find("#next");
		var fleche_d = this.elem.find("#prev");
		fleche_g.click(function(){carousel_service.next();});
		fleche_d.click(function(){carousel_service.prev();});
		//defilement automatique
		this.play();
		//passage du curseur sur le carrousel
		this.elem.mouseover(function(){carousel_service.stop();});
		this.elem.mouseover(function(){fleche_d.show(); fleche_g.show();});
		//eloignement du curseur du carrousel
		this.elem.mouseout(function(){carousel_service.play();});
		this.elem.mouseout(function(){fleche_d.hide(); fleche_g.hide();});
		},//end init
	next:function(){
		if(this.nbCurrent==this.nbSlide-3){
		 this.elem.find(".sliderservices").animate({left:-0*236.4+"px"});
		 this.nbCurrent=0;
			}else{
		this.nbCurrent++;
		this.elem.find(".sliderservices").animate({left:-this.nbCurrent*236.4+"px"});}
		},
	prev:function(){
		if(this.nbCurrent==0){
		 this.elem.find(".sliderservices").animate({left:-(this.nbSlide-3)*238+"px"});
		 this.nbCurrent=this.nbSlide-3;
			}else{
		this.nbCurrent--;
		this.elem.find(".sliderservices").animate({left:-this.nbCurrent*238+"px"});}
		},
	play:function(){
		window.clearInterval(carousel_service.timer);
		this.timer = window.setInterval("carousel_service.next()", 3000);	
		},
	stop:function(){
		window.clearInterval(carousel_service.timer);
		}
	}
	
var actus = {
	nbSlide:0,
	nbCurrent:0,
	elemCurrent:null,
	elem:null,
	timer:null,	
	init:function(elem){
		//initialisation des variables
		this.elem = elem;
		this.nbSlide = this.elem.find("#actu h5").length;
		this.elemCurrent = this.elem.find("#actu h5:first");
		//defilement automatique
		this.play();
		//passage du curseur sur le carrousel
		this.elem.mouseover(function(){actus.stop();});
		//eloignement du curseur du carrousel
		this.elem.mouseout(function(){actus.play();});
		},//end init
	next:function(){
		if(this.nbCurrent==this.nbSlide-3){
		 this.elem.find("#actu").animate({top:-0*53+"px"});
		 this.nbCurrent=0;
			}else{
		this.nbCurrent++;
		this.elem.find("#actu").animate({top:-this.nbCurrent*53+"px"});}
		},
	prev:function(){
		if(this.nbCurrent==0){
		 this.elem.find("#actu").animate({top:-(this.nbSlide-3)*53+"px"});
		 this.nbCurrent=this.nbSlide-3;
			}else{
		this.nbCurrent--;
		this.elem.find("#actu").animate({top:-this.nbCurrent*53+"px"});}
		},
	play:function(){
		window.clearInterval(actus.timer);
		this.timer = window.setInterval("actus.next()", 6000);	
		},
	stop:function(){
		window.clearInterval(actus.timer);
		}
	}//end actus
	
var events = {
	nbSlide:0,
	nbCurrent:0,
	elemCurrent:null,
	elem:null,
	timer:null,	
	init:function(elem){
		//initialisation des variables
		this.elem = elem;
		this.nbSlide = this.elem.find("#event h5").length;
		this.elemCurrent = this.elem.find("#event h5:first");
		//defilement automatique
		this.play();
		//passage du curseur sur le carrousel
		this.elem.mouseover(function(){events.stop();});
		//eloignement du curseur du carrousel
		this.elem.mouseout(function(){events.play();});
		},//end init
	next:function(){
		if(this.nbCurrent==this.nbSlide-3){
		 this.elem.find("#event").animate({top:-0*53+"px"});
		 this.nbCurrent=0;
			}else{
		this.nbCurrent++;
		this.elem.find("#event").animate({top:-this.nbCurrent*53+"px"});}
		},
	prev:function(){
		if(this.nbCurrent==0){
		 this.elem.find("#event").animate({top:-(this.nbSlide-3)*53+"px"});
		 this.nbCurrent=this.nbSlide-3;
			}else{
		this.nbCurrent--;
		this.elem.find("#event").animate({top:-this.nbCurrent*53+"px"});}
		},
	play:function(){
		window.clearInterval(events.timer);
		this.timer = window.setInterval("events.next()", 6000);	
		},
	stop:function(){
		window.clearInterval(events.timer);
		}
	}//end events

var reals = {
	nbSlide:0,
	nbCurrent:0,
	elemCurrent:null,
	elem:null,
	timer:null,	
	init:function(elem){
		//initialisation des variables
		this.elem = elem;
		this.nbSlide = this.elem.find("#real h5").length;
		this.elemCurrent = this.elem.find("#real h5:first");
		//defilement automatique
		this.play();
		//passage du curseur sur le carrousel
		this.elem.mouseover(function(){reals.stop();});
		//eloignement du curseur du carrousel
		this.elem.mouseout(function(){reals.play();});
		},//end init
	next:function(){
		if(this.nbCurrent==this.nbSlide-2){
		 this.elem.find("#real").animate({top:-0*53+"px"});
		 this.nbCurrent=0;
			}else{
		this.nbCurrent++;
		this.elem.find("#real").animate({top:-this.nbCurrent*53+"px"});}
		},
	prev:function(){
		if(this.nbCurrent==0){
		 this.elem.find("#real").animate({top:-(this.nbSlide-3)*53+"px"});
		 this.nbCurrent=this.nbSlide-3;
			}else{
		this.nbCurrent--;
		this.elem.find("#real").animate({top:-this.nbCurrent*53+"px"});}
		},
	play:function(){
		window.clearInterval(reals.timer);
		this.timer = window.setInterval("reals.next()", 6000);	
		},
	stop:function(){
		window.clearInterval(reals.timer);
		}
	}//end reals

var carousel_service = {
	nbSlide:0,
	nbCurrent:0,
	elemCurrent:null,
	elem:null,
	timer:null,	
	init:function(elem){
		//initialisation des variables
		this.elem = elem;
		this.nbSlide = this.elem.find(".sliderservices a").length;
		this.elemCurrent = this.elem.find(".sliderservices a:first"); 
		//action fleche gauche et droite
		var fleche_g = this.elem.find("#next");
		var fleche_d = this.elem.find("#prev");
		fleche_g.click(function(){carousel_service.next();});
		fleche_d.click(function(){carousel_service.prev();});
		//defilement automatique
		this.play();
		//passage du curseur sur le carrousel
		this.elem.mouseover(function(){carousel_service.stop();});
		this.elem.mouseover(function(){fleche_d.show(); fleche_g.show();});
		//eloignement du curseur du carrousel
		this.elem.mouseout(function(){carousel_service.play();});
		this.elem.mouseout(function(){fleche_d.hide(); fleche_g.hide();});
		},//end init
	next:function(){
		if(this.nbCurrent==this.nbSlide-3){
		 this.elem.find(".sliderservices").animate({left:-0*236.4+"px"});
		 this.nbCurrent=0;
			}else{
		this.nbCurrent++;
		this.elem.find(".sliderservices").animate({left:-this.nbCurrent*236.4+"px"});}
		},
	prev:function(){
		if(this.nbCurrent==0){
		 this.elem.find(".sliderservices").animate({left:-(this.nbSlide-3)*238+"px"});
		 this.nbCurrent=this.nbSlide-3;
			}else{
		this.nbCurrent--;
		this.elem.find(".sliderservices").animate({left:-this.nbCurrent*238+"px"});}
		},
	play:function(){
		window.clearInterval(carousel_service.timer);
		this.timer = window.setInterval("carousel_service.next()", 3000);	
		},
	stop:function(){
		window.clearInterval(carousel_service.timer);
		}
	}
	
var adbox = {
	nbSlide:0,
	nbCurrent:0,
	elemCurrent:null,
	elem:null,
	timer:null,	
	init:function(elem){
		//initialisation des variables
		this.elem = elem;
		this.nbSlide = this.elem.find("#adboxs img").length;
		this.elemCurrent = this.elem.find("#adboxs img:first"); 
		//action fleche gauche et droite
		var fleche_g = this.elem.find("#adboxfd");
		var fleche_d = this.elem.find("#adboxfg");
		fleche_g.click(function(){adbox.next();});
		fleche_d.click(function(){adbox.prev();});
		//defilement automatique
		this.play();
		//passage du curseur sur le carrousel
		this.elem.mouseover(function(){adbox.stop();});
		this.elem.mouseover(function(){fleche_d.show(); fleche_g.show();});
		//eloignement du curseur du carrousel
		this.elem.mouseout(function(){adbox.play();});
		this.elem.mouseout(function(){fleche_d.hide(); fleche_g.hide();});
		},//end init
	next:function(){
		if(this.nbCurrent==this.nbSlide-1){
		 this.elem.find("#adboxs").animate({left:-0*960+"px"});
		 this.nbCurrent=0;
			}else{
		this.nbCurrent++;
		this.elem.find("#adboxs").animate({left:-this.nbCurrent*960+"px"});}
		},
	prev:function(){
		if(this.nbCurrent==0){
		 this.elem.find("#adboxs").animate({left:-(this.nbSlide-1)*960+"px"});
		 this.nbCurrent=this.nbSlide-1;
			}else{
		this.nbCurrent--;
		this.elem.find("#adboxs").animate({left:-this.nbCurrent*960+"px"});}
		},
	play:function(){
		window.clearInterval(adbox.timer);
		this.timer = window.setInterval("adbox.next()", 5000);	
		},
	stop:function(){
		window.clearInterval(adbox.timer);
		}
	}
	
$(function(){
carousel_service.init($("#galerieservices"));
actus.init($("#actus"));
events.init($("#events"));
reals.init($("#reals"));
adbox.init($("#adbox"));

	});	
