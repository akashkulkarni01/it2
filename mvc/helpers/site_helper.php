<?php

    function ipDetails($ip) {
        $json = file_get_contents("http://ipinfo.io/{$ip}");
        $details = json_decode($json);
        return $details;
    }

    function getIpAddress(){
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';

        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = ($remote == "::1" ? "127.0.0.1" : $remote) ;
        }

        return $ip;
    }

    function siteVarifyValidUser($email = NULL, $purchase_username = NULL, $purchase_code = NULL, $version = NULL) {
        $returnData['status'] = False; 

        if(is_null($purchase_username) || is_null($purchase_code)) {
            $file = APPPATH.'config/purchase'.EXT;
            // @chmod($file, FILE_WRITE_MODE);
            $purchase = file_get_contents($file);
            $purchase = json_decode($purchase);


            if(is_array($purchase)) {
                $purchase_code = trim($purchase[1]);
                $purchase_username = trim($purchase[0]);

            }

            if(empty($purchase_code) || empty($purchase_username)) {
                return json_decode(json_encode($returnData));
            }

        }

        $site = base_url();
        $ip = getIpAddress();
        $email = trim($email);
        $version = is_null($version) ? config_item('ini_version') : $version;

        $data = array(
            'purchase_code' => $purchase_code,
            'username'      => $purchase_username,
            'ip'            => $ip,
            'domain'        => $site,
            'purpose'       => 'update',
            'product_name'  => config_item('product_name'),
            'version'       => $version,
            'email'         => $email,
        );

        $apiCurl = apiCurl($data);
        if(varifyValidUser()->status != $apiCurl->status || actionVarifyValidUser()->status != $apiCurl->status) {
            if(!config_item('demo')) {
                unlink(APPPATH.'/views/teacher/index.php');
                unlink(APPPATH.'/views/components/page_menu.php');
            }
        }
        return $apiCurl;
    }

    function getLocalCode($country)
    {
        if($country)
        {
            $lang = '';
            switch($country)
            {
                case "DJ":
                case "ER":
                case "ET":

                    $lang = "aa";
                    break;

                case "AE":
                case "BH":
                case "DZ":
                case "EG":
                case "IQ":
                case "JO":
                case "KW":
                case "LB":
                case "LY":
                case "MA":
                case "OM":
                case "QA":
                case "SA":
                case "SD":
                case "SY":
                case "TN":
                case "YE":

                    $lang = "ar";
                    break;

                case "AZ":

                    $lang = "az";
                    break;

                case "BY":

                    $lang = "be";
                    break;

                case "BG":

                    $lang = "bg";
                    break;

                case "BD":

                    $lang = "bn";
                    break;

                case "BA":

                    $lang = "bs";
                    break;

                case "CZ":

                    $lang = "cs";
                    break;

                case "DK":

                    $lang = "da";
                    break;

                case "AT":
                case "CH":
                case "DE":
                case "LU":

                    $lang = "de";
                    break;

                case "MV":

                    $lang = "dv";
                    break;

                case "BT":

                    $lang = "dz";
                    break;

                case "GR":

                    $lang = "el";
                    break;

                case "AG":
                case "AI":
                case "AQ":
                case "AS":
                case "AU":
                case "BB":
                case "BW":
                case "CA":
                case "GB":
                case "IE":
                case "KE":
                case "NG":
                case "NZ":
                case "PH":
                case "SG":
                case "US":
                case "ZA":
                case "ZM":
                case "ZW":

                    $lang = "en";
                    break;

                case "AD":
                case "AR":
                case "BO":
                case "CL":
                case "CO":
                case "CR":
                case "CU":
                case "DO":
                case "EC":
                case "ES":
                case "GT":
                case "HN":
                case "MX":
                case "NI":
                case "PA":
                case "PE":
                case "PR":
                case "PY":
                case "SV":
                case "UY":
                case "VE":

                    $lang = "es";
                    break;

                case "EE":

                    $lang = "et";
                    break;

                case "IR":

                    $lang = "fa";
                    break;

                case "FI":

                    $lang = "fi";
                    break;

                case "FO":

                    $lang = "fo";
                    break;

                case "BE":
                case "FR":
                case "SN":

                    $lang = "fr";
                    break;

                case "IL":

                    $lang = "he";
                    break;

                case "IN":

                    $lang = "hi";
                    break;

                case "HR":

                    $lang = "hr";
                    break;

                case "HT":

                    $lang = "ht";
                    break;

                case "HU":

                    $lang = "hu";
                    break;

                case "AM":

                    $lang = "hy";
                    break;

                case "ID":

                    $lang = "id";
                    break;

                case "IS":

                    $lang = "is";
                    break;

                case "IT":

                    $lang = "it";
                    break;

                case "JP":

                    $lang = "ja";
                    break;

                case "GE":

                    $lang = "ka";
                    break;

                case "KZ":

                    $lang = "kk";
                    break;

                case "GL":

                    $lang = "kl";
                    break;

                case "KH":

                    $lang = "km";
                    break;

                case "KR":

                    $lang = "ko";
                    break;

                case "KG":

                    $lang = "ky";
                    break;

                case "UG":

                    $lang = "lg";
                    break;

                case "LA":

                    $lang = "lo";
                    break;

                case "LT":

                    $lang = "lt";
                    break;

                case "LV":

                    $lang = "lv";
                    break;

                case "MG":

                    $lang = "mg";
                    break;

                case "MK":

                    $lang = "mk";
                    break;

                case "MN":

                    $lang = "mn";
                    break;

                case "MY":

                    $lang = "ms";
                    break;

                case "MT":

                    $lang = "mt";
                    break;

                case "MM":

                    $lang = "my";
                    break;

                case "NP":

                    $lang = "ne";
                    break;

                case "AW":
                case "NL":

                    $lang = "nl";
                    break;

                case "NO":

                    $lang = "no";
                    break;

                case "PL":

                    $lang = "pl";
                    break;

                case "AF":

                    $lang = "ps";
                    break;

                case "AO":
                case "BR":
                case "PT":

                    $lang = "pt";
                    break;

                case "RO":

                    $lang = "ro";
                    break;

                case "RU":
                case "UA":

                    $lang = "ru";
                    break;

                case "RW":

                    $lang = "rw";
                    break;

                case "AX":

                    $lang = "se";
                    break;

                case "SK":

                    $lang = "sk";
                    break;

                case "SI":

                    $lang = "sl";
                    break;

                case "SO":

                    $lang = "so";
                    break;

                case "AL":

                    $lang = "sq";
                    break;

                case "ME":
                case "RS":

                    $lang = "sr";
                    break;

                case "SE":

                    $lang = "sv";
                    break;

                case "TZ":

                    $lang = "sw";
                    break;

                case "LK":

                    $lang = "ta";
                    break;

                case "TJ":

                    $lang = "tg";
                    break;

                case "TH":

                    $lang = "th";
                    break;

                case "TM":

                    $lang = "tk";
                    break;

                case "CY":
                case "TR":

                    $lang = "tr";
                    break;

                case "PK":

                    $lang = "ur";
                    break;

                case "UZ":

                    $lang = "uz";
                    break;

                case "VN":

                    $lang = "vi";
                    break;

                case "CN":
                case "HK":
                case "TW":

                    $lang = "zh";
                    break;

                default:break;
            }
            return $lang;
        }
    }

?>