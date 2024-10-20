<DOCTTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="Width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<h1>Employee List</h1>

<div class="add-employee-btn">
<a href="<?php echo site_url("employee/create")?>"class="btn btn-success">Add Employee</a>
</div>



<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Address</th>
            <th>Gender</th>
            <th>Hobby</th>
            <th>Photo</th>
            <th>Actions</th>

    <tbody>
        <?php if(!empty($employees)):?>
            <?php foreach($employees  as $row):?>
       <tr>
        <td><?php echo $row['id'];?></td>
        <td><?php echo htmlspecialchars($row['first_name']); ?></td>
        <td><?php echo htmlspecialchars($row['last_name']); ?></td>
        <td><?php echo htmlspecialchars($row['email']); ?></td>
        <td><?php echo htmlspecialchars($row['mobile']); ?></td>
        <td><?php echo htmlspecialchars($row['address']); ?></td>
        <td><?php echo htmlspecialchars($row['gender']); ?></td>
        <td><?php echo htmlspecialchars($row['hobby']); ?></td>

        <td><img src="<?php echo base_url('uploads/'.htmlspecialchars($row['photo']));?>"
        alt="photo"></td>
        <td class="actions">
          <a href="<?php echo site_url('employee/update/' .$row['id']);?>">Edit</a>
          <a href="<?php echo site_url('employee/delete/'.$row['id']);?>" onclick="return confirm('Are you sure want to delete this employee?');">Delete</a>
        </td>
       </tr>
       <?php endforeach;?>
       <?php else:?>
        <tr>
            <td colspan="10">No employees found</td>
       </tr>
    <?php endif;?>
    </tbody>
</table>
</body>
</html>
<style>
    body{
        font-family:Arial,sans-serif;
        background-color:#f4f4f4;
        margin:0;
        padding:20px;
    }
    h1{
        text-align:center;
        color:#333;
    }
    table{
        width:100%;
        border-collapse:collapse;
        margin-top:20px;
    }
    th, td{
        padding:8px;
        text-align:left;
        border:1px solid #ccc;
    }
    th{
        background-color:#f2f2f2;

    }
    img{
        width:50px;
        height:auto;

    }
    .actions a{
        margin-right:10px;
        text-decoration:none;
        color:#007bff;

    }
    </style>

