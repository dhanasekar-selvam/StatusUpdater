<?php $__env->startSection('content'); ?>
 <div class="column is-9">
                <section class="hero is-info welcome is-small">
                    <div class="hero-body">
                        <div class="container">
                            <h1 class="title">
                                Add Task
                            </h1>
                            
                        </div>
                    </div>
                </section><br><br>
                <div class="columns">
                    <div class="column">
                        <form action="<?php echo e(route('tasks.store')); ?>" method="POST"  class="box">
                            

                            <div class="field">
                                <label class="label">Proj Name</label>
                                <div class="control">
                                    <div class="select" >
                                        <select name="project_id">
                                        <option value="1">Proj1</option>
                                        <option value="2">Proj2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Developer</label>
                                <div class="control">
                                    <div class="select">
                                       <select id="dev_id" name="dev_id" class="form-control">
                                        <!-- TODO: make the list dynamic -->
                                            <?php $__currentLoopData = $devs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dev): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($dev->id); ?>"><?php echo e($dev->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label for="task" class="label">Task</label>
                                <div class="control has-icons-left">
                                <input type="text" placeholder="Enter task Name" 
                                id="title" name="title"
                                value="<?php echo e($task->title); ?>"
                                 class="input" required>
                                <span class="icon is-small is-left">
                                    <i class="fas fa-tasks"></i>
                                </span>
                                </div>
                            </div>
                            <div class="field">
                                <label for="desc" class="label">Task Description</label>
                                <textarea class="textarea" id="desc" name="desc" placeholder="Enter Description"><?php echo e($task->desc); ?></textarea>
                                
                            </div>    
                            <div class="field">
                                <label class="label">Status</label>
                                <div class="control">
                                    <div class="select" >
                                      <select id="status" name="status" class="form-control">
                                        <option value="1" 
                                        <?php echo ($task->status == 1)?'selected':''; ?>
                                        >Pending</option>
                                        <option value="2"
                                        <?php echo ($task->status == 2)?'selected':''; ?>
                                            >In-Progress</option>
                                        <option value="3"
                                        <?php echo ($task->status == 3)?'selected':''; ?>
                                        >Completed</option>
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <label for="eta" class="label">ETA</label>
                                <div class="control has-icons-left">
                                <input type="date" placeholder="Enter ETA" 
                                id="eta" name="eta" value="<?php echo e($task->eta); ?>" class="input" required>
                                <span class="icon is-small is-left">
                                    <i class="fas fa-tasks"></i>
                                </span>
                                </div>
                            </div>  
                            
                            <div class="field">
                                <button class="button is-success">
                                    Save Dev
                                </button>
                            </div>
                            <input type="hidden" name="id" value="<?php echo e($task->id); ?>"> 
                             <?php echo e(csrf_field()); ?> 
                        </form>
                    </div>
                </div>
            </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/status/resources/views/tasks/add.blade.php ENDPATH**/ ?>