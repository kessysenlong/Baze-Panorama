<?php $__env->startSection('content'); ?>
      <h1><?php echo e($title); ?></h1>
      <?php if(count($services) > 0): ?>
            <ul class="list-group">
                  <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     <!--foreach loops through 'services' in the array-->
                        <li class="list-group-item"><?php echo e($service); ?></li>         <!--list out array content-->
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                         <!--end the loop at the end of array-->
            </ul>
       <?php endif; ?>                                         <!--end the if conditional statement-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>