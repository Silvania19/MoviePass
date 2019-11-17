<?php 
    namespace controllers;
    require_once(ROOT.'/phpqrcode/qrlib.php');
    use models\Ticket as ticket;
    use daodb\TicketDao as ticketD;
    use phpqrcode\QRcode as QRcode;
    class TicketControllers
    {
        private $listTickets;
        public function __construct()
        {
            $this->listTickets=new ticketD();
        }
        public function generateTicket()
        {
            $number=$this->generateRandomNumberTicket();
            $qr=$this->generateRandomQr($number);
            $newTicket= new ticket($number, 24, 7, $qr, 5);
            include(VIEWS_PATH."ticketviews.php");
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