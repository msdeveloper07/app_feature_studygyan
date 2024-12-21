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
                @foreach(@$events as $event)
				<tr>
					<td>{{$event['shopify_user_id']}}</td>
					<td>{{$event['shopify_user_email']}}</td>
					<td>{{$event['shopify_user_name']}}</td>
					<td>{{$event['guest_name']}}</td>
					<td>{{$event['category']}}</td>
					<td>{{$event['event_date']}}</td>
				</tr>
                @endforeach
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