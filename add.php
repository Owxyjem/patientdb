<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $stmt = $pdo->prepare("INSERT INTO patients (name, dob, gender, address, phone, email,chiefofcomplaint, medicalhistory, employer, bloodtype, allergies, emergencycontact, typeofillness) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$_POST['name'], $_POST['dob'], $_POST['gender'], $_POST['address'], $_POST['phone'], $_POST['email'],$_POST['chiefofcomplaint'],$_POST['medicalhistory'],$_POST['employer'],$_POST['bloodtype'],$_POST['allergies'],$_POST['emergencycontact'],$_POST['typeofillness']]);
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Patient</title>
</head>
<body>
    <h1>Add Patient</h1>
    <form method="post">
        Name: <input type="text" name="name" required><br>
        Date of Birth: <input type="date" name="dob"><br>
        Gender: <select name="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select><br>
        Address: <input type="text" name="address"><br>
        Phone: <input type="tel" name="phone"><br>
        Email: <input type="email" name="email"><br>
        Chief of Complaint: <input type="text" name="chiefofcomplaint"><br>
        Medical History: <input type="text" name="medicalhistory"><br>
        Employer: <input type="text" name="employer"><br>
        Blood Type: <select name="bloodtype">
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="AB">AB</option>
            <option value="O">O</option>
        </select><br>
        Allergies: <input type="text" name="allergies"><br>
        Emergency Contact: <input type="text" name="emergencycontact"><br>
        Type of Illness: <input type="text" name="typeofillness"><br>
        
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>
