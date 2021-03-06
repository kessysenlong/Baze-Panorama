<?php $__env->startSection('content'); ?>
    <h1>Create Post</h1>
    <!--using lavarel collectives for form helpers-->
        <?php echo Form::open(['action' => 'PostsController@store', 'method' => 'POST']); ?>

            <div class="form-group">
                <?php echo e(Form::label('title', 'Title')); ?>

                <?php echo e(Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])); ?>

            </div>

            <div class="form-group">
                <?php echo e(Form::label('body', 'Body')); ?>

                <!--using id ckeditor to implement text editor in texte area-->
                <?php echo e(Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])); ?>

            </div>
            <?php echo e(Form::submit('Submit', ['class' => 'btn btn-primary'])); ?>


        <?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>