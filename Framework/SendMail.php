<?php

class SendMail{
	
	public function __construct($message, $Sender, $dest, $objet, $piece_jointe, $format_autorise, $server_save, $index, $name_save, $folder_save, $replyTo){
		
		$this->send_email($message, $Sender, $dest, $objet, $piece_jointe, $format_autorise, $server_save, $index, $name_save, $folder_save, $replyTo);
				}
				
/**********************************************************************
                         Envoi d'email
   *pour inclure plusieurs Senders: (sendr1, sender2, ..., senderN)
   *Piece_jointe: tableau(pj1, pj2, ..., pjN)
   *format_pj:tableau(fpj1, fpj2, ..., fpjN)
**********************************************************************/
public function send_email($message, $Sender, $dest, $objet, $piece_jointe, $format_autorise, $server_save, $index, $name_save, $folder_save, $replyTo){
	//Header 
   $mail_mime = "MIME-Version: 1.0\n";
   $mail_mime .= "Content-Type: multipart/mixed;\n";
   $mail_mime .= " boundary=\"----=_NextPart\"\n\n";
   //Message
   $texte = "------=_NextPart\n";
   $texte .= "Content-Type: text/html; charset=\"utf-8\"\n";
   $texte .= "Content-Transfer-Encoding: 8bit\n\n";
   $texte .= stripslashes($message); 
   $texte .= "\n\n";
   //le(s) pieces jointe(s)
   $attachement="";
   $tab_filename1=array();
   if(isset($piece_jointe['name']) && !empty($piece_jointe['name'])){
	   $nbr_pj = count($piece_jointe['name']);//nbre pj attachées
	  for($att=0;$att<$nbr_pj;$att++){
		  if($piece_jointe["size"][$att] > 0 && $piece_jointe["error"][$att] == 0 && $piece_jointe["name"][$att] != ""){//verif tt pieces
		  $fichier = $piece_jointe["tmp_name"][$att]; 
          $type =  $piece_jointe["type"][$att];
          $name =  $piece_jointe["name"][$att];

   $attachement .= "------=_NextPart\n";
   $attachement .= "Content-Type:  $type; name=\"$name\"\n";
   $attachement .= "Content-Transfer-Encoding: base64\n";
   $attachement .= "Content-Disposition: attachment; filename=\"$name\"\n\n";
   $fp = fopen($fichier, "rb");
   $buff = fread($fp, filesize($fichier));
 fclose($fp);   
   $attachement .= chunk_split(base64_encode($buff));
   $attachement .= "\n\n\n------=_NextPart\n";
   //enregistrement de la piece su le serveur selon la configuration
   if($server_save == 1){
	   //$date_pj = $id_art.time().$att;
	   $filename   = $piece_jointe["name"][$att]; 
	   $filename   = explode(".",$filename);
	   $ext        = $filename[count($filename)-1];
	   $filename1   = "$name_save"."$att.$ext";
	   array_push($tab_filename1, $filename1);//tan noms pj à inserer ds masap
	   $this->upload_file1($index, "$folder_save"."$filename1", $att);
	   }
		  }//end if verif
	  }//end for
   }//end if post piece jointe
   
   @mail($dest, $objet, $texte.$attachement, "From: $Sender\n".$mail_mime); 
	return($tab_filename1); unset($tab_filename1);//detruit le tab de fich
	}// end send email
	
	public function upload_file1($index, $dest, $i)
{
  //---> test le type de fichier
  switch ($_FILES[$index]["type"][$i]) {
  case "image/gif"    : break;
  case "image/png"    : break;
  case "image/jpg"    : break;
  case "image/jpeg" : break;
   case "image/flv" : break;
  default             : //echo  "Ce type d'application ne peut être téléchargé";
                        break;
  } //Fin switch
  move_uploaded_file($_FILES[$index]['tmp_name'][$i], $dest);
  //copy($_FILES[$index]['tmp_name'], $dest);
  return filesize($dest);
} //Fin upload_file1


}//end SendMail
