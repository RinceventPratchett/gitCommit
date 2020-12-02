<?php
 
if (!defined('_PS_VERSION_')) { //Mandatory -> check that the environment have been loaded
    exit;
}

class Vm_GitCommit extends Module
{
    public function __construct()
    {
       
        $this->name = 'vm_gitcommit'; //define name of module
        $this->tab = 'front_office_features'; 
        $this->version = '1.0.0';
        $this->author = 'Vivien Marcadé';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = [
            'min' => '1.6',
            'max' => _PS_VERSION_
        ];
        $this->bootstrap = true;
 
        parent::__construct(); //call the constructor of parent's class (Module class)
 
        $this->displayName = $this->l('Module Git Commit'); //title on BO
        $this->description = $this->l('Show commits from git account');
 
        $this->confirmUninstall = $this->l('Êtes-vous sûr de vouloir désinstaller ce module ?');
 
        if (!Configuration::get('VM_GITCOMMIT_ACCOUNT')) { //check if a configuration is existing
            $this->warning = $this->l('Aucun nom fourni');
        }
    }
    public function install()
    {
        if (Shop::isFeatureActive()) { //check if multi-shop activated. If yes define the context for all of them
            Shop::setContext(Shop::CONTEXT_ALL);
        }

        if (!parent::install() ||
            !$this->registerHook('home') ||
            !$this->registerHook('header') ||
            !Configuration::updateValue('VM_GITCOMMIT_ACCOUNT', 'Compte GitHub')||
            !Configuration::updateValue('VM_GITCOMMIT_DEPOSITE', 'Dépot GitHub')||
            !Configuration::updateValue('VM_GITCOMMIT_TOKEN', 'Token GitHub')
        ) {
            return false;
        }

        return true;
    }
    /*exemple to load an array
     * // record an array in Configuration table
        Configuration::updateValue('VM_GITCOMMIT_SETTINGS', serialize(array(true, true, false)));
    // request it
        $configuration_array = unserialize(Configuration::get('VM_GITCOMMIT_SETTINGS'));
     */
    public function uninstall()
    {
        if (!parent::uninstall() ||
            !Configuration::deleteByName('VM_GITCOMMIT_ACCOUNT') || //allow to check the BDD, table ps_configuration and delete the row
            !Configuration::deleteByName('VM_GITCOMMIT_DEPOSITE') || 
            !Configuration::deleteByName('VM_GITCOMMIT_TOKEN')
        ) {
            return false;
        }

        return true;
    }
    public function getContent() //create a form in BO with cfg button
    {
        $output = null;

        if (Tools::isSubmit('btnSubmit')) {
            $accountGitHUb = strval(Tools::getValue('VM_GITCOMMIT_ACCOUNT'));
            $depositeGitHub = strval(Tools::getValue('VM_GITCOMMIT_DEPOSITE'));
            $gitToken = strval(Tools::getValue('VM_GITCOMMIT_TOKEN'));
            if (
                !$accountGitHUb||
                empty($accountGitHUb)||
                !$depositeGitHub||
                empty($depositeGitHub)||
                !$gitToken||
                empty($gitToken)
            ) {
                $output .= $this->displayError($this->l('Invalid Configuration value')); // .= php method to appends in $output
            } else {
                Configuration::updateValue('VM_GITCOMMIT_ACCOUNT', $accountGitHUb); 
                Configuration::updateValue('VM_GITCOMMIT_DEPOSITE', $depositeGitHub);
                Configuration::updateValue('VM_GITCOMMIT_TOKEN', $gitToken); 
                $output .= $this->displayConfirmation($this->l('Settings updated'));
            }
        }

        return $output.$this->displayForm();
    }
    public function displayForm()
    {
        // load default language
        $defaultLang = (int)Configuration::get('PS_LANG_DEFAULT');

        // init fields contained in BO configuration
        $form = array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Settings'),
                ),
                'input' => array(
                    array(
                        'type' => 'text',
                        'label' => $this->l('Configuration value'),
                        'name' => 'VM_GITCOMMIT_ACCOUNT',
                        'size' => 20,
                        'required' => true
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Configuration value'),
                        'name' => 'VM_GITCOMMIT_DEPOSITE',
                        'size' => 20,
                        'required' => true
                    ),
                    array(
                        'type' => 'text',
                        'label' => $this->l('Configuration value'),
                        'name' => 'VM_GITCOMMIT_TOKEN',
                        'size' => 20,
                        'required' => true
                    )
                ),
                'submit' => array(
                    'title' => $this->l('Save'),
                    'name'  => 'btnSubmit'
                )
            ),
        );

        $helper = new HelperForm(); 

        // Module, token & currentIndex
        $helper->module = $this;
        $helper->name_controller = $this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex = AdminController::$currentIndex.'& configure='.$this->name;

        // Langue
        $helper->default_form_language = $defaultLang;

        // load value from BDD 
        $helper->fields_value['VM_GITCOMMIT_ACCOUNT'] = Configuration::get('VM_GITCOMMIT_ACCOUNT');
        $helper->fields_value['VM_GITCOMMIT_DEPOSITE'] = Configuration::get('VM_GITCOMMIT_DEPOSITE');
        $helper->fields_value['VM_GITCOMMIT_TOKEN'] = Configuration::get('VM_GITCOMMIT_TOKEN');

        return $helper->generateForm(array($form));
    }
    public function hookDisplayHome($params)
    {
        $this->context->smarty->assign([
            'vm_page_name' => Configuration::get('VM_GITCOMMIT_DEPOSITE'),
            'vm_page_link' => $this->context->link->getModuleLink('vm_gitcommit', 'display'),
        ]);
        return $this->display(__FILE__, 'vm_gitcommit.tpl');
    }
    public function hookDisplayHeader() //load the css file in the header
    {        
        $this->context->controller->registerStylesheet(
            'vm_gitcommit',
            $this->_path.'views/css/vm_gitcommit.css',
            ['server' => 'remote', 'position' => 'head', 'priority' => 150]
        );
    }
}
