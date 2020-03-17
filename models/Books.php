<?php
namespace app\models;
use yii\db\ActiveRecord;

class Books extends ActiveRecord{
    private $title;
    private $author;
    private $category;

    public function rules(){
        return [
            [['title','description','category'], 'required']
        ];
    }

}
?>
