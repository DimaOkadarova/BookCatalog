<?php
use Yii\helpers\html;


/* @var $this yii\web\View */

?>
<div class="site-index">
<?php if(yii::$app->session->hasFlash('message')):?>
    <div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <?php echo yii::$app->session->getFlash('message');?>
</div>
<?php endif;?>
    <div class="jumbotron">
        <h1 style="color: #337ab7;">Welcome to Book Catalog!!</h1>
    </div>
    <div class="row">
        <span style="margin-bottom: 20px;"><?= Html::a('Create',['/site/create'],['class'=> 'btn btn-primary'])?></span>
    </div>

    <div class="body-content">

        <div class="row">
        <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Author</th>
      <th scope="col">Category</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php if(count($books)>0): ?>
    <?php foreach($books as $book): ?>
    <tr class="table-active">
      <th scope="row"><?php echo $post->id;?></th>
      <td><?php echo $post->title;?> </td>
      <td><?php echo $post->author;?> </td>
      <td><?php echo $post->category;?> </td>
      <td> 
      <span><?= Html::a('View',['view','id'=>$book->id],['class'=>'label label-primary'])?></span>
      <span><?= Html::a('Edit',['edit','id'=>$book->id],['class'=>'label label-success'])?></span>
      <span><?= Html::a('Delete',['delete','id'=>$book->id],['class'=>'label label-danger'])?></span>
      </td>
    </tr>
    <?php endforeach; ?>
  <?php else: ?>
    <tr>
        <td>No Records Found</td>
    </tr>
  <?php endif;?>
  </tbody>
</table>
        </div>

    </div>
</div>
