<?php
$uploaddir = 'uploads/';
$contit = filter_input(INPUT_POST,'contit');
$direp = filter_input(INPUT_POST, 'direp');
$uploadfile = $uploaddir . basename($_FILES['dirdir']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['dirdir']['tmp_name'], $uploadfile)) {
    echo "Arquivo válido e enviado com sucesso.\n";
} else {
    echo "Possível ataque de upload de arquivo!\n";
}

echo 'Aqui está mais informações de debug:';
print_r($_FILES);

print "</pre>";

?>