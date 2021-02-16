<?php

namespace App\Http\Controllers;

use App\Helpers\UniversalTranslationHelper;
use Illuminate\Routing\ControllerDispatcher;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\View;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Quote;
use App\Navigation;
use TCG\Voyager\Facades\Voyager;

class QuoteController extends Controller
{

	public $current_locale;
	public $lang_id;
	public $ut_helper;

    public function __construct() {

       
        $this->ut_helper = new UniversalTranslationHelper();
        
        //$languages_data = UniversalTranslationHelper::getLocaleData();
        $languages_data = $this->ut_helper->getLocaleData();
        
        $this->current_locale = $languages_data['current_locale'];
        $this->lang_id = $languages_data['lang_id'];
        
        View::share('langs', $languages_data['langs']);
        
        View::share('current_locale', $this->current_locale);
        View::share('lang_id', $this->lang_id);
        
        $nav = Navigation::getStructure($this->lang_id);
        
        View::share('nav', $nav);
        View::share('UniversalTranslationHelper', $this->ut_helper);
        

    }

    
    public function fileUpload() {
	    $allowed_extensions = array('zip','ppt','pdf','doc','docx','txt');

    	$storage_path = storage_path().'/app/quote-attachements';
        
        if ($_FILES["file"]["error"]  == 0) {
            $tmp_name = $_FILES["file"]["tmp_name"];
            $name = basename($_FILES["file"]["name"]);
	        $name_data = explode(".",$name);
	        $ext = $name_data[1];
	        if (!in_array($ext, $allowed_extensions)){
		        echo '';
		        exit;

	        }
            move_uploaded_file($tmp_name, "$storage_path/$name");
        }
        echo $name;
    }
    public function getAttachement($file) {
        
        $file_path = storage_path().'/app/quote-attachements'.$file;
        
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file_path).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file_path));
        
        readfile($file_path);
        
        exit;
    }
    public function submitForm() {
        
        
        $date_time = date('Y-m-d H:i:s');
        
        Quote::insert([
                ['created_at' => $date_time,
                 'updated_at' => $date_time,
                 'translation_type' => $_POST['translation_type'],
                 'document_type' => join(',',$_POST['document_type']),
                 'certification_type' => $_POST['certification_type'],
                 'translate_from' => $_POST['translate_from'],
                 'translate_to' => join(',',$_POST['translate_to']),
                 'attachments' => $_POST['attachment_file'],
                 'attachment_file_url' => $_POST['attachment_file_url'],
                 'attachment_website_url' => $_POST['attachment_website_url'],
                 'firstname' => $_POST['firstname'],
                 'lastname' => $_POST['lastname'],
                 'email' => $_POST['email'],
                 'phone' => $_POST['phone'],
                 'company' => $_POST['company'],
                 'website' => $_POST['website'],
                 'additional_info' => $_POST['additional_info']
                ]
        ]);
        
        mail(Voyager::setting('form_quote_email'),'New Quote Request Submitted','Please login into admin area to see the submitted data');
        echo $this->ut_helper->translateText('quote_form_thankyou');
        exit;

        return view('frontEnd.pages.thankyou');
    }
    

}





