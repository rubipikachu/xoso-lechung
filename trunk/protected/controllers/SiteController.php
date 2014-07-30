<?php

/**
 * SiteController - default controller of fshareweb
 *
 * @package FshareWeb.Controller 
 * */
class SiteController extends Controller
{

    public $layout = 'column3';
    public $attempts = 3; // allowed 5 attempts
    public $counter;

    /**
     * Declares class-based actions.
     */
    public function actions()
    {
        return array('page' => array('class' => 'CViewAction', ), );
    }

    /**
     * Check required captcha
     * @return true if session captchaRequired >= attempts
     */
    public function captchaRequired()
    {
        return Yii::app()->session->itemAt('captchaRequired') >= $this->attempts;
    }

    public function actionIndex()
    {
        $day = date("l",time());
        $date = date("d-m-Y",time());
        if(date("H",time())<=16 && date("i",time()) <=10){
           $day = date("l",time() - 86400);
           $date = date("d-m-Y",time() - 86400);
        }
        
        $data = Calendar::model()->find("thu = :thu", array(":thu"=>$day));
        $nam = explode(",",$data->nam);
        $trung = explode(",",$data->trung);
        $bac = explode(",",$data->bac);
        
        //nam
        $criterianam = new CDbCriteria();
        $criterianam->condition='date=:date';
        $criterianam->params=array(':date'=>$date);
        $criterianam->addInCondition("provice", $nam);
        $resultnam = KqxsNam::model()->findAll($criterianam);
        
        //trung
        $criteriatrung = new CDbCriteria();
        $criteriatrung->condition='date=:date'; 
        $criteriatrung->params=array(':date'=>$date);
        $criteriatrung->addInCondition("provice", $trung);
        $resulttrung = KqxsTrung::model()->findAll($criteriatrung);
        
        //bac
        $criteriabac = new CDbCriteria();
        $criteriabac->condition='date=:date'; 
        $criteriabac->params=array(':date'=>$date);
        $criteriabac->addInCondition("provice", $bac);
        $resultbac = KqxsBac::model()->findAll($criteriabac);
        
        $mien = array();
        $mien["tinhnam"]    = $resultnam;
        $mien["tinhtrung"]  = $resulttrung;
        $mien["tinhbac"]    = $resultbac;
        
        $this->render('index', array(
                                        "nam"=>$resultnam,
                                        "trung"=>$resulttrung,
                                        "bac"=>$resultbac,
                                        "mien"=>$mien,
                                        "tinhbac"=>$bac,
                                        "tinhtrung"=>$trung,
                                        "tinhnam"=>$nam
                                    )
                    );
    }
    
    public function actionOnline()
    {
        $message = "";
        $error =2;
        $tinh = Yii::app()->request->getQuery("tinh");
        if(!is_numeric($tinh) || $tinh>40 || $tinh<1) $message = "Tỉnh thành không hợp lệ";
        $ve = (int)Yii::app()->request->getQuery("so","");
        if($ve=="" || ($tinh<21 && $tinh>26 && strlen($ve)!=6) || ($tinh>=21 && $tinh<=26 && strlen($ve)!=5)) $message = "Vé số không hợp lệ";
        $ngay = Yii::app()->request->getQuery("ngay");
        if(strlen($ngay)!=10) $message = 'ngày dò không hợp lệ';
        
        if($message == ""){
            $kq = CommonHelper::doveonline($ve, $tinh, $ngay);
            if(!$kq){ $message = "Ngày dò vé và đài không hợp lệ. <br>Vui lòng kiểm tra chính xác đài và ngày xổ số. <br>Xin cám ơn."; $error =2; }
            else{
                if($kq["tongtien"]==0){
                    $message = "Rất tiếc vé số của bạn không trúng giải !<br>
                                Chúc bạn may mắn lần sau!...";
                    $error = 1;
                }else{
                    $message = "Chúc mừng bạn !...<br>Vé số của bạn đã trúng thưởng giải <strong style='font-size:16px'>".implode(" và ",$kq["giai"])."</strong><br>Tổng giá trị giải thưởng là: <strong style='font-size:16px'>".number_format($kq["tongtien"])."</strong> vnđ";
                    $error = 0;
                }
            }
        }
        $this->render("online",array("message"=>$message, "error"=>$error));
    }
    
    public function actionIn()
    {
        $this->layout="none";
        //mien=1&vdn=28-07-2014&page=4
        $date = date("d-m-Y",time());
        if(date("H",time())<17){
           $date = date("d-m-Y",time() - 86400);
        }
        $mien = Yii::app()->request->getQuery("mien",1);
        $vdn = Yii::app()->request->getQuery("vdn",$date);
        $page = Yii::app()->request->getQuery("page",4);
        if($page==1){
            if($mien==3){
                $data = KqxsBac::model()->find("date=:date",array(":date"=>$vdn));
                $this->render("inbac",array("data"=>$data));
            }else{
                if($mien==1)
                    $data = KqxsNam::model()->findAll("date=:date",array(":date"=>$vdn));
                else
                    $data = KqxsTrung::model()->findAll("date=:date",array(":date"=>$vdn));
                $this->render("in",array("data"=>$data,"date"=>$vdn, "mien"=>$mien));
            }
        }else{
            if($mien==3){
                $data = KqxsBac::model()->find("date=:date",array(":date"=>$vdn));
                $this->render("in4bac",array("data"=>$data));
            }else{
                if($mien==1)
                    $data = KqxsNam::model()->findAll("date=:date",array(":date"=>$vdn));
                else
                    $data = KqxsTrung::model()->findAll("date=:date",array(":date"=>$vdn));
                $this->render("in4",array("data"=>$data,"date"=>$vdn, "mien"=>$mien));
            }
        }
    }
    
    public function actionInve()
    {
        $this->render("inve");
    }

    public function actionLocation($language)
    {
        if (isset($language) && in_array($language, Yii::app()->params['supportLanguage'])) {
            Yii::app()->session['language'] = $language;
        }
        if (Yii::app()->request->urlReferrer !== null) {
            $returnUrl = Yii::app()->request->urlReferrer;
        } else {
            $returnUrl = '/';
        }
        ;
        $this->redirect($returnUrl);
    }

    /**
     * Registers a new account.
     * If registration is successful, the browser will be redirected to the to the previous page.
     */
    public function actionSignup()
    {
        if (!Yii::app()->user->isGuest) {
            $this->redirect(Yii::app()->homeUrl);
        }
        
        $model = new SignupForm;
        $model->scenario = 'captchaRequired';
        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'registration-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        if (isset($_POST['SignupForm'])) {
            $model->attributes = $_POST['SignupForm'];
            if ($model->validate()) {
                if ($model->email != '' && $model->password != '') {
                    $user = User::model()->find("email = ?", array($model->email));
                    $usermodel = new User();
                    if (!$user) {
                        $user_invitor = User::model()->find("email = ?", array(base64_decode($model->
                            invitor)));
                        $activeKey = $usermodel->randomPassword(32);
                        $usermodel->password = $usermodel->getcryptedpassword($model->password);
                        $usermodel->name = current(explode('@', $model->email));
                        $usermodel->email = $model->email;
                        $usermodel->activationkey = $activeKey;
                        $usermodel->joindate = time();
                        $usermodel->level = UserPolicy::Guest;
                        $usermodel->auth = 0;
                        if ($user_invitor) {
                            $usermodel->invitor = $user_invitor->id;
                        }
                        $usermodel->save(false);
                        $this->counter = 0;
                        Yii::app()->session->add('captchaRequired', $this->counter);
                        //sendmail active account
                        $keya = User::generateKeyActive($activeKey);
                        $keya = str_replace('=', '', $keya);
                        $info = array("websiteName" => substr(Yii::app()->homeUrl, 0, -1), "userEmail" =>
                            $model->email, "userPass" => "******", "activeLink" => Yii::app()->homeUrl .
                            'active/' . $keya, );
                        $mail = $usermodel->sendMailTemplate($model->email, Yii::t("fshare",
                            "Verification Account Fshare"), $info, "activateRegistered");
                        if (!$mail) {
                            Yii::app()->user->setFlash('error', Yii::t("fshare", "Error while sending email"));
                        }

                        Yii::app()->user->setFlash('title', Yii::t("fshare", "Register success"));
                        Yii::app()->user->setFlash('msg', Yii::t("fshare",
                            "<p><b>Please go to your registered email to activate your account perform the path we've sent.</b> </p> <p> Thank you for using our services <br /> <small> Fshare.vn </ small><br /> <small> Return home 10 seconds</ small>"));
                        $this->redirect(array('site/message'));
                    } else {
                        $this->counter = Yii::app()->session->itemAt('captchaRequired') + 1;
                        Yii::app()->session->add('captchaRequired', $this->counter);
                    }
                }
            }
        }
        $model->invitor = Yii::app()->getRequest()->getQuery('uid');
        Yii::app()->session["invitor"] = $model->invitor;
        $this->render('signup', array('model' => $model, ));
    }

    /**
     * Activation user account
     */
    public function actionActivation()
    {
        $email = $_GET['email'];
        $activkey = $_GET['activkey'];
        if ($email && $activkey) {
            $find = User::model()->notsafe()->findByAttributes(array('email' => $email));
        }
    }

    /**
     * Forgot password
     */
    public function actionForgot()
    {
        $this->layout = '/layouts/form';
        $model = new ForgotForm;
        $model->scenario = 'captchaRequired';
        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'forgot-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        if (isset($_POST['ForgotForm'])) {
            $model->attributes = $_POST['ForgotForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate()) {
                $user_invitor = User::model()->find("email = ?", array($model->email));
                if ($user_invitor) {
                    $activeKey = $user_invitor->randomPassword(32);
                    $user_invitor->activationkey = $activeKey;
                    $user_invitor->save(false);
                    $activeKey = $activeKey . '|' . $user_invitor->id;
                    $keya = $user_invitor->generateKeyActive($activeKey);
                    $keya = str_replace('=', '', $keya);
                    $info = array("websiteName" => substr(Yii::app()->homeUrl, 0, -1), "activeLink" =>
                        Yii::app()->homeUrl . 'reset/' . $keya, );
                    $mail = $user_invitor->sendMailTemplate($model->email, Yii::t("fshare",
                        "Forgot password"), $info, "forgotpass");
                    if (!$mail) {
                        Yii::app()->user->setFlash('error', Yii::t("fshare", "Error while sending email"));
                    }
                    Yii::app()->user->setFlash('title', Yii::t("fshare", "Get password"));
                    Yii::app()->user->setFlash('msg', Yii::t("fshare",
                        "message forgot password success"));
                    $this->redirect(array('site/message'));
                } else {
                    Yii::app()->user->setFlash('title', Yii::t("fshare", "Get password"));
                    Yii::app()->user->setFlash('msg', Yii::t("fshare",
                        "Fshare username is not exists"));
                    $this->redirect(array('site/message'));
                }
            } else {
                Yii::app()->getController()->createAction('captcha')->getVerifyResult();
            }
        }
        $this->render('forgot', array('model' => $model, ));
    }

    /**
     * Forgot password
     */
    public function actionReset()
    {
        $this->layout = '/layouts/form';
        $usermodel = new User();
        $name = 'message';
        $data = $_GET['data'];
        $data = base64_decode($data);
        $data = json_decode(($data), true);
        $datacontent = $data['data'];
        $message_data = explode("|", $data['data']);
        $message = $message_data[0];
        $received_signature = $data['sig'];
        $private_key = $usermodel->get_private_key_for_public_key($data['pubKey']);
        $computed_signature = base64_encode(hash_hmac('sha1', $datacontent, $private_key, true));
        if ($computed_signature == $received_signature) {
            $user = User::model()->find("activationkey = ?", array($message));
            if (!$user) {
                throw new CHttpException(403, Yii::t('fshare', 'Invalid path'));
            } else {
                $userid = $message_data[1];
                if (isset($_POST['ajax']) && $_POST['ajax'] === 'changepass-form') {
                    echo CActiveForm::validate($model);
                    Yii::app()->end();
                }
                $model = new ResetPassword;
                // collect user input data
                if (isset($_POST['ResetPassword'])) {
                    $model->attributes = $_POST['ResetPassword'];
                    // validate user input and redirect to the previous page if valid
                    if ($model->validate()) {
                        $userchange = User::model()->findByPk($userid);
                        $newpass = $userchange->getcryptedpassword($model->password);
                        $activeKey = $usermodel->randomPassword(32);
                        $userchange->activationkey = $activeKey;
                        $userchange->password = $newpass;
                        $userchange->save(false);

                        Yii::app()->user->setFlash('title', Yii::t("fshare", "Change password"));
                        Yii::app()->user->setFlash('msg', "<strong>" . Yii::t("fshare",
                            "Change password success") . "</strong>" . Yii::t("fshare",
                            "<p> Thank you for using our services <br /> <small> Fshare.vn </ small><br /> <small> Return home 10 seconds</ small>"));
                        $this->redirect(array('site/message'));
                    }
                }
                //load form
                $this->render('resetpassword', array('model' => $model, ));
                exit();
            }
        } else {
            throw new CHttpException(403, Yii::t('fshare', 'Invalid path'));
            //Yii::app()->user->setFlash('title', 'Đường dẫn kích hoạt không hợp lệ');
        }
        $this->render('message');
    }

    /**
     * Displays the login page
     */
    public function actionLogin($service = '')
    {

        if (!Yii::app()->user->isGuest) {
            $this->redirect(Yii::app()->homeUrl);
        }

        $model = new LoginForm('Front');
        
        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm']; 

            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {
                $return = (Yii::app()->user->returnUrl == '/') ? '/home' : Yii::app()->user->
                    returnUrl;
                $this->redirect($return);
            }            
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest || Yii::app()->request->acceptTypes ==
                'application/json') {
                $this->renderJSON(array('code' => $error['code'], 'msg' => $error['message']));
            }
        } else
            $error = array('code' => 404, 'message' => Yii::t('fshare', 'Invalid path'));

        $this->render('error', array('error' => $error));

    }

    public function actionActive()
    {
        $usermodel = new User();
        $name = 'message';
        $data = $_GET['data'];
        $data = base64_decode($data);
        $data = json_decode(($data), true);
        $message = $data['data'];
        $received_signature = $data['sig'];
        $private_key = $usermodel->get_private_key_for_public_key($data['pubKey']);
        $computed_signature = base64_encode(hash_hmac('sha1', $message, $private_key, true));
        if ($computed_signature == $received_signature) {
            $user = User::model()->find("activationkey = ?", array($message));
            if (!$user) {
                Yii::app()->user->setFlash('title', Yii::t('account', 'Invalid path'));
            } else {
                if ($user->level == UserPolicy::Guest) {
                    $command = Yii::app()->db->createCommand()->select('capacity_secure,capacity_unsecure')->
                        from('user_levels')->where('id=2')->queryRow();
                    $user->webspace = $command["capacity_unsecure"];
                    $user->webspace_secure = $command["capacity_secure"];
                    $activeKey = $usermodel->randomPassword(32);
                    $user->level = UserPolicy::Member;
                    $user->activationkey = $activeKey;
                    $user->update(array("level", "activationkey", "webspace", "webspace_secure"));
                    $user->refresh();
                }
                CommonHelper::reloadUser(Yii::app()->user->id);
                Yii::app()->user->setFlash('title', Yii::t('account', 'Member active'));
                //Yii::app()->user->setFlash('msg', "<strong>".Yii::t("fshare", "Successful active")."</strong>".Yii::t("fshare","<p> Thank you for using our services <br /> <small> Fshare.vn </ small><br /> <small> Return home 10 seconds</ small>"));
                //$this->redirect(array('site/message'));
            }
        } else {
            Yii::app()->user->setFlash('title', Yii::t('account', 'Invalid path'));
        }
        $this->render('message');
    }
}
