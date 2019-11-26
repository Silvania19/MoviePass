<?php 
    namespace controllers;
    require_once(ROOT.'/phpqrcode/qrlib.php');
    use models\Ticket as ticket;
    use daodb\TicketDao as ticketD;
    use phpqrcode\QRcode as QRcode;
    use daodb\ProjectionDao as projectionD;
    use daodb\CinemaDao as cinemaD;
    use controllers\UserControllers as userC;
    use phpmailer\sendemail as sendemail;
    use daosjson\MovieDao as movieD;
    class TicketControllers
    {
        private $listTickets;
        private $listProjection;
        private $listCinema;
        private $userContro;
        private $listMovie;
        public function __construct()
        {
            $this->listTickets=new ticketD();
            $this->listProjection=new projectionD();
            $this->listCinema= new cinemaD();
            $this->userContro=new userC();
            $this->listMovie=new movieD();
        }
        public function generateTicket($idProjection=null)
        {
          
            $user=$this->userContro->checkSession();
           
            $idUser=$user->getIdUser();
            $projection=$this->listProjection->Search($idProjection);  
           
            $cinema=$this->listCinema->Search($projection->getIdCinema());
             
            $price=$cinema->getPrice();
            $number=$this->generateRandomNumberTicket();
           
            $qr=$this->generateRandomQr($number);
            $newTicket= new ticket($number, $price, $idUser, $qr, $idProjection);
            $this->listTickets->Add($newTicket);
            $movie=$this->listMovie->Search($projection->getIdMovie());
            $mail_addAddress=$user->getEmail();//correo electronico que recibira el mensaje
            $template="phpmailer/email_template.html";//Ruta de la plantilla HTML para enviar nuestro mensaje
            $mail_setFromEmail='MoviePass';
            $mail_setFromName='Flor y Sil';
            $txt_message='Copia de la entrada <br> Pelicula: '.$movie->getTitle().'<br>'.'Datos de la funcion: Hora:'.$projection->getHour().' Fecha: '.$projection->getDate().'<br> Datos de la entrada'.'  numero: '.$newTicket->getNumberTicket().'  qr: ';
           
            $mail_subject='Confirmacion de la compra';

            sendemail::sendemail(EMAIL_LOCAL, PASSWORD_EMAIL_LOCAL ,$mail_setFromEmail,$mail_setFromName,$mail_addAddress,$txt_message,$mail_subject,$template, $qr2);//Enviar el mensaje

          
        }
        public function SeeTicket()
        {
            $user=$this->userContro->checkSession();
           
            try {
                 $listProjectionsAc=$this->listProjection->GetAllActuales();
                 $listTickets2=$this->listTickets->SearchXUser($user->getIdUser());
                 
                 include(VIEWS_PATH."ticketviews.php");
            } catch (\Throwable $th) {
                
                 $controlScript=1;
                 $message="error en la base";
            }
            
        }

        public function generateRandomNumberTicket()
        {
            $flag = true;
            $i = 0;
            
            while ($flag == true && $i < 100000){
    
                $number = rand(1,100000); // numero aleatorio entre 1 y 100000
    
                $flag = $this->listTickets->SearchXnumber($number); // si devuelve false, significa q el numero no existe en la BD
    
                $i ++; 
            }
    
            
            return $number;
           
        }
        public function generateRandomQr($number)
        {
            //Agregamos la libreria para genera códigos QR
            //Si no existe la carpeta la creamos
            if (!file_exists(DIR_QR))
            mkdir(DIR_QR);
            //Declaramos la ruta y nombre del archivo a generar
    
            $filename = DIR_QR.$number.'.png';
            $tamaño = 10; //Tamaño de Pixel
            $level = 'L'; //Precisión Baja
            $framSize = 3; //Tamaño en blanco
            $contenido = "http://codigosdeprogramacion.com"; //Texto
            //Enviamos los parametros a la Función para generar código QR
            QRcode::png($contenido, $filename, $level, $tamaño, $framSize);
    
            //Mostramos la imagen generada
            //echo '<img src="'.DIR_QR.basename($filename).'" /><hr/>';  
           return $filename;
        }
        

    }

?>