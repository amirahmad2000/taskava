<?php 

use yii\helpers\Url;


echo
    '<table style="width:100%; border: 1px; solid:black; text-align:center;">'. 
     '<tr>'. 
      '<th>code</th>'. 
      '<th>name</th>'. 
      '<th>population</th>'.
     '</tr>'; 
     

 foreach($countries as $country){
    
  
    echo
    '<tr>'. 
     '<td>'. $country->code. '</td>'.
     '<td>'. $country->name. '</td>'.
     '<td>'. $country->population. '</td>'.
     '<td><a href="'.Url::to(['country/edit-country','id'=>$country->code]).'">edit</a></td>'.
     '<td><a href="'.Url::to(['country/delete-country','id'=>$country->code]).'">delete</a></td>'.
    '</tr>';

 }
   
    



echo '</table>';


