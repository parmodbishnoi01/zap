<?php 
defined('ABSPATH') || die("you cant access the page directly");
ob_start();

$url      = 'https://admissions.nic.in/NchmCounse/appsummary/API/GetInsituteList?appformid=103012121';
$response = wp_remote_get( esc_url_raw( $url ) );
$api_response = json_decode( wp_remote_retrieve_body( $response ), true );
?>


<table class="wp-list-table widefat fixed striped table-view-list posts">
	<thead>
		<tr>
		<th>InstituteId</th>
		<th>Institute Name Parmod</th>
	    </tr>
</thead>
<tbody>
	<?php foreach($api_response as  $v): 
	       foreach($v as  $p):
		?>

	<tr>
		<td><?php echo $p['InstituteId'];?></td>
		<td><?php echo $p['InstituteName'];?></td>
	</tr>
<?php endforeach; ?>
<?php endforeach; ?>
</tbody>
</table>

<?php ob_flush();?>
