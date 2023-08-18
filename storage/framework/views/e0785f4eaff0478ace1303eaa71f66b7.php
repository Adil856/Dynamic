<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <a href="<?php echo e(route('contacts.create')); ?>" class="btn btn-primary mr-5 mt-2" style="float:right">Add Contact</a>
    <h1>Contact List</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($contact->name); ?></td>
                    <td><?php echo e($contact->email); ?></td>
                    <td><?php echo e($contact->phone); ?></td>
                    <td>
                        <a href="<?php echo e(route('contacts.edit', $contact->user_id)); ?>" class="btn btn-info">Edit</a>
                        <form action="<?php echo e(route('contacts.destroy', $contact->user_id)); ?>" method="POST" style="display:inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this contact?')">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\ContactManager\resources\views/contacts-index.blade.php ENDPATH**/ ?>