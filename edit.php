<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $stmt = $pdo->prepare("UPDATE patients SET name = ?, dob = ?, gender = ?, address = ?, phone = ?, email = ?, chiefofcomplaint = ?, medicalhistory = ?, employer = ?, bloodtype = ?, allergies = ?, emergencycontact = ?, typeofillness = ? WHERE id = ?");
    $stmt->execute([$_POST['name'], $_POST['dob'], $_POST['gender'], $_POST['address'], $_POST['phone'], $_POST['email'],$_POST['chiefofcomplaint'],$_POST['medicalhistory'],$_POST['employer'],$_POST['bloodtype'],$_POST['allergies'],$_POST['emergencycontact'],$_POST['typeofillness'],$_POST['id']]);
    header("Location: index.php");
    exit();
}


$id = $_GET['id'] ?? null;
$stmt = $pdo->prepare("SELECT * FROM patients WHERE id = ?");
$stmt->execute([$id]);
$patient = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Patient</title>
</head>
<body>
    <h1>Edit Patient</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $patient['id']; ?>">
        Name: <input type="text" name="name" value="<?php echo $patient['name']; ?>" required><br>
        Date of Birth: <input type="date" name="dob" value="<?php echo $patient['dob']; ?>"><br>
        Gender: <select name="gender">
            <option value="Male" <?php if ($patient['gender'] == 'Male') echo 'selected'; ?>>Male</option>
            <option value="Female" <?php if ($patient['gender'] == 'Female') echo 'selected'; ?>>Female</option>
            <option value="Other" <?php if ($patient['gender'] == 'Other') echo 'selected'; ?>>Other</option>
        </select><br>
        Address: <input type="text" name="address" value="<?php echo $patient['address']; ?>"><br>
        Phone: <input type="tel" name="phone" value="<?php echo $patient['phone']; ?>"><br>
        Email: <input type="email" name="email" value="<?php echo $patient['email']; ?>"><br>
        Chief of Complaint: <input type="text" name="chiefofcomplaint" value="<?php echo $patient['chiefofcomplaint']; ?>"><br>
        Medical History: <input type="text" name="medicalhistory" value="<?php echo $patient['medicalhistory']; ?>"><br>
        Employer: <input type="text" name="employer" value="<?php echo $patient['employer']; ?>"><br>
        Blood Type: <select name="bloodtype">
            <option value="A" <?php if ($patient['bloodtype'] == 'A') echo 'selected'; ?>>A</option>
            <option value="B" <?php if ($patient['bloodtype'] == 'B') echo 'selected'; ?>>B</option>
            <option value="AB" <?php if ($patient['bloodtype'] == 'AB') echo 'selected'; ?>>AB</option>
            <option value="O" <?php if ($patient['bloodtype'] == 'O') echo 'selected'; ?>>O</option>
        </select><br>
        Allergies: <input type="text" name="allergies" value="<?php echo $patient['allergies']; ?>"><br>
        Emergency Contact: <input type="text" name="emergencycontact" value="<?php echo $patient['emergencycontact']; ?>"><br>
        Type of Illness: <input type="text" name="typeofillness" value="<?php echo $patient['typeofillness']; ?>"><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
