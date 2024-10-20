<!DOCTTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="Width=device-width,initial-scale=1.0">
        <h1>Edit Employee</h1>
        <link rel="stylesheet" href="path/to/your/style.css">

</head>
<body>
    <?php if (isset($employee)):?>
        <form method="post" action="<?php echo site_url('Employee/update_action'); ?>" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $employee->id ?>">
        <label>First Name:</label>
        <input type="text" name="first_name" value="<?php echo set_value('first_name',$employee->first_name); ?>"required>

        <label>Last Name:</label>
        <input type="text" name="last_name"value="<?php echo set_value('last_name',$employee->last_name); ?>" required>

        <label>Email:</label>
        <input type="text" name="email" value="<?php echo set_value('email',$employee->email); ?>" required>

        <label>Address:</label>
        <input type="text" name="address" value="<?php echo set_value('address',$employee->address); ?>" required>
        
        <label>Mobile:</label>
        <input type="text" name="mobile" value="<?php echo set_value('mobile',$employee->mobile); ?>" required>
        
        <label>Gender:</label>
        <input type="radio" name="gender" value="Male" <?php echo set_radio('gender','Male',$employee->gender=='Male'); ?> required>Male
        <input type="radio" name="gender" value="Female" <?php echo set_radio('gender','Female',$employee->gender=='Female'); ?> required>Female
        <input type="radio" name="gender" value="Other" <?php echo set_radio('gender','Other', $employee->gender=='Other'); ?> required>Other

        <label>Hobby:</label>
        <label class="hobby-label"><input type="checkbox" name="hobby[]" value="Reading" <?php echo (in_array('Reading',explode(',',$employee->hobby)))? 'checked':'';?>>Reading
        <label class="hobby-label"><input type="checkbox" name="hobby[]" value="Singing" <?php echo (in_array('Singing',explode(',',$employee->hobby)))? 'checked':'';?>>Singing
        <label class="hobby-label"><input type="checkbox" name="hobby[]" value="Gaming" <?php echo (in_array('Gaming',explode(',',$employee->hobby)))? 'checked':'';?>>Gaming

        <label>Photo:</label>
        <input type="file" name="photo" accept="image/*" required>
        <img src="<?php echo base_url('uploads/' .$employee->photo);?>" alt="Employee Photo">
        <input type="submit" name="update" value="Update">
    </form>
    <?php else:?>
        <div style="color:red;">Employee data not found.</div>
        <?php endif;?>
</body>
</html>
<style>
    body{
        font-family:Arial sans-serif;
        background-color:#f4f4f4;
        margin:0;
        padding:20px;
    }
    form{
        background:#fff;
        padding:20px;
        border-radius:5px;
        box-shadow:0 2px 10px rgba(0,0,0,0.1);
        max-width:600px;
        margin:auto;
    }
    h1{
        text-align:center;
        color:#0333;

    }
    label{
        display:block;
        margin-bottom:8px;
        font-weight:bold;
        color:#555;
    }
    input[type="text"],
    input[type="email"],
    input[type="number"],
    textarea,
    input[type="file"]{
        width:100%;
        padding:10px;
        margin-bottom:15px;
        border:1px solid #ddd;
        border-radius:4px;
        cursor: pointer;
        font-size:16px;
        width:100%;

    }
    input[type="submit"]:hover{
        background-color:#218838;
    }
    img{
        max-width:100%;
        height:auto;
        display:block;
        margin-bottom:10px;
    }
    </style>