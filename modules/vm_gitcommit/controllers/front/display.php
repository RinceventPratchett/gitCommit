<?php
class vm_gitcommitdisplayModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        parent::initContent();
        
        $gitToken = Db::getInstance()->getValue('SELECT value FROM '._DB_PREFIX_.'configuration WHERE name="VM_GITCOMMIT_TOKEN"');
        $accountGitHUb = Db::getInstance()->getValue('SELECT value FROM '._DB_PREFIX_.'configuration WHERE name="VM_GITCOMMIT_ACCOUNT"');
        $depositeGitHub = Db::getInstance()->getValue('SELECT value FROM '._DB_PREFIX_.'configuration WHERE name="VM_GITCOMMIT_DEPOSITE"');
        $certificate_location = 'F:\www\wamp64\www\gitcommit\modules\vm_gitcommit\cert\cacert-2020-10-14.pem'; //mandatory to create a curl connection
        
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, $certificate_location);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $certificate_location);
        curl_setopt($ch, CURLOPT_USERAGENT, $accountGitHUb);     
        curl_setopt_array($ch, array(
            CURLOPT_URL => "https://api.github.com/repos/".$accountGitHUb."/".$depositeGitHub."/commits",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Authorization: Bearer ".$gitToken
            ),
        ));       
        $response = curl_exec($ch);
        /* To debug curl connection
        $err = curl_error($ch);
        curl_close($ch);
        $errNo = curl_errno($ch);
        $description = curl_strerror(curl_errno($ch)); 
        var_dump($description);
        */
        $gitCommits = json_decode($response);
        
        $this->context->smarty->assign(array(
            'shop_name' => Configuration::get('PS_SHOP_NAME'),
            'gitCommits' => $gitCommits
        ));
        $this->setTemplate('module:vm_gitcommit/views/templates/front/display.tpl');
    }
}