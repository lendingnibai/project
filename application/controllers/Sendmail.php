<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sendmail extends CI_Controller    {

    public function index()
    {

      $config = Array(
        'protocol' => 'smtp',
        'smtp_host' => 'ssl://mail.bestsystemstech.com',// for webmail mail.bestsystemstech.com, for google smtp.googlemail.com
        'smtp_port' => 465,
        'smtp_user' => 'bstwebsite@bestsystemstech.com', // change it to yours
        'smtp_pass' => '_mqt6SfbAL09', // change it to yours
        'mailtype' => 'html',
        'charset' => 'iso-8859-1',
        'wordwrap' => TRUE
      );

      $name = $this->input->post('name');
      $email = $this->input->post('email');
      $subject = $this->input->post('subject');
      $message = $this->input->post('message');
      
      if ($name == '' || $email == '' || $message == '') 
      {
      ?>
        <script type="text/javascript">
          alert('Opssss something went wrong');
          window.history.back();
        </script>
      <?php
      die();
      }
      else
      {

        $htmlMEssage = '<!DOCTYPE html>';
        $htmlMEssage .='<html>';
        $htmlMEssage .='<body>';
        $htmlMEssage .='<img width="250px;" style="border: 1px solid grey; border-radius: 2px; padding: 2px" src="https://scontent.fmnl6-2.fna.fbcdn.net/v/t31.0-8/26962173_2000983706583834_9031604881686920243_o.jpg?_nc_cat=111&_nc_eui2=AeFpj5zviImaIggdgcV9IfjSjrbTVmKjdmNJTyWG9FvGmOreWCf97TDsHVugkDCO7YY59d1eZaP_Lldq-eT0mR2v95ALGHflZyQOyJp9fzDHvg&oh=5c7ddeac70528bd6b805a0e2419a4dfc&oe=5C4C2D19">';
        $htmlMEssage .='<div style="border-style: none;">';
        $htmlMEssage .='<b>From: '.$name.' ('.$email.')</b>';
        $htmlMEssage .='<h4>Message:</h4>';
        $htmlMEssage .='<blockquote style="width: 500px"><em>'.$message.'</em></blockquote>';
        $htmlMEssage .='</div>';
        $htmlMEssage .='</body>';
        $htmlMEssage .='</html>';
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('bstwebsite@bestsystemstech.com', 'BTS Messenger'); // change it to yours sa custormer
        $this->email->to('info@bestsystemstech.com');// change it to yours
        $this->email->cc('mark.chin@bestsystemstech.com,crisante.dellera@bestsystemstech.com,junmar.sales@bestsystemstech.com');
        //$this->email->bcc('elvin.cabua@bestsystemstech.com');
        $this->email->subject($subject);//client subject
        $this->email->message($htmlMEssage);
        //$this->email->attach(base_url('public\img\logo\logoresized.png'));
        if($this->email->send())
        {
            $this->output->set_output(json_encode(
              array('Message' => 'Hello '.$name.' your message was successfully sent', 'code' => 1)
            ));
        }
        else
        {
          
          $this->output->set_output(json_encode(
            array('Message' => show_error($this->email->print_debugger()), 'code' => 0)
          ));
        }

      }

    }

}