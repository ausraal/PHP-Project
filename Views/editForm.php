<?php
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registracijos duomenų keitimas</title>
    <link rel="stylesheet" media="all" href="/public/stylesheets/style.css"/>
</head>
<body>
<div class="left">

    <img src="/public/pics/pic1.jpg" alt="Dog grooming picture">
    </div>

<div class="formM">
    <h2> Atnaujinkite rezervacijos duomenis:</h2>
    <form action="/updatedForm" method="POST">


        <p>Jūsų vardas: <?php echo $uniqueReservation['ownerName'];?></p>

        <p>Šuns vardas: <?php echo $uniqueReservation['dogName'];?></p>

        <p>Registruojamo šuns veislė/dydis: <?php echo $uniqueReservation['dogBreed'];?></p>

        <label for="visitDate">Pasirinkite naują kirpimo datą: </label>
        <input type="date" id="visitDate" name="visitDate" min="<?php echo date("Y-m-d");?>" required><br>
        <label for="visitTime">Pasirinkite naują kirpimo laiką: </label>
        <select id="visitTime" name="visitTime" required>
            <option value="empty">Choose Time</option>
            <option value="7:30">07:30</option>
            <option value="8:30">08:30</option>
            <option value="9:30">09:30</option>
            <option value="10:30">10:30</option>
            <option value="11:30">11:30</option>
            <option value="12:30">12:30</option>
            <option value="13:30">13:30</option>
            <option value="14:30">14:30</option>
            <option value="15:30">15:30</option>
            <option value="16:30">16:30</option>
            <option value="17:30">17:30</option>
        </select><br><br>
        <label for="phoneNumber">Įveskite telefono numerį:<br></label><br>
        <input type="text" id="phoneNumber" name="phoneNumber" placeholder="370.." required autocomplete="off"><br>
        <input type="hidden" name="id" value="<?php echo $uniqueReservation['id'];?>">
        <input class="registerbtn" type="submit" name="edit" id="edit" value="Atnaujinti">
    </form>
</div>
<div class="footerL"><?php require __DIR__ . '/../private/shared/footer.php';?></div>

