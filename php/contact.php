<?php
    $array = array("nom" => "", "prenom" => "", "email" => "", "tel" => "", "message" => "", "nomError" => "", "prenomError" => "", "emailError" => "", "telError" => "", "messageError" => "", "reCAPTCHAError" => "", "isSuccess" => false,);
    $emailTo = "christophe@createur-design.fr";
    $sujet = "Une demande de contact depuis le site FEC.fr";

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    { 
        $array["nom"] = test_input($_POST["nom"]);
        $array["prenom"] = test_input($_POST["prenom"]);
        $array["email"] = test_input($_POST["email"]);
        $array["tel"] = test_input($_POST["tel"]);
        $array["message"] = test_input($_POST["message"]);
        $array["isSuccess"] = true; 
        $emailText = "";
        
        if (empty($array["nom"]))
        {
            $array["nomError"] = "Veuillez indiquer votre Nom !";
            $array["isSuccess"] = false; 
        } 
        else
        {
            $emailText .= "Nom: {$array['nom']}\n";
        }

        if (empty($array["prenom"]))
        {
            $array["prenomError"] = "Veuillez indiquer votre Prénom !";
            $array["isSuccess"] = false; 
        } 
        else
        {
            $emailText .= "Prénom: {$array['prenom']}\n";
        }

        if(!isEmail($array["email"])) 
        {
            $array["emailError"] = "Veuillez indiquer une email correct !";
            $array["isSuccess"] = false; 
        } 
        else
        {
            $emailText .= "Email: {$array['email']}\n";
        }

        if (!isPhone($array["tel"]))
        {
            $array["telError"] = "Veuillez indiquer un numéro de téléphone correct !";
            $array["isSuccess"] = false; 
        }
        else
        {
            $emailText .= "Tel: {$array['tel']}\n";
        }

        if (empty($array["message"]))
        {
            $array["messageError"] = "Veuillez nous indiquer un message !";
            $array["isSuccess"] = false; 
        }
        else
        {
            $emailText .= "Message: {$array['message']}\n";
        }


            $secret="6LfZOpEUAAAAAAlvBeeu_xmzKajkqUhkLhmdQHg_";
            $response=$_POST["g-recaptcha-response"];

            $verify=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}");
            $captcha_success=json_decode($verify);
            if ($captcha_success->success==false) {
            //This user was not verified by recaptcha.
            $array["reCAPTCHAError"] = 'Veuillez cocher le reCAPTCHA !';
            $array["isSuccess"] = false; 

            }
            else if ($captcha_success->success==true) {

            
        
        if($array["isSuccess"]) 
        {           

            // $headers = "From: {$array['nom']} {$array['prenom']} <{$array['email']}>\r\nReply-To: {$array['email']}";
            $headers ="From: {$array['nom']} {$array['prenom']}"; // ici l'expediteur du mail
            $headers .="Reply-To: {$array['email']}"; // ici l'adresse de réponse (facultatif)
            $headers .='Content-Type: text/plain; charset="utf-8"'." "; // ici on envoie le mail au format texte encodé en UTF-8
            $headers .='Content-Transfer-Encoding: 8bit'; // ici on précise qu'il y a des caractères accentués
            mail($emailTo, $sujet, $emailText, $headers);

            }
        }
        
        echo json_encode($array);
        
    }

    function isEmail($email) 
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    function isPhone($phone) 
    {
        return preg_match("/^[0-9 ]*$/",$phone);
    }
    function test_input($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
 
?>


