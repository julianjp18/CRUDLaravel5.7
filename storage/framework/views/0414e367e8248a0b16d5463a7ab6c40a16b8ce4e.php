



<?php $__env->startSection('title','Editar usuario'); ?>

<?php $__env->startSection('content'); ?>
    <br>
    <div class="container white">
        <br>
        <div class="row">
            <div class="col-md-6">
                <h1>Editar usuario</h1>
            </div>
            <div class="col-md-6 text-right">
                <a class="" href="/index">Volver</a>
            </div>
        </div>
        <br>
        <?php $__currentLoopData = $usuario; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
    <form class="form" action="/edituser/<?php echo e($u->id); ?>" method="POST">
            <?php echo method_field('PUT'); ?>
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="txt_nombre">Nombre</label>
            <input type="text" class="form-control" name="txt_nombre" id="txt_nombre" value="<?php echo e($u->nombre); ?>" placeholder="Ingresa Nombres" required>
            </div>
            <div class="form-group">
                <label for="txt_apellido">Apellido</label>
                <input type="text" class="form-control" name="txt_apellido" id="txt_apellido" value="<?php echo e($u->apellido); ?>" placeholder="Ingresa Apellidos" required>
            </div>
            <div class="form-group">
                <label for="txt_telefono">Teléfono</label>
                <input type="tel" class="form-control" name="txt_telefono" id="txt_telefono" value="<?php echo e($u->telefono); ?>" placeholder="1237890" size="7" minlength="7" maxlength="7" pattern="[0-9]{3}[0-9]{4}" required>
            </div>
            <div class="form-group">
                <label for="txt_movil">Móvil</label>
                <input type="tel" class="form-control" name="txt_movil" id="txt_movil" value="<?php echo e($u->movil); ?>" placeholder="1234567890" size="10" minlength="10" maxlength="10" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required>
            </div>
            <div class="form-group">
                    <label for="txt_correo">Correo</label>
                    <input type="email" class="form-control" name="txt_correo" id="txt_correo" value="<?php echo e($u->correo); ?>"  placeholder="Ingresa correo" required>
                </div>
            <div class="form-group">
                <label for="txt_direccion">Dirección</label>
                <input type="text" class="form-control" name="txt_direccion" id="txt_direccion" value="<?php echo e($u->direccion); ?>" placeholder="Ingresa Dirección" required>
            </div>
            <div class="form-group">
                    <label for="select_departamento">Departamento</label>
                    <?php echo e(Form::select('state', array($u->id_departamento => $u->nom_departamento, $departamentos),null,['class' =>'form-control', 'id'=>'state','name' => 'state', 'required' => 'true'])); ?>

                    <small>Después de haber seleccionado un departamento, espere un momento mientras carga los municipios</small>
            </div>
            <div class="form-group">
                    <label for="select_municipio">Municipio o Ciudad</label>
                    <?php echo e(Form::select('town',array($u->id_municipio => $u->nom_municipio),null,['class' =>'form-control', 'id' => 'town', 'name' => 'town', 'required' => 'true'])); ?>   
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="text-center">
                <button type="submit" class="btn btn-lg btn-warning">Actualizar</button>
                <br>
                <br>
                <a href="/index">Volver</a>
            </div> 
        </form>
        <br>
    </div>
    <br>
    <br>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>