<?php
use yii\helpers\html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */

//$this->title = 'Book Catalog';
?>
<div class="site-index">

    <h1 style="color: #337ab7;">Add Book!!</h1>
    <div class="body-content">
        <?php 
            $form=ActiveForm::begin()?>
        <div class="row">
            <div class="form-group">
                <div class="col-lg-6">
                    <?= $form->field($book,'title');?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-lg-6">
                    <?= $form->field($book,'author');?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-lg-6">
                <?php $items = ['horror'=>'horror','fantasy'=>'fantasy','romance'=>'romance'];?>
                    <?= $form->field($book,'category')->dropDownList($items,['prompt'=> 'Select category']);?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <div class="col-lg-6">
                    <div class="col-lg-3">
                        <? Html::submitButton('Add Book',['class'=>'btn btn-primary']);?>
                    </div>

                    <div class="col-lg-3">
                        <a href=<?php echo yii:: $app->homeUrl;?> class="btn btn-primary">Go Back</a>
                    </div>
                </div>
            </div>
        </div>

        <?php ActiveForm::end()?>
    </div>
</div>
