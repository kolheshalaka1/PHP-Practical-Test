<!DOCTTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="Width=device-width,initial-scale=1.0">
        <title>Add Employee</title>

</head>
<body>
    <form method="post" action="<?php echo site_url("Employee/create_action")?>" enctype="multipart/form-data">
        <h1>Add Employee</h1>
        <label>First Name:</label>
        <input type="text" name="first_name" required>

        <label>Last Name:</label>
        <input type="text" name="last_name" required>

        <label>Email:</label>
        <input type="text" name="email" required>

        <label>Mobile:</label>
        <select name="country_code" required>
            <option value="">Select Country Code</option>
            <option value="+1" +1>(USA)</option>
            <option value="+44"+44>(UK)</option>
            <option value="+91" +91>(India)</option>
        </select>
       <input type="number" name="mobile" required>

        <label>Address:</label>
        <textarea name="address" required ></textarea>

        <label>Gender:</label>
        <input type="radio" name="gender" value="Male" required>Male
        <input type="radio" name="gender" value="Female" required>Female
        <input type="radio" name="gender" value="Other" required>Other

        <label>Hobby:</label>
        <label class="hobby-label"><input type="checkbox" name="hobby[]" value="Reading">Reading</label>
        <label class="hobby-label"><input type="checkbox" name="hobby[]"value="Singing">Singing</label>
        <label class="hobby-label"><input type="checkbox" name="hobby[]"value="Gaming">Gaming</label>

        <label>Photo:</label>
        <input type="file" name="photo" accept="image/*" required>
        <button type="submit" name="save" class="btn btn-success">Add Employee</button>


    </form>

<style>
    body{
        background-color: #f4f4f4;
        margin:0;
        padding:20px;

    }
    h1{
        text-align:center;
        color:#0333;

    }
    form{
        max-width:500px;
        margin:auto;
        background:white;
        padding:20px;
        border-radius:8px;
        box-shadow:0 2px 10px rgba(0,0,0,0.1);
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
    select{
        width:100%;
        padding:10px;
        margin-bottom:15px;
        border:1px solid #ccc;
        border-radius:4px;
        box-sizing:border-box;
    }
    input[type="radio"],
    input[type="checkbox"]{
    margin-right:5px;

    }
    button{
        background-color:#28a745;
        color:white;
        border:none;
        padding:10px;
        cursor:pointer;
        border-radius:4px;
        width:30%;
        font-size:16px;
    }
    button:hover{
        background-color:#218838;

    }
    .hobby-label{
        display:inline-block;
        margin-right:15px;
    }
    .error-message{
        color:red;
        font-size:12px;
        margin-top:-10px;
        margin-bottom:10px;
    }
    </style>
</body>
</html>