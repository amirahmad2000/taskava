<?php

namespace app\controllers;


use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\Country;
use app\models\CountryForm;

class CountryController extends Controller{

    public function actionGetCountries(){
       //country/get-countries

       $countries= Country::find()->all(); //[]

       return $this->render('country-index',['countries'=>$countries]);
    }

    public function actionEditCountry($id){

        $model = new CountryForm();
        $country = Country::findOne($id);

        if($model->load(Yii::$app->request->post()) && $model->validate()){

           $name= $model['name'];
           $population= $model['population'];
           $code = $model['code'];

           $country->name = $name;
           $country->population=$population;
           $country->code=$code;
           $country->save();

           return $this->render('country-confirm');

        }else{
            return $this->render('country-form',['model'=>$model]);

        }


        
    }

    public function actionCreateCountry(){
        $model = new CountryForm();


        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $country = new Country();

            $name=$model['name'];
            $code=$model['code'];
            $population=$model['population'];

            $country->name = $name;
            $country->code= $code;
            $country->population = $population;

            $country->save();

            return $this->redirect('get-countries');

            
            
        }else{
            return $this->render('country-form',['model'=>$model]);
            
        }
    }

    public function actionDeleteCountry($id){

       $country= Country::findOne($id);
       $country->delete();

       return $this->redirect('get-countries');
    }

}