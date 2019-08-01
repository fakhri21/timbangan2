<?php
class User extends CI_Controller
{
    public $bbSerialPort; 
    public function index($user_id = null)
    {
        $option = array( 'portName'  => get_option('comp_port'),
                            'baudRate'  =>get_option('baud_rate'),
                            'bits'      =>get_option('data_bits'),
                            'spotBit'   =>1
                             );
        /* $data= get_nilai_timbangan($option);
        $result=doubleval(substr($data,7,7)); */
        
        $data= $this->get_nilai_timbangan($option);
        $result=doubleval(substr($data,7,7));
        //echo $result;
        header('Content-Type: application/json');
        echo json_encode(array('tes' => $result ));
    }
    
    public function tes()
    {
        $this->template->load('template_admin','welcome_message');
    }


function get_nilai_timbangan()

{

    $option = array( 'portName'  => get_option('comp_port'),
                            'baudRate'  =>get_option('baud_rate'),
                            'bits'      =>get_option('data_bits'),
                            'spotBit'   =>1
                             );
        

    $portName = $option['portName'];
    $baudRate = $option['baudRate'];
    $bits = $option['bits'];
    $spotBit = $option['spotBit'];


        if(!extension_loaded('dio'))
    {
        return ( "PHP Direct IO does not appear to be installed for more info see: http://www.php.net/manual/en/book.dio.php" );
        exit;
    }

    try 
    {
        //the serial port resource
        
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') 
        { 
            $this->bbSerialPort = dio_open($portName, O_RDONLY );
            
            //we're on windows configure com port from command line
            exec("mode {$portName} baud={$baudRate} data={$bits} stop={$spotBit} parity=n ");
        } 
        else //'nix
        {
            $bbSerialPort = dio_open($portName, O_RDWR | O_NOCTTY | O_NONBLOCK );
            dio_fcntl($bbSerialPort, F_SETFL, O_SYNC);
            //we're on 'nix configure com from php direct io function
            dio_tcsetattr($bbSerialPort, array(
                'baud' => $baudRate,
                'bits' => $bits,
                'stop'  => $spotBit,
                'parity' => 0
            ));
        }
        
        if(!$this->bbSerialPort)
        {
            return ( "Could not open Serial port {$portName} ");
            exit;
        }
        
            //sleep(3);
            $data = dio_read($this->bbSerialPort, 17); //this is a blocking call
            dio_close($this->bbSerialPort);
            if ($data) {
                $result=doubleval(substr($data,7,7));
                echo $result;
                //header('Content-Type: application/json');
                //echo json_encode(array('tes' => $result ));
            }	
        

    } 
    catch (Exception $e) 
    {
        exit(1);
    } 

}

}