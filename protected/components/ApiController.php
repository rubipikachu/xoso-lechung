<?php

Yii::setPathOfAlias('JsonSchema', Yii::getPathOfAlias('application.lib.JsonSchema'));

class ApiController extends Controller {

    public $postData = array();

    protected function beforeAction($action) {
        $reca = parent::beforeAction($action);
        return $reca;
        //check whether authenticated
        if (Yii::app()->request->isPostRequest) {
            //decode json
            try {
                $this->postData = json_decode(file_get_contents("php://input"));
            } catch (Exception $e) {
                throw new CHttpException(400, 'Bad request, invalid input format!');
            }
            
            //validate schema
            $validator = new JsonSchema\Validator();
            $validator->check($this->postData, ApiSchema::Schema(Yii::app()->controller->action->id));
            if (!$validator->isValid()) {
                $ret = '';
                foreach ($validator->getErrors() as $error) {
                    $ret .= '"' . $error['property'] . '" ' . $error['message'] . '<br />';
                }
                throw new CHttpException(401, 'Input data is invalid!');
            }
            //validate token
            if ($this->validateToken($this->postData->token))
                throw new CHttpException(402, 'Token is invalid!');
        }
        return $reca;
    }
}
