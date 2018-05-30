<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>T_employee List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Matricule</th>
		<th>FirstName</th>
		<th>LastName</th>
		<th>Gender</th>
		<th>Email</th>
		<th>Telephone</th>
		<th>IdDepartement</th>
		
            </tr><?php
            foreach ($employee_data as $employee)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $employee->matricule ?></td>
		      <td><?php echo $employee->firstName ?></td>
		      <td><?php echo $employee->lastName ?></td>
		      <td><?php echo $employee->gender ?></td>
		      <td><?php echo $employee->email ?></td>
		      <td><?php echo $employee->telephone ?></td>
		      <td><?php echo $employee->idDepartement ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>