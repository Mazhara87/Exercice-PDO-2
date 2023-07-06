<!DOCTYPE html>
<html>
<head>
    <title>Add Patient</title>
</head>
<body>
    <h2>Add Patient</h2>
    <form action="process_add_patient.php" method="post">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required><br>
        
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required><br>
        
        <label for="birthdate">Birthdate:</label>
        <input type="date" id="birthdate" name="birthdate" required><br>
        
        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone"  required><br>
        
        <label for="mail">Mail:</label>
        <input type="email" id="mail" name="mail" required><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>
