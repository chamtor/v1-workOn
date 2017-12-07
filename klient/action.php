<?php

if(isset($_POST['action'])){
	if($_POST['action'] == "fetch"){

		$folder = array_filter(glob('*'), 'is_dir');
		$output ='
		<table class="table table-boardered table-striped">
		<tr>
			<th>Folder name</th>
			<th>Total files</th>
			<th>Update</th>
			<th>Delete</th>
			<th>Folder name4</th>
		</tr>
		';

		if(count($folder)>0)
		{
			foreach ($folder as $$name) {
				$output .='
				<tr>
					<td>'.$name.'</td>
					<td>'.(count(scandir($name))-2).'</td>
					<td><button type="button" name="update" data-name="'.$name.'" class="update btn btn-warning btn-xs">Update</button></td>
					
					<td><button type="button" name="delete" data-name="'.$name.'" class="delete btn btn-warning btn-xs">Delete</button></td>

				</tr>

				'
			}

		}
		else
		{
			$output .= '
			<tr>
				<td colspan="6">No Folder found</td>
			</tr>	
			'
		}
		$output .= '</table>';
		echo $output;
	}
}



?>