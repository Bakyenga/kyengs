<?php


/**
 * Description of My_Email
 *
 * @author Yusuf
 */
class My_Email {
    var $emailto = '';
    var $from = '';
    var $subject = '';
    var $message = '';
    var $cc = '';
    var $bcc = '';
    var $type = '';
    
    public function to($email, $emailname ='')
    {
        if(is_array($email)){
            
            $this->to = implode(',', $email);
            return;
        }
        $this->to = $email;
    
    }
    public function subject($subject){
        $this->subject = $subject;
    }
    
     public function message($message){
        $this->message = $message;
    }
     public function from($from){
        if(is_array($from)){
            
            $this->from = implode(',', $from);
            return;
        }
         $this->from = $from;
    }
    
   public function cc($cc){
        $this->cc = $cc;
    }
    public function bcc($cc){
        $this->bcc = $cc;
    }
    public function html(){
        $this->type = 'Content-type: text/html; charset=iso-8859-1';
    }
    
    public function send(){
        if($this->to !='' && $this->subject !='' && $this->message !=''){
          // To send HTML mail, the Content-type header must be set
            $headers  = 'MIME-Version: 1.0' . "\n\r";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\n\r";
          
          if($this->from !='')
                  $headers .= 'From:'.$this->from." \n\r";
          
          if($this->cc !='')
                  $headers .= 'Cc:'.$this->cc."\n\r";
          
          if($this->bcc !='')
                  $headers .= 'Bcc:'.$this->bcc."\n\r";
          
          
          
          echo $headers;
          if(mail($this->to, $this->subject, $this->message, $headers)){
              
              return true;
          }
         
          return false;
          
        }
        throw new Exception('Required fields not found.');
        
    }
}

?>
