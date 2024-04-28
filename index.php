<?php
include 'config.php';

$stmt = $pdo->query("SELECT * FROM patients");
$patients = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Patients List</title>
</head>
<body>
    <h1>Patients List</h1>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Date of Birth</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Chief 0f Complaint:</th>
            <th>Medical History</th>
            <th>Employer</th>
            <th>Blood Type</th>
            <th>Allergies</th>
            <th>Emergency Contact</th>
            <th>Type of Illness</th>
        </tr>
        <?php foreach ($patients as $patient): ?>
            <tr>
                <td><?php echo $patient['name']; ?></td>
                <td><?php echo $patient['dob']; ?></td>
                <td><?php echo $patient['gender']; ?></td>
                <td><?php echo $patient['address']; ?></td>
                <td><?php echo $patient['phone']; ?></td>
                <td><?php echo $patient['email']; ?></td>
                <td><?php echo $patient['chiefofcomplaint']; ?></td>
                <td><?php echo $patient['medicalhistory']; ?></td>
                <td><?php echo $patient['employer']; ?></td>
                <td><?php echo $patient['bloodtype']; ?></td>
                <td><?php echo $patient['allergies']; ?></td>
                <td><?php echo $patient['emergencycontact']; ?></td>
                <td><?php echo $patient['typeofillness']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $patient['id']; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $patient['id']; ?>" onclick="return confirm('Are you sure you want to delete this patient?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
