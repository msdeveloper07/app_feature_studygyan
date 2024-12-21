<div class="row">
	<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Shopify User ID</th>
                <th>Shopify User Email</th>
                <th>Shopify User Name</th>
                <th>Name</th>
                <th>Occassion</th>
                <th>EventDate</th>
            </tr>
        </thead>
        <tbody>
                <?php $__currentLoopData = @$events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($event['shopify_user_id']); ?></td>
					<td><?php echo e($event['shopify_user_email']); ?></td>
					<td><?php echo e($event['shopify_user_name']); ?></td>
					<td><?php echo e($event['guest_name']); ?></td>
					<td><?php echo e($event['category']); ?></td>
					<td><?php echo e($event['event_date']); ?></td>
				</tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        <tfoot>
            <tr>
                <tr>
                <th>Shopify User ID</th>
                <th>Shopify User Email</th>
                <th>Shopify User Name</th>
                <th>Name</th>
                <th>Occassion</th>
                <th>EventDate</th>
            </tr>
            </tr>
        </tfoot>
    </table>
</div>
<script>
	$(document).ready(function() {
		$('#example').DataTable( {
			"pagingType": "full_numbers",
            "ordering": false
		} );
	} );
</script>