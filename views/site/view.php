<?php
use yii\helpers\html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */

//  $this->title = 'Book Catalog';
?>
<div class="site-index">

    <h1 style="color: #337ab7;">View Book!!</h1>
    <div class="body-content">
    <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <?php echo $book->title;?>
        </li>
        
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <?php echo $book->author;?>
        </li>
        
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <?php echo $book->category;?>
        </li>
    </ul>
    <div class="col-lg-3">
                        <a href=<?php echo yii:: $app->homeUrl;?> class="btn btn-primary">Go Back</a>
                    </div>
    </div>
</div>
